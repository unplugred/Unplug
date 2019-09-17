<?php
$title = "stock market man";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			html{
				display: table;
				position: absolute;
			}

			body{
				display: table-cell;
				vertical-align: middle;
			}

			a{
				display: contents;
			}

			.movie{
				margin: auto auto;
				display: none;
				max-width:100vw;
				max-height:100vh;
			}
		</style>
	</head>
	<body>
		<script>
			var slideIndex = 1;
			showDivs(slideIndex);

			function plusDivs() {
				showDivs(slideIndex++);
			}

			function showDivs(n) {
				var i;
				var x = document.getElementsByClassName("movie");
				for (i = 0; i < 12; i++) {
					x[i].style.display = "none";
				}
				x[slideIndex-1].style.display = "block";
			}
		</script>
		<a href="javascript:void(0)">
			<img class="movie" src="<?php echo $assets ?>/stock-market-man/01.png" onclick="plusDivs()" style="display: block"/>
			<img class="movie" src="<?php echo $assets ?>/stock-market-man/02.png" onclick="plusDivs()"/>
			<img class="movie" src="<?php echo $assets ?>/stock-market-man/03.png" onclick="plusDivs()"/>
			<img class="movie" src="<?php echo $assets ?>/stock-market-man/04.png" onclick="plusDivs()"/>
			<img class="movie" src="<?php echo $assets ?>/stock-market-man/05.png" onclick="plusDivs()"/>
			<img class="movie" src="<?php echo $assets ?>/stock-market-man/06.png" onclick="plusDivs()"/>
			<img class="movie" src="<?php echo $assets ?>/stock-market-man/07.png" onclick="plusDivs()"/>
			<img class="movie" src="<?php echo $assets ?>/stock-market-man/08.png" onclick="plusDivs()"/>
			<img class="movie" src="<?php echo $assets ?>/stock-market-man/09.png" onclick="plusDivs()"/>
			<img class="movie" src="<?php echo $assets ?>/stock-market-man/10.png" onclick="plusDivs()"/>
			<img class="movie" src="<?php echo $assets ?>/stock-market-man/11.png" onclick="plusDivs()"/>
			<img class="movie" src="<?php echo $assets ?>/stock-market-man/12.png" onclick="plusDivs()"/>
		</a>
			<img class="movie" src="<?php echo $assets ?>/stock-market-man/13.png"/>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>