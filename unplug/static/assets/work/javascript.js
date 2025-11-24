var hiddenitems = Array.from(document.getElementsByClassName("item"));
var unhideinterval;
function unhideitem() {
	hiddenitems.shift().style.visibility = null;
	if(hiddenitems.length == 0) clearInterval(unhideinterval);
}
let currentpage = 0;
for(let i = 1; i < workdata.length; ++i) {
	if(location.pathname.toLowerCase().endsWith(workdata[i].url)) {
		currentpage = i;
		break;
	}
}
unhideinterval = setInterval(unhideitem,currentpage==2?7:30);

var listdiv = document.getElementById("itemslist");
function updatepage(index,changehistory) {
	document.title = workdata[index].title;
	listdiv.innerHTML = "";

	let titlediv = document.createElement("h3");
	titlediv.id = "title";
	titlediv.innerHTML = workdata[index].title;
	listdiv.appendChild(titlediv);

	for(let i = 0; i < workdata[index].items.length; ++i) {
		listdiv.appendChild(document.createElement("br"));

		if(workdata[index].items[i].divider === true) continue;

		let itemdiv = document.createElement("div");
		itemdiv.className = "item";
		itemdiv.style.visibility = "hidden";

		if(workdata[index].items[i].linktext !== undefined) {
			let itemlinkdivunder = document.createElement("a");
			let itemlinkdivover  = document.createElement("a");
			itemlinkdivunder.innerHTML = workdata[index].items[i].linktext;
			itemlinkdivover .innerHTML = workdata[index].items[i].linktext;
			itemlinkdivunder.className = "itemlink itemlinkunder";
			itemlinkdivover .className = "itemlink itemlinkover";
			itemlinkdivunder.tabIndex = -1;
			itemlinkdivunder.href = "javascript:void(0)";
			if(workdata[index].items[i].topage === undefined) {
				itemlinkdivover.href = workdata[index].items[i].link===undefined?"javascript:void(0)":workdata[index].items[i].link;
			} else {
				itemlinkdivover.href = "javascript:void(0)";
				itemlinkdivover.onclick = function(){ updatepage(workdata[index].items[i].topage,true) };
			}
			itemdiv.appendChild(itemlinkdivunder);
			itemdiv.appendChild(itemlinkdivover );
		}

		if(workdata[index].items[i].time !== undefined) {
			if(workdata[index].items[i].linktext !== undefined)
				itemdiv.appendChild(document.createTextNode(" "));
			let itemtimediv = document.createElement("div");
			itemtimediv.className = "itemtime";
			itemtimediv.innerHTML = "("+workdata[index].items[i].time+")";
			itemdiv.appendChild(itemtimediv);
		}

		if(workdata[index].items[i].desc !== undefined) {
			if(workdata[index].items[i].linktext !== undefined)
				itemdiv.appendChild(document.createTextNode(" - "));
			let itemdescdiv = document.createElement("div");
			itemdescdiv.className = "itemdesc";
			itemdescdiv.innerHTML = workdata[index].items[i].desc;
			itemdiv.appendChild(itemdescdiv);
		}

		listdiv.appendChild(itemdiv);
		hiddenitems.push(itemdiv);
	}
	unhideinterval = setInterval(unhideitem,index==2?7:30);

	if(changehistory)
		window.history.pushState(null,workdata[index].title,workdata[index].url);
}

var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
var cursor = document.getElementById("cursor");
var cursorpos = [];
for(var i = 0; i < 50; ++i)
	cursorpos.push([0,0,0,0]); // x y a v

window.onload = function() {
	redraw();
	window.requestAnimationFrame(update);
};
window.onresize = redraw;

function redraw() {
	canvas.width = window.innerWidth;
	canvas.height = window.innerHeight;
	window.scrollTo(0, window.innerHeight*5);

	draw();
}

function smoothdamp(current, target, vindex, smoothtime, maxspeed, deltatime) {
	smoothtime = Math.max(.0001, smoothtime);
	let num1 = 2./smoothtime;
	let num2 = num1*deltatime;
	let num3 = 1./(1+num2+.48*num2*num2+.235*num2*num2*num2);
	let num4 = current-target;
	if(maxspeed > 0) num4 = Math.max(Math.min(num4,maxspeed*smoothtime),-maxspeed*smoothtime);
	let num5 = (cursorpos[vindex][3]+num1*num4)*deltatime;
	target = current-num4;
	let num6 = target+(num4+num5)*num3;
	if((target-current > 0) == (num6 > target)) {
		num6 = target;
		cursorpos[vindex][3] = 0;
	} else cursorpos[vindex][3] = (cursorpos[vindex][3]-num1*num5)*num3;
	return num6;
}

var twopi = Math.PI*2;
function angledamp(current, target, vindex, smoothtime, maxspeed, deltatime) {
	if(Math.abs(current-target ) > Math.abs(current-(target -twopi))) target  -= twopi;
	if(Math.abs(target -current) > Math.abs(target -(current-twopi))) current -= twopi;
	return smoothdamp(current,target,vindex,smoothtime,maxspeed,deltatime);
}

var dt = null;
var time = 5;
function update(timestamp) {
	if(!dt) dt = timestamp;
	let dtt = timestamp - dt;
	dt = timestamp;
	time += dtt*.0001;

	let angle = time*.5;
	for(let i = 0; i < cursorpos.length; ++i) {
		let prevx = cursorpos[i][0];
		let prevy = cursorpos[i][1];
		let t = simplex(time*.02,i);
		t = t*t*.03+time;
		let a = simplex(i,time*.02)*20;
		let r = simplex(i,time*.2 )*.3;
		let x = simplex(t,Math.cos(a)*r  )*.5;
		let y = simplex(  Math.sin(a)*r,t)*.5;
		cursorpos[i][0] = x*Math.cos(angle)-y*Math.sin(angle)+.5;
		cursorpos[i][1] = x*Math.sin(angle)+y*Math.cos(angle)+.5;
		cursorpos[i][2] = angledamp(
			cursorpos[i][2],
			Math.atan2(cursorpos[i][0]-prevx,prevy-cursorpos[i][1]),
			i,70,.02,dtt);
	}

	draw();
	requestAnimationFrame(update);
}

function draw() {
	ctx.clearRect(0,0,canvas.width,canvas.height);
	for(let i = 0; i < cursorpos.length; ++i) {
		ctx.save();
		ctx.translate(
			Math.floor(cursorpos[i][0]*window.innerWidth ),
			Math.floor(cursorpos[i][1]*window.innerHeight));
		ctx.rotate(    cursorpos[i][2]);
		ctx.drawImage(cursor,0,0);
		ctx.restore();
	}
}
