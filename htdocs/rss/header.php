<?php if (!defined('PLX_ROOT')) exit; ?>
<?php define("assets", "https://assets.unplug.red"); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0">
		<title><?php $plxShow->pageTitle(); ?></title>

		<?php $plxShow->meta('description') ?>
		<?php $plxShow->meta('author') ?>

		<meta name="theme-color" content="#4B7071">
		<link rel="icon" type="image/png" href="<?php echo assets ?>/shortcut-icon.png">
		<link rel="shortcut icon" href="<?php echo assets ?>/shortcut-icon.png">
		<link rel="apple-touch-icon-precomposed" href="<?php echo assets ?>/apple-touch-icon.png">

		<meta name="dcterms.rightsHolder" content="Ari Hanan">

		<link rel="StyleSheet" id="quicksand" type="text/css" href="https://fonts.googleapis.com/css?family=Quicksand:500,700&display=swap">
		<link rel="stylesheet" href="<?php $plxShow->template(); ?>/css/plucss.css" media="screen"/>
		<link rel="stylesheet" href="<?php $plxShow->template(); ?>/css/theme.css?v=3" media="screen"/>
		<?php $plxShow->templateCss() ?>
		<?php $plxShow->pluginsCss() ?>
		<link rel="alternate" type="application/rss+xml" title="unplugred rss" href="https://rss.unplug.red/" />
	</head>
	<body id="top" class="page mode-<?php $plxShow->mode(true) ?>">