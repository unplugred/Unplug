<?php
$title = "trash";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			#fade {
				position: absolute;
				width: 100vw;
				height: 100vh;
				background-color: black;
				animation-name: fade;
				animation-duration: 0.7s;
				animation-timing-function: cubic-bezier(1,0,1,0);
			}

			@keyframes fade {
				0% { background-color: transparent; }
				25% { background-color: #0000003f; }
				50% { background-color: #0000007f; }
				75% { background-color: #000000bd; }
				100% { background-color: black; }
			}

			.cursorthing {
				cursor: none !important;
			}

			.cursorthing a {
				cursor: none !important;
			}

			.cursorthing a * {
				cursor: none !important;
			}

			.icon {
				width: 34px;
				height: 34px;
				display: block;
				position: absolute;
			}

			#iconleft {
				top: calc(50vh - 17px);
				left: calc(50vw - 117px);
			}

			#iconright {
				top: calc(50vh - 17px);
				left: calc(50vw + 83px);
			}

			.file {
				background-image: url(<?php echo $assets ?>/trash/file.png);
			}

			.file.empty {
				display: none;
			}

			.folder {
				background-image: url(<?php echo $assets ?>/trash/folderfull.png);
			}

			.folder.empty {
				background-image: url(<?php echo $assets ?>/trash/folderempty.png);
			}

			.trash {
				background-image: url(<?php echo $assets ?>/trash/trashfull.png);
			}

			.trash.empty {
				background-image: url(<?php echo $assets ?>/trash/trashempty.png);
			}

			.off {
				background-image: url(<?php echo $assets ?>/trash/off.png);
			}

			#paper {
				pointer-events: none;
				position: absolute;
				background-image: url(<?php echo $assets ?>/trash/paper.gif);
				width: 23px;
				height: 24px;
			}
		</style>
	</head>
	<body>
		<a href="javascript:void(0)" onclick="clickleft()" class="icon file" id="iconleft"></a>
		<a href="/greece" onclick="clickright()" class="icon folder empty" id="iconright"></a>
		<div id="paper" style="display: none"></div>
		<div id="fade" style="display: none"></div>
		<script>
			var left = document.getElementById("iconleft");
			var right = document.getElementById("iconright");
			var paper = document.getElementById("paper");
			var stage = 0;
			var isleft = true;
			var istaken = false;

			function clickleft()
			{
				if(stage == 2)
				{
					document.getElementById("fade").style.display = "block";
					setTimeout(function(){
						window.location = "/safe";
					}, 1000);
				}
				if(!isleft) return;
				if(istaken)
				{
					istaken = false;
					left.classList.remove("empty");
					document.body.classList.remove("cursorthing");
					paper.style.display = "none";
					replace(right, "icon trash empty", "/blob");
				}
				else
				{
					istaken = true;
					left.classList.add("empty");
					document.body.classList.add("cursorthing");
					paper.style.display = "block";
					isleft = false;
					right.href = "javascript:void(0)";
				}
			}

			function clickright()
			{
				if(stage == 2) return;
				if(isleft) return;
				if(istaken)
				{
					istaken = false;
					right.classList.remove("empty");
					document.body.classList.remove("cursorthing");
					paper.style.display = "none";
					if(stage == 0) replace(left, "icon folder empty", "/santa");
					else
					{
						replace(right, "icon trash", "/h");
						replace(left, "icon off", "javascript:void(0)");
					}
					stage++;
				}
				else
				{
					istaken = true;
					right.classList.add("empty");
					document.body.classList.add("cursorthing");
					paper.style.display = "block";
					isleft = true;
					left.href = "javascript:void(0)";
				}
			}

			function replace(div, classs, href)
			{
				setTimeout(function(){
					div.className = classs;
					div.href = href;
				}, 250);
			}

			document.onmousemove = function(e){
				paper.style.top = (e.pageY - 12) + "px";
				paper.style.left = (e.pageX - 12) + "px";
			}
		</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>