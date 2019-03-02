<?php include 'config.php';
include 'Database.php';
$db = new Database();
$query = "SELECT * FROM posts ORDER BY PostID DESC LIMIT ".$_REQUEST["page"].", ".$_REQUEST["amount"];
$posts = $db->select($query);
if($posts) :
	while($row = $posts->fetch_assoc()) : ?>
		<div class="post">
			<?php switch($row['PostType']) : ?><?php case 'Image': ?>
					<div class="post-wrap" style="padding-top: <?php echo ($row['PostHeight']/$row['PostWidth'])*100 ?>%">
						<img class="post-inner post-image" src="/art/<?php if(pathinfo($row['PostBody'])['extension'] == "png") : ?><?php echo $row['PostBody']."&w=700" ?><?php else : ?><?php echo $row['PostBody'] ?><?php endif; ?>">
					</div>
					<?php break;
					
				case 'Text': ?>
					<p class="post-inner post-text"><?php echo $row['PostBody'] ?></p>
					<?php break;
					
				case 'Line': ?>
					<p class="post-inner post-line" style="padding : 40px <?php echo $row['PostWidth'] ?>%"><?php echo $row['PostBody'] ?></p>
					<?php break;
					 
				case 'Music': ?>
					<div class="post-wrap" style="height: 166px">
						<iframe class="post-inner post-music" width="100%" height="166" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/<?php echo $row['PostBody'] ?>&color=%234b7071&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true"></iframe>
					</div>
					<?php break;
					
				case 'Video': ?>
					<div class="post-wrap" style="padding-top: <?php echo ($row['PostHeight']/$row['PostWidth'])*100 ?>%">
						<iframe class="post-inner post-video" src="<?php echo $row['PostBody'] ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					</div>
					<?php break;
					
				case 'ImageCombo':
					foreach(preg_split("/((\r?\n)|(\r\n?))/", $row['PostBody']) as $img) : ?>
						<div class="post-wrap" style="padding-top: <?php echo ($row['PostHeight']/$row['PostWidth'])*100 ?>%">
							<img class="post-inner post-combo" src="/art/<?php if(pathinfo($img)['extension'] == "png") : ?><?php echo $img."&w=700" ?><?php else : ?><?php echo $img ?><?php endif; ?>">
						</div>
					<?php endforeach;
					break;
			endswitch; ?>
			
			<?php $postnum = sprintf('%04d', $row['PostID']); ?>
			<p class="number">
				<a href="/blog/<?php echo $postnum ?>" target="popup" onclick="window.open('/blog/<?php echo $postnum ?>','popup','width=700,height=<?php echo ($row['PostHeight'] == 0) ? 700 : (($row['PostWidth'] == 0) ? ($row['PostHeight'] + 70) : ($row['PostHeight']/$row['PostWidth'])*700 + 70) ?>'); return false;"><?php echo $postnum; ?></a><?php echo ($row['PostName'] ? " - ".$row['PostName'] : "").$row['PostSuffix'] ?>
			</p>
			<p class="date"><?php echo date('m/d/Y', strtotime($row['PostDate'])); ?></p>
		</div>
	<?php endwhile;
endif;