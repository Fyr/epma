							<?=$this->element('title', array('title' => $contentArticle['Article']['title']))?>
							<div class="main_col_c">
								<div class="main_col_c_in">
									<div class="main_2_cold">
										<div class="text">
											<?=$this->HtmlArticle->fulltext($contentArticle['Article']['body'])?>
										</div>
									</div>
								</div>
							</div>
<?
	if ($aNews) {
?>
						</div>
						<div class="main_col_block">
							<?=$this->element('title', array('title' => 'Новости компаний'))?>
							<div class="main_col_c">
								<div class="main_col_c_in">
									<ul class="main_news_list">
<?
		foreach($aNews as $article) {
			$this->ArticleVars->init($article, $url, $title, $teaser, $src, '284x150');
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
								</div>
							</div>
<?
	}
?>