Вы получили новый заказ с <?=DOMAIN_TITLE?><br />
<br />
Дата: <?=date('d.m.Y H:i')?><br />
Заказ: #<?=$orderID?><br />
Имя: <?=$data['Order']['username']?><br />
<? __('E-mail')?>: <a href="mailto:<?=$data['Order']['email']?>"><?=$data['Order']['email']?></a><br />
Тел.: <?=$data['Order']['phone']?><br />
<br />
<table class="pad5" cellpadding="0" cellspacing="0">
<tr>
	<th>Наименование</th>
	<th>Кол-во</th>
	<th>Цена</th>
</tr>
<?
	foreach($aCartItems as $article) {
		$this->ArticleVars->init($article, $url, $title, $teaser, $src, 'noresize', $featured, $id);
?>
<tr>
	<td>
		<a href="http://<?=DOMAIN_NAME.$url?>"><?=$title?></a>
	</td>
	<td align="right"><?=$aCartQty[$id]?></td>
	<td align="right"><?=$this->element('prices', array('price' => $article['Article']['price'], 'brief' => 1))?></td>
</tr>
<?
	}
?>
</table>
<br/>
<b>К оплате: <?=$this->element('prices', array('price' => $total))?></b>
<br/>
Комментарий:<br />
<span class="look">
<?=$data['Order']['comment']?>
</span>