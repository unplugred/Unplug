<?php
$color = "#E48243";
$title = "safe";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			#fade{
				position: absolute;
				width: 100vw;
				height: 0;
				top: 0;
				background-color: transparent;
				animation-name: fade;
				animation-duration: 0.7s;
				animation-timing-function: cubic-bezier(1,0,1,0);
			}

			@keyframes fade {
				0% { background-color: black; height: 100vh; }
				25% { background-color: #000000bd; }
				50% { background-color: #0000007f; }
				75% { background-color: #0000003f; }
				100% { background-color: transparent; }
			}

			#mainimage {
				margin-top: calc(50vh - 60px);
				margin-left: calc(50vw - 262px);
				display: block;
				width: 524px;
				height: 120px;
				background-image: url("<?php echo $assets ?>/safe.png");
			}
		</style>
	</head>
	<body>
		<div id="mainimage" style="display: none;"></div>
		<div id="fade" style="display: none;"></div>
		<script>
			window.onload = function(){
				document.getElementById("fade").style.display = null;
				document.getElementById("mainimage").style.display = null;
				redraw();
			};
		</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>