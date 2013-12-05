<?=$this->element('title', array('title' => $aArticle['Article']['title']))?>
<div class="main_col_c">
	<div class="main_col_c_in">
		<div class="text">
			<?=$this->HtmlArticle->fulltext($aArticle['Article']['body'])?>
		</div>
		<?=$this->element('more', array('url' => '/news/', 'title' => 'К списку новостей'))?>
	</div>
</div>