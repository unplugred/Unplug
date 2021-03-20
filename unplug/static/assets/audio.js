//unplugred's hypercapable textural and granular audio system (c)

var a_canplay = null;
function a_init(defaultvalue) {
	switch(defaultvalue) {
		case 0: a_canplay = false; break;
		case 3: a_canplay = true; break;
		default:
			let ca = decodeURIComponent(document.cookie);
			if(ca.indexOf("audio=true") >= 0) a_canplay = true;
			else if(ca.indexOf("audio=false") >= 0) a_canplay = false;
			else a_canplay = defaultvalue === 2;
	}
	a_context = new (AudioContext || webkitAudioContext)();
}

var a_context;
var a_sources = [];
var a_busses = [];
var a_currentid = 0;
function a_source(prop) {
	let id = a_currentid++;
	a_sources[id] = prop;
	if(a_sources[id].ignoremute === undefined) a_sources[id].ignoremute = false;
	if(!a_canplay && !a_sources[id].ignoremute) return;

	a_sources[id].running = false;

	if(a_sources[id].buss !== undefined) {
		let i = 0;
		while(!isNaN(a_busses[a_sources[id].buss])) {
			if(i++ > 30) {
				a_busses[a_sources[id].buss] = undefined;
				console.log("error in buss assignment");
				break;
			} else {
				a_sources[id].buss = a_busses[a_sources[id].buss];
			}
		}
		if(a_sources[id].buss !== id) a_busses[id] = a_sources[id].buss;
	} else if(a_sources[id].level !== undefined) {
		a_sources[id].buss = id;
	}

	if(a_sources[id].buss !== undefined) {
		if(a_busses[a_sources[id].buss] === undefined) {
			a_busses[a_sources[id].buss] = a_context.createGain();
			if(a_sources[id].fade !== undefined && a_sources[id].fade > 0)
				a_busses[a_sources[id].buss].gain.value = 0;

			if(a_sources[id].postfader_send === undefined) {
				if(a_sources[id].postfader_return === undefined)
					a_busses[a_sources[id].buss].connect(a_context.destination);
				else
					a_sources[id].postfader_return.connect(a_context.destination);
			} else {
				a_busses[a_sources[id].buss].connect(a_sources[id].postfader_send);
				if(a_sources[id].postfader_return !== undefined)
					a_sources[id].postfader_return.connect(a_context.destination);
			}
		}
	}

	if(a_sources[id].prefader_return !== undefined)
		a_sources[id].prefader_return.connect(a_sources[id].buss === undefined ? a_context.destination : a_busses[a_sources[id].buss]);

	if(a_sources[id].granulate_max !== undefined) {
		if(a_sources[id].granulate_min === undefined)
			a_sources[id].granulate_min = a_sources[id].granulate_max;
	} else if(a_sources[id].granulate_min !== undefined) {
		a_sources[id].granulate_max = a_sources[id].granulate_min;
	}
	if(a_sources[id].granulatepitch_max !== undefined) {
		if(a_sources[id].granulatepitch_min === undefined)
			a_sources[id].granulatepitch_min = 2 - a_sources[id].granulatepitch_max;
	} else if(a_sources[id].granulatepitch_min !== undefined) {
		a_sources[id].granulatepitch_max = 2 - a_sources[id].granulatepitch_min;
	}
	if(a_sources[id].granulatelevel_max !== undefined) {
		if(a_sources[id].granulatelevel_min === undefined)
			a_sources[id].granulatelevel_min = 2 - a_sources[id].granulatelevel_max;
	} else if(a_sources[id].granulatelevel_min !== undefined) {
		a_sources[id].granulatelevel_max = 2 - a_sources[id].granulatelevel_min;
	}
	if(a_sources[id].granulatepitch_max !== undefined || a_sources[id].granulatelevel_max !== undefined) {
		if(a_sources[id].granulate_smooth === undefined)
			a_sources[id].granulate_smooth = false;
		if(a_sources[id].granulate_min === undefined) {
			a_sources[id].granulate_min = .1;
			a_sources[id].granulate_max = 4;
		}
	}
	if(a_sources[id].granulate_max !== undefined && a_sources[id].granulate_time === undefined)
		a_sources[id].granulate_time = true;

	if(a_sources[id].usemedia) {
		a_sources[id].media = a_context.createMediaElementSource(new Audio(a_sources[id].path));
		a_sources[id].media.mediaElement.crossOrigin = "anonymous";

		if(a_sources[id].prefader_send === undefined) {
			if(a_sources[id].prefader_return === undefined)
				a_sources[id].media.connect(a_sources[id].buss !== undefined ? a_busses[a_sources[id].buss] : a_context.destination);
		} else {
			a_sources[id].media.connect(a_sources[id].prefader_send);
		}

		if(a_sources[id].level !== undefined)
			a_setlevel(id, a_sources[id].level, a_sources[id].fade === undefined ? 0 : a_sources[id].fade);

		a_sources[id].media.mediaElement.loop = a_sources[id].loop === undefined ? false : a_sources[id].loop;
		a_sources[id].media.mediaElement.volume = a_sources[id].medialevel === undefined ? 1 : a_sources[id].medialevel;
		a_sources[id].media.mediaElement.playbackRate = a_sources[id].pitch === undefined ? 1 : a_sources[id].pitch;

		if(a_sources[id].play === undefined || a_sources[id].play) a_play(id,  a_sources[id].time === undefined ? 0 : a_sources[id].time);
	} else {
		fetch(a_sources[id].path, {mode: "cors"})
			.then(function(resp) {return resp.arrayBuffer()})
			.then(function(buffer) {a_context.decodeAudioData(buffer, function(abuffer) {
				a_sources[id].audiodata = abuffer;
				if(a_sources[id].play === undefined || a_sources[id].play) a_play(id,  a_sources[id].time === undefined ? 0 : a_sources[id].time);
		})});
	}

	return id;
}

function a_play(id, time = undefined) {
	if(!a_canplay && !a_sources[id].ignoremute) return;

	if(!a_sources[id].running) {
		if(a_sources[id].fade !== undefined) {
			a_setlevel(id, 0);
			a_setlevel(id, a_sources[id].level === undefined ? 1 : a_sources[id].level, a_sources[id].fade, false);
		} else if(a_sources[id].level !== undefined) {
			a_setlevel(id, a_sources[id].level === undefined ? 1 : a_sources[id].level);
		}
	}

	if(a_sources[id].usemedia) {

		if(a_sources[id].granulatepitch_max === undefined && a_sources[id].detune !== undefined)
			a_sources[id].media.mediaElement.playbackRate = (a_sources[id].pitch === undefined ? 1 : a_sources[id].pitch) + (Math.random()-.5)*a_sources[id].detune;

		if(a_sources[id].levelrandomize !== undefined)
			a_sources[id].media.mediaElement.volume = Math.min(Math.max((a_sources[id].medialevel === undefined ? 1 : a_sources[id].medialevel) + (Math.random()-.5)*a_sources[id].levelrandomize,0),1);

		if(a_context.state !== 'suspended') a_sources[id].media.mediaElement.play();
		if(time !== undefined) a_sources[id].media.mediaElement.currentTime = time;

	} else {

		if(time === undefined) time = 0;

		let pitch = a_sources[id].pitch === undefined ? 1 : a_sources[id].pitch;
		if(a_sources[id].buffer !== undefined) {
			pitch = a_sources[id].buffer.playbackRate.value;
			a_sources[id].buffer.stop();
		}
		if(a_sources[id].granulatepitch_max === undefined && a_sources[id].detune !== undefined)
			pitch += (Math.random()-.5)*a_sources[id].detune;

		a_sources[id].buffer = a_context.createBufferSource();
		a_sources[id].buffer.buffer = a_sources[id].audiodata;

		if(a_sources[id].prefader_send === undefined) {
			if(a_sources[id].prefader_return === undefined)
				a_sources[id].buffer.connect(a_sources[id].buss !== undefined ? a_busses[a_sources[id].buss] : a_context.destination);
		} else {
			a_sources[id].buffer.connect(a_sources[id].prefader_send);
		}

		a_sources[id].buffer.loop = a_sources[id].loop === undefined ? false : a_sources[id].loop;
		a_sources[id].buffer.playbackRate.value = pitch;

		if(a_sources[id].granulatelevel_max === undefined && a_sources[id].levelrandomize !== undefined)
			a_setlevel(id, (a_sources[id].level === undefined ? 1 : a_sources[id].level) + (Math.random()-.5)*a_sources[id].levelrandomize);

		a_sources[id].buffer.start(0, time);
	}

	if(a_sources[id].granulate_max !== undefined && a_sources[id].granulate_interval === undefined) {
		a_sources[id].granulate_interval = 0;
		a_granulate(id);
	}

	a_sources[id].running = true;
}

function a_seek(id, time) {
	if(!a_canplay && !a_sources[id].ignoremute) return;
	
	if(a_sources[id].usemedia) a_sources[id].media.mediaElement.currentTime = time;
	else a_play(id, time);
}

function a_setlevel(id, level, time = 0, cancelotherfades = true) {
	if((!a_canplay && !a_sources[id].ignoremute) || a_busses[a_sources[id].buss] === undefined) return;

	if(cancelotherfades)
		a_busses[a_sources[id].buss].gain.cancelScheduledValues(a_context.currentTime);

	setTimeout(function() {
		if(time > 0)
			a_busses[a_sources[id].buss].gain.linearRampToValueAtTime(level, a_context.currentTime + time);
		else
			a_busses[a_sources[id].buss].gain.setValueAtTime(level, a_context.currentTime);
	}, 100);
}

function a_setpitch(id, pitch, time = 0, cancelotherfades = true) {
	if(!a_canplay && !a_sources[id].ignoremute) return;

	if(a_sources[id].usemedia) {
		a_sources[id].media.mediaElement.playbackRate = pitch;
	} else {
		if(cancelotherfades)
			a_sources[id].buffer.playbackRate.cancelScheduledValues(a_context.currentTime);

		if(time > 0) a_sources[id].buffer.playbackRate.linearRampToValueAtTime(pitch, a_context.currentTime + time);
		else a_sources[id].buffer.playbackRate.value = pitch;
	}
}

function a_pause(id) {
	if(!a_canplay && !a_sources[id].ignoremute) return;

	if(a_sources[id].usemedia) a_sources[id].media.mediaElement.pause();
	else a_sources[id].buffer.stop();

	if(a_sources[id].granulate_interval !== undefined) {
		a_sources[id].granulate_interval = 0;
		clearInterval(a_sources[id].granulate_interval);
	}

	a_sources[id].running = false;
}

function a_resume(id) {
	if(!a_canplay && !a_sources[id].ignoremute) return;

	if(a_sources[id].usemedia) {
		if(a_sources[id].media.mediaElement.paused)
			a_sources[id].media.mediaElement.play();
	} else if(!a_sources[id].running) {
		a_play(id,  a_sources[id].time === undefined ? 0 : a_sources[id].time);
	}
	a_sources[id].running = true;

	if(a_sources[id].granulate_interval === undefined && a_sources[id].granulate_max !== undefined)
		a_granulate(id);
}

function a_resumectx(ignoremute = false) {
	if((!a_canplay && !ignoremute) || a_context.state !== 'suspended') return;
	a_context.resume();
}

function a_granulate(id) {
	if(!a_canplay && !a_sources[id].ignoremute) return;

	let next = Math.random()*(a_sources[id].granulate_max - a_sources[id].granulate_min) + a_sources[id].granulate_min;

	if(a_sources[id].granulate_time) {
		if(!a_sources[id].usemedia)
			a_seek(id, a_sources[id].buffer.buffer.duration*Math.random()*.98);
		else if(!isNaN(a_sources[id].media.mediaElement.duration))
			a_seek(id, a_sources[id].media.mediaElement.duration*Math.random()*.98);
	}

	if(a_sources[id].granulatepitch_max !== undefined)
		a_setpitch(id, Math.random()*(a_sources[id].granulatepitch_max - a_sources[id].granulatepitch_min) + a_sources[id].granulatepitch_min, a_sources[id].granulate_smooth ? next : 0, false);

	if(a_sources[id].granulatelevel_max !== undefined)
		a_setlevel(id, Math.random()*(a_sources[id].granulatelevel_max - a_sources[id].granulatelevel_min) + a_sources[id].granulatelevel_min, a_sources[id].granulate_smooth ? next : 0, false);

	a_sources[id].granulate_interval = setTimeout(function() { a_granulate(id); }, next*1000);
}
