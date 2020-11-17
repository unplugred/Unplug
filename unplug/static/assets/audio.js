var isAudio = null;
function initaudio(defaultvalue) {
	switch(defaultvalue) {
		case 0: isAudio = false; break;
		case 3: isAudio = true; break;
		default:
			let ca = decodeURIComponent(document.cookie);
			if(ca.indexOf("audio=true") >= 0) isAudio = true;
			else if(ca.indexOf("audio=false") >= 0) isAudio = false;
			else isAudio = defaultvalue === 2;
	}
}
var audioSources = [];
function playaudio(path, volume = 1, loop = true, play = true) {
	if(!isAudio) return;
	let id = audioSources.length;
	audioSources[id] = new Audio(path);
	audioSources[id].volume = volume;
	audioSources[id].loop = loop;
	if(loop) {
		audioSources[id].addEventListener('timeupdate',(event) => {
			if(event.path[0].currentTime >= event.path[0].duration - .2)
				event.path[0].currentTime = 0;
		});
	}
	if(play) audioSources[id].play();
	return id;
}
var roomtones = [];
function playroomtone(path, volume = 1) {
	if(!isAudio) return;
	roomtones[roomtones.length] = playaudio(path,volume);
	audioSources[roomtones[roomtones.length-1]].addEventListener("durationchange",(event) => {
		if(roomtones.length === 1)
			updateroomtone();
		else
			event.path[0].currentTime = Math.floor(Math.random()*(event.path[0].duration - .1));
	});
}
function updateroomtone() {
	let index = Math.floor(Math.random()*roomtones.length);
	audioSources[roomtones[index]].currentTime = Math.random()*(audioSources[roomtones[index]].duration - .5);
	setTimeout(updateroomtone, (Math.random()*2000 + 500)/roomtones.length);
}
