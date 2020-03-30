var p_divplayer = document.getElementById("player");
var p_divplay = document.getElementById("player-play");
var p_divdownload = document.getElementById("player-download");
var p_divdownloadmenu = document.getElementById("player-downloadmenu");
var p_divmp3 = document.getElementById("player-mp3");
var p_divflac = document.getElementById("player-flac");
var p_divbar = document.getElementById("player-barknob");
var p_divvolume = document.getElementById("player-volumeknob");
var p_divtimecode = document.getElementById("player-timecode");

var p_currentdiv = "";
var p_current = "";
var p_playing = false;
var p_downloading = false;
var p_updateinterval = null;
var p_isseeking = false;

var p_audio = new Audio();
p_audio.loop = false;
p_audio.muted = false;
p_audio.volume = .5;
if(false && p_audio.canPlayType('audio/mpeg;')) p_audio.type = "audio/mpeg";
else p_audio.type = "audio/wav";

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
function p_calctime(secs) {
	return Math.floor(secs/60)+":"+Math.floor(secs%60).toString().padStart(2,'0');
}
function p_playsong(div,mp3,flac) {
	if(p_current == mp3) return;
	p_current = mp3;
	p_currentflac = flac;

	div.className = "playing";
	p_currentdiv.className = "";
	p_currentdiv = div;
	p_divplayer.style.display = "block";

	p_audio.src = mp3;
	p_divmp3.href = mp3;
	p_divmp3.download = mp3.replace(/^.*[\\\/]/, '');
	p_divflac.href = flac;
	p_divflac.download = flac.replace(/^.*[\\\/]/, '');
	p_audio.currentTime = 0;
	p_audio.play();
	p_divplay.className = "player-button player-button-pressed";
	p_playing = true;
	if(p_updateinterval === null) p_updateinterval = setInterval(p_update, 500);
	setTimeout(p_update,200);
	setTimeout(p_resize,200);
}
function p_play() {
	if(p_playing) {
		p_audio.pause();
		p_divplay.className = "player-button";
		p_update();
		if(p_updateinterval!==null){clearInterval(p_updateinterval);p_updateinterval=null;}
	} else {
		p_audio.play();
		p_divplay.className = "player-button player-button-pressed";
		if(p_audio.currentTime >= p_audio.duration) p_update();
		if(p_updateinterval===null)p_updateinterval=setInterval(p_update,500);
	}
	p_playing = !p_playing;
	if(p_downloading) p_download();
}
function p_download() {
	if(p_downloading) {
		p_divdownload.className = "player-button";
		p_divdownloadmenu.style.display = "none";
	} else {
		p_divdownload.className = "player-button player-button-pressed";
		p_divdownloadmenu.style.display = "block";
	}
	p_downloading = !p_downloading;
}
function p_update() {
	if(p_isseeking) return;
	p_divbar.style.left = ((p_audio.currentTime/p_audio.duration)*100) + "%";
	p_divtimecode.innerHTML = p_calctime(p_audio.currentTime)+"/"+p_calctime(p_audio.duration);
	if(p_audio.currentTime >= p_audio.duration)
	{
		p_playing = false;
		p_divplay.className = "player-button";
		if(p_updateinterval !== null) { clearInterval(p_updateinterval); p_updateinterval = null; }
	}
}
function p_seek(e) {
	if(!p_isseeking) return;
	p_divbar.style.left = Math.min(Math.max((e.clientX - p_barpos)*100,0)/p_barwidth,100) + "%";
	p_divtimecode.innerHTML = p_calctime(Math.min(Math.max((e.clientX - p_barpos)*p_audio.duration,0)/p_barwidth,p_audio.duration))+"/"+p_calctime(p_audio.duration);
}
function p_seekrelease(e) {
	if(!p_isseeking) return;
	p_isseeking = false;
	p_audio.currentTime = ((e.clientX - p_barpos)*p_audio.duration)/p_barwidth;
	p_update();
}
function p_seekclick(e) {
	if(e.buttons !== 1) return;
	p_isseeking = true;
	if(p_downloading) p_download();
	p_seek(e);
}
function p_volume(e) {
	if(e.buttons !== 1) return;
	p_audio.volume = Math.min(Math.max(e.clientX - p_volumepos,0)/p_volumewidth,1);
	p_divvolume.style.left = (p_audio.volume*100) + "%";
	if(p_downloading) p_download();
}