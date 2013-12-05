							<?=$this->element('title', array('title' => __('News', true)))?>
							<div class="main_col_c">
								<div class="main_col_c_in">
									<ul class="main_news_list">
<?
		foreach($aArticles as $article) {
			$this->ArticleVars->init($article, $url, $title, $teaser, $src, '284x');
?>
										<li class="main_news_li">
<?
			if ($src) {
?>
											<div class="main_col_img"><a href="<?=$url?>"><img src="<?=$src?>" alt="<?=$title?>" /></a></div>
<?
			}
?>
											<div class="short_article_h"><a href="<?=$url?>"><?=$title?></a></div>
											<div class="short_article_t">
												<p><?=$teaser?></p>
											</div>
											<?=$this->element('more', array('url' => $url))?>
										</li>
<?
		}
?>
									</ul>
									<?=$this->element('pagination2')?>
								</div>
							</div>

