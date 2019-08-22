<?php
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
				background-image: url("/assets/frogs/aster.png");
			}

			.fish{
				margin: 11.5vw 0 0 13vw;
				width: 15vw;
				height: 3vw;
				background-image: url("/assets/frogs/fish.png");
			}

			.describe{
				margin: 14.5vw 0 0 4vw;
				width: 9vw;
				height: 3vw;
				background-image: url("/assets/frogs/describe.png");
			}

			.frogs{
				margin: 14.5vw 0 0 16.5vw;
				width: 24vw;
				height: 3vw;
				background-image: url("/assets/frogs/frogs.png");
			}

			.kidney{
				margin: 20vw 0 0 19.5vw;
				width: 19.5vw;
				height: 3vw;
				background-image: url("/assets/frogs/kidney.png");
			}

			.boney{
				margin: 28.5vw 0 0 4vw;
				width: 25vw;
				height: 3vw;
				background-image: url("/assets/frogs/boney.png");
			}

			.hide{
				visibility:hidden;
				width:100%;
			}

			.click{
				opacity: 0;
				background-size: contain;
				position: absolute;
				background-repeat: no-repeat;
				background-position: center center;
				background-color: black;
			}

			.click:hover{
				opacity: 1;
			}
		</style>
	</head>
	<body>
		<a class="click aster" title="*" href="/IBM"></a>
		<a class="click fish" title="fish" href="/weight"></a>
		<a class="click describe" title="describe" href="/sophistication"></a>
		<a class="click frogs" title="frogs" href="/head"></a>
		<a class="click kidney" title="kidney" href="/important"></a>
		<a class="click boney" title="boney fish" href="/worse-for-the-better/"></a>
		<div class="display"></div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>