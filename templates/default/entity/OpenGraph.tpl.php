<?php
	
	$ogp = $vars['ogp']->fields;
	if (!empty($ogp)) {
		
		?>
		
		<div class="idno-opengraph og">
		
				<?php if (!empty($ogp['og:image'])) { 
				    
				    $img = $ogp['og:image'];
				    if (!is_array($img)) $img = [$img];
				    
				    ?>
					<img src="<?= htmlentities($img[0], ENT_QUOTES, 'UTF-8'); ?>" class="og-image" />
				<?php 
				    
				}?>
				<?php
				if (!empty($ogp['og:url']) && !empty($ogp['og:title'])) {
				    ?><h3><a href="<?= htmlentities($ogp['og:url'], ENT_QUOTES, 'UTF-8'); ?>"><?= htmlentities($ogp['og:title'], ENT_QUOTES, 'UTF-8'); ?></a></h3>
				<?php } ?>
				<?php if (!empty($ogp['og:description'])) { 
				    echo htmlentities($ogp['og:description'], ENT_QUOTES, 'UTF-8'); 
				} ?>
		
		</div>
		
		<?php
		
	}
