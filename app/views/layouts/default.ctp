<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <?=$this->Html->charset()?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <meta name="language" content="ru" />
	<title><?=$pageTitle?></title>
	<?=$this->element('seo_info', array('plugin' => 'seo', 'data' => $this->PHA->read($this->data, 'SEO')))?>
	<?=$this->Html->css(array('sprites', 'normalize', 'main', 'extra'))?>
	<?=$this->Html->script(array('modernizr-2.6.2.min', 'jquery-1.8.3.min', 'plugins', 'main'))?>
	<?=$scripts_for_layout?>
</head>
<body>
	<div id="page">
		<div id="page_in">
		    <header id="header" class="clearfix">
				<a href="/" class="head_logo"><img src="/img/head_logo.png" alt=""></a>
				<address class="head_address"><span class="head_phone">8 (029) 603-44-99</span><span class="head_street">г. Минск, ул.Кульман 15</span></address>
				<?=$this->element('main_menu')?>
			</header>

			<div id="content" class="clearfix">
				<div class="content_2_cols">
					<div class="side_col">
						<?=$this->element('sidebar_left')?>
					</div>
					<div class="main_col">
						<div class="main_col_block">
							<?=$content_for_layout?>
						</div>
					</div>
				</div>
				<div class="parnters_row">
					<div class="partners_block">
						<div class="side_h">
							<div class="side_h_in">Партнеры</div>
						</div>
						<div class="partners_c">
							<div class="partners_container">
								<div class="partners_wrap">
									<ul class="partners_carusel" data-direction="r" data-speed="1">
<?
	for($i = 1; $i <= 3; $i++) {
		foreach($aBrands as $article) {
			$this->ArticleVars->init($article, $url, $title, $teaser, $src, '120x');
?>
										<li><a href="<?=$url?>"><img src="<?=$src?>" alt="<?=$title?>" style="height: 58px;" /></a></li>
<?
		}
	}
?>
									</ul>
								</div>
								<a href="" class="p_prev"></a>
								<a href="" class="p_next"></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer id="footer">
		<div id="footer_in" class="clearfix">
			<div class="footer_left">
				<a href="/" class="footer_logo"></a>
				<div class="footer_address">
					<address class="footer_phone"> 8 (029) 603-44-99</address>
					<div class="footer_street">г. Минск, ул.Кульман 15</div>
				</div>
			</div>
			<div class="footer_right">
				<?=$this->element('bottom_links')?>
				<div class="cpr" style="font-size: 11px">Разработка сайта: <a href="mailto:fyr@tut.by">fyr@tut.by</a></div>
			</div>
		</div>
	</footer>
</body>
</html>