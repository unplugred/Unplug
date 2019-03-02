<!DOCTYPE html>
<html>
	<head>
		<?php $isPage = isset($_REQUEST["post"]); ?>
	
		<meta name="theme-color" content="#4B7071">
		<link rel="icon" type="image/png" href="/assets/shortcut-icon.png">
		<link rel="shortcut icon" href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/assets/shortcut-icon.png">
		<link rel="apple-touch-icon-precomposed" href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/apple-touch-icon.png">

		<meta charset="utf-8">

		<meta property="og:site_name" content="red"/>
		<meta name="twitter:site" content="red">
		<meta property="og:url" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>" />
		<meta name="twitter:url" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>">
		
		<title>red</title>
		<meta name="keywords" content="ari,hanan,arihanan,red,redflux,red#3510">
		<meta property="og:type" content="blog"/>
		<meta name="twitter:card" content="summary">
		<meta property="og:title" content="red"/>
		<meta name="twitter:title" content="red">
		<meta property="og:description" content="abstract thoughts of mine.">
		<meta name="twitter:description" content="abstract thoughts of mine.">
		<meta name="description" content="abstract thoughts of mine.">
		<meta property="og:image" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>/assets/anim.gif">
		<meta name="twitter:image" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>/assets/anim.gif">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel=StyleSheet href="/blog/blog.css" type="text/css" media=screen>
		<link rel=StyleSheet href="/blog/index.css" type="text/css" media=screen>
		
		<script src="http://code.jquery.com/jquery.min.js"></script>
	</head>
	<body>
		<div id="wrapper">
			<a id="rotato-cubo" href="/unplug"></a>
			<div id="title"></div>
			
			<script>
			var page = 0;
			var wrap;
			var bottomactive = false;
			
			function checkbottom(){
				if (window.innerHeight + $('body').scrollTop() >= $(document).height() - 50)
				{
					if(!bottomactive){
						bottomactive = true;
						$.get("loadpage.php?page=" + page + "&amount=10", function(data) {
							if(data !== ""){
								var newdiv = document.createElement("div");
								newdiv.className = "page";
								newdiv.innerHTML = data;
								wrap.appendChild(newdiv);
							}
						})
						page += 10;
					}
				}
				else{
					if(bottomactive){
						bottomactive = false;
					}
				}
			}
			
			$(document).ready(function()
			{
				wrap = document.getElementById('wrapper');
				checkbottom();
				$('body').scroll(function()
				{
					checkbottom();
				});
			});
			</script>
		</div>
	</body>
</html>
