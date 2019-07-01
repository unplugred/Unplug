<?php
$color = "#000000";
$title = "weeeee";
include $_SERVER['DOCUMENT_ROOT'].'/assets/header.php'; ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<style>
			html{
				overflow-y: scroll;
			}

			body{
				height: 1000vh;
				image-rendering: -webkit-optimize-contrast;
				image-rendering: optimizeSpeed;
				image-rendering: pixelated;
			}

			#title {
				position: fixed;
				width: 359px;
				height: 19px;
				background-image: url(/assets/weeeee/title.png);
				background-size: cover;
				background-position: top right;
				top: 50vh;
				left: calc(50vw - 180px);
			}

			.block{
				transform: translateX(-50%) translateY(-50%);
				box-shadow: 5px 5px 0px 0px rgba(0,0,0,1);
				position: fixed;
			}

			#appendme{
				position: relative;
			}

			#weeeee{
				width: 17px;
				position: fixed;
				display: flex;
				flex-direction: column;
    			margin-left: -9px;
			}

			.t{
				width: 17px;
			}

			#w{
				background-image: url("/assets/weeeee/w.png");
			}

			#e{
				background-image: url("/assets/weeeee/e.png");
			}

			#m{
				background-image: url("/assets/weeeee/m.png");
			}
		</style>
	</head>
	<body>
		<div id="appendme"></div>
		<div id="weeeee">
			<div id="w" class="t"></div>
			<div id="e" class="t"></div>
			<div id="m" class="t"></div>
		</div>
		<div id="title" title="Scroll really fast up and down for max fun"></div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script>
			function makeEven(val){
				return Math.floor(val * .5) * 2;
			}

			var scrollspeed = .1;
			var weespeed = .5;

			var title = document.getElementById("title");
			var weediv = document.getElementById("weeeee");
			var weew = document.getElementById("w");
			var weee = document.getElementById("e");
			var weem = document.getElementById("m");
			var weetop, weeanchor;
			var weestage = 6;
			var weeheight = 999999;
			var weeend = Math.random() * 500 + 500;
			var h = $('body').height() * .5;
			var scrollTop = document.documentElement ? document.documentElement.scrollTop : document.body.scrollTop;
			var prevscroll = 0;
			var isMobile = false; //initiate as false
			// device detection
			if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) {
				isMobile = true;
			}

			function Blox(){
				this.div = document.createElement("div");
				var w = Math.random() * .9 + .05;
				var s = Math.random() * 600 + 40;
				this.div.style.width = makeEven(Math.min(1 - w, w) * s) + "px";
				this.div.style.height = makeEven(Math.max(1 - w, w) * s) + "px";
				this.position = [ Math.random() * 100, Math.random() * 10, Math.floor(Math.random() * 1024), Math.floor(Math.random() * 1024) ];
				this.speed = Math.random() - .1;
				this.div.style.left = this.position[0] + "vw";
				var tex = Math.floor(Math.random() * 7);
				this.scrollablebg = tex != 3;
				if(tex < 2) tex += Math.random() > .5 ? "a" : "b";
				this.div.style.backgroundImage = "url(\"/assets/weeeee/" + tex + ".png\")";
				this.div.className = "block";
			}

			var bloxes = [];
			for (x = 0; x < (isMobile ? 25 : 100); x += 1)
				document.getElementById("appendme").appendChild((bloxes[x] = new Blox()).div);

			function update() {
				var scrolldif = scrollTop;
				scrollTop = (document.documentElement ? document.documentElement.scrollTop : document.body.scrollTop)*scrollspeed + scrollTop*(1 - scrollspeed);
				prevscroll += scrollTop - scrolldif;

				if(Math.floor(scrollTop) != Math.floor(scrolldif))
				{
					draw();

					prevscroll = 0;
				}
			}

			//window.onscroll = update;
			setInterval(update, 33);

			function GnrtWee(){
				weeend = Math.random()*200 + 100;
				weediv.style.left = (Math.random()*100) + "vw";
				weestage = 1;
				weetop = Math.random()*.4 + .2;
				weeanchor = scrollTop;
				weediv.style.top = (weeanchor - window.innerHeight*weetop) + "px";
				weew.style.height =
				weee.style.height =
				weem.style.height =
				weew.style.marginTop =
				weee.style.marginTop =
				weem.style.marginTop = 0;
			}

			function draw(){
				title.style.top = (window.innerHeight*.5 - scrollTop) + "px";

				var boxpos;
				for(x = 0; x < bloxes.length; x++)
				{
					boxpos = (bloxes[x].position[1] * window.innerHeight + (scrollTop - $('body').height()*.5) * bloxes[x].speed - scrollTop);
					bloxes[x].div.style.top = boxpos + "px";
					bloxes[x].div.style.backgroundPosition = (bloxes[x].position[2]) + "px " + (bloxes[x].position[3] - boxpos*(bloxes[x].scrollablebg ? .5 : 1)) + "px";
				}

				weeheight += (weestage <= 3) ? Math.max(prevscroll*weespeed*1.5, 0) : 20;
				var afterclamp = (weeheight - (weeheight % 22));
				weediv.style.top = ((weeanchor - scrollTop)*weespeed + window.innerHeight*weetop) + "px";
				switch(weestage){
					case 1:
						weew.style.height = afterclamp + "px";
						break;
					case 2:
						weee.style.height = afterclamp + "px";
						break;
					case 3:
						weem.style.height = afterclamp + "px";
						break;
					case 4:
						weew.style.height = (weeend - afterclamp) + "px";
						weew.style.marginTop = afterclamp + "px";
						break;
					case 5:
						weee.style.height = (weeend - afterclamp) + "px";
						weee.style.marginTop = afterclamp + "px";
						break;
					case 6:
						weem.style.height = (weeend - afterclamp) + "px";
						weem.style.marginTop = afterclamp + "px";
						break;
				}
				if(weeheight > weeend){
					weeheight = 0;
					switch(weestage){
						case 3:
							weeend = parseInt(weew.style.height, 10);
							weestage++;
							break;
						case 4:
							weeend = parseInt(weee.style.height, 10);
							weestage++;
							break;
						case 5:
							weeend = parseInt(weem.style.height, 10);
							weestage++;
							break;
						case 6:
							weestage++;
							break;
						case 7:
							if(prevscroll > 0) GnrtWee();
							break;
						default:
							weeend = Math.random()*200 + 100;
							weestage++;
							break;
					}
				}

				console.log("strgk");
			}

			draw();
		</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>