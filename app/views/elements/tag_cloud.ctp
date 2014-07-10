<div class="block tag-cloud">
    <div id="tags-not-shown" style="width: <?=TAG_CLOUD_W?>px; height: <?=TAG_CLOUD_H?>px; position: absolute;">
    <?
	    foreach($TagsCloud as $item) {
		    $title = $item['TagcloudLink']['title'];
		    $url = $item['TagcloudLink']['url'];
		    $fontSize = $item['TagcloudLink']['size'];
    ?>
	    <a href="<?=$url?>" style="font-size:<?=$fontSize?>px;"><?=$title?></a>
    <?
	    }
    ?>
    </div>
    <script>
    $(document).ready(function(){
	    $('#tags-not-shown').css('left', '-9999px');
    });
    </script>
</div>