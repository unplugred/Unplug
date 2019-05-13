<?php
$color = "#000000";
$title = "6 sides";
include $_SERVER['DOCUMENT_ROOT'].'/assets/header.php'; ?>
		<style>
			body{
				background-image: url("/assets/6-sides/noise.png");
			}

			.mainimage {
				margin-top: 50px;
				margin-left: 50px;
				background-color: black;
				width: 446px;
				padding: 5px;
				padding-bottom: 0;
			}

			.art{
				background-image: url("/assets/6-sides/art.png");
				display: inline-block;
				width: 34px;
				height: 35px;
				margin: 0;
				padding: 0;
				border: 0;
			}

			.eternal{
				background-image: url("/assets/6-sides/eternal.png");
				display: inline-block;
				width: 78px;
				height: 35px;
			}

			.death{
				background-image: url("/assets/6-sides/death.png");
				display: inline-block;
				width: 65px;
				height: 35px;
			}

			.meaningless{
				background-image: url("/assets/6-sides/meaningless.png");
				display: inline-block;
				width: 141px;
				height: 35px;
			}

			.is{
				display: inline-block;
				margin: 0;
				padding: 0;
				border: 0;
			}

			.six{
				background-image: url("/assets/6-sides/6.png");
				display: inline-block;
				width: 19px;
				height: 35px;
			}
		</style>
	</head>
	<body>
		<script>
			function switchery(hid	 ){
				var hobj = document.getElementById(hid);
				if(hobj.classList.contains('art')){
					hobj.className = "death";
				}
				else{
					if(hobj.classList.contains('death')){
						hobj.className = "eternal";
					}
					else{
						if(hobj.classList.contains('eternal')){
							hobj.className = "meaningless";
						}
						else{
							hobj.className = "art";
						}
					}
				}
			}
		</script>
		<div class="mainimage" title="a cube has 6 sides.">
			<a class="art" id="first" onclick="switchery('first')" href="javascript:void(0)"></a><img class="is" src="/assets/6-sides/is.png"/><a class="eternal" id="second" onclick="switchery('second')" href="javascript:void(0)"></a><img class="is" src="/assets/6-sides/comma.png"/><a class="death" id="third" onclick="switchery('third')" href="javascript:void(0)"></a><img class="is" src="/assets/6-sides/is.png"/><a class="meaningless" id="fourth" onclick="switchery('fourth')" href="javascript:void(0)"></a><img class="is" src="/assets/6-sides/dot.png"/><br/><img class="is" src="/assets/6-sides/a-cube-has.png"/><a class="six" href="/idk"></a><img class="is" src="/assets/6-sides/sides.png"/>
		</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>
