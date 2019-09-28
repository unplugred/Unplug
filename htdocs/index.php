<?php
$title = "red";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			.window{
				background-size: contain;
				background-repeat: no-repeat;
				background-position: center;
				position: fixed;
			}

			#mc_embed_signup {
				width: 332px;
				height: 72px;
				background-image: url("<?php echo $assets ?>/unplug/mail.png");
				margin-top: calc(61vh + 100px);
				margin-left: calc(44vw + -175px);
			}

			#mc-embedded-subscribe {
				font-family: Courier New, monospace;
				background-color: #A8A8A8;
				border: 0;
				font-weight: bold;
				font-size: 16px;
				position: relative;
				top: 0px;
				left: 220px;
				height: 26px;
				width: 98px;
				color: #333;
			}

			#mce-EMAIL {
				font-family: Courier New, monospace;
				background-color: transparent;
				border: 2px solid #A8A8A8;
				border-right: 0;
				font-size: 16px;
				color: #c1c1c1;
				height: 22px;
				width: 205px;
				padding: 0;
				position: relative;
				top: 29px;
				left: 13px;
				text-align: center;
			}

			#clock {
				width: 106px;
				height: 125px;
				background-image: url("<?php echo $assets ?>/unplug/clock.png");
				margin-top: calc(24vh - 115px);
				margin-left: calc(87vw + 6px);
			}

			#clockcanvas {
				position: absolute;
				left: 3px;
				top: 22px;
				width: 100px;
				height: 100px;
				opacity: .5;
			}

			#grid {
				width: 76px;
				height: 225px;
				background-image: url("<?php echo $assets ?>/unplug/grid.png");
				margin-top: calc(50vh - 15px);
				margin-left: calc(63vw + 210px);
			}

			#utah {
				width: 243px;
				height: 209px;
				background-image: url("<?php echo $assets ?>/unplug/teapot.png?v=2");
				margin-top: calc(58vh + 5px);
				margin-left: calc(62vw + 10px);
			}

			#utah>canvas {
				margin-top: 24px;
				margin-left: 5px;
			}

			.twitterwindow {
				width: 528px;
				height: 395px;
				background-image: url("<?php echo $assets ?>/unplug/twitter.png");
				margin-top: calc(50vh - 185px);
				margin-left: calc(50vw - 224px);
				display: none;
			}

			.mainimage {
				width: 528px;
				height: 395px;
				background-image: url("<?php echo $assets ?>/unplug/unplug.png");
				margin-top: calc(50vh - 185px);
				margin-left: calc(50vw - 224px);
			}

			.secondaryimage {
				width: 126px;
				height: 145px;
			}

			.thirdimage {
				width: 126px;
				height: 145px;
				background-image: url("<?php echo $assets ?>/unplug/aboutright.png");
				background-position: right;
				background-repeat: repeat-y;
				background-color: #4B7071;
				background-size: initial;
				margin-left: calc(30vw - 240px);
				margin-top: calc(63vh + 20px);
				overflow: hidden;
				transition-property: width, height, top, left, margin;
				z-index: 100;
			}

			.main-thingy{
				margin: 22px 3px 3px 3px;
				width: calc(100% - 6px);
				height: calc(100% - 25px);
				position: absolute;
			}

			.close{
				margin: 5px 5px 0 calc(100% - 21px);
				width: 16px;
				height: 14px;
				position: absolute;
				background-image: url("<?php echo $assets ?>/unplug/close.png");
			}

			.close:active{
				background-image: url("<?php echo $assets ?>/unplug/closed.png");
			}

			.mobile-thing {
				background-image: url("<?php echo $assets ?>/unplug/best-on-a-computer.png");
				background-repeat: no-repeat;
				background-size: contain;
				width: 100vw;
				height: 100vh;
				max-width: 100vh;
				max-height: 100vw;
				margin: auto auto;

			}

			.anyway-wrap {
				margin-left: 48%;
				margin-top: 48%;
				display: inline-grid;
				width: 26vw;
				max-width: 26vh;
				background-image: url("<?php echo $assets ?>/unplug/anyway-on.png");
				background-size: contain;
				background-repeat: no-repeat;
			}

			.anyway {
				width: 100%;
			}

			.anyway:hover {
				opacity: 0;
			}

			.mobile-wrapper{
				position: absolute;
				width:100vw;
				height:100vh;

				display: none;
			}

			.mobile-wrapper-two-point-o{
				display: table-cell;
				vertical-align: middle;
				width:100vw;
				height:100vh;
			}

			#desktop{
				display: none;
			}

			#rotato-cubo{
				height: 100px;
				width: 100px;
				background-image: url("<?php echo $assets ?>/red.gif");
				background-size: contain;
				background-repeat: no-repeat;
				background-position: center;
				display: inline-block;
				position: absolute;
				top: -50px;
				left: -50px;
			}

			#bio{
				font-size: 20px;
				color: #D8E0E0;
				font-family: 'Quicksand', sans-serif;
				font-weight: 500;
				text-decoration: none;
				position: absolute;
				display: inline-block;
				width: 500px;
				top: -107px;
				left: 110px;
			}

			#bio a {
				color: inherit;
				font-weight: 700;
			}

			#namething {
				font-weight: 700;
			}

			.separator {
				height: 100%;
				width: 6px;
				border-radius: 3px;
				background-color: #D8E0E0;
				display: inline-block;
				position: absolute;
				top: 0;
				left: -20px;
			}

			#copyrightstuff {
				opacity: .4;
				font-size: 19px;
				position: absolute;
				bottom: 5px;
				left: 10px;
				font-weight: bold;
			}

			#namething {
				display: inline;
			}

			.object {
				position: absolute;
				display: block;
				margin: 32px 13px 13px 13px;
				width: 100px;
				height: 100px;
			}

			.art .object {
				background-image: url("<?php echo $assets ?>/objects/object1.gif");
			}

			.games .object {
				background-image: url("<?php echo $assets ?>/objects/object2.gif");
			}

			.art.secondaryimage {
				background-image: url("<?php echo $assets ?>/unplug/object1.png?v=2");
				margin-top: calc(38vh - 170px);
				margin-left: calc(41vw - 250px);
			}

			.games.secondaryimage {
				background-image: url("<?php echo $assets ?>/unplug/object2.png?v=2");
				margin-top: calc(46vh - 127px);
				margin-left: calc(43vw - 191px);
			}

			.aboutwin {
				position: absolute;
				width: 4px;
				height: 100%;
			}

			.aboutslider {
				width: 100%;
			}

			#abouttopleft {background-image: url("<?php echo $assets ?>/unplug/abouttopleft.png");width: 415px;}
			#abouttop {background-image: url("<?php echo $assets ?>/unplug/abouttop.png");height: 23px;}
			#abouttopright {background-image: url("<?php echo $assets ?>/unplug/abouttopright.png");right: 0;}
			#aboutleft {background-image: url("<?php echo $assets ?>/unplug/aboutleft.png");}
			#aboutbottomleft {background-image: url("<?php echo $assets ?>/unplug/aboutbottomleft.png");}
			#aboutbottom {background-image: url("<?php echo $assets ?>/unplug/aboutbottom.png");bottom: 0;height: 4px;}
			#aboutbottomright {background-image: url("<?php echo $assets ?>/unplug/aboutbottomright.png");right: 0;}

			#aboutcontent {
				top: 50%;
				left: 50%;
				position: absolute;
				transition: 1s;
			}

			#aboutclip {
				position: absolute;
				top: 22px;
				left: 3px;
				right: 3px;
				bottom: 3px;
				overflow: hidden;
			}
		</style>
		<link rel="StyleSheet" id="quicksand" type="text/css" href="">
	</head>
	<body>
		<div class="mobile-wrapper" id="mobile">
			<div class="mobile-wrapper-two-point-o">
				<div class="mobile-thing">
					<a class="anyway-wrap" href="javascript:void(0)" onclick="Switch()">
						<img class="anyway" src="<?php echo $assets ?>/unplug/anyway.png" title="continue anyway"/>
					</a>
				</div>
			</div>
		</div>
		<div id="desktop">

			<div class="mainimage window" title="unplug your mind for best experience">
				<a class="main-thingy" href="/bulb"></a>
				<a class="close" href="javascript:void(0)" title="close"></a>
			</div>

			<div class="window" id="mc_embed_signup">
				<a class="close" href="javascript:void(0)" title="close"></a>
				<form action="https://pm.us20.list-manage.com/subscribe/post?u=526092f6456b91b0afdff2b1c&amp;id=2ea9fdbe2b" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>

					<div id="mc_embed_signup_scroll">
						<div class="mc-field-group">
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

			<div class="thirdimage window" id="hhh" title="me_irl" style="left: 0.0px; top: 0.0px;">
				<div class="aboutwin" id="aboutleft"></div>
				<div class="aboutwin aboutslider" id="abouttop">
					<div class="aboutwin" id="abouttopleft"></div>
					<div class="aboutwin" id="abouttopright"></div>
				</div>
				<div id="aboutclip">
					<div id="aboutcontent">
						<a id="rotato-cubo" href="javascript:void(0)"></a>
						<div id="bio">
hey, im <div id="namething"></div> and this is my cool ass website<br/>
i sometimes make weird games. when im not making games im making other stuff.<br/>
you can find most of that stuff in this website.<br/>
i really dont have a lot to say other than that, i have no idea what im doing tbh<br/>
<br/>
you can reach me at <b>arihanan@pm.me</b><br/>
also i have a <a href="https://twitter.com/unplugred/">twitter</a>
							<div class="separator"></div>
						</div>
					</div>
				</div>
				<div class="aboutwin aboutslider" id="aboutbottom">
					<div class="aboutwin" id="aboutbottomleft"></div>
					<div class="aboutwin" id="aboutbottomright"></div>
				</div>
				<a class="close" href="javascript:void(0)" title="close"></a>
			</div>

			<div class="secondaryimage window art" title="art blog">
				<a class="close" href="javascript:void(0)" title="close"></a>
				<a class="object" href="https://art.unplug.red/"></a>
			</div>

			<div class="secondaryimage window games" title="games">
				<a class="close" href="javascript:void(0)" title="close"></a>
				<a class="object" href="https://unplugred.itch.io/"></a>
			</div>

			<div id="clock" class="window">
				<a class="close" href="javascript:void(0)" title="close"></a>
				<canvas id="clockcanvas"></canvas>
			</div>

			<div id="grid" class="window">
				<a class="close" href="javascript:void(0)" title="close"></a>
			</div>

			<div id="utah" class="window">
				<a class="close" href="javascript:void(0)" title="close"></a>
			</div>

			<div id="copyrightstuff">© Ari Hanan 2018-<?php echo date("Y"); ?> | <a href="/privacy-policy">privacy policy</a> | &lt;3</div>
		</div>
		<script type="text/javascript">
			var isdesktop = -1;
			if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
				|| /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) {
				document.getElementById("mobile").style.display = "table";
			} else {
				document.getElementById("desktop").style.display = "block";
				isdesktop = 1;
			}

			function Switch(){
				document.getElementById("mobile").style.display = "none";
				document.getElementById("desktop").style.display = "block";
				isdesktop = 0;
			}
		</script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<script type="text/javascript">
			var closedwindows = 0;
			var biowindow = $("#hhh")[0];
			var biocontent = $("#aboutcontent")[0];
			var biox = -1, bioy = -1;

			$(".window").draggable();
			$(".close").on("click",function(){
				$(this).parent().css("display", "none");
				if(++closedwindows >= 8){
					window.location = "/bye";
				}
			});
			$("#rotato-cubo").on("click",function(){
				biowindow.style.transitionDuration = "1s";
				setTimeout(function(){
					biowindow.style.transitionDuration = null;
				}, 1000);

				if(biox === -1)
				{
					biox = biowindow.style.left;
					bioy = biowindow.style.top;

					biowindow.style.width = "calc(100vw + 8px)";
					biowindow.style.height = "calc(100vh + 27px)";
					biowindow.style.left = "-4px";
					biowindow.style.top = "-23px";
					biowindow.style.margin = "0";
					biowindow.style.zIndex = "1000";
					biocontent.style.left = "calc(50% - 275px)";

					setTimeout(setname, 500);
					function setname()
					{
						document.getElementById("namething").innerHTML = Math.random() > .2 ? "red" : "8708198";
					}

					$("#hhh").draggable("disable");
				} else {
					biowindow.style.left = biox;
					biowindow.style.top = bioy;
					biocontent.style.left = biowindow.style.zIndex = biowindow.style.width = biowindow.style.height = biowindow.style.margin = null;

					biox = bioy = bioz = -1;

					document.getElementById("namething").innerHTML = " ";

					$("#hhh").draggable("enable");
				}
			});

			var clock = document.getElementById("clockcanvas");
			var ctx = clock.getContext("2d");
			clock.width = 100;
			clock.height = 100;
			setInterval(updateclock, 1000);
			updateclock();
			function updateclock()
			{
				ctx.clearRect(0, 0, 100, 100);
				ctx.strokeStyle = "#FFFFFF";
				ctx.lineWidth = 3;
				ctx.beginPath();
				ctx.arc(50, 50, 42, 0, 2 * Math.PI);
				ctx.moveTo(50, 50);
				var time = new Date();
				var angle = time.getMinutes()/30.0*Math.PI;
				ctx.lineTo(Math.sin(angle) * 32 + 50, Math.cos(angle)* -32 + 50);
				ctx.moveTo(50, 50);
				angle = time.getHours()/6.0*Math.PI;
				ctx.lineTo(Math.sin(angle) * 18 + 50, Math.cos(angle)* -18 + 50);
				ctx.stroke();
				ctx.strokeStyle = "#FF0000";
				ctx.lineWidth = 1;
				ctx.beginPath();
				ctx.moveTo(50, 50);
				angle = time.getSeconds()/30.0*Math.PI;
				ctx.lineTo(Math.sin(angle) * 36 + 50, Math.cos(angle)* -36 + 50);
				ctx.stroke();

				var imageData = ctx.getImageData(0, 0, 100, 100);
				for(i = 0; i !== imageData.data.length; i++)
					imageData.data[i] = (imageData.data[i] >> 7) * 0xFF;
				ctx.putImageData(imageData, 0, 0);
			}
		</script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/threejs/r84/three.min.js"></script>
		<script type="text/javascript">
			var scene = new THREE.Scene();
			var camera = new THREE.PerspectiveCamera(22.619865, 233 / 180, 0.1, 1000);
			var renderer = new THREE.WebGLRenderer({antialias: false});
			renderer.setClearColor(0x000000, 0);
			renderer.setSize(233, 180);
			renderer.stencil = false;
			renderer.depth = false;
			renderer.premultipliedAlpha = false;
			renderer.precision = "lowp";

			var loader = new THREE.TextureLoader();
			var bg = loader.load("/access/checkers.png");
			bg.wrapS = THREE.RepeatWrapping;
			bg.wrapT = THREE.RepeatWrapping;
			bg.repeat.set(14.5625, 11.25);
			scene.background = bg;

			camera.position.set(6.24413, 5.60956, 10.5715);
			camera.rotation.set(-0.4784, 0.45708, 0.2294);

			var material = new THREE.MeshNormalMaterial();
			var teapot;
			loader = new THREE.ObjectLoader();
			loader.load("/access/pot.json", function(obj){
				obj.material = material;
				scene.add(obj);
				teapot = obj;
			});

			var rotx = 0, roty = 0;
			function animate() {
				if(scene.children.length === 1 && !isdesktop)
					teapot.rotation.set(
						teapot.rotation.x*.93 + rotx*.07,
						teapot.rotation.y*.93 + roty*.07, 0);

				requestAnimationFrame(animate);
				renderer.render(scene, camera);
			}
			animate();

			document.getElementById("utah").appendChild(renderer.domElement);
			var canvasdom = $("#utah>canvas");

			document.onmousemove = function(e){
				if(scene.children.length === 1)
				{
					var offset = canvasdom.offset();
					if(isdesktop !== -1)
					{
						rotx = (e.pageY - offset.top - 90)*.001;
						roty = (e.pageX - offset.left - 116.5)*.001;
						if(isdesktop === 1)
						{
							teapot.rotation.x = rotx;
							teapot.rotation.y = roty;
						}
					}
				}
			}

			window.onload = function()
			{
				document.getElementById('quicksand').href = "https://fonts.googleapis.com/css?family=Quicksand:500,700&display=swap";
			}
		</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>
