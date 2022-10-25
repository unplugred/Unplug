var ui = {
	title: document.getElementById("title"),
	body: document.body,
	window: document.getElementById("info"),
	description: document.getElementById("desc"),
	freedownload: document.getElementById("freedownload"),
	paiddownload: document.getElementById("paiddownload"),
	decoration: document.getElementById("gif"),
	ui: document.getElementById("ui"),
	uishadow: document.getElementById("uishadow"),
	logo1: document.getElementById("pluginlogo1"),
	logo2: document.getElementById("pluginlogo2"),
	rainbow: document.getElementById("rainbow"),
	winicon: document.getElementById("winicon")
}
var currentselected = 0;
var currenthover = -3;
var temporalhover = -1;
var triggerupdate = false;
var isselected = false;
var ismobile = document.documentElement.clientWidth <= 900;
var issingle = document.documentElement.clientWidth <= 600;
if(ismobile) {
	document.body.className = "mobile mobileunselected";
	if(issingle) document.body.className += " single";
}
var resized = false;
window.addEventListener('resize',function(){
	if(resized) return;
	resized = true;
	setTimeout(updateresize,150);
});
function updateresize() {
	resized = false;
	var newmobile = document.documentElement.clientWidth <= 900;
	var id = currenthover>=0?currenthover:currentselected;
	var newsingle = (document.documentElement.clientWidth <= 600 || (newmobile && vsts[id].ui === undefined && isselected));
	if((newmobile && !ismobile) || (newmobile && (newsingle !== issingle))) {
		ismobile = true;
		document.body.className = vsts[id].id + " mobile " + (isselected?"mobileselected":"mobileunselected");
	} else if((!newmobile && ismobile) || (!newmobile && (newsingle !== issingle))) {
		ismobile = false;
		document.body.className = vsts[id].id;
	}
	if(newsingle && !issingle) {
		issingle = true;
		document.body.className += " single";
		if(isselected)
			document.getElementById("right").style.height = (vsts[id].ui == undefined ? "5px" : ((String)(vsts[id].ui.height + 10)+"px"));
	} else if(!newsingle && issingle) {
		issingle = false;
		document.getElementById("right").style.height = null;
	}
};
function back() {
	if(!isselected) return;
	isselected = false;
	issingle = document.documentElement.clientWidth <= 600;
	if(ismobile) {
		document.body.className = vsts[currentselected].id + " mobile mobileunselected";
		if(issingle) document.body.className += " single"
	}
	window.history.replaceState(null,"Unplugred's Plugin Trove","/newdesign");
	//CHANGE THIS
}

let x = document.getElementById("popups").getElementsByClassName("win-pos");
for (var i = 0; i < x.length; i++) {
	dragElement(x[i].parentNode, x[i]);
}

var uielement = document.getElementById("ui");
var uishadow = document.getElementById("uishadow");
var prevtime = 0;
var open = 0;
function update(timestamp) {
	if(timestamp === undefined) timestamp = 0;
	let dt = timestamp - prevtime;
	prevtime = timestamp;

	if((!ismobile || isselected) && ((currenthover != temporalhover && temporalhover != -1) || (temporalhover == -1 && currenthover != currentselected))) {
		if(currenthover >= 0) vsts[currenthover].div.className = "leftitem";
		if(temporalhover == -1) {
			vsts[currentselected].div.className = "leftitem lefthover leftselected";
			currenthover = currentselected;
			temporalhover = currentselected;
		} else {
			if(currentselected == currenthover && currenthover >= 0) vsts[currenthover].div.className += " leftselected";
			vsts[temporalhover].div.className = "leftitem lefthover";
			if(currentselected == temporalhover) vsts[temporalhover].div.className += " leftselected";
			currenthover = temporalhover;
		}
		updateui();
	} else if(triggerupdate) updateui();

	if((!ismobile || isselected) && vsts[currenthover].ui !== undefined) {
		open = Math.min(open+dt*.0005,1);
		let openease = 1-Math.pow(1-open,5);
		uielement.style.transform = "rotateX("+(String)(simplex(timestamp*.0003,0)*vsts[currenthover].ui.deg)+"deg) rotateY("+(String)(simplex(-30,timestamp*.0003)*vsts[currenthover].ui.deg*openease-90*(1-openease))+"deg) translateX(-50%) translateY(-50%)";
		uishadow.style.transform = "translateX(7px) translateY(12px) " + uielement.style.transform;
	}

	requestAnimationFrame(update);
}

function switchselected(id,addtohistory) {
	isselected = true;

	if(currentselected == id) {
		if(ismobile) {
			if(addtohistory)
				window.history.replaceState(null,vsts[id].title,"/newdesign/"+vsts[id].title.replace(/\s/g,"").toLowerCase());
			//CHANGE THIS

			triggerupdate = true;
		}
		return;
	}

	vsts[currentselected].div.className = "leftitem";
	vsts[id].div.className = "leftitem lefthover leftselected";
	currentselected = id;
	if(addtohistory)
		window.history.replaceState(null,vsts[id].title,"/newdesign/"+vsts[id].title.replace(/\s/g,"").toLowerCase());
	//CHANGE THIS
}

let leftside = document.getElementById("leftwrap");
for(let i = 0; i < vsts.length; i++) {
	vsts[i].div = document.createElement('a');
	vsts[i].div.onmousemove = function(){temporalhover = i};
	vsts[i].div.onmouseout = function(){temporalhover = -1};
	vsts[i].div.onclick = function(){switchselected(i,true)};
	vsts[i].div.className = "leftitem";
	vsts[i].div.href = "javascript:void(0)";

	let iteminnerdiv = document.createElement('div');
	iteminnerdiv.className = "leftiteminner " + vsts[i].color;

	let iteminnerinnerdiv = document.createElement('div');
	iteminnerinnerdiv.className = "leftiteminnerinner";

	if(vsts[i].hideicon === undefined || vsts[i].hideicon === false) {
		let icondiv = document.createElement('div');
		icondiv.className = "lefticon";
		icondiv.style.backgroundImage = "url(/"+vsts[i].id+"/icon.svg)";
		iteminnerdiv.className += " lefticonitem";
		iteminnerdiv.appendChild(icondiv);
	}

	let titlediv = document.createElement('div');
	titlediv.className = "lefttitle";
	titlediv.innerText = vsts[i].title;
	iteminnerinnerdiv.appendChild(titlediv);

	if(vsts[i].rating !== undefined) {
		let ratingdiv = document.createElement("div");
		ratingdiv.className = "rating";
		ratingdiv.innerText = vsts[i].rating;
		iteminnerinnerdiv.appendChild(ratingdiv);
	}

	if(vsts[i].tagline !== undefined) {
		let taglinediv = document.createElement("div");
		taglinediv.className = "tagline";
		taglinediv.innerText = vsts[i].tagline;
		iteminnerinnerdiv.appendChild(document.createElement("br"));
		iteminnerinnerdiv.appendChild(taglinediv);
	}

	iteminnerdiv.appendChild(iteminnerinnerdiv);
	vsts[i].div.appendChild(iteminnerdiv);
	leftside.appendChild(vsts[i].div);

	if(vsts[i].separator !== undefined && vsts[i].separator == true) {
		let separatordiv = document.createElement("div");
		separatordiv.className = "leftseparator";
		leftside.appendChild(separatordiv);
	}

	if(location.pathname.toLowerCase().endsWith(vsts[i].title.replace(/\s/g,"").toLowerCase()))
		switchselected(i,false);
}
let separatordiv = document.createElement("div");
separatordiv.className = "leftseparator";
leftside.appendChild(separatordiv);

let smilediv = document.createElement("center");
smilediv.className = "leftitem lefttitle";
smilediv.innerText = ":)";
leftside.appendChild(smilediv);

function updateui() {
	triggerupdate = false;
	open = 0;
	ui.window.style.animation = "none";
	ui.ui.style.animation = "none";
	ui.window.offsetHeight;
	ui.ui.offsetHeight;
	ui.window.style.animation = null;
	ui.ui.style.animation = null;

	ui.rainbow.style.backgroundPositionY = (String)((currenthover*-50)/vsts.length)+"vh";

	ui.title.innerText = vsts[currenthover].title;
	ui.body.className = vsts[currenthover].id;
	issingle = (document.documentElement.clientWidth <= 600 || (ismobile && vsts[currenthover].ui === undefined && isselected));
	if(ismobile) {
		ui.body.className += " mobile " + (isselected?"mobileselected":"mobileunselected");
		if(issingle) {
			document.body.className += " single";
			document.getElementById("right").style.height = (vsts[currenthover].ui == undefined ? "5px" : ((String)(vsts[currenthover].ui.height + 150)+"px"));
		} else document.getElementById("right").style.height = null;
	}
	if(!isselected || vsts[currenthover].ui === undefined)
		document.title = "Unplugred's Plugin Trove";
	else
		document.title = vsts[currenthover].title;
	ui.window.className = "win-pos " + vsts[currenthover].color;
	ui.description.innerHTML = vsts[currenthover].description;
	if(vsts[currenthover].price === undefined) {
		ui.paiddownload.style.display = "none";
	} else {
		ui.paiddownload.style.display = null;
		ui.paiddownload.innerText = "Download " + vsts[currenthover].price + "$ Version";
		ui.paiddownload.href = vsts[currenthover].paiddownload;
	}
	if(vsts[currenthover].freedownload === undefined) {
		ui.freedownload.style.display = "none";
		if(vsts[currenthover].price === undefined)
			ui.freedownload.parentNode.style.display = "none";
		else
			ui.freedownload.parentNode.style.display = null;
	} else {
		ui.freedownload.parentNode.style.display = null;
		ui.freedownload.style.display = null;
		ui.freedownload.href = vsts[currenthover].freedownload;
	}
	if(vsts[currenthover].decoration === undefined) {
		ui.window.className += " winhasicon";
		ui.winicon.style.backgroundImage = "url(/"+vsts[currenthover].id+"/icon.svg)";
		ui.decoration.style.display = "none";
	} else {
		ui.decoration.style.display = null;
		ui.decoration.src = "/"+vsts[currenthover].id+"/gif.webp";
	}
	if(vsts[currenthover].ui === undefined) {
		ui.ui.style.display = "none";
		ui.uishadow.style.display = "none";
	} else {
		ui.ui.style.display = null;
		ui.uishadow.style.display = null;
		ui.ui.style.background = "url(/"+vsts[currenthover].id+"/ui.webp), black";
		ui.ui.style.width = vsts[currenthover].ui.width+"px";
		ui.uishadow.style.width = vsts[currenthover].ui.width+"px";
		ui.ui.style.height = vsts[currenthover].ui.height+"px";
		ui.uishadow.style.height = vsts[currenthover].ui.height+"px";
		ui.ui.style.marginBottom = "calc(20vh - " + (String)(vsts[currenthover].ui.height*.2)+"px)";
	}
	ui.logo1.style.backgroundImage = "url(/"+vsts[currenthover].id+"/text.webp)";
	ui.logo2.style.backgroundImage = "url(/"+vsts[currenthover].id+"/text.webp)";
}
update();

var popups = [{
	div: document.getElementById("popuptext") },{
	div: document.getElementById("popupmedia") },{
	div: document.getElementById("popupeveryweek") }];
for(let i = 0; i < popups.length; i++) {
	popups[i].id = -1;
	popups[i].innerdiv = popups[i].div.getElementsByClassName("popup")[0];
	popups[i].text = popups[i].div.getElementsByClassName("popupdesc")[0];
	popups[i].audioplayer = popups[i].div.getElementsByClassName("popupaudioplayer")[0];
	popups[i].videoplayer = popups[i].div.getElementsByClassName("popupvideoplayer")[0];
	popups[i].isaudio = false;
	popups[i].isvideo = false;
}
function setpopup(index, id = -1, text = "", path = null, isaudio = false, isvideo = false, videowidth = 20, videoheight = 15) {
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
