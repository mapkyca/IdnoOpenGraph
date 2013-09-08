<?php

if ($objs = \IdnoPlugins\IdnoOpenGraph\Main::getOgpForURL($vars['object']->body))
{
	foreach($objs as $o) {
		$this->ogp = $o;
		echo $this->draw('entity/OpenGraph');
	}
		
}

