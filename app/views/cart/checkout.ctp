<style type="text/css">
#orderForm input, #orderForm textarea {width: 200px; padding: 3px 5px; }
</style>
<?=$this->element('title', array('title' => 'Оформление заказа'))?>
<div class="main_col_c">
	<div class="main_col_c_in" align="center">
<?
	if ($total) {
?>
	<h3>К оплате: </h3>
	<?=$this->element('prices', array('price' => $total))?>
	<p><br/></p>
	<h3>Ваши данные для заказа:</h3>
	<p>Поля, помеченные <span class="required">*</span>, обязательны для заполнения</p>
	<form id="orderForm" action="" method="post">
	<table class="pad5" cellpadding="0" cellspacing="0">
	<?=$this->element('std_input', array('plugin' => 'core', 'caption' => 'Ваше имя', 'required' => 1, 'class' => 'autocompleteOff', 'field' => 'Order.username', 'data' => $this->data))?>
	<?=$this->element('std_input', array('plugin' => 'core', 'caption' => 'Контактный тел.', 'required' => 1, 'class' => 'autocompleteOff', 'field' => 'Order.phone', 'data' => $this->data))?>
	<?=$this->element('std_input', array('plugin' => 'core', 'caption' => 'E-mail', 'required' => 1, 'class' => 'autocompleteOff', 'field' => 'Order.email', 'data' => $this->data))?>
	<?=$this->element('std_input', array('plugin' => 'core', 'caption' => 'Примечание', 'input' => 'textarea', 'field' => 'Order.comment', 'data' => $this->data))?>
	</table>
	<div style="height: 30px; margin-top: 20px;">
		<button type="button" class="search_submit floatL" onclick="gotoCart()"><img src="/core/img/icons/left.gif" alt="" /> К корзине</button>
		<button type="submit" class="search_submit floatR"><img src="/core/img/icons/checked.png" alt="" /> Заказать</button>
	</div>
	</form>
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