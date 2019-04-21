<?php
$color = "#ffffff";
$title = "sick";
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
				if (n >= 10) {
					slideIndex = 1
				}
				for (i = 0; i < 10; i++) {
					x[i].style.display = "none";
				}
				x[slideIndex-1].style.display = "block";
			}
		</script> 
		<a href="javascript:void(0)">
			<img class="movie" src="/assets/sick/0.png" onclick="plusDivs()" style="display: block"/>
			<img class="movie" src="/assets/sick/1.png" onclick="plusDivs()"/>
			<img class="movie" src="/assets/sick/2.png" onclick="plusDivs()"/>
			<img class="movie" src="/assets/sick/3.png" onclick="plusDivs()"/>
			<img class="movie" src="/assets/sick/4.png" onclick="plusDivs()"/>
			<img class="movie" src="/assets/sick/5.png" onclick="plusDivs()"/>
			<img class="movie" src="/assets/sick/6.png" onclick="plusDivs()"/>
			<img class="movie" src="/assets/sick/7.png" onclick="plusDivs()"/>
			<img class="movie" src="/assets/sick/8.png" onclick="plusDivs()"/>
		</a>
		<img class="movie" src="/assets/sick/beans.png"/>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>
