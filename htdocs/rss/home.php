<?php include(dirname(__FILE__).'/header.php'); ?>
	<main class="main">
		<div class="container">
			<div class="grid">
				<div class="content col sml-12 med-9">

					<?php while($plxShow->plxMotor->plxRecord_arts->loop()): ?>
					<article class="article" id="post-<?php echo $plxShow->artId(); ?>">
						<header>
							<div class="art-date">
								<time datetime="<?php $plxShow->artDate('#num_year(4)-#num_month-#num_day'); ?>">
									<?php $plxShow->artDate('#num_day #month #num_year(4)'); ?>
								</time>
							</div>
							<h2>
								<?php $plxShow->artTitle('link'); ?>
							</h2>
						</header>
						<?php $plxShow->artThumbnail(); ?>
						<?php $plxShow->artChapo(); ?>
					</article>
					<div class="divider"></div>
					<?php endwhile; ?>

					<nav class="pagination text-center">
						<?php $plxShow->pagination(); ?>
					</nav>
				</div>
			</div>
		</div>
	</main>
<?php include(dirname(__FILE__).'/footer.php'); ?>
