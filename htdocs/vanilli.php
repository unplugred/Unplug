<?php
$title = "vanilli";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			body {
				background-image: url(<?php echo assets ?>/vanilli/1.png), url(<?php echo assets ?>/vanilli/2.png), url(<?php echo assets ?>/vanilli/girlyouknowits.png);
				background-position: bottom right;
				background-repeat: no-repeat, repeat, repeat;
			}

			#disc {
				background-image: url(<?php echo assets ?>/objects/a9.gif);
				position: absolute;
				width: 100px;
				height: 100px;
				bottom: 60px;
				right: 60px;
			}
		</style>
	</head>
	<body>
		<a id="disc" title="8ball" href="/8ball"></a>
	</body>
</html>
