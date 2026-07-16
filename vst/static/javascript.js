var ui = {
	title: document.getElementById("title"),
	body: document.body,
	window: document.getElementById("info"),
	description: document.getElementById("desc"),
	supported: document.getElementById("supported"),
	freedownload: document.getElementById("freedownload"),
	paiddownload: document.getElementById("paiddownload"),
	decoration: document.getElementById("gif"),
	ui: document.getElementById("ui"),
	uishadow: document.getElementById("uishadow"),
	logo1: document.getElementById("pluginlogo1"),
	logo2: document.getElementById("pluginlogo2"),
	rainbow: document.getElementById("rainbow"),
	right: document.getElementById("right"),
	uiwrap: document.getElementById("uiwrap"),
	winicon: document.getElementById("winicon"),
	patrons: document.getElementById("patrons")
}
var currentselected = 0;
var currentdisplay = 0;
var currenthover = -1;
var isselected = false;
var resized = true;
var prevtime = 0;
var open = 0;

function updateresize() {
	resized = false;

	ui.patrons.style.marginTop = ((String)(Math.floor(ui.patrons.offsetHeight*.3)))+"px";

	let id = currentdisplay>=0?currentdisplay:currentselected;
	if(vsts[id].ui !== undefined) {
		let uiw = vsts[id].ui.width;
		let uih = vsts[id].ui.height/uiw;
		uiw = Math.min(uiw,ui.right.offsetWidth*.9);
		uih *= uiw;

		ui.ui      .style.width  = ((String)(uiw))+"px";
		ui.uishadow.style.width  = ((String)(uiw))+"px";
		ui.ui      .style.height = ((String)(uih))+"px";
		ui.uishadow.style.height = ((String)(uih))+"px";
		ui.ui.style.marginBottom = "calc(20vh - "+((String)(uih*.2))+"px)";

		ui.uiwrap.style.margin = ((String)(uih*.5+75))+"px auto";
	} else ui.uiwrap.style.margin = null;
};

function clickitem(id) {
	if(isselected !== (id>=0)) {
		isselected = id>=0;
		ui.body.className = vsts[currentdisplay].id+(isselected?" ":" un")+"selected";
		resized = true;
		setTimeout(updateresize,150);
	}

	if(id >= 0)
		window.history.replaceState(null,vsts[id].title,"/"+vsts[id].title.replace(/\s/g,"").toLowerCase());
	else
		window.history.replaceState(null,"Unplugred's Plugin Trove","/");

	if(currentselected === Math.max(0,id)) return;

	if(!vsts[currentselected].hidden)
		vsts[currentselected].div.className = "leftitem";
	currentselected = Math.max(0,id);
	if(!vsts[currentselected].hidden)
		vsts[currentselected].div.className = "leftitem lefthover leftselected";

	if(currentdisplay === currentselected) return;

	currentdisplay = currentselected;
	currenthover = currentselected;
	updateui();
}
function hoveritem(id) {
	currenthover = id
}

function update(timestamp) {
	if(timestamp === undefined) timestamp = 0;
	let dt = timestamp-prevtime;
	prevtime = timestamp;

	if((currenthover==-1?currentselected:currenthover) != currentdisplay) {
		if(!vsts[currentdisplay].hidden)
			vsts[currentdisplay].div.className = "leftitem";
		if(currenthover == -1) {
			if(!vsts[currentselected].hidden)
				vsts[currentselected].div.className = "leftitem lefthover leftselected";
			currentdisplay = currentselected;
		} else {
			if(!vsts[currentdisplay].hidden && currentselected == currentdisplay)
				vsts[currentdisplay].div.className += " leftselected";
			vsts[currenthover].div.className = "leftitem lefthover";
			if(currentselected == currenthover)
				vsts[currenthover].div.className += " leftselected";
			currentdisplay = currenthover;
		}
		updateui();
	}

	if(vsts[currentdisplay].ui !== undefined) {
		open = Math.min(open+dt*.0005,1);
		let openease = 1-Math.pow(1-open,5)*.9;
		ui.ui.style.transform = "rotateX("+(String)(simplex(timestamp*.0003,0)*vsts[currentdisplay].ui.deg)+"deg) rotateY("+(String)(simplex(-30,timestamp*.0003)*vsts[currentdisplay].ui.deg*openease-90*(1-openease))+"deg) translateX(-50%) translateY(-50%)";
		ui.uishadow.style.transform = "translateX(7px) translateY(12px) " + ui.ui.style.transform;
	}

	requestAnimationFrame(update);
}

function updateui() {
	open = 0;
	ui.window.style.animation = "none";
	ui.ui.style.animation = "none";
	ui.window.offsetHeight;
	ui.ui.offsetHeight;
	ui.window.style.animation = null;
	ui.ui.style.animation = null;

	ui.rainbow.style.backgroundPositionY = (String)((currentdisplay*100)/vsts.length)+"vh";

	ui.title.innerText = vsts[currentdisplay].title;
	if(isselected) {
		ui.body.className = vsts[currentdisplay].id+" selected";
		if(vsts[currentdisplay].ui === undefined)
			document.title = vsts[currentdisplay].title+" - Unplugred's Plugin Trove";
		else
			document.title = vsts[currentdisplay].title;
	} else {
		ui.body.className = vsts[currentdisplay].id+" unselected";
		document.title = "Unplugred's Plugin Trove";
	}
	ui.window.className = "win-pos " + vsts[currentdisplay].color;
	ui.description.innerHTML = vsts[currentdisplay].description;
	if(vsts[currentdisplay].comingsoon === undefined || !vsts[currentdisplay].comingsoon) {
		if(vsts[currentdisplay].paiddownload === undefined) {
			ui.paiddownload.style.display = "none";
		} else {
			ui.paiddownload.style.display = null;
			//ui.paiddownload.style.pointerEvents = null;
			ui.paiddownload.target = "_blank";
			if(vsts[currentdisplay].paiddownload.price == undefined)
				ui.paiddownload.innerText = "Download Paid Version";
			else
				ui.paiddownload.innerText = "Download " + vsts[currentdisplay].paiddownload.price + "$ Version";
			ui.paiddownload.href = vsts[currentdisplay].paiddownload.url;
		}
		if(vsts[currentdisplay].freedownload === undefined) {
			ui.freedownload.style.display = "none";
			if(vsts[currentdisplay].paiddownload === undefined)
				ui.freedownload.parentNode.style.display = "none";
			else
				ui.freedownload.parentNode.style.display = null;
		} else {
			ui.freedownload.parentNode.style.display = null;
			ui.freedownload.style.display = null;
			ui.freedownload.href = vsts[currentdisplay].freedownload.url;
		}
	} else {
		ui.paiddownload.style.display = null;
		//ui.paiddownload.style.pointerEvents = "none";
		ui.paiddownload.innerText = "Coming Soon!";
		ui.paiddownload.href = "javascript:void(0)";
		ui.paiddownload.target = "_self";
		ui.freedownload.style.display = "none";
		ui.freedownload.parentNode.style.display = null;
	}
	if(vsts[currentdisplay].decoration === undefined) {
		ui.window.className += " winhasicon";
		ui.winicon.style.backgroundImage = "url(/"+vsts[currentdisplay].id+"/icon.svg)";
		ui.decoration.style.display = "none";
	} else {
		ui.decoration.style.display = null;
		ui.decoration.src = "/"+vsts[currentdisplay].id+"/gif.webp";
	}
	if(vsts[currentdisplay].ui !== undefined) {
		ui.ui.style.backgroundImage = "url(/"+vsts[currentdisplay].id+"/ui.webp)";

		let uiw = vsts[currentdisplay].ui.width;
		let uih = vsts[currentdisplay].ui.height/uiw;
		uiw = Math.min(uiw,ui.right.offsetWidth*.9);
		uih *= uiw;

		ui.ui      .style.width  = ((String)(uiw))+"px";
		ui.uishadow.style.width  = ((String)(uiw))+"px";
		ui.ui      .style.height = ((String)(uih))+"px";
		ui.uishadow.style.height = ((String)(uih))+"px";
		ui.ui.style.marginBottom = "calc(20vh - "+((String)(uih*.2))+"px)";
		ui.uiwrap.style.margin = ((String)(uih*.5+75))+"px auto";
		ui.uiwrap.style.display = null;
	} else {
		ui.uiwrap.style.margin = null;
		ui.uiwrap.style.display = "none";
	}
	ui.logo1.style.backgroundImage = "url(/"+vsts[currentdisplay].id+"/text.webp)";
	ui.logo2.style.backgroundImage = "url(/"+vsts[currentdisplay].id+"/text.webp)";
	if(vsts[currentdisplay].supported === undefined) {
		ui.supported.style.display = "none";
	} else {
		while(ui.supported.firstChild)
			ui.supported.removeChild(ui.supported.firstChild);
		ui.supported.style.display = null;
		for(let i = 0; i < vsts[currentdisplay].supported.length; i++) {
			let supporteddiv = document.createElement('img');
			supporteddiv.className = "supportedicon"
			supporteddiv.id = "supported"+vsts[currentdisplay].supported[i].toLowerCase().replace(" ","");
			supporteddiv.src = "/supported/"+vsts[currentdisplay].supported[i].toLowerCase().replace(" ","")+".svg";
			supporteddiv.alt = vsts[currentdisplay].supported[i];
			supporteddiv.title = vsts[currentdisplay].supported[i];
			ui.supported.appendChild(supporteddiv);
		}
	}
}

let leftitems = document.getElementsByClassName("leftitem");
let divn = 0;
for(let i = 0; i < vsts.length; i++) {
	if(!vsts[i].hidden) {
		vsts[i].div = leftitems[divn++];
		if(vsts[i].url === undefined)
			vsts[i].div.href = "javascript:void(0)";
	}
	if(location.pathname.toLowerCase().endsWith(vsts[i].title.replace(/\s/g,"").toLowerCase())) {
		currentselected = i;
		currentdisplay = i;
		isselected = true;
	}
}
update();
window.addEventListener('resize',function() {
	if(resized) return;
	resized = true;
	setTimeout(updateresize,150);
});
setTimeout(updateresize,150);
document.getElementById("back").href = "javascript:void(0)";

let x = document.getElementById("popups").getElementsByClassName("win-pos");
for(let i = 0; i < x.length; i++) dragElement(x[i].parentNode, x[i]);
x = document.getElementById("popups").getElementsByClassName("popupclose");
for(let i = 0; i < x.length; i++) x[i].style.display = "block";

var popups = [{
	div: document.getElementById("popuptext") },{
	div: document.getElementById("popupmedia") },{
	div: document.getElementById("popupnews") }];
for(let i = 0; i < popups.length; i++) {
	popups[i].id = -1;
	popups[i].innerdiv = popups[i].div.getElementsByClassName("popup")[0];
	popups[i].text = popups[i].div.getElementsByClassName("popupdesc")[0];
	popups[i].audioplayer = popups[i].div.getElementsByClassName("popupaudioplayer")[0];
	popups[i].videoplayer = popups[i].div.getElementsByClassName("popupvideoplayer")[0];
	popups[i].isaudio = false;
	popups[i].isvideo = false;
}
function setpopup(index, id = -1, text = "", path = null, isaudio = false, isvideo = false, videowidth = 30, videoheight = 20) {
	if(id === popups[index].id || id === -1) {
		if(popups[index].isaudio)
			popups[index].audioplayer.pause();
		if(popups[index].isvideo)
			popups[index].videoplayer.src = "about:blank";
		popups[index].innerdiv.style.animation = "none";
		popups[index].innerdiv.offsetWidth;
		popups[index].innerdiv.style.animation = "popupopen .4s reverse ease-in forwards";
		popups[index].id = -1;
		setTimeout(function() {
			if(popups[index].id == -1)
				popups[index].innerdiv.parentElement.style.display = "none";
		},400);
		return;
	}
	popups[index].div.style.display = null;
	popups[index].text.innerHTML = text
		.replace(/@br/g,"<br/>")
		.replace(/@a1/g,"<a target=\"_blank\" href=\"")
		.replace(/@a2/g,"\">")
		.replace(/@a3/g,"</a>");
	if(popups[index].audioplayer !== undefined) {
		if(isaudio) {
			popups[index].audioplayer.style.display = null;
			popups[index].audioplayer.src = path;
			popups[index].audioplayer.play();
		} else if(popups[index].isaudio) {
			popups[index].audioplayer.pause();
			popups[index].audioplayer.style.display = "none";
		}
		popups[index].isaudio = isaudio;
	}
	if(popups[index].videoplayer !== undefined) {
		if(isvideo) {
			popups[index].videoplayer.style.display = null;
			popups[index].videoplayer.style.width = (String)(videowidth)+"vw";
			popups[index].videoplayer.style.height = (String)(videoheight)+"vw";
			popups[index].videoplayer.src = path;
		} else if(popups[index].isvideo) {
			popups[index].videoplayer.src = "about:blank";
			popups[index].videoplayer.style.display = "none";
		}
		popups[index].isvideo = isvideo;
	}
	popups[index].innerdiv.style.animation = "none";
	popups[index].innerdiv.offsetWidth;
	if(popups[index].id == -1) {
		popups[index].innerdiv.style.animation = "popupopen .4s ease-in";
		popups[index].innerdiv.style.top = "calc((100vh - 100px) * "+(String)(.2+.6*Math.random())+")";
		popups[index].innerdiv.style.left = (String)(20+30*Math.random())+"vw";
		popups[index].div.style.top = "0";
		popups[index].div.style.left = "0";
	} else {
		popups[index].innerdiv.style.animation = "windowopen .4s ease-out";
	}
	popups[index].id = id;
}
