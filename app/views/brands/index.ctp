<style type="text/css">
.main_col_img {
	float: left;
	margin-right: 10px;
	margin-bottom: 10px;
}
</style>
							<?=$this->element('title', array('title' => __('Brands', true)))?>
							<div class="main_col_c">
								<div class="main_col_c_in">
									<ul class="main_news_list brand_list">
<?
		foreach($aArticles as $article) {
			$this->ArticleVars->init($article, $url, $title, $teaser, $src, '100px');
?>
										<li class="main_news_li">
											<div class="short_article_h"><a href="<?=$url?>"><?=$title?></a></div>
<?
			if ($src) {
?>
											<div class="main_col_img"><a href="<?=$url?>"><img src="<?=$src?>" alt="<?=$title?>" /></a></div>
<?
			}
?>

											<div class="short_article_t">
												<p><?=$teaser?></p>
											</div>
											<?=$this->element('more', array('url' => $url))?>
										</li>
<?
		}
?>
									</ul>
									<?=$this->element('pagination', array('objectType' => 'Brand'))?>
								</div>
							</div>

