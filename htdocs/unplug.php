<?php
$color = "#000000";
$title = "unplug";
include $_SERVER['DOCUMENT_ROOT'].'/assets/header.php'; ?>
        <meta http-equiv="refresh" content="0; url=/">
        <script type="text/javascript">
            window.location.href = "/"
        </script>
        <style>
			body {
				text-align: center;
				text-anchor: middle;
				margin: calc(50vh - 14px) 0;
				position: absolute;
				width: 100vw;
			}
		</style>
    </head>
    <body>
        Page moved to <a href='/'>here</a>.
    </body>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>
