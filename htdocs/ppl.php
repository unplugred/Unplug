<?php
$color = "#0000FF";
$title = "ppl";
include $_SERVER['DOCUMENT_ROOT'].'/assets/header.php';
?>
		<style>
			#prsn {
				display: block;
				width: 300px;
				margin: calc(50vh - 150px) calc(50vw - 150px);
				background-size: cover;
				background-position: top right;
				position: absolute;
			}

			.bg {
				height: 100vh;
				background-attachment: fixed;
				position: absolute;
				background-image: url("/assets/ppl/layer.png");
				opacity: .4;
			    background-blend-mode: screen;
			}
		</style>
	</head>
	<body>
		<div id="bg1" class="bg"></div>
		<div id="bg2" class="bg"></div>
		<a id="prsn" href="/180422" title="prsn"></a>
		<script>
			var bg = [document.getElementById("bg1"), document.getElementById("bg2"), document.getElementById("prsn")];
			var tim = Math.random() * 3.14;
			var timetillblink = [0, 0, 0, Math.random() * 3, Math.random() * 3, Math.random() * 3, Math.random() * 200 + 500, Math.random() * 200 + 500, Math.random() * 200 + 500];
			var img = Math.floor(Math.random() * 500);

			setInterval(Update, 100);
			function Update() {
				tim += .002;
				bg[0].style.backgroundPosition = (Math.sin(tim + 7) * 1200) + "px " + (Math.cos(tim + 3) * 1100) + "px";
				bg[1].style.backgroundPosition = (Math.cos(tim + 11) * 800) + "px " + (Math.sin(tim + 5) * 900) + "px";
				if(timetillblink[0] >= timetillblink[3])
				{
					timetillblink[0] = 0;
					timetillblink[3] = Math.random() * 3;
					timetillblink[6] = Math.random() * 300 + 300;
				}
				if(timetillblink[1] >= timetillblink[4])
				{
					timetillblink[1] = 0;
					timetillblink[4] = Math.random() * 3;
					timetillblink[7] = Math.random() * 300 + 300;
				}
				if(timetillblink[2] >= timetillblink[5])
				{
					timetillblink[2] = 0;
					timetillblink[5] = Math.random() * 2 + .5;
					timetillblink[8] = Math.random() * 500 + 500;

					bg[2].style.backgroundImage = "url(\"/assets/ppl/" + img + ".gif\")";
					img = img >= 499 ? 0 : (img + 1);
				}
				timetillblink[0] += 0.1;
				timetillblink[1] += 0.1;
				timetillblink[2] += 0.1;
				var bleh = Math.max(Math.min(timetillblink[0] * timetillblink[6], 100), 0);
				bg[0].style.width = bleh + "vw";
				bleh = Math.max(Math.min(timetillblink[1] * timetillblink[7], 100), 0);
				bg[1].style.width = bleh + "vw";
				bleh = Math.max(Math.min(timetillblink[2] * timetillblink[8], 300), 0);
				bg[2].style.height = bleh + "px";
			}
		</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>