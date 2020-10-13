var iframe = document.getElementById("win-iframe");
var input = document.getElementById("win-adress");
var back = document.getElementById("win-back");
var front = document.getElementById("win-front");
var go = document.getElementById("win-go");
var rainbow = document.getElementById("win-rainbow");
var titletext = document.getElementById("win-header");
var hostt = "https://         /";

var historyy = [];
var unhistory = [];
var current = validate(iframe.src);
var valid = true;
input.value = hostt + current;
prevvalue = current;
rainbow.style.width = Math.ceil(Math.max(Math.min(input.value.length, hostt.length - 1) - 8, 0)*6.6) + "px";
rainbow.style.backgroundPositionX = (Math.random()*100) + "%";

function changeurl()
{
	if(!valid) return;
	v = validate(input.value.substr(hostt.length));
	if(v !== current)
	{
		historyy.push(current);
		current = v;
		unhistory = [];
		back.className = "win-button";
		front.className = "win-button win-off";
	}
	iframe.src = tourll(current);
}

function updateurl(urll)
{
	titletext.innerHTML = iframe.contentDocument.title;
	urll = validate(urll);
	if(urll !== current)
	{
		historyy.push(current);
		current = urll;
		unhistory = [];
		back.className = "win-button";
		front.className = "win-button win-off";
	}
	input.value = hostt + current;
	updatego();
}

function validate(v)
{
	var r = singlevalid(v);
	while(r !== v)
	{
		v = r;
		r = singlevalid(r);
	}
	return r;
}

function singlevalid(v)
{
	v = String(v).replace(/\s/g,'');
	if(v.startsWith("http"))
	{
		var search = v.substr(8).search("/");
		if(search !== -1) v = v.substr(search + 9);
		else v = " ";
	}
	while(v.startsWith("/")) v = v.substr(1);
	if(v.startsWith("unplug")) v = "";
	if(v.startsWith("?")) v = "";
	if(v.startsWith("inception?ppp=")) v = "inception";
	return v;
}

function tourll(v)
{
	if(v === "") return "/unplug";
	let h = v.replace(/\/+$/, "");
	if(h === "inception") return "/inception?ppp=" + Math.floor(Math.random()*10000);
	if(h.startsWith("inception?")) return "/inception?ppp=" + Math.floor(Math.random()*10000);
	return "/" + v;
}

function backk()
{
	unhistory.push(current);
	current = historyy.pop();
	input.value = hostt + current;
	iframe.src = tourll(current);
	if(historyy.length === 0)
		back.className = "win-button win-off";
	front.className = "win-button";
}

function frontt()
{
	historyy.push(current);
	current = unhistory.pop();
	input.value = hostt + current;
	iframe.src = tourll(current);
	if(unhistory.length === 0)
		front.className = "win-button win-off";
	back.className = "win-button";
}

function updatego() {
	rainbow.style.width = Math.ceil(Math.max(Math.min(input.value.length, hostt.length - 1) - 8, 0)*6.6) + "px";
	rainbow.style.backgroundPositionX = (Math.random()*100) + "%";

	if(valid) {
		if(input.value.length < hostt.length)
		{
			valid = false;
			go.className = "win-button win-off";
		}
	} else {
		if(input.value.length >= hostt.length)
		{
			valid = true;
			go.className = "win-button";
		}
	}
}

input.addEventListener('keydown', function(event)
{
	if(event.which === 13) changeurl();
	else setTimeout(function() {
		if(input.value === prevvalue) return;
		if(input.value.length <= hostt.length) {
			input.value = hostt.substr(0, input.value.length);
			prevvalue = input.value;
		}
		else if(input.value.startsWith(hostt))
			prevvalue = input.value;
		else
			input.value = prevvalue;

		updatego();
	}, 1);
});