<?
			if ($price) {
?>
												<p class="price">
												<?=PU_.$price._PU?><br/>
												<?=PU2_.str_replace('|', PU_DIV, number_format(round($price * RUR_COURSE), 0, '.', '|'))._PU2?>
												</p>
<?
			}

