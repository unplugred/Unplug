<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php echo $title ?></title>

		<meta name="theme-color" content="<?php echo (isset($color) ? $color : "#000000") ?>">
		<link rel="icon" type="image/<?php echo (isset($icontype) ?
		$icontype : "png") ?>" href="<?php echo (isset($icon) ?
		$icon : $icon = "/assets/shortcut-icon.png") ?>">
		<link rel="shortcut icon" href="https://<?php echo $_SERVER['HTTP_HOST'].$icon ?>">
		<link rel="apple-touch-icon-precomposed" href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/apple-touch-icon.png">

		<meta name="keywords" content="red,unplugred,unplug,<?php echo (isset($tags) ? $tags.",".$title : $title) ?>">
		<meta name="dcterms.rightsHolder" content="Ari Hanan">

		<meta property="og:site_name" content="red">
		<meta name="twitter:site" content="red">
		<meta property="og:url" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>">
		<meta name="twitter:url" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>">
		<meta property="og:type" content="article">
		<meta name="twitter:card" content="<?php echo (isset($card) ? $card : "summary") ?>">
		<meta property="og:title" content="<?php echo $title ?>">
		<meta name="twitter:title" content="<?php echo $title ?>">
		<meta property="og:description" content="<?php echo (isset($description) ? $description : ($description = "unplug your mind for best experience.")) ?>">
		<meta name="twitter:description" content="<?php echo $description ?>">
		<meta name="description" content="<?php echo $description ?>">
		<meta property="og:image" content="https://<?php echo $ogimage = $_SERVER['HTTP_HOST'].(isset($ogimage) ? $ogimage : "/assets/objects/object".rand(1, 2).".gif") ?>">
		<meta name="twitter:image" content="https://<?php echo $ogimage ?>">

<?php if(!isset($css)) echo "		<link rel=StyleSheet href=\"/assets/unplug.css?v=2\" type=\"text/css\" media=screen>\n\n"?>