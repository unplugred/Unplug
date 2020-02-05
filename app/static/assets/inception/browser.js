var iframe = document.getElementById("iframe");
var input = document.getElementById("input");
var back = document.getElementById("back");
var front = document.getElementById("front");
var go = document.getElementById("go");
var rainbow = document.getElementById("rainbow");
var titletext = document.getElementById("titletext");
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
		back.className = null;
		front.className = "off";
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
		back.className = null;
		front.className = "off";
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
	if(v.startsWith("inception?")) v = "inception";
	return v;
}

function tourll(v)
{
	if(v === "") return "/unplug";
	if(v.startsWith("inception")) return "/inception?" + Math.floor(Math.random()*10000);
	return "/" + v;
}

function backk()
{
	unhistory.push(current);
	current = historyy.pop();
	input.value = hostt + current;
	iframe.src = tourll(current);
	if(historyy.length === 0)
		back.className = "off";
	front.className = null;
}

function frontt()
{
	historyy.push(current);
	current = unhistory.pop();
	input.value = hostt + current;
	iframe.src = tourll(current);
	if(unhistory.length === 0)
		front.className = "off";
	back.className = null;
}

function updatego() {
	rainbow.style.width = Math.ceil(Math.max(Math.min(input.value.length, hostt.length - 1) - 8, 0)*6.6) + "px";
	rainbow.style.backgroundPositionX = (Math.random()*100) + "%";

	if(valid) {
		if(input.value.length < hostt.length)
		{
			valid = false;
			go.className = "off";
		}
	} else {
		if(input.value.length >= hostt.length)
		{
			valid = true;
			go.className = null;
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