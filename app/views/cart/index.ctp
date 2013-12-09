<?
	$this->PHCore->css(array('grid/grid'));
?>
<style type="text/css">
p.price { margin: 0; font-weight: normal;}
.total p.price { font-weight: bold;}
table.grid { background: #fff; }
</style>
<?=$this->element('title', array('title' => 'Товары в корзине'))?>
<div class="main_col_c">
	<div class="main_col_c_in">

<?
	if (isset($aCartItems) && $aCartItems) {
?>
	<p>В таблице показаны товары, которые вы выбрали для покупки.</p>
	<p>Кликните <a href="/product/">сюда</a>, чтобы вернуться к каталогу товаров.</p>
	<table width="100%" class="grid" cellpadding="0" cellspacing="0">
	<thead>
	<tr>
		<th></th>
		<th>Наименование</th>
		<th>Кол-во</th>
		<th>Цена</th>
		<th>Стоимость</th>
	</tr>
	</thead>
	<tbody>
<?
		$class = ''; $sum = 0; $qty = 0;
		foreach($aCartItems as $article) {
			$class = ($class == 'odd') ? 'even' : 'odd';
			$this->ArticleVars->init($article, $url, $title, $teaser, $src, 'noresize', $featured, $id);
			$qty+= $aCartQty[$id];
			$_sum = $article['Article']['price'] * $aCartQty[$id];
			$sum+= $_sum;
?>
	<tr class="gridRow <?=$class?>" id="cart_<?=$id?>">
		<td>
			<a href="javascript:void(0)" title="Удалить товар из корзины" onclick="delCart(<?=$id?>)"><img src="/core/img/icons/del.gif" alt="" /></a>
		</td>
		<td>
			<a href="<?=$url?>"><?=$title?></a>
		</td>
		<td>
			<input type="text" autocomplete="off" class="cart-qty" name="qty[]" value="<?=$aCartQty[$id]?>" onchange="updateCart(<?=$id?>)" />
		</td>
		<td align="right" nowrap="nowrap"><?=$this->element('prices', array('price' => $article['Article']['price'], 'brief' => 1))?></td>
		<td align="right" nowrap="nowrap"><?=$this->element('prices', array('price' => $_sum, 'brief' => 1))?></td>
	</tr>
<?
		}
		$class = ($class == 'odd') ? 'even' : 'odd';
?>
	<tr class="gridRow <?=$class?> total">
		<td colspan="4" align="right"><b>Итого:</b></td>
		<td align="right" nowrap="nowrap"><?=$this->element('prices', array('price' => $sum))?></td>
	</tr>
	</tbody>
	</table>
	<div style="height: 30px; margin-top: 20px;">
		<button type="button" class="search_submit floatL" onclick="window.location.reload()"><img src="/core/img/icons/table_refresh.png" alt="" /> Обновить</button>
		<button type="button" class="search_submit floatR" onclick="window.location.href='/cart/checkout'"><img src="/core/img/icons/edit.gif" alt="" /> Оформить заказ</button>
	</div>
<?
	} else {
?>
	<br/>
	<p><b>Корзина пуста!</b></p>
	<p>Кликните <a href="/product/">сюда</a>, чтобы вернуться к каталогу товаров</p>

<?
	}
?>
	</div>
</div>