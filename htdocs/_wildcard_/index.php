<?php $assets = "https://assets.unplug.red" ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Welcome</title>

		<meta name="theme-color" content="#FF0000">
		<link rel="icon" type="image/png" href="<?php echo $assets ?>/shortcut-icon.png">
		<link rel="shortcut icon" href="<?php echo $assets ?>/shortcut-icon.png">
		<link rel="apple-touch-icon-precomposed" href="<?php echo $assets ?>/apple-touch-icon.png">

		<meta name="dcterms.rightsHolder" content="Ari Hanan">
		<meta property="og:site_name" content="red">
		<meta name="twitter:site" content="red">
		<meta property="og:url" content="https://unplug.red/">
		<meta name="twitter:url" content="https://unplug.red/">
		<meta property="og:type" content="article">
		<meta name="twitter:card" content="summary">
		<meta property="og:title" content="Welcome">
		<meta name="twitter:title" content="Welcome">
		<meta property="og:description" content="unplug your mind for best experience.">
		<meta name="twitter:description" content="unplug your mind for best experience.">
		<meta name="description" content="unplug your mind for best experience.">
		<meta property="og:image" content="<?php echo $ogimage = $assets."/objects/c".rand(0, 6).".gif" ?>">
		<meta name="twitter:image" content="<?php echo $ogimage ?>">

		<style>
			body{
				animation: anim 50s linear infinite;
				width: 100vw;
				height: 100vh;
				overflow-y: hidden;
				overflow-x: hidden;
			}

			@keyframes anim{
				0%  { background-color: #FF0000; }
				17% { background-color: #FFFF00; }
				33% { background-color: #00FF00; }
				50% { background-color: #00FFFF; }
				67% { background-color: #0000FF; }
				83% { background-color: #FF00FF; }
				100%{ background-color: #FF0000; }
			}
		</style></head><body></body></html>