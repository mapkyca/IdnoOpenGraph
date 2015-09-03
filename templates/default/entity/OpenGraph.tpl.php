<?php
	
	$ogp = $vars['ogp']->fields;
	if (!empty($ogp)) {
		
		?>
		
		<div class="idno-opengraph og">
		
				<?php if (!empty($ogp['og:image'])) { 
				    
				    $img = $ogp['og:image'];
				    if (!is_array($img)) $img = [$img];
				    
				    ?>
					<img src="<?= $img[0]; ?>" class="og-image" />
				<?php 
				    
				}?>
				<h3><a href="<?= $ogp['og:url']; ?>"><?= $ogp['og:title']; ?></a></h3>
				<?= $ogp['og:description']; ?>
		
		</div>
		
		<?php
		
	}
