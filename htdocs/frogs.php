<?php
$color = "#000000";
$title = "frogs";
include $_SERVER['DOCUMENT_ROOT'].'/assets/header.php'; ?>
		<style>
			.display {
				background-size: contain;
				background-image: url("/assets/frogs/base.png");
				background-repeat: no-repeat;
				width: 100vw;
				height: 100vw;
			}

			.aster{
				margin: 3.5vw 0 0 2.5vw;
				width: 2vw;
				height: 2vw;
				position: absolute;
				background-image: url("/assets/frogs/aster.png");
				background-size: contain;
				opacity: 0;
			}

			.aster:hover{
				opacity: 1;
			}

			.fish{
				margin: 11.5vw 0 0 13vw;
				width: 15vw;
				height: 3vw;
				position: absolute;
				background-image: url("/assets/frogs/fish.png");
				background-size: contain;
				opacity: 0;
			}

			.fish:hover{
				opacity: 1;
			}

			.describe{
				margin: 14.5vw 0 0 4vw;
				width: 9vw;
				height: 3vw;
				position: absolute;
				background-image: url("/assets/frogs/describe.png");
				background-size: contain;
				opacity: 0;
			}

			.describe:hover{
				opacity: 1;
			}

			.frogs{
				margin: 14.5vw 0 0 16.5vw;
				width: 24vw;
				height: 3vw;
				position: absolute;
				background-image: url("/assets/frogs/frogs.png");
				background-size: contain;
				opacity: 0;
			}

			.frogs:hover{
				opacity: 1;
			}

			.kidney{
				margin: 20vw 0 0 19.5vw;
				width: 19.5vw;
				height: 3vw;
				position: absolute;
				background-image: url("/assets/frogs/kidney.png");
				background-size: contain;
				opacity: 0;
			}

			.kidney:hover{
				opacity: 1;
			}

			.boney{
				margin: 28.5vw 0 0 4vw;
				width: 25vw;
				height: 3vw;
				position: absolute;
				background-image: url("/assets/frogs/boney.png");
				background-size: contain;
				opacity: 0;
			}

			.boney:hover{
				opacity: 1;
			}

			.hide{
				visibility:hidden;
				width:100%;
			}
		</style>
	</head>
	<body>
		<a class="aster" href="/IBM"></a>
		<a class="fish" href="/weight"></a>
		<a class="describe" href="/sophistication"></a>
		<a class="frogs" href="/head"></a>
		<a class="kidney" href="/important"></a>
		<a class="boney" href="/worse-for-the-better/"></a>
		<div class="display"></div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>