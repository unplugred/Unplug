<?php
$title = "photography";
include $_SERVER['DOCUMENT_ROOT'].'/assets/header.php'; ?>
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
				max-width: 100vw;
				max-height: 100vh;
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
				if (n >= 8) {
					slideIndex = 1;
				}
				for (i = 0; i < 8; i++) {
					x[i].style.display = "none";
				}
				x[slideIndex-1].style.display = "block";
			}
		</script>
		<a href="javascript:void(0)">
			<img class="movie" src="/assets/photography/1.jpg" onclick="plusDivs()" style="display: block"/>
			<img class="movie" src="/assets/photography/2.jpg" onclick="plusDivs()"/>
			<img class="movie" src="/assets/photography/3.jpg" onclick="plusDivs()"/>
			<img class="movie" src="/assets/photography/4.jpg" onclick="plusDivs()"/>
			<img class="movie" src="/assets/photography/5.jpg" onclick="plusDivs()"/>
			<img class="movie" src="/assets/photography/6.jpg" onclick="plusDivs()"/>
			<img class="movie" src="/assets/photography/7.jpg" onclick="plusDivs()"/>
			<img class="movie" src="/assets/photography/8.jpg" onclick="plusDivs()"/>
		</a>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>