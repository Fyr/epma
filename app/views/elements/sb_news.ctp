<?
	$this->ArticleVars->init($article, $url, $title, $teaser, $src, '284x');
?>
								<div class="side_content_text">
									<ul class="side_news">
										<li class="side_news_li">
											<div class="short_article_h"><a href="<?=$url?>"><?=$title?></a></div>
											<div class="short_article_t">
												<p><?=$teaser?></p>
											</div>
											<?=$this->element('more', array('url' => $url))?>
										</li>
									</ul>
								</div>