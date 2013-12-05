				<div class="footer_navi">
					<ul class="footer_navi_ul">
<?

	foreach($aBottomLinks as $id => $item) {
		$style = ($id == $currLink) ? ' style="font-weight: bold"' : '';
		$class = ($id == $currLink) ? ' class="current"' : '';
?>
						<li<?=$class?>><a href="<?=$item['href']?>"<?=$style?>><?=$item['title']?></a></li>
<?
	}
?>
					</ul>
				</div>
