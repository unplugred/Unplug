<?php
include 'config.php';
include 'Database.php';
$db = new Database();
if(isset($_REQUEST["page"])) {
	$query = "SELECT * FROM posts WHERE PostID=".$_REQUEST["page"];
}
else {
	header("Location: ".$_SERVER['DOCUMENT_ROOT']."/404.php");
	die();
}
$posts = $db->select($query);
if($posts){
	$row = $posts->fetch_assoc();
}
else{
	header("Location: ".$_SERVER['DOCUMENT_ROOT']."/404.php");
	die();
}

$postnum = sprintf('%04d', $row['PostID']);
$fulltitle = $postnum.($row['PostName'] ? " - ".$row['PostName'] : "");
?>
<!DOCTYPE html>
<html>
	<head>
		<?php $isPage = isset($_REQUEST["post"]); ?>
	
		<meta name="theme-color" content="#4B7071">
		<link rel="icon" type="image/png" href="/assets/shortcut-icon.png">
		<link rel="shortcut icon" href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/assets/shortcut-icon.png">
		<link rel="apple-touch-icon-precomposed" href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/apple-touch-icon.png">

		<meta charset="utf-8">

		<meta property="og:site_name" content="red">
		<meta name="twitter:site" content="red">
		<meta property="og:url" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>">
		<meta name="twitter:url" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>">
		
		<title><?php echo $postnum ?></title>
		<meta name="keywords" content="ari,hanan,arihanan,red,redflux,red#3510,<?php echo $postnum ?>,<?php echo $row['PostName'] ?><?php if($row['PostAlt']) : ?>,<?php echo $row['PostAlt'] ?><?php endif; ?>">
		<meta property="og:title" content="<?php echo $fulltitle ?>"/>
		<meta name="twitter:title" content="<?php echo $fulltitle ?>">
		
		
		<?php switch($row['PostType']) : ?><?php case 'Image':
				if(pathinfo($row['PostBody'])['extension'] == "png") {
					$imgpath = "https://".$_SERVER['HTTP_HOST']."/art/".$row['PostBody']."&w=700";
				} else {
					$imgpath = "https://".$_SERVER['HTTP_HOST']."/art/".$row['PostBody'];
				}
				?>
				<meta property="og:image" content="<?php echo $imgpath ?>">
				<meta name="twitter:image" content="<?php echo $imgpath ?>">
				<meta property="og:type" content="article"/>
				<meta name="twitter:card" content="summary_large_image">
				<meta name="description" content="<?php echo $row['PostName'] ?>">
				<?php break;
				
			case 'Text': ?>
				<meta property="og:description" content="<?php echo $row['PostBody'] ?>">
				<meta name="twitter:description" content="<?php echo $row['PostBody'] ?>">
				<meta property="og:type" content="article"/>
				<meta name="twitter:card" content="summary">
				<meta name="description" content="<?php echo $row['PostBody'] ?>">
				<?php break;
				
			case 'Line': ?>
				<meta property="og:description" content="<?php echo $row['PostBody'] ?>">
				<meta name="twitter:description" content="<?php echo $row['PostBody'] ?>">
				<meta property="og:type" content="article"/>
				<meta name="twitter:card" content="summary">
				<meta name="description" content="<?php echo $row['PostBody'] ?>">
				<?php break;
				
			case 'Music':
				if(pathinfo($row['PostBody'])['extension'] == "png") {
					$imgpath = "https://".$_SERVER['HTTP_HOST']."/art/".$row['PostThumbnail']."&w=700";
				} else {
					$imgpath = "https://".$_SERVER['HTTP_HOST']."/art/".$row['PostThumbnail'];
				} ?>
				<meta name="twitter:player" content="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/<?php echo $row['PostBody'] ?>&color=%234b7071&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true">
				<meta name="og:video" content="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/<?php echo $row['PostBody'] ?>&color=%234b7071&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true">
				<meta property="og:type" content="music.song"/>
				<meta property="og:image" content="<?php echo $imgpath ?>"/>
				<meta name="twitter:card" content="player">
				<meta name="twitter:player:width" content="435">
				<meta name="twitter:player:height" content="400">
				<meta name="og:video:width" content="435">
				<meta name="og:video:height" content="400">
				<meta name="description" content="<?php echo $row['PostName'] ?>">
				<?php break;
				
			case 'Video':
				if(pathinfo($row['PostBody'])['extension'] == "png") {
					$imgpath = "https://".$_SERVER['HTTP_HOST']."/art/".$row['PostThumbnail']."&w=700";
				} else {
					$imgpath = "https://".$_SERVER['HTTP_HOST']."/art/".$row['PostThumbnail'];
				} ?>
				<meta name="twitter:player" content="<?php echo $row['PostBody'] ?>">
				<meta name="og:video" content="<?php echo $row['PostBody'] ?>">
				<meta property="og:type" content="video.other"/>
				<meta property="og:image" content="<?php echo $imgpath ?>"/>
				<meta name="twitter:card" content="player">
				<meta name="twitter:player:width" content="<?php echo $row['PostWidth'] ?>">
				<meta name="twitter:player:height" content="<?php echo $row['PostHeight'] ?>">
				<meta name="og:video:width" content="<?php echo $row['PostWidth'] ?>">
				<meta name="og:video:height" content="<?php echo $row['PostHeight'] ?>">
				<meta name="description" content="<?php echo $row['PostName'] ?>">
				<?php break;
				
			case 'ImageCombo':
				$imge = preg_split("/((\r?\n)|(\r\n?))/", $row['PostBody'])[0];
				if(pathinfo($imge)['extension'] == "png") {
					$imgpath = "https://".$_SERVER['HTTP_HOST']."/art/".$imge."&w=700";
				} else {
					$imgpath = "https://".$_SERVER['HTTP_HOST']."/art/".$imge;
				}
				?>
				<meta property="og:image" content="<?php echo $imgpath ?>">
				<meta name="twitter:image" content="<?php echo $imgpath ?>">
				<meta property="og:type" content="article"/>
				<meta name="twitter:card" content="summary_large_image">
				<meta name="description" content="<?php echo $row['PostName'] ?>">
				<?php break;
		endswitch; ?>

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel=StyleSheet href="/blog/blog.css" type="text/css" media=screen>
		
		<script src="http://code.jquery.com/jquery.min.js"></script>
		
		<style>
			body, html{
				overflow-x: hidden;
			}

			body{
				display: flex;
			}

			#wrapper{
				margin: auto auto;
				max-width: 100%;
			}
		
			@media only screen and (max-width: <?php echo $row['PostWidth'] ?>px) {
				body::-webkit-scrollbar {
					width: 6px;
				}

				body::-webkit-scrollbar-track {
					background-color: transparent;
				}

				body::-webkit-scrollbar-thumb {
					border: none;
					border-radius: 0;
				}
			}
		</style>
	</head>
	<body>
		<div id="wrapper" style="width: <?php echo ($row['PostWidth'] <= 50) ? "100vw" : $row['PostWidth']."px" ?>">
			
			
			<div class="post">
				<?php switch($row['PostType']) : ?><?php case 'Image': ?>
						<div class="post-wrap" style="padding-top: <?php echo ($row['PostHeight']/$row['PostWidth'])*100 ?>%">
							<img class="post-inner post-image" src="/art/<?php echo $row['PostBody'] ?>">
						</div>
						<?php break;
						
					case 'Text': ?>
						<p class="post-inner post-text"><?php echo $row['PostBody'] ?></p>
						<?php break;
						
					case 'Line': ?>
						<p class="post-inner post-line" style="padding : 40px <?php echo $row['PostWidth'] ?>%"><?php echo $row['PostBody'] ?></p>
						<?php break;
						
					case 'Music': ?>
						<div class="post-wrap" style="height: 166px">
							<iframe class="post-inner post-music" width="100%" height="166" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/<?php echo $row['PostBody'] ?>&color=%234b7071&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true"></iframe>
						</div>
						<?php break;
						
					case 'Video': ?>
						<div class="post-wrap" style="padding-top: <?php echo ($row['PostHeight']/$row['PostWidth'])*100 ?>%">
							<iframe class="post-inner post-video" src="<?php echo $row['PostBody'] ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
						</div>
						<?php break;
						
					case 'ImageCombo':
						foreach(preg_split("/((\r?\n)|(\r\n?))/", $row['PostBody']) as $img) : ?>
							<div class="post-wrap" style="padding-top: <?php echo ($row['PostHeight']/$row['PostWidth'])*100 ?>%">
								<img class="post-inner post-combo" src="/art/<?php echo $img ?>">
							</div>
						<?php endforeach;
						break;
				endswitch; ?>
				
				<p class="number">
					<?php echo $fulltitle.$row['PostSuffix'] ?>
				</p>
				<p class="date"><?php echo date('m/d/Y', strtotime($row['PostDate'])); ?></p>
			</div>
		</div>
	</body>
</html>
