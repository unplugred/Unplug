<?php
$color = "#FF00FF";
$title = "tsop1736";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			.mainimage {
				margin-left: calc(50vw - 123px);
				margin-top: calc(50vh - 96px);
				display: block;
				width: 246px;
				height: 196px;
				background-image: url("<?php echo $assets ?>/tsop1736/0.png");
			}

			#hoverthing{
				position: absolute;
				width: 246px;
				height: 196px;
			}

			a {
				display: inline-block;
				transform: rotate(45deg);
				width: 8px;
				height: 121px;
				position: relative;
			}

			#gnd{
				top: 66px;
				left: 76px;
			}

			#vs{
				top: 71px;
				left: 70px;
			}

			#out{
				top: 80px;
				left: 80px;
			}

			a div{
				display: none;
				position: absolute;
				top: 0;
				left: 0;
			}

			a:hover div{
				display: block;
			}
		</style>
		<link rel="prefetch" href="<?php echo $assets ?>/tsop1736/1.png" />
		<link rel="prefetch" href="<?php echo $assets ?>/tsop1736/2.png" />
		<link rel="prefetch" href="<?php echo $assets ?>/tsop1736/3.png" />
	</head>
	<body>
		<div class="mainimage">
			<div id="hoverthing"></div>
			<a href="/blob" title="blob" id="gnd" onmouseover="change(1)" onmouseout="change(0)"></a>
			<a href="/spot" title="spot" id="vs" onmouseover="change(2)" onmouseout="change(0)"></a>
			<a href="/smudge" title="smudge" id="out" onmouseover="change(3)" onmouseout="change(0)"></a>
		</div>
		<script>
			function change(num)
			{
				document.getElementById("hoverthing").style.backgroundImage = "url(\"<?php echo $assets ?>/tsop1736/" + num + ".png\")";
			}
		</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>
