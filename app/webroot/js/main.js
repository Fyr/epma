$(function(){
	/*** BANNER SLIDESHOW ***/
	function caruselGo(x){
		var d,s,h,f,l,n;
		d=x.data('direction');
		s=parseInt(x.data('speed'));
		h=parseInt(x.data('hold'));
		f=x.find('li').first();
		l=x.find('li').last();
		n=1;
		if(d=='l') n=-1;
		x.stop().animate({'marginLeft':parseInt(x.css('marginLeft'))-100*(n)+'px'},2000/s, 'linear',function(){
			if(d=='r'){
				x.css('marginLeft',parseInt(x.css('marginLeft'))+f.width()+'px');
				f.clone().insertAfter(l);
				f.remove();
			}
			if(d=="l"){
				x.css('marginLeft',parseInt(x.css('marginLeft'))-l.width()+'px');
				l.clone().insertBefore(f);
				l.remove();
			}
			if(s>1 && h==0) {x.data('speed',s-3)}
			caruselGo(x);		
		})
	}
	if($('.partners_carusel').length){
		var x=$('.partners_carusel');
		var h=x.html();	
		x.css('marginLeft',x.width()*(-1)+'px').append(h).prepend(h).data({'direction':'r','speed':'1'});
		caruselGo(x)
		$('.p_prev, .p_next').click(function(e){
			e.preventDefault()
		}).mousedown(function(){
			var d='l';
			if($(this).hasClass('p_next')) d="r";
			x.stop().data({'direction':d,'speed':'7'})
			caruselGo(x)
		}).mousehold(function(i) {
			x.data({'hold':'1'})
		}).mouseup(function(){
			x.data({'hold':'0'})
		}).mouseout(function(){
			x.data({'hold':'0'})
		})
	}

	$('.side_lvl_1_n a').click(function(e){
		e.preventDefault();
		$(this).parents("li").toggleClass('clicked').find('ul').slideToggle()
	})

	$('.ss_select').sb();

	var nw=0;


	$('.main_col_h').each(function(){
		var x=$(this).find('h1').width();
		if(x<280) $(this).addClass('width_5');
		if(x>=280 && x<360) $(this).addClass('width_4');
		if(x>=360 && x<445) $(this).addClass('width_3');
		if(x>=445 && x<565) $(this).addClass('width_2');
		if(x>=565 && x<620) $(this).addClass('width_1');
		if(x>=620) $(this).addClass('width_0');
	})

	$('.main_news_list .main_news_li:nth-child(odd) .short_article_h').each(function(){
		if($(this).parents('.brand_list').length) return false;
		if($(this).parents('.main_news_li').next().find('.short_article_h').height()>$(this).height()){$(this).height($(this).parents('.main_news_li').next().find('.short_article_h').height())}
		else $(this).parents('.main_news_li').next().find('.short_article_h').height($(this).height());
	})



})
