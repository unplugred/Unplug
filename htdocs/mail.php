<?php
$title = "mail";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			body{
				background-size: initial;
				background-repeat: repeat;
				background-image: url("<?php echo assets ?>/mail.png?v=2");
				animation: bgmove 100s linear infinite;
			}

			#mc_embed_signup {
				margin-top: calc(50vh - 90px);
				margin-left: calc(50vw + 108px);
				animation: anim 15s ease-in-out infinite;
			}

			#mc-embedded-subscribe {
				background-color: #A8A8A8;
				border: 0;
				font-weight: bold;
				height: 48px;
				width: 196px;
				color: #333;
			}

			input {
				font-family: Courier New, monospace;
				font-size: 32px;
				padding: 0;
				text-align: center;
				position: relative;
			}

			#mce-EMAIL {
				background-color: #0000004d;
				border: 2px solid #A8A8A8;
				border-right: 0;
				color: #c1c1c1;
				height: 44px;
				width: 410px;
			}

			.mc-field-group {
				position: relative;
				top: 48px;
				left: -412px;
			}

			#coollabel {
				font-size: 20px;
				font-weight: bold;
				width: 360px;
				margin-bottom: 5px;
				display: block;
				line-height: 15px;
			}

			@keyframes anim{
				0%  { margin-top: calc(45vh - 90px); }
				50% { margin-top: calc(55vh - 90px); }
				100%{ margin-top: calc(45vh - 90px); }
			}

			@keyframes bgmove{
				0%  { background-position: 0px 0px; }
				100%{ background-position: 1024px 0px; }
			}
		</style>
	</head>
	<body>
		<div class="window" id="mc_embed_signup">
			<form action="https://pm.us20.list-manage.com/subscribe/post?u=526092f6456b91b0afdff2b1c&amp;id=2ea9fdbe2b" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
				<div id="mc_embed_signup_scroll">
					<div class="mc-field-group">
						<label for="mce-EMAIL" id="coollabel">i command you to subscribe to my mailing list (pleasE)</label>
						<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="email adress">
					</div>
					<div id="mce-responses" class="clear">
						<div class="response" id="mce-error-response" style="display:none"></div>
						<div class="response" id="mce-success-response" style="display:none"></div>
					</div>
					<div style="position: absolute; left: -5000px;" aria-hidden="true">
						<input type="text" name="b_526092f6456b91b0afdff2b1c_2ea9fdbe2b" tabindex="-1" value="">
					</div>
					<div class="clear">
						<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
					</div>
				</div>
			</form>
		</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>
