<?php
class SiteController extends AppController {
	// var $uses = array('articles.Article', 'SiteArticle');
	var $uses = array('category.Category');
	var $aFeaturedProducts, $aEvents, $cart;

	// ---------------------
	// Custom variables
	// ---------------------
	function beforeFilter() {
		//Configure::write('Config.language', 'rus');
		//Security::setHash("md5");
		//$this->Auth->allow();
		$this->beforeFilterMenu();
		$this->beforeFilterLayout();
	}

	/**
	 * Common code for setting up current menus and bottom links (for all controllers)
	 * Variables set here will be used when menus will be rendering
	 */
	function beforeFilterMenu() {
		$this->currMenu = ($this->params['controller'] == 'pages') ? $this->params['action'] : $this->params['controller'];
		$this->currLink = $this->currMenu;
	}

	/**
	 * Common code for layout (for all controllers)
	 * Variables set here will be used when layout will be rendering
	 */
	function beforeFilterLayout() {
		// Code for layout
		$this->loadModel('articles.Article');
		$this->loadModel('SiteArticle');

		$this->Article = $this->SiteArticle;

		$this->aFeaturedProducts = $this->SiteArticle->getRandomRows(3, array('Article.object_type' => 'products', 'Article.featured' => 1, 'Article.published' => 1));
		$this->set('aFeaturedProducts', $this->aFeaturedProducts);

		$this->aEvents = $this->Article->getRandomRows(1, array('Article.object_type' => 'news', 'Article.featured' => 1, 'Article.published' => 1));
		$this->set('upcomingEvent', ($this->aEvents) ? $this->aEvents[0] : false);

		App::import('Vendor', 'Services_JSON', array('file' => '../plugins/core/vendors/json.php'));
		$json = new Services_JSON();

		$this->cart = (isset($_COOKIE['cart'])) ? str_replace('\"', '"', $_COOKIE['cart']) : '{}';
		$this->cart = (array) $json->decode($this->cart);
		$this->cart = ($this->cart) ? array_combine(array_keys($this->cart), array_values($this->cart)) : array();
		$this->set('aCartQty', $this->cart);
	}

	function beforeRender() {
		$this->beforeRenderMenu();
		$this->beforeRenderLayout();
	}

	/**
	 * Override code here for layout in specific controller
	 *
	 */
	function beforeRenderLayout() {
		$this->set('errMsg', $this->errMsg);
		$this->set('aErrFields', $this->aErrFields);
		$this->set('aBreadCrumbs', $this->aBreadCrumbs);

		$brands = $this->Article->find('all', array('conditions' => array('Article.object_type' => 'brands', 'Article.published' => 1)));
		$this->set('aBrandTypes', $brands);
		$aBrands = array();
		foreach($brands as $article) {
			if (isset($article['Media'][0])) {
				$aBrands[] = $article;
			}
		}
		$this->set('aBrands', $aBrands);

		$aFilter = array();
		if (isset($this->params['url']['data']['filter']['Article.title']) && $this->params['url']['data']['filter']['Article.title']) {
			$aFilter['Article.title'] = $this->params['url']['data']['filter']['Article.title'];
		}
		if (isset($this->params['url']['data']['filter']['Article.object_id']) && $this->params['url']['data']['filter']['Article.object_id']) {
			$aFilter['Article.object_id'] = $this->params['url']['data']['filter']['Article.object_id'];
		}
		if (isset($this->params['url']['data']['filter']['Article.brand_id']) && $this->params['url']['data']['filter']['Article.brand_id']) {
			$aFilter['Article.brand_id'] = $this->params['url']['data']['filter']['Article.brand_id'];
		}
		if (isset($this->params['url']['data']['filter']['Tag.id']) && $this->params['url']['data']['filter']['Tag.id']) {
			$aFilter['Tag.id'] = $this->params['url']['data']['filter']['Tag.id'];
		}
		$this->set('aFilter', $aFilter);

		$this->loadModel('tags.Tag');
		$aTags = $this->Tag->find('list');
		$this->set('aTags', $aTags);

		$this->loadModel('categories.Category');
		$types = $this->Category->find('all', array(
			'conditions' => array('Category.object_type' => 'products'),
			'order' => array('object_id', 'sorting')
		));
		$aTypes = array();
		foreach($types as $type) {
			$aTypes['type_'.$type['Category']['object_id']][] = $type['Category'];
		}
		$this->set('aTypes', $aTypes);

		// Fixes for menu titles
		$aArticleTitles = $this->Article->find('list', array('fields' => array('page_id', 'title'), 'conditions' => array('page_id' => array('dealers', 'about-us', 'about-us2', 'contacts1', 'contacts2'))));
		$this->aMenu['about']['submenu'][0]['title'] = $aArticleTitles['about-us'];
		$this->aMenu['about']['submenu'][1]['title'] = $aArticleTitles['about-us2'];
		$this->aMenu['partner']['title'] = $aArticleTitles['dealers'];
		$this->aBottomLinks['partner']['title'] = $aArticleTitles['dealers'];

		App::import('Helper', 'articles.PHTranslit');
		App::import('Helper', 'Router');
		$this->Router = new RouterHelper();
		$this->Router->PHTranslit = new PHTranslitHelper();

		foreach($aTypes['type_'] as $type) {
			$url = $this->Router->catUrl('products', $type);
			$this->aMenu['products']['submenu'][] = array('href' => $url, 'title' => $type['title']);
		}
		$this->set('aMenu', $this->aMenu);
		$this->set('aBottomLinks', $this->aBottomLinks);
	}

}
class AppController extends Controller {

	// var $components = array('Auth');
	var $helpers = array('Html', 'Time', 'core.PHTime', 'core.PHA', 'media.PHMedia', 'Router', 'ArticleVars'); // , 'Mybbcode', 'Ia'

	var $errMsg = '';
	var $aErrFields = array();

	var $homePage = array('title' => 'Главная', 'img' => 'main.gif', 'href' => '/');
	var $currMenu = '', $currLink;

	var $pageTitle;

	var $aMenu = array(
		'home' => array('href' => '/', 'title' => 'Главная'),
		'news' => array('href' => '/news/', 'title' => 'Новости'),
		'products' => array('href' => '/product/', 'title' => 'Запчасти'),
		// 'remont' => array('href' => '/pages/show/remont.html', 'title' => 'Ремонт'),
		'brands' => array('href' => '/brand/', 'title' => 'Бренды'),
		'about' => array('href' => '/pages/show/about-us.html', 'title' => 'О нас', 'submenu' => array(
			array('href' => '/pages/show/about-us.html', 'title' => 'История'),
			array('href' => '/pages/show/about-us2.html', 'title' => 'Наша миссия')
		)),
		'partner' => array('href' => '/pages/show/dealers.html', 'title' => 'Дилеры'),
		'contacts' => array('href' => '/contacts/', 'title' => 'Контакты')
	);

	var $aBottomLinks = array(
		'home' => array('href' => '/', 'title' => 'Главная'),
		'news' => array('href' => '/news/', 'title' => 'Новости'),
		'products' => array('href' => '/product/', 'title' => 'Запчасти'),
		// 'remont' => array('href' => '/pages/show/remont.html', 'title' => 'Ремонт'),
		'brands' => array('href' => '/brand/', 'title' => 'Бренды'),
		'about' => array('href' => '/pages/show/about-us.html', 'title' => 'О нас'),
		'partner' => array('href' => '/pages/show/dealers.html', 'title' => 'Дилеры'),
		'contacts' => array('href' => '/contacts/', 'title' => 'Контакты')
	);
	var $aBreadCrumbs = array();

	function beforeRenderMenu() {
		$this->pageTitle = ($this->pageTitle) ? $this->pageTitle.' - '.DOMAIN_TITLE : DOMAIN_TITLE;

		$this->set('pageTitle', $this->pageTitle);

		$this->set('aMenu', $this->aMenu);
		$this->set('currMenu', $this->currMenu);

		$this->set('aBottomLinks', $this->aBottomLinks);
		$this->set('currLink', $this->currLink);

		$this->set('homePage', $this->homePage);
		$this->set('isHomePage', $this->isHomePage());

		$this->errMsg = (is_array($this->errMsg)) ? implode('<br/>', $this->errMsg) : $this->errMsg;
		if ($this->errMsg) {
			$this->errMsg = '<br/>'.$this->errMsg.'<br/><br/>';
		}
		$this->set('errMsg', $this->errMsg);
		$this->set('aBreadCrumbs', $this->aBreadCrumbs);
	}

	function isHomePage() {
		return $this->params['url']['url'] == '/' || $this->params['url']['url'] == 'pages/home';
	}

}
