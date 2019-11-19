<?php
$title = "crisis";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			#mainimage {
				margin-top: calc(50vh - 81px);
				margin-left: calc(50vw - 81px);
				width: 162px;
				height: 162px;
				background-image: url("<?php echo $assets ?>/crisis/delete.png");
				display: block;
			}

			#txt {
				position: absolute;
				margin-left: -67px;
				margin-top: -7px;
			}
		</style>
	</head>
	<body>
		<div id="mainimage" title="bye lol"></div>
		<img id="txt" src="<?php echo $assets ?>/crisis/existential.gif"/>
		<script>
			var txt = document.getElementById("txt");
			var toggle = false;

			function bleh()
			{
				txt.src = toggle == false ? "<?php echo $assets ?>/crisis/existential.gif" : "<?php echo $assets ?>/crisis/crisis.gif";
				txt.style.top = (Math.random()*100) + "vh";
				txt.style.left = (Math.random()*100) + "vw";
				toggle = !toggle;
			}

			setInterval(bleh, 1000);
			bleh();
		</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>
