<?
	if ($aCartQty && !($this->params['controller'] == 'cart' && $this->params['action'] == 'success')) {
		echo $this->element('sbl_block', array('title' => 'Корзина', 'content' => $this->element('sb_cart')));
	}
	echo $this->element('sbl_block', array('title' => 'Каталог', 'content' => $this->element('sb_types')));
	echo $this->element('sbl_block', array('title' => 'Поиск по каталогу', 'content' => $this->element('sb_search')));
	if ($upcomingEvent) {
		echo $this->element('sbl_block', array('title' => 'Новости', 'content' => $this->element('sb_news', array('article' => $upcomingEvent))));
	}
?>