
<!--{template common/header}-->

<script type="text/javascript" src="$_G['style']['styleimgdir']/js/jquery.SuperSlide.2.1.1.js"></script>
<style id="diy_style" type="text/css"></style>


<div class="zhanzhuai-container-main cl">

<div class="zhanzhuai-mainleft">
<div class="zhanzhuai-u5e7bu706f cl">
    <div class="wp">
        <div class="slider cl">	
             <!--[diy=zhanzhuai_diy001]--><div id="zhanzhuai_diy001" class="area"></div><!--[/diy]-->
        </div>

        <div class="zhanzhuai-u5e7bu706f-ads cl">
		     <div class="zhanzhuai_notice">
		        <!--[diy=zhanzhuai_gongg]--><div id="zhanzhuai_gongg" class="area"></div><!--[/diy]-->
             </div>
             <div class="f-list"><!--[diy=zhanzhuai_diy002]--><div id="zhanzhuai_diy002" class="area"></div><!--[/diy]--></div>
        </div>
     </div>
</div>

<div class="zhanzhuai-postlist-box">
    <div class="wp cl">	
            <!--{eval include TPLDIR.'/php/forum_data.php';}-->
            <ul class="content cl" style="position: relative;padding-bottom: 42px;"><!--{subtemplate portal/thread_list}--></ul>
            <div class="pagination cl">$multi</div>
    </div>
</div>

</div>

<div class="zhanzhuai-mainright">
    <div class="zhanzhuai_board cl">
        <!--[diy=zhanzhuai_diy003]--><div id="zhanzhuai_diy003" class="area"></div><!--[/diy]-->
	</div>
	<div class="zhanzhuai_followauthors cl">
        <!--[diy=zhanzhuai_diy004]--><div id="zhanzhuai_diy004" class="area"></div><!--[/diy]-->
	</div>
	<div class="zhanzhuai_hotnews p-rfixed cl">
        <!--[diy=zhanzhuai_diy005]--><div id="zhanzhuai_diy005" class="area"></div><!--[/diy]-->
	</div>
    <div class="zhanzhuai_diy_about cl">
	    <!--[diy=zhanzhuai_about ]--><div id="zhanzhuai_about " class="area"></div><!--[/diy]-->
    </div>	
</div>

</div>

<script type="text/javascript" src="misc.php?mod=diyhelp&action=get&type=index&diy=yes&r={echo random(4)}"></script>
<script type="text/javascript">
   jQuery(".slider").hover(function(){ jQuery(this).find(".prev,.next").stop(true,true).fadeTo("show",1) },function(){ jQuery(this).find(".prev,.next").fadeOut() });
   jQuery(".slider").slide({ titCell:".hd ul", mainCell:".bd ul", effect:"left",  autoPlay:true, autoPage:true, trigger:"click",
		mouseOverStop:false,
		startFun:function(){
			var timer = jQuery(".slider .timer");
			timer.stop(true,true).animate({ "width":"0%" },0).animate({ "width":"100%" },3000);
		}
	});

jQuery(function(){
	jQuery(".zhanzhuai_notice").hover(function(){
		window.clearTimeout(status_timer);
	    },function () {
			status_timer=window.setTimeout("status_scroll()",5000);
		});
			status_timer=window.setTimeout("status_scroll()",1000);	
		})
			
	var status_timer;
	function status_scroll(){
		jQuery(".zhanzhuai_notice ul").animate({top:"-46px"},1000,function(){
			 jQuery(".zhanzhuai_notice li:first").appendTo(".zhanzhuai_notice ul");
			 jQuery(".zhanzhuai_notice ul").css("top","0");
		  });
			status_timer=window.setTimeout("status_scroll()",5000);//轮换速度
		}
	function do_status_scroll(n){
		if(n==0){
			jQuery(".zhanzhuai_notice ul").animate({top:"-46px"},1000,function(){
				jQuery(".zhanzhuai_notice li:first").appendTo(".zhanzhuai_notice ul");
				jQuery(".zhanzhuai_notice ul").css("top","0");
			  });
			  }else if(n==1){
				  jQuery(".zhanzhuai_notice li:last").prependTo(".zhanzhuai_notice ul");
				  jQuery(".zhanzhuai_notice ul").css("top","-46px");
				  jQuery(".zhanzhuai_notice ul").animate({top:"0px"},1000);
			  }	
		  }

    var ias = jQuery.ias({
        container: ".content",
        item: ".thread-list",
        pagination: ".pagination",
        next: ".pagination a.nxt", 
    });

    ias.extension(new IASTriggerExtension({
        offset: 5, //设置自动加载 offset-1 次，到 offset-1 页之后需要手动点击才能加载，取消此项则一直为无限加载
    }));

    ias.extension(new IASSpinnerExtension());
    ias.extension(new IASNoneLeftExtension());
</script>

<!--{template common/footer}-->
