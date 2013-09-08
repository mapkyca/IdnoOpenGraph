<?php
	
	$ogp = $vars['ogp']->fields;
	if (!empty($ogp)) {
		
		?>
		
		<div class="idno-opengraph og">
		
				<?php if (!empty($ogp['og:image'])) { ?>
					<img src="<?= $ogp['og:image']; ?>" class="og-image" />
				<?php }?>
				<h3><a href="<?= $ogp['og:url']; ?>"><?= $ogp['og:title']; ?></a></h3>
				<?= $ogp['og:description']; ?>
		
		</div>
		
		<?php
		
	}
