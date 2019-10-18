<?php if(!defined('PLX_ROOT')) exit; ?>
	<aside class="aside col sml-12 med-3">
		<h3>
			<?php $plxShow->lang('LATEST_ARTICLES'); ?>
		</h3>
		<ul class="lastart-list unstyled-list">
			<?php $plxShow->lastArtList('<li><a class="#art_status" href="#art_url" title="#art_title">#art_title</a></li>'); ?>
		</ul>
		<h3>
			<?php $plxShow->lang('ARCHIVES'); ?>
		</h3>
		<ul class="arch-list unstyled-list">
			<?php $plxShow->archList('<li id="#archives_id"><a class="#archives_status" href="#archives_url" title="#archives_name">#archives_name</a> (#archives_nbart)</li>'); ?>
		</ul>
	</aside>