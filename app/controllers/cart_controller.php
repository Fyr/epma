<?
class CartController extends SiteController {
	var $name = 'Cart';
	var $components = array('Email', 'SiteEmail');
	var $helpers = array('core.PHCore', 'articles.HtmlArticle', 'ArticleVars');
	var $uses = array('articles.Article', 'Order', 'OrderDetail');

	private function getCartItems() {
		return $this->Article->find('all', array('conditions' => array('Article.id' => array_keys($this->cart), 'Article.published' => 1)));
	}

	function index() {
		$this->set('aCartItems', $this->getCartItems());
	}

	function checkout() {
		if (isset($this->data['Order'])) {
			if ($this->Order->save($this->data)) {
				$orderID = $this->Order->id;

				$aCartItems = $this->getCartItems();
				$total = 0;
				foreach($aCartItems as $article) {
					$id = $article['Article']['id'];
					$qty = $this->cart[$id];
					$total+= $article['Article']['price'] * $qty;
					$this->OrderDetail->save(array('id' => null, 'order_id' => $orderID, 'article_id' => $id, 'qty' => $qty, 'price' => $article['Article']['price']));
				}
				$this->Order->save(array('id' => $orderID, 'total' => $total, 'course' => RUR_COURSE));

				$this->SiteEmail->to = EMAIL_ADMIN;
			    $this->SiteEmail->subject = DOMAIN_NAME.': Новый заказ #'.$orderID;
			    $this->SiteEmail->replyTo = $this->data['Order']['email'];
			    $this->SiteEmail->from = $this->data['Order']['email'];
			    $this->SiteEmail->template = 'new_order';
			    $this->SiteEmail->sendAs = 'html';

			    $this->data['Order']['comment'] = nl2br(str_replace(array('<', '>'), array('&lt;', '&gt;'), $this->data['Order']['comment']));
			    $this->set('data', $this->data);
			    $this->set('aCartItems', $aCartItems);
			    $this->set('total', $total);
			    $this->set('orderID', $orderID);

			    $this->SiteEmail->send();
				return $this->redirect('/cart/success/'.$orderID);
			} else {
				$this->aErrFields['Order'] = $this->Order->invalidFields();
			}
		}
		$sum = 0;
		foreach($this->getCartItems() as $article) {
			$id = $article['Article']['id'];
			$_sum = $article['Article']['price'] * $this->cart[$id];
			$sum+= $_sum;
		}
		$this->set('total', $sum);
	}

	function success($id = 0) {
		if (!$id) {
			$this->redirect('/cart/');
			return;
		}
		$this->set('orderID', $id);
	}
}
