<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php echo $title ?></title>

<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/tracking.php'; ?>

		<meta name="theme-color" content="<?php echo (isset($color) ? $color : "#000000") ?>">
		<link rel="icon" type="image/png" href="<?php echo (isset($icon) ? $icon : "/assets/shortcut-icon.png") ?>">
		<link rel="shortcut icon" href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/assets/shortcut-icon.png">
		<link rel="apple-touch-icon-precomposed" href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/apple-touch-icon.png">

		<meta name="keywords" content="red,unplugred,unplug,<?php echo (isset($tags) ? $tags.",".$title : $title) ?>">
		<meta name="dcterms.rightsHolder" content="Ari Hanan">

		<meta property="og:site_name" content="red">
		<meta name="twitter:site" content="red">
		<meta property="og:url" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>">
		<meta name="twitter:url" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>">
		<meta property="og:type" content="article">
		<meta name="twitter:card" content="summary">
		<meta property="og:title" content="<?php echo $title ?>">
		<meta name="twitter:title" content="<?php echo $title ?>">
		<meta property="og:description" content="unplug your mind for best experience.">
		<meta name="twitter:description" content="unplug your mind for best experience.">
		<meta name="description" content="unplug your mind for best expirience.">
		<meta property="og:image" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>/assets/h.gif">
		<meta name="twitter:image" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>/assets/h.gif">

		<link rel=StyleSheet href="/assets/unplug.css?v=2" type="text/css" media=screen>
