<?php

	// Set some defaults
	$headers = [
		'og:type' => 'website',
		'og:title' => $vars['title'],
		'og:site_name' => \Idno\Core\site()->config()->title,
	];

// If this is an object, override with specifics
if (\Idno\Core\site()->currentPage() && \Idno\Core\site()->currentPage()->isPermalink()) {
	
	$owner = $vars['object']->getOwner();
	
	$headers['og:title'] = $vars['object']->getTitle();
	$headers['og:url'] = $vars['object']->getURL();
	$headers['og:description'] = $vars['object']->getShortDescription();
	$headers['og:type'] = $vars['object']->getActivityStreamsObjectType();
	
	$headers['og:image'] = $owner->getIcon(); //Icon, for now set to being the author profile pic
	
	// TODO: Icon per object overrides
}
?>
<!-- Idno OpenGraph by Marcus Povey -->
<?php
//foreach ($headers as $key => $value) {
//	echo "<meta property=\"$key\" content=\"$value\" />\n";
//}
?>
<!-- End OpenGraph -->
