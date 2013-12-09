<?
	if ($price) {
		$price2 = str_replace('|', PU_DIV, number_format(round($price * RUR_COURSE), 0, '.', '|'));
		if (isset($brief) && $brief) {
			echo $price.'<br/>'.$price2;
		} else {
?>
	<p class="price">
		<?=PU_.$price._PU?><br/>
		<?=PU2_.$price2._PU2?>
	</p>
<?
		}
	}

