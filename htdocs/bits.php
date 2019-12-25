<?php
$title = "bits";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			body {
				background-image: url("<?php echo assets ?>/bits/bg.png");
			}

			.window {
				background-repeat: no-repeat;
				background-position: center;
				position: fixed;
				width: 126px;
				height: 145px;
				background-image: url("<?php echo assets ?>/unplug/object.png");
				margin: -72px -63px;
			}

			.close {
				margin: 5px 5px 0 calc(100% - 21px);
				width: 16px;
				height: 14px;
				position: absolute;
				background-image: url("<?php echo assets ?>/unplug/close.png");
			}

			.close:active {
				background-image: url("<?php echo assets ?>/unplug/closed.png");
			}

			.bg {
				width: 120px;
				height: 120px;
				position: relative;
				top: 0;
				left: 0;
				top: 22px;
				left: 3px;
			}

			.object {
				width: 100px;
				height: 100px;
				position: relative;
				bottom: 88px;
				left: 13px;
			}

			.window:first-child {
				display: none;
			}
		</style>
	</head>
	<body id="body">
		<div class="window" style="">
			<a class="close" href="javascript:void(0)"></a>
			<div class="bg" style=""></div>
			<div class="object" style=""></div>
		</div>

		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<script type="text/javascript">
			var z = 0;
			var anim = 0;

			var wins = 1;
			var windowsss = $(".window:first");
			var cloneshit = setInterval(function()
			{
				if(wins++ >= 20) clearInterval(cloneshit);
				var clone = windowsss.clone();
				clone.appendTo("body");
				dothing(clone);
				clone.draggable();
				clone.on("mousedown", totop);
				clone.find(".close").on("click", closee);
			}, 50);

			function totop()
			{
				$(this).css("z-index", ++z);
			}

			function closee()
			{
				var obj = $(this).parent();
				dothing(obj);
				obj.css("-webkit-mask-image","url(\"<?php echo assets ?>/bits/transition.gif?" + anim++ + "\")");
			}

			function dothing(obj)
			{
				obj[0].style.top = Math.random()*100 + "%";
				obj[0].style.left = Math.random()*100 + "%";

				var bg = obj.find(".bg")[0];
				var ob = obj.find(".object")[0];

				var bgn = Math.floor(Math.random()*10);
				var obn = Math.floor(Math.random()*10);
				var color = Math.floor(Math.random()*3);

				if(bgn == 0)
				{
					bg.style.backgroundColor = "hsl(" + Math.floor(Math.random()*360) + "," + Math.floor(Math.random()*50 + 10) + "%," + Math.floor(Math.random()*20 + 10) + "%)";
					bg.style.backgroundImage = "none";
					bg.style.filter = "none";
				}
				else
				{
					bg.style.backgroundImage = "url(\"<?php echo assets ?>/objects/b" + bgn + ".png\")";
					bg.style.filter = "saturate(" + ((Math.random()*50 + 50)*Math.min(color,1)) + "%) hue-rotate(" + Math.random() + "turn)";
				}
				ob.style.backgroundImage = "url(\"<?php echo assets ?>/objects/a" + obn + ".gif\")";
				ob.style.filter = "saturate(" + ((Math.random()*50 + 50)*Math.min(2 - color,1)) + "%) hue-rotate(" + Math.random() + "turn)";
			}
		</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>