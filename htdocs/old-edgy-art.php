<?php
$color = "#000000";
$title = "old edgy art";
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
				if (n >= 4) {
					slideIndex = 1
				}
				for (i = 0; i < 4; i++) {
					x[i].style.display = "none";
				}
				x[slideIndex-1].style.display = "block";
			}
		</script> 
		<a href="javascript:void(0)">
			<img class="movie" src="/assets/old-edgy-art/1.png" onclick="plusDivs()" style="display: block"/>
			<img class="movie" src="/assets/old-edgy-art/2.png" onclick="plusDivs()"/>
			<img class="movie" src="/assets/old-edgy-art/3.png" onclick="plusDivs()"/>
			<img class="movie" src="/assets/old-edgy-art/4.png" onclick="plusDivs()"/>
		</a>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>
