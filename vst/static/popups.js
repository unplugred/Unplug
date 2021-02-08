var popup_audio_id = -1;
var popup_audio_available = true;
var popup_audio_div = document.getElementById("popupaudio");
var popup_audio_text = document.getElementById("popupaudiodesc");
var popup_audio_player = document.getElementById("popupplayer");
function popup_audio(id, path, desc) {
	if(!popup_audio_available) return;
	popup_audio_available = false;

	if(popup_audio_id === -1) {
		setpopup(popup_audio_div, popup_audio_text, desc, popup_audio_player, path);
		popup_audio_id = id;
		setTimeout(function(){popup_audio_available=true;},500);

	} else {
		popup_audio_div.className = "popupwrap";
		void popup_audio_div.offsetWidth;
		popup_audio_div.className = "popupwrap popupoff";

		if(popup_audio_id !== id) {
			setTimeout(function(){
				setpopup(popup_audio_div, popup_audio_text, desc, popup_audio_player, path);
				popup_audio_id = id;
			},500);
			setTimeout(function(){popup_audio_available=true;},1000);
		} else {
			setTimeout(function(){
				popup_audio_available=true;
				popup_audio_player.pause();
			},500);
		}

		popup_audio_id = -1;
	}
}

var popup_id = -1;
var popup_available = true;
var popup_div = document.getElementById("popuptext");
var popup_text = document.getElementById("popuptextdesc");
function popup(id, desc) {
	if(!popup_available) return;
	popup_available = false;

	if(popup_id === -1) {
		setpopup(popup_div, popup_text, desc);
		popup_id = id;
		setTimeout(function(){popup_available=true;},500);

	} else {
		popup_div.className = "popupwrap";
		void popup_div.offsetWidth;
		popup_div.className = "popupwrap popupoff";

		if(popup_id !== id) {
			setTimeout(function(){
				setpopup(popup_div, popup_text, desc);
				popup_id = id;
			},500);
			setTimeout(function(){popup_available=true;},1000);
		} else {
			setTimeout(function(){popup_available=true;},500);
		}

		popup_id = -1;
	}
}
function setpopup(div, divtext, text, divplayer = null, path = null) {
	div.className = "popupwrap";
	void div.offsetWidth;
	div.className = "popupwrap popupon";
	divtext.innerHTML = text
		.replace(/@br/g,"<br/>")
		.replace(/@a1/g,"<a href=\"")
		.replace(/@a2/g,"\">")
		.replace(/@a3/g,"</a>");
	if(divplayer !== null) {
		divplayer.src = path;
		divplayer.play();
	}
}
function closetext() {
	if(!popup_available) return;
	popup_available = false;

	popup_div.className = "popupwrap";
	void popup_div.offsetWidth;
	popup_div.className = "popupwrap popupoff";

	setTimeout(function(){popup_available=true;},500);
	popup_id = -1;
}
function closeaudio() {
	if(!popup_audio_available) return;
	popup_audio_available = false;

	popup_audio_div.className = "popupwrap";
	void popup_audio_div.offsetWidth;
	popup_audio_div.className = "popupwrap popupoff";

	setTimeout(function(){
		popup_audio_available=true;
		popup_audio_player.pause();
	},500);
	popup_audio_id = -1;
}
