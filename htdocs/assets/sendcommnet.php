<html>
<header>
	<style>
		body{
			background-color: black;
		}
	</style>
<?php
if(isset($_POST['submit'])){
	$comment = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", htmlentities($_POST['comment']));
	if(!empty($comment) && $comment != "\n"){
		$oldContents = file_get_contents("comments.html");
		$handle = fopen("comments.html","w");
		fwrite($handle,"<div class=\"comment\">" . nl2br($comment) . "</div>\n");
		fwrite($handle,keepXLines($oldContents));
		fclose($handle); ?>
		<script>
			sessionStorage.setItem("PageVisited", "True");
			window.history.back();
		</script>
		<?php
	}
}

function keepXLines($str, $num=1000) {
    $lines = explode("\n", $str);
    $firsts = array_slice($lines, 0, $num);
    return implode("\n", $firsts);
}
?>
</header>
<body></body>
</html>