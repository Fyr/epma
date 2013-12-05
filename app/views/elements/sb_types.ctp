								<nav class="side_navigation">
									<ul class="side_navi_ul">

<?
	foreach($aTypes['type_'] as $type) {
?>
	<li>
		<div class="side_lvl_1_n"><a id="cat_<?=$type['id']?>" href="javascript:void(0)"><?=$type['title']?></a></div>
<?
		if (isset($aTypes['type_'.$type['id']])) {
			echo '<ul>';
			foreach($aTypes['type_'.$type['id']] as $subtype) {
				$url = $this->Router->catUrl('products', $subtype);
?>
			<li><a href="<?=$url?>"><?=$subtype['title']?></a></li>
<?
			}
			echo '</ul>';
		}
?>
	</li>
<?
	}
?>
									</ul>
								</nav>
<?
	if (isset($cat_autoOpen) && $cat_autoOpen) {
?>
<script type="text/javascript">
$(document).ready(function(){
	$('.side_lvl_1_n a#cat_<?=$cat_autoOpen?>').click();
});
</script>
<?
	}
?>