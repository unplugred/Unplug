var p_divplayer = document.getElementById("player");
var p_divplay = document.getElementById("player-play");
var p_divdownload = document.getElementById("player-download");
var p_divdownloadmenu = document.getElementById("player-downloadmenu");
var p_divmp3 = document.getElementById("player-mp3");
var p_divflac = document.getElementById("player-flac");
var p_divbar = document.getElementById("player-barknob");
var p_divvolumeicon = document.getElementById("player-volumeicon");
var p_divvolume = document.getElementById("player-volumeknob");
var p_divtimecode = document.getElementsByClassName("player-digit");

var p_currentdiv = "";
var p_current = "";
var p_playing = false;
var p_downloading = false;
var p_isseeking = false;
var p_flac = false;
var p_ismorethanten = false;
var p_isloading = true;

var p_audio = new Audio();
p_audio.loop = false;
p_audio.muted = false;
p_audio.volume = .5;
if(false && p_audio.canPlayType('audio/mpeg;')) p_audio.type = "audio/mpeg";
else p_audio.type = "audio/wav";

//recalculate positions
var p_barpos = null;
var p_volumepos = null;
var p_barwidth = null;
var p_volumewidth = null;
function p_resize() {
	p_barpos = document.getElementById("player-bardrag").getBoundingClientRect();
	p_barwidth = p_barpos.width - 7;
	p_barpos = p_barpos.left + 3;
	p_volumepos = document.getElementById("player-volumedrag").getBoundingClientRect();
	p_volumewidth = p_volumepos.width - 10;
	p_volumepos = p_volumepos.left + 5;
}
window.onresize = p_resize;

//format time
function p_calctime(secs) {
	if(isNaN(secs)) return p_ismorethanten ? "----" : "---";
	if(p_ismorethanten)
		return Math.floor(secs/60).toString().padStart(2,'0')+Math.floor(secs%60).toString().padStart(2,'0');
	else
		return Math.floor(secs/60)+Math.floor(secs%60).toString().padStart(2,'0');
}

//divify timecode
function p_divifytimecode(timecode,duration) {
	if(p_ismorethanten)
		for(let i = 0; i < 4; i++)
			p_divtimecode[i+(duration?4:0)].innerHTML = timecode.charAt(i);
	else
		for(let i = 0; i < 3; i++)
			p_divtimecode[i+(duration?5:1)].innerHTML = timecode.charAt(i);
}

//place a song
function p_putsong(div,mp3,flac) {
	if(p_current == mp3) return;
	p_current = mp3;
	p_currentflac = flac;

	if(div !== -1) {
		div.className = "playing";
		p_currentdiv.className = "";
		p_currentdiv = div;
	}
	p_divplayer.style.display = "block";

	p_audio.src = mp3;
	if(flac !== -1) {
		p_divmp3.href = mp3+"?dnld";
		p_divmp3.download = mp3.replace(/^.*[\\\/]/, '');
		p_divflac.href = flac+"?dnld";
		p_divflac.download = flac.replace(/^.*[\\\/]/, '');
		p_divdownload.href = "javascript:void(0);";
		p_divdownload.download = "";
		p_divdownload.target = "";
	} else {
		p_divdownload.href = mp3+"?dnld";
		p_divdownload.download = mp3.replace(/^.*[\\\/]/, '');
		p_divdownload.target = "_blank";
	}
	p_flac = flac !== -1;
	p_audio.currentTime = 0;
	setTimeout(p_resize,200);
}

//play a song
function p_playsong(div,mp3,flac) {
	p_putsong(div,mp3,flac)
	p_audio.play();
	p_divplay.className = "player-button player-button-pressed";
	p_playing = true;
}

//play
function p_play() {
	if(p_playing) {
		p_audio.pause();
		p_divplay.className = "player-button";
	} else {
		p_audio.play();
		p_divplay.className = "player-button player-button-pressed";
	}
	p_playing = !p_playing;
	if(p_downloading) p_download();
}

//download menu/download
function p_download() {
	if(!p_flac) return;
	if(p_downloading) {
		p_divdownload.className = "player-button";
		p_divdownloadmenu.style.display = "none";
	} else {
		p_divdownload.className = "player-button player-button-pressed";
		p_divdownloadmenu.style.display = "block";
	}
	p_downloading = !p_downloading;
}

//update duration
p_audio.addEventListener('durationchange', (event) => {
	p_ismorethanten = p_audio.duration >= 600;
	if(p_ismorethanten) {
		p_divtimecode[0].style.display = null;
		p_divtimecode[4].style.display = null;
	} else {
		p_divtimecode[0].style.display = "none";
		p_divtimecode[4].style.display = "none";
	}
	p_divifytimecode(p_calctime(p_audio.duration),true);
	p_divifytimecode(p_calctime(p_audio.currentTime),false);
});

//update progress
p_audio.addEventListener('timeupdate', (event) => {
	if(p_isseeking) return;
	p_divbar.style.left = ((p_audio.currentTime/p_audio.duration)*100) + "%";
	p_divifytimecode(p_calctime(p_audio.currentTime),false);
	if(p_audio.currentTime >= p_audio.duration)
	{
		p_playing = false;
		p_divplay.className = "player-button";
	}
});

//loading
p_audio.addEventListener('loadstart', (event) => {
	p_ismorethanten = false;
	p_divifytimecode("---",false);
	p_divifytimecode("---",true);
	p_divtimecode[0].style.display = "none";
	p_divtimecode[4].style.display = "none";
	p_isloading = true;
});

//on seek
function p_seek(e) {
	if(!p_isseeking) return;
	p_divbar.style.left = Math.min(Math.max((e.clientX - p_barpos)*100,0)/p_barwidth,100) + "%";
	p_divifytimecode(p_calctime(Math.min(Math.max((e.clientX - p_barpos)*p_audio.duration,0)/p_barwidth,p_audio.duration)),false);
}

//finish seek
function p_seekrelease(e) {
	if(!p_isseeking) return;
	p_isseeking = false;
	p_audio.currentTime = ((e.clientX - p_barpos)*p_audio.duration)/p_barwidth;
}

//start seek
function p_seekclick(e) {
	if(e.buttons !== 1) return;
	p_isseeking = true;
	if(p_downloading) p_download();
	p_seek(e);
}

//update volume
var volumestate = 2;
var volumeiconurl = p_divvolumeicon.style.backgroundImage.substring(0,p_divvolumeicon.style.backgroundImage.length-7);
function p_volume(e) {
	if(e.buttons !== 1) return;
	p_audio.volume = Math.min(Math.max(e.clientX - p_volumepos,0)/p_volumewidth,1);
	p_divvolume.style.left = (p_audio.volume*100) + "%";

	let v = Math.ceil(p_audio.volume*4);
	if(volumestate !== v) {
		volumestate = v;
		p_divvolumeicon.style.backgroundImage = v === 1 ? "none" : (volumeiconurl+v+".png\")");
	}

	if(p_downloading) p_download();
}