
							<?=$this->element('title', array('title' => $page_title))?>
							<div class="main_col_c">
								<div class="main_col_c_in">
<?
	if (!$aArticles) {
?>
	<div>
		<b>Не найдено ни одного продукта</b>
		<p>
			Пож-ста, измените параметры поиска или нажмите
			<a href="/products/"><?__('here');?></a>,
			чтобы просмотреть весь каталог продукции.
		</p>
	</div>
<?
	} else {
?>
									<ul class="main_news_list">
<?
		foreach($aArticles as $article) {
			$this->ArticleVars->init($article, $url, $title, $teaser, $src, '274x150');
?>
										<li class="main_news_li">
											<div class="short_article_h"><a href="<?=$url?>"><?=$title?></a></div>
<?
			if ($src) {
?>
											<div class="main_col_img product_index"><a href="<?=$url?>"><img src="<?=$src?>" alt="<?=$title?>" /></a></div>
<?
			}
?>

											<div class="short_article_t">
												<?=$this->element('prices', array('price' => $article['Article']['price']))?>
												<?=$this->element('add_cart', array('article' => $article))?>
												<p><?=$teaser?></p>
											</div>
											<?//=$this->element('more', array('url' => $url))?>
										</li>
<?
		}
?>
									</ul>
<?
	if (isset($directSearch) && $directSearch) {
		echo $this->element('pagination2', array('filterURL' => $aFilters['url']));
	} else {
		echo $this->element('pagination', array('objectType' => 'products'));
	}
?>
								</div>
							</div>


<?
	}
?>
