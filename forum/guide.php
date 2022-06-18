<?PHP exit('请支持正版 - 站拽设计 http://addon.discuz.com/?@57900.developer');?>	
<!--{template common/header}-->

<style type="text/css">

.zhanzhuai_guide_mn {
    width: 680px;
}
.zhanzhuai-guide-tit {
    position: relative;
    width: 680px;
    height: 105px;
}
.zhanzhuai-guide-tit .guide-topico img {
    width: 680px;
    height: 105px;
}
.guide-name-c {
    position: absolute;
    float: left;
    top: 35px;
    left: 95px;
    width: 130px;
    height: 38px;
    line-height: 38px;
    color: #fff;
    cursor: pointer;
}
.zhanzhuai-guide-tit span {
    font-size: 26px;
    color: #fff;
    position: absolute;
    top: 0;
    font-weight: 700;
    left: 0;
}
.zhanzhuai-guide-tit span a {
    display: none;
	color: #fff;
	font-weight: 400;
}
.zhanzhuai-guide-tit span a.a {
    display: block;
}

.zhanzhuai-guide-icons {
position: absolute;
    display: block;
    background: url($_G['style']['styleimgdir']/open_ico.png) no-repeat 0 0;
	top: 11px;
    right: 0;
    width: 16px;
    height: 16px;
}
.zhanzhuai-lists-type {
    width: 100%;
    padding: 10px 0;
    position: absolute;
    top: 37px;
    left: -1px;
    background: #fff;
    z-index: 350;
    box-shadow: 0 0 30px #c3c3c3;
    border-radius: 5px;
	display: none;
}
.zhanzhuai-lists-type a {
    font-size: 14px;
    display: block;
    text-align: center;
}
.zhanzhuai-lists-type a.t-on, .zhanzhuai-lists-type a:hover {
    background: #f7f8fa;
    color: #ec6149;
}

.guide-name-c:hover .zhanzhuai-lists-type {
    display: block;
}

.guide-name-c-right {
    position: absolute;
    top: 35px;
    right: 15px;
    width: 400px;
    height: 38px;
    line-height: 38px;
    color: #fff;
    cursor: pointer;
}

.guide-name-c-right p a {
    line-height: 30px;
	color: #fff;
    font-size: 14px;
}
.guide-name-c-right p a:hover {
    color: #ec6149;
}
.guide-name-c-right p .pipe {
    margin: 0 5px 0 8px;
    color: #eee;
}
.guide-name-c-right em a {
    display: inline-block;
    margin-right: 5px;
	color: #fff;
    font-size: 14px;
}

.zhanzhuai_guide_sd {
    width: 280px;
}
.zhanzhuai_guide_btn img {
    border-radius: 20px;
}


.zhanzhuai-hot-img-list li {
    height: 48px;
    margin-bottom: 15px;
}
.guidenews-img {
    float: left;
    width: 48px;
    height: 48px;
}
.guidenews-img img {
    width: 48px;
    height: 48px;
    border: 1px solid #ddd;
    border-radius: 50%;
}

.guidenews-content {
    float: right;
    width: 218px;
    height: 50px;
    padding-top: 3px;
    overflow: hidden;
}
.guidenews-content {
    font-size: 14px;
    color: #333;
}
.guidenews-content:hover {
    color: #ec6149;
}

</style>

<div class="boardnav" style="margin: 30px auto 0;">
<div id="ct" class="wp cl">
	   <div class="zhanzhuai_guide_mn z cl">
	       <div class="zhanzhuai-guide-tit cl">
		     <div class="guide-topico"><img src="$_G['style']['styleimgdir']/guide-topico{if $view == 'newthread'}1{elseif $view == 'new'}2{elseif $view == 'hot'}3{elseif $view == 'digest'}4{elseif $view == 'sofa'}5{else}6{/if}.png"></div>
			 
			 <div class="guide-name-c">
			     <span class="guide-name">
			        <a $currentview['hot'] href="forum.php?mod=guide&view=hot">{lang guide_hot}</a>
				    <a $currentview['digest'] href="forum.php?mod=guide&view=digest">{lang guide_digest}</a>
				    <a $currentview['new']href="forum.php?mod=guide&view=new">{lang guide_new}</a>
				    <a $currentview['newthread'] href="forum.php?mod=guide&view=newthread">{lang guide_newthread}</a>
				    <a $currentview['sofa'] href="forum.php?mod=guide&view=sofa">{lang guide_sofa}啦</a>
				    <a $currentview['my'] href="forum.php?mod=guide&view=my">{lang guide_my}</a>
                 </span>
				 <i class="zhanzhuai-guide-icons"></i>
				 <div class="zhanzhuai-lists-type">
                     <a class="{if $view == 'newthread'}t-on{/if}" href="forum.php?mod=guide&amp;view=newthread">最新发表</a>
					 <a class="{if $view == 'new'}t-on{/if}" href="forum.php?mod=guide&amp;view=new">最新回复</a>
					 <a class="{if $view == 'hot'}t-on{/if}" href="forum.php?mod=guide&amp;view=hot">最新热门</a>
					 <a class="{if $view == 'digest'}t-on{/if}" href="forum.php?mod=guide&amp;view=digest">最新精华</a>
                     <a class="{if $view == 'sofa'}t-on{/if}" href="forum.php?mod=guide&amp;view=sofa">抢沙发啦</a>
					 <a class="{if $view == 'my'}t-on{/if}" href="forum.php?mod=guide&view=my" >{lang guide_my}</a>					 
                 </div>
              </div>
			  <div class="guide-name-c-right">
			    <!--{if !IS_ROBOT && ($view == 'my')}-->
		           <p class="y">
			          <a href="home.php?mod=space&do=poll&view=me" target="_blank">{lang thread_poll}</a><i class="pipe">&frasl;</i>
			          <a href="home.php?mod=space&do=trade&view=me" target="_blank">{lang thread_trade}</a><i class="pipe">&frasl;</i>
			           <a href="home.php?mod=space&do=reward&view=me" target="_blank">{lang thread_reward}</a><i class="pipe">&frasl;</i>
			           <a href="home.php?mod=space&do=activity&view=me" target="_blank">{lang thread_activity}</a>
		           </p>
                <!--{/if}-->
			    <em class="y" style="margin-right: 10px;"><!--{hook/guide_nav_extra}--></em>
			 </div>
         </div>

			<!--{hook/guide_top}-->
			<!--{if $view == 'index'}-->
				<!--{loop $data $key $list}-->
				<div class="bm bmw">
					<div class="bm_h">
						<a href="forum.php?mod=guide&view=$key" class="y xi2">{lang more} &raquo;</a>
						<h2>
							<!--{if $key == 'hot'}-->{lang guide_hot}<!--{elseif $key == 'digest'}-->{lang guide_digest}<!--{elseif $key == 'newthread'}-->{lang guide_newthread}<!--{elseif $key == 'new'}-->{lang guide_new}<!--{elseif $key == 'my'}-->{lang guide_my}<!--{/if}-->
						</h2>
					</div>
					 <div class="bm_c">
					 	<div class="xl xl2 cl">
					 		<!--{if $list['threadcount']}-->
					 			<!--{eval $i=0;}-->
					 			<!--{loop $list['threadlist'] $thread}-->
					 			<!--{eval $i++;$newtd=$i%2;}-->
					 			<li{if !$newtd} class="xl2_r"{/if}>
						 			<em>
							 			<!--{if $key == 'hot'}--><span class="xi1">$thread['heats']{lang guide_attend}</span><!--{/if}-->
							 			<!--{if $key == 'new'}-->$thread['lastpost']<!--{/if}-->
						 			</em>
						 			
						 			<i>&middot; <a href="forum.php?mod=viewthread&tid=$thread[tid]&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra"$thread[highlight] target="_blank">$thread[subject]</a></i>&nbsp;<span class="xg1"><a href="forum.php?mod=forumdisplay&fid=$thread[fid]" target="_blank">$list['forumnames'][$thread[fid]]['name']</a></span>
					 			</li>
					 			<!--{/loop}-->
					 		<!--{else}-->
									<div class="zhanzhuai_noreplythread">
                                        <span></span>
                                        <p>{lang guide_nothreads}，成为第一个吐槽的人</p>
                                    </div>
					 		<!--{/if}-->
					 	</div>
					</div>
				</div>
				<!--{/loop}-->
			<!--{else}-->
				<!--{loop $data $key $list}-->
				<div id="threadlist" class="zhanzhuai_t1 tl"{if $_G['uid']} style="position: relative;"{/if}>
					<div class="zhanzhuai_group">
						<div id="forumnew" style="display:none"></div>
						<ul><!--{subtemplate forum/guide_list_row}--></ul>
					</div>
				
				<!--{/loop}-->
				</div>
			<!--{/if}-->
			<!--{hook/guide_bottom}-->

            <div class="bm bw0 zhanzhuai_g_m pgs cl" style="margin-top: 20px;">
	            $multipage
            </div>
      </div>
      <div class="zhanzhuai_guide_sd y cl">
	       <div class="zhanzhuai_guide_btn cl">
		       <a onclick="showWindow('nav', this.href, 'get', 0)" href="forum.php?mod=misc&amp;action=nav">
			      <img src="$_G['style']['styleimgdir']/guide-post-btn.png" alt="{lang send_posts}" />
			   </a>
		   </div>
		   <!--{eval include TPLDIR.'/php/forum_data.php';}-->         
		   <!--{if $guidethread_list > 0}-->
		   <div class="zhanzhuai-hot-img-list" style="margin-top: 20px;margin-bottom: 0">
		        <p class="news-title"><span>社区精华</span></p>
				<ul class="cl">
				    <!--{loop $guidethread_list $key $guidepost_list}-->
					<!--{eval $listnum = $key + 1;}-->
                    <!--{eval $zhanzhuaibzz_pic = substr($guidepost_list[tid], -1); $guidethreadpic = DB::fetch_all("SELECT * FROM ".DB::table('forum_attachment_'.$zhanzhuaibzz_pic.'')." WHERE `tid`= $guidepost_list[tid] AND isimage = '1' ORDER BY `dateline` DESC limit 0 , 1");}-->
                    <li class="zhanzhuai_$listnum">
                        <a href="forum.php?mod=viewthread&tid=$guidepost_list[tid]" target="_blank">
	                         <div class="guidenews-img"> 
	                              <!--{loop $guidethreadpic $zhanzhuaibzz_pic}-->
			                           <!--{eval $tupian = getforumimg($zhanzhuaibzz_pic[aid], 0, 48, 48); }-->   		          
			                           <img src="$tupian" alt="$guidepost_list[subject]" />
                                  <!--{/loop}-->
	                         </div>
	                         <div class="guidenews-content"><!--{echo cutstr($guidepost_list[subject], 40)}--></div>
                        </a>
                    </li>
                    <!--{/loop}-->
			   </ul>
          </div> 
		  <!--{/if}-->

		  <!--{if $hot_thread_list > 0}-->
		  <div class="zhanzhuai_hotnews zhanzhuai-rfixed cl" style="margin-top: 20px;">
		        <h2>最新回复</h2>
				<ul>
				    <!--{loop $hot_thread_list $hot_post_list}-->
                       <li>
                           <i></i>
                           <a href="forum.php?mod=viewthread&tid=$hot_post_list[tid]" target="_blank">
	                           <em class="c-infotime"><!--{echo dgmdate($hot_post_list[lastpost], 'u', '9999', getglobal('setting/dateformat'))}--></em>
	                           <div class="c-infotitle"><!--{echo cutstr($hot_post_list[subject], 40)}--></div>
	                       </a>
                           <p></p>
                       </li>
                    <!--{/loop}-->
			   </ul>
          </div> 
		  <!--{/if}-->
	 </div>
</div>


<!--{template common/footer}-->