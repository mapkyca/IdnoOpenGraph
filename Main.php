<?php

namespace IdnoPlugins\IdnoOpenGraph {

    require_once(dirname(__FILE__) . '/external/php-ogp/ogp/Parser.php');

    class Main extends \Idno\Common\Plugin {

	/**
	 * Parse open graph.
	 * @return array|false
	 */
	static function parseOpengraph($url) {

	    // TODO: Cache url data to avoid repeating...
	    // TODO: Pull image to local cached copy

	    if ($raw = file_get_contents($url)) {

		if ($data = \ogp\Parser::parse($raw)) {
		    return $data;
		}
	    }

	    return false;
	}

	function saveOGP($url, $data) {
	    $ogp = new OpenGraph();
	    $ogp->fields = $data;
	    $ogp->url = $url;

	    $ogp->save();
	}

	/**
	 * Return the saved open graph entry for a given url
	 */
	static function getOgpForURL($url) {
	    if ($result = \Idno\Core\site()->db()->getObjects('IdnoPlugins\IdnoOpenGraph\OpenGraph', ['url' => $url]))
		return $result;

	    return false;
	}

	function registerPages() {

	    // Open graph headers for site
	    //\Idno\Core\site()->template()->extendTemplate('shell/head','ogp/header');
	    // Add custom CSS
	    \Idno\Core\site()->template()->extendTemplate('shell/head', 'ogp/css');

	    // Extend entity objects
	    \Idno\Core\site()->template()->extendTemplate('entity/Like', 'ogp/entity/Like');

	    // Listen for certain objects and look for headers to pull
	    \Idno\Core\site()->addEventHook('post/bookmark', function(\Idno\Core\Event $event) {

		$url = $event->data()['object']->body;
		if (!self::getOgpForURL($url)) {
		    if ($ogp = self::parseOpengraph($url)) {
			$this->saveOGP($url, $ogp);
		    }
		}
	    });
	}

    }

}

