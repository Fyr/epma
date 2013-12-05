								<form id="searchForm" class="search_form" name="searchForm" action="/products/index/" method="get">
									<div class="search_form_row">
										<label for="filter_Article_title"><?__('Title')?></label>
										<input type="text" id="filter_Article_title" class="search_text" name="data[filter][Article.title]" value="<?=$this->PHA->read($aFilter, 'Article\.title')?>" />
									</div>
									<div class="search_form_row">
										<label for="filter_Article_brand_id"><?__('Brand')?>:</label>
										<div class="ss_container">
											<select id="filter_Article_brand_id" class="ss_select autocompleteOff" name="data[filter][Article.brand_id]">
											<option value="">- <?__('All brands')?> -</option>
<?
	$options = array();
	foreach($aBrandTypes as $article) {
		$id = $article['Article']['id'];
		$title = $article['Article']['title'];
		$options[$id] = $title;
	}
	echo $this->element('options', array('plugin' => 'core', 'options' => $options, 'selected' => $this->PHA->read($aFilter, 'Article\.brand_id')));
?>
											</select>
										</div>
									</div>
									<div class="search_form_row">
										<label for="filter_Article_object_id"><?__('Type')?></label>
										<div class="ss_container">
											<select id="filter_Article_object_id" class="ss_select autocompleteOff" name="data[filter][Article.object_id]">
											<option value="">- <?__('All types')?> -</option>
<?
	echo $this->element('choose_type', array('aTypes' => $aTypes, 'selected' => $this->PHA->read($aFilter, 'Article\.object_id')));
?>
											</select>
										</div>
									</div>
<?
	if ($aTags) {
?>
									<div class="search_form_row">
										<label for="filter_Article_brand_id"><?__('Category')?></label>
										<div class="ss_container">
											<select class="autocompleteOff" name="data[filter][Tag.id]" multiple="multiple" size="3" style="height: auto; width: 187px;">
											<!-- option value="">- <?__('All categories')?> -</option -->
											<?=$this->element('options', array('plugin' => 'core', 'options' => $aTags, 'selected' => $this->PHA->read($aFilter, 'Tag\.id')));?>
											</select>
										</div>
									</div>
<?
	}
?>
									<div class="search_submit_row"><input type="submit" value="Найти" class="search_submit"></div>
								</form>
