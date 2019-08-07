var proglerp = 0;
var prog;
var bar;
var container;

function bleh() {
	proglerp = proglerp * .9 + prog * .1;

	if(!container)
	{
		if(container = document.getElementById("gameContainer"))
		{
			var progress = document.createElement("div");
			progress.id = "progress";
			container.appendChild(progress);
			bar = document.createElement("div");
			bar.id = "full";
			progress.appendChild(bar);
		}
	}
	else bar.style.width = (100 * proglerp) + "%";
}

setInterval(bleh, 20);

function UnityProgress(unityInstance, progress) {
	if (!unityInstance.Module)
		return;
	prog = progress;
}