<?php
$title = "Concrete";
$description = "Coming soon on a virtual environment.";
$color = "#822D1D";
$card = "summary_large_image";
$ogimage = "<?php echo $assets ?>/concrete/opengraph.png";
$css = false;
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			::selection {
				background: transparent;
			}

			::-moz-selection {
				background: transparent;
			}

			body::-webkit-scrollbar {
				width: 6px;
			}

			body::-webkit-scrollbar-track {
				background-color: #36130c;
			}

			body::-webkit-scrollbar-thumb {
				background-color: #ccc;
			}

			body{
				background-image: url("<?php echo $assets ?>/concrete/bg.png");
			    overflow-y: visible;
			    overflow-x: hidden;
			    margin: 0;
				background-attachment: fixed;
				background-color: #822D1D;
			}

			#logo{
				width: 432px;
				height: 432px;
				max-width: 90vw;
				max-height: 90vw;
				background-image: url("<?php echo $assets ?>/concrete/logo.png");
				margin: 34px auto;
				background-repeat: no-repeat;
			}

			.imge{
				width: 100vw;
				max-width: 125vh;
				margin: 25px auto;
    			display: block;
    			-webkit-box-shadow: 0 0 50px 0 black;
				-moz-box-shadow: 0 0 50px 0 black;
				box-shadow: 0 0 50px 0 black;
			}

			#text{
				margin: 250px auto;
				max-width: 90vw;
				display: block;
			}
		</style>
	</head>
	<body>
		<div id="logo"></div>
		<img src="<?php echo $assets ?>/concrete/1.png" class="imge"></img>
		<img src="<?php echo $assets ?>/concrete/2.png" class="imge"></img>
		<img src="<?php echo $assets ?>/concrete/3.png" class="imge"></img>
		<img src="<?php echo $assets ?>/concrete/5.png" class="imge"></img>
		<img src="<?php echo $assets ?>/concrete/4.png" class="imge"></img>
		<img src="<?php echo $assets ?>/concrete/text.png" id="text" alt="Coming soon to a virtual environment."></img>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>
