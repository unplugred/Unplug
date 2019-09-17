<?php
$title = "message";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			body {
				overflow-y: auto;
				margin-top: -3px;
			}

			.comment{
				font-style: italic;
				font-weight: bold;
				font-size: 30px;
				padding: 42px;
				border-top: 3px solid #aaa;
				width: 50vw;
				text-align: center;
				margin: auto;
				overflow-wrap: break-word;
			}

			#bleh {
				width: calc(50vw + 84px);
				margin: 30px auto;
				display: none;
				height: 80px;
			}

			#text {
				width: calc(50vw + 4px);
				background-color: black;
				color: #aaa;
				font-size: 20px;
				padding: 2px;
				border: 3px solid #aaa;
				border-right: 0;
				font-style: italic;
				font-weight: bold;
				font-family: Courier New, monospace;
				resize: none;
			}

			#submit{
				width: 80px;
				padding: 0;
				border: 0;
				background-color: #aaa;
				font-family: Courier New, monospace;
				font-weight: bold;
				font-size: 20px;
			}
		</style>
	</head>
	<body>
		<div style="display: none">
.
.
.
.
.
-------------------FOR ANY HACKERS OF SORTS-------------------
		please dont abuse the system!!
		my defences are weak...
		please dont make me freeze this comment section
		much love
.
.
.
.
.
		</div>
		<form method="post" id="bleh" action="/access/sendcommnet.php">
			<textarea id="text" name="comment" rows="3" cols="44" maxlength="80"></textarea>
			<input id="submit" type="submit" name="submit" value="send"/>
		</form>
		<?php include $_SERVER['DOCUMENT_ROOT'].'/access/comments.html'; ?>
		<script>
			if (!sessionStorage.getItem("PageVisited")) {
				document.getElementById("bleh").style.display = "flex";
			}
			else{
				if (!sessionStorage.getItem("PageRefreshed")) {
					sessionStorage.setItem("PageRefreshed", "True");
					window.location.reload();
				}
			}
		</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>