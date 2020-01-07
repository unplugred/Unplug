<?php
$title = "tinder";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			#main {
				margin: auto auto;
				display: inline-block;
				position: relative;
			}

			body {
				display: flex;
			}

			img {
				max-height: 100vh;
				max-width: 100vw;
			}

			.pctr {
				height: 17.7%;
				width: 25.5%;
				position: absolute;
			    background-size: contain;
			    background-position: center center;
			    background-repeat: no-repeat;
			    transition: opacity .2s;
			}

			.pctr:hover {
				opacity: .5;
			}

			.row1{top: 24%;}
			.row2{top:43.2%;}
			.row3{top:62.4%;}
			.col1{left:8.5%;}
			.col2{left:37%;}
			.col3{left:66%;}
			#n1{background-image:url("<?php echo assets ?>/tinder/1.png");}
			#n2{background-image:url("<?php echo assets ?>/tinder/2.png");}
			#n3{background-image:url("<?php echo assets ?>/tinder/3.png");}
			#n4{background-image:url("<?php echo assets ?>/tinder/4.png");}
			#n5{background-image:url("<?php echo assets ?>/tinder/5.png");}
			#n6{background-image:url("<?php echo assets ?>/tinder/6.png");}
			#n7{background-image:url("<?php echo assets ?>/tinder/7.png");}
			#n8{background-image:url("<?php echo assets ?>/tinder/8.png");}
			#n9{background-image:url("<?php echo assets ?>/tinder/9.png");}
		</style>
	</header>
	<body>
		<div id="main">
			<img src="<?php echo assets ?>/tinder/tndr.png"/>
			<a href="/daddy" class="pctr row1 col1" id="n1"></a>
			<a href="/tsop1736" class="pctr row1 col2" id="n2"></a>
			<a href="/computers" class="pctr row1 col3" id="n3"></a>
			<a href="/trash" class="pctr row2 col1" id="n4"></a>
			<a href="/lion" class="pctr row2 col2" id="n5"></a>
			<a href="/fuck" class="pctr row2 col3" id="n6"></a>
			<a href="/square" class="pctr row3 col1" id="n7"></a>
			<a href="/glow" class="pctr row3 col2" id="n8"></a>
			<a href="/snow" class="pctr row3 col3" id="n9"></a>
		</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>