<?
	$this->PHCore->css(array('grid/grid', 'jquery.fancybox'));
	$this->PHCore->js(array('jquery.fancybox.js')); //
?>
<script type="text/javascript">
$(document).ready(function(){
	$('.main_col_img a').fancybox({
		padding: 5
	});

});
</script>
<?=$this->element('title', array('title' => $aArticle['Article']['title']))?>
<div class="main_col_c">
	<div class="main_col_c_in">
		<div class="text">
			<?=$this->element('prices', array('price' => $aArticle['Article']['price']))?>
			<b><?__('Brand')?></b> : <?=$aArticle['Brand']['title']?><br />
			<b><?__('Type')?></b> : <?=$aArticle['Category']['title']?><br />
		</div>
									<ul class="main_news_list">
<?
	foreach($aArticle['Media'] as $media) {
		$src = $this->PHMedia->getUrl($media['object_type'], $media['id'], '284x', $media['file'].$media['ext']);
		$orig = $this->PHMedia->getUrl($media['object_type'], $media['id'], 'noresize', $media['file'].$media['ext']);
?>
										<li class="main_news_li">
											<div class="main_col_img"><a href="<?=$orig?>" rel="photoalobum"><img alt="<?=$aArticle['Article']['title']?>" src="<?=$src?>" /></a></div>
										</li>
<?
		}
?>
									</ul>
<?=$this->HtmlArticle->fulltext($aArticle['Article']['body'])?>
<?
	if ($aParamValues) {
?>
	<h3><?__('Tech.parameters')?></h3>
	<table class="grid" cellpadding="0" cellspacing="0">
	<thead>
	<tr>
		<th><?__('Parameter')?></th>
		<th><?__('Value')?></th>
	</tr>
	</thead>
	<tbody>
<?
	$class = '';
	foreach($aParamValues as $param) {
		$class = ($class == 'odd') ? 'even' : 'odd';
?>
	<tr class="gridRow <?=$class?> td">
		<td nowrap="nowrap"><?=$param['Param']['title']?></td>
		<td><b><?=$this->element('param_render', array('plugin' => 'params', 'param' => $param))?></b></td>
	</tr>
<?
	}
?>
	</tbody>
	</table>
<?
	}
?>
	<br />
		<?=$this->element('more', array('url' => '/products/', 'title' => 'К списку запчастей'))?>
	</div>
</div>
