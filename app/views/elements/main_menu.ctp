				<nav class="head_navi">
					<ul class="hn_ul">
<?
	foreach($aMenu as $id => $menu) {
?>
	<li<?=(($id == $currMenu) ? ' class="active"' : '')?>><div class="fix">
		<a href="<?=$menu['href']?>"><?=$menu['title']?></a>
<?
		if (isset($menu['submenu'])) {
?>
		<ul>
<?
			foreach($menu['submenu'] as $i => $submenu) {
?>
			<li><a href="<?=$submenu['href']?>"><?=$submenu['title']?></a></li>
<?
			}
?>
		</ul>
<?
		}
?>
	</div></li>
<?
	}
?>
					</ul>
				</nav>
