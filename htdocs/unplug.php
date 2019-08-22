<?php
$title = "unplug";
include $_SERVER['DOCUMENT_ROOT'].'/assets/header.php'; ?>
        <style>
            .window{
                background-size: contain;
                background-repeat: no-repeat;
                background-position: center;
                position: fixed;
            }

            .mainimage {
                width: 528px;
                height: 395px;
                background-image: url("/assets/unplug/unplug.png");
                margin-top: calc(50vh - 197px);
                margin-left: calc(50vw - 264px);
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
                background-image: url("/assets/unplug/close.png");
            }

            .close:active{
                background-image: url("/assets/unplug/closed.png");
            }

            .mobile-thing {
                background-image: url("/assets/unplug/best-on-a-computer.png");
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
                background-image: url("/assets/unplug/anyway-on.png");
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
        </style>

        <link rel="prefetch" href="/assets/unplug/close.png" />
    </head>
    <body>
        <div class="mobile-wrapper" id="mobile">
            <div class="mobile-wrapper-two-point-o">
                <div class="mobile-thing">
                    <a class="anyway-wrap" href="javascript:void(0)" onclick="Switch()">
                        <img class="anyway" src="/assets/unplug/anyway.png"/>
                    </a>
                </div>
            </div>
        </div>
        <div id="desktop">
            <div class="mainimage window">
                <a class="main-thingy" href="/bulb" title="unplug your mind for best experience."></a>
                <a class="close" href="/bye" title="close"></a>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script>
            if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
                || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) {
                document.getElementById("mobile").style.display = "table";
            }
            else{
                document.getElementById("desktop").style.display = "block";
            }

            function Switch(){
                document.getElementById("mobile").style.display = "none";
                document.getElementById("desktop").style.display = "block";
            }

            var closedwindows = 0;

            $(".window").draggable();
        </script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>
