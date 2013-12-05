<?=$this->element('title', array('title' => $aArticle['Article']['title']))?>
<div class="main_col_c">
	<div class="main_col_c_in">
		<div class="text">
			<?=$this->HtmlArticle->fulltext($aArticle['Article']['body'])?>
		</div>
		<?=$this->element('more', array('url' => '/brands/', 'title' => 'К списку брэндов'))?>
	</div>
</div>