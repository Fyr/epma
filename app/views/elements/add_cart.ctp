<?
	if ($article['Article']['price']) {
		$id = $article['Article']['id'];
		$qty = (isset($aCartQty[$id])) ? $aCartQty[$id] : '';
?>
	<p id="cart_<?=$id?>">
		Кол-во <input type="text" autocomplete="off" class="cart-qty" name="qty[]" value="<?=($qty) ? $qty : 1?>" <?=($qty) ? 'disabled="disabled"' : '' ?> />
		<button type="button" class="search_submit add-cart" onclick="addCart(<?=$id?>)" style="<?=(!$qty) ? '' : 'display: none;'?>"><img src="/core/img/icons/add.gif" alt="" /> В корзину</button>
		<button type="button" class="search_submit in-cart" onclick="gotoCart()" style="<?=($qty) ? '' : 'display: none;'?>"><img src="/core/img/icons/right.gif" alt="" /> К заказу</button>
	</p>
<?
	}

