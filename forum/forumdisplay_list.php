<?PHP exit('请支持正版 - 站拽设计 http://addon.discuz.com/?@57900.developer');?>

<!--{if $quicksearchlist && !$_GET['archiveid']}-->
	<!--{subtemplate forum/search_sortoption}-->
<!--{/if}-->

<div id="threadlist" class="tl "{if $_G['uid']} style="position: relative;"{/if}>

  <ul class="trigger-menu">
      <li class="{if $_GET['filter'] == 'author'}active{/if}"><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=author&orderby=dateline"><i class="newthead"></i>{lang latest}</a><span></span></li>
      <li class="{if $_GET['filter'] == 'lastpost'}active{/if}"><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=lastpost&orderby=lastpost"><i class="lastthead"></i>{lang lastpost}</a><span></span></li>
	  <li class="{if $_GET['filter'] == 'heat'}active{/if}"><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=heat&orderby=heats"><i class="hotthead"></i>{lang order_heats}</a><span></span></li>
	  <li class="{if $_GET['filter'] == 'digest'}active{/if}"><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=digest&digest=1"><i class="verythead"></i>{lang digest_posts}</a><span></span></li>

     <div class="zhanzhuai_shuaix y">
	     <a id="atarget" {if $_G['cookie']['atarget'] > 0}onclick="setatarget(-1)" class="atarget_1"{else}onclick="setatarget(1)"{/if} title="{lang new_window_thread}" style="margin-right: 0;"><small></small>{lang new_window}</a>
	     <!--{if empty($_G['forum']['picstyle'])}-->			
	     <!--{else}-->
             <span class="pipe">|</span><a {if empty($_G['cookie']['forumdefstyle'])} href="forum.php?mod=forumdisplay&fid=$_G[fid]&forumdefstyle=yes" class="chked2"{else} href="forum.php?mod=forumdisplay&fid=$_G[fid]&forumdefstyle=no" class="unchk2"{/if} title="{lang view_thread_imagemode}{lang view_thread}"><small></small>图片模式</a>
	     <!--{/if}-->

	  </div>
  </ul>

        <!--{if empty($_G['forum']['picstyle']) || $_G['cookie']['forumdefstyle']}-->
			<script type="text/javascript">var lasttime = $_G['timestamp'];var listcolspan= '{if !$_GET['archiveid'] && $_G['forum']['ismoderator']}6{else}5{/if}';</script>
		<!--{/if}-->
		<div id="forumnew" style="display:none"></div>
		<form method="post" autocomplete="off" name="moderate" id="moderate" action="forum.php?mod=topicadmin&action=moderate&fid=$_G[fid]&infloat=yes&nopost=yes">
			<input type="hidden" name="formhash" value="{FORMHASH}" />
			<input type="hidden" name="listextra" value="$extra" />
				<!--{if (!$simplestyle || !$_G['forum']['allowside'] && $page == 1) && !empty($announcement)}-->
					<div class="zhanzhuai_fgonggao cl" style="padding: 10px 0;">
                        <div class="tlarea cl" style="padding-left: 0;">
							<div class="cl">
								<span class="zhanzhuai_ficn" style="float: left;"><img src="$_G['style']['styleimgdir']/notice.gif" alt="{lang announcement}" /></span>
								<span class="xst" style="float: left;display: block;width: 475px;white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">{lang announcement}: <!--{if empty($announcement['type'])}--><a href="forum.php?mod=announcement&id=$announcement[id]#$announcement[id]" target="_blank">$announcement[subject]</a><!--{else}--><a href="$announcement[message]" target="_blank">$announcement[subject]</a><!--{/if}--></span>
								<span style="float: right;margin-left: 58px;">
                                    <em><a href="home.php?mod=space&uid=$announcement[authorid]" c="1">$announcement[author]</a></em>                                    
                                    <em>$announcement[starttime]</em>
                                </span>
                            </div>
                        </div>
				   </div>
				<!--{/if}-->

           <!--{if empty($_G['forum']['picstyle']) || $_G['cookie']['forumdefstyle']}-->
                <ul class="f-content cl">
		   <!--{/if}-->
				<!--{hook/forumdisplay_filter_extra}-->
				<!--{if $_G['forum_threadcount']}-->
					<!--{if empty($_G['forum']['picstyle']) || $_G['cookie']['forumdefstyle']}-->
						<!--{loop $_G['forum_threadlist'] $key $thread}-->	
						    <!--{eval require_once(DISCUZ_ROOT."./source/function/function_post.php");}-->
						    <!--{eval $from_forum = C::t('forum_forum')->fetch_info_by_fid($thread['fid']);}--> 
                            <!--{eval $thread['name'] = $from_forum['name'];}--> 
                            <!--{eval $messages = DB::result(DB::query("SELECT message FROM ".DB::table('forum_post')." WHERE `tid`= '$thread[tid]' AND first = 1"));}-->
							<!--{eval $message = messagecutstr($messages,140);}-->

							<!--{if $separatepos <= $key + 1}-->
								<!--{ad/threadlist}-->
							<!--{/if}-->

 <li id="$thread[id]" class="zhanzhuai-post-list"{if $_G['hiddenexists'] && $thread['hidden']} style='display:none'{/if}>
      <div class="post-form cl">
	       <!--{if !$_GET['archiveid'] && $_G['forum']['ismoderator']}-->
           <span class="zhanzhuai_f_o z">
           <!--{if $thread['fid'] == $_G[fid]}-->

              <!--{if $thread['displayorder'] <= 3 || $_G['adminid'] == 1}-->
                  <input onclick="tmodclick(this)" type="checkbox" name="moderate[]" value="$thread[tid]" />
               <!--{else}-->
                  <input type="checkbox" disabled="disabled" />
              <!--{/if}-->
           <!--{else}-->
              <input type="checkbox" disabled="disabled" />
           <!--{/if}-->
		   </span>
           <!--{/if}-->
          <span class="post-form-name z">来自: 
		       <!--{hook/forumdisplay_thread $key}-->

		  <!--{if CURMODULE == 'guide'}-->
		      <a href="forum.php?mod=forumdisplay&fid=$thread[fid]" target="_blank">$thread['name']</a>
		  <!--{elseif CURMODULE == 'forumdisplay'}-->
              <a href="forum.php?mod=forumdisplay&fid=$thread[fid]" target="_blank">$thread['name']</a>
            $thread[typehtml] $thread[sorthtml]
               <!--{if $thread['moved']}-->
                   {lang thread_moved}:<!--{eval $thread[tid]=$thread[closed];}-->
               <!--{/if}-->
		  <!--{/if}-->

		  <!--{hook/forumdisplay_author $key}-->
          
		  <!--{if $thread['rushreply']}-->
               &nbsp;--&nbsp;&nbsp;<span>抢楼</span>:
               <!--{if $rushinfo[$thread[tid]]}-->
                    <span id="rushtimer_$thread[tid]"> {lang havemore_special} <span id="rushtimer_body_$thread[tid]"></span> <script language="javascript">settimer($rushinfo[$thread[tid]]['timer'], 'rushtimer_body_$thread[tid]');</script>{if $rushinfo[$thread[tid]]['timertype'] == 'start'} {lang header_start} {else} {lang over} {/if} {lang right_special}</span>
               <!--{/if}-->
          <!--{/if}-->


          </span>
		  <span class="post-form-ico y">
      	        <a href="javascript:;" id="content_$thread[tid]" class="showcontent y" title="{lang content_actions}" onclick="CONTENT_TID='$thread[tid]';CONTENT_ID='$thread[id]';showMenu({'ctrlid':this.id,'menuid':'content_menu'})"></a>

                <!--{if in_array($thread['displayorder'], array(1, 2, 3, 4))}-->
                    <a href="javascript:void(0);" onclick="hideStickThread('$thread[tid]')" class="showhide y" title="{lang hidedisplayorder}">{lang hidedisplayorder}</a></em>
                <!--{/if}-->

				 <!--{if !$_G['setting']['forumdisplaythreadpreview'] && !($thread['readperm'] && $thread['readperm'] > $_G['group']['readaccess'] && !$_G['forum']['ismoderator'] && $thread['authorid'] != $_G['uid'])}-->
                     <!--{if !(!empty($_G['setting']['antitheft']['allow']) && empty($_G['setting']['antitheft']['disable']['thread']) && empty($_G['forum']['noantitheft']))}-->
                         <a class="tdpre y" href="javascript:void(0);" onclick="previewThread('{echo $thread['moved'] ? $thread[closed] : $thread[tid]}', '$thread[id]');">{lang preview}</a>
                     <!--{/if}-->
                <!--{/if}-->

                <!--{if !$thread['forumstick'] && $thread['closed'] > 1 && ($thread['isgroup'] == 1 || $thread['fid'] != $_G['fid'])}-->
                     <!--{eval $thread[tid]=$thread[closed];}-->
                <!--{/if}-->
		  </span>
      </div>
		 
      <div class="post-author cl">	
          <div class="post-author-basic">
		      <a href="home.php?mod=space&uid=$thread[authorid]" c="1">
			     <!--{avatar($thread[authorid],middle)}-->
				 <span class="author-name">
                      <!--{if $thread['authorid'] && $thread['author']}-->
                        $thread[author]<!--{if !empty($verify[$thread['authorid']])}--> $verify[$thread[authorid]]<!--{/if}-->
                      <!--{else}-->
                           $_G[setting][anonymoustext]
                      <!--{/if}-->
				 </span>
			  </a>
		  </div>		       
		  <div class="post_dateline">$thread[dateline]</div>	
		  <div class="icons y">
		       <!--{if !$thread['forumstick'] && ($thread['isgroup'] == 1 || $thread['fid'] != $_G['fid'])}-->
                    <!--{if $thread['related_group'] == 0 && $thread['closed'] > 1}-->
                         <!--{eval $thread[tid]=$thread[closed];}-->
                    <!--{/if}-->
                    <!--{if $groupnames[$thread[tid]]}-->
                         <span class="fromg">{lang from}群组版块: <a href="forum.php?mod=group&fid={$groupnames[$thread[tid]][fid]}" target="_blank">{$groupnames[$thread[tid]][name]}</a></span>
                    <!--{/if}-->
               <!--{/if}-->
		       <!--{if $thread[icon] >= 0}-->
                   <img src="{STATICURL}image/stamp/{$_G[cache][stamps][$thread[icon]][url]}" alt="{$_G[cache][stamps][$thread[icon]][text]}" align="absmiddle" />
               <!--{/if}-->
		       <a href="forum.php?mod=viewthread&tid=$thread[icontid]&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra" title="{if $thread['displayorder'] == 1}{lang thread_type1} - {/if}
					{if $thread['displayorder'] == 2}{lang thread_type2} - {/if}
					{if $thread['displayorder'] == 3}{lang thread_type3} - {/if}
					{if $thread['displayorder'] == 4}{lang thread_type4} - {/if}
					{if $thread[folder] == 'lock'}{lang closed_thread} - {/if}
					{if $thread['special'] == 1}{lang thread_poll} - {/if}
					{if $thread['special'] == 2}{lang thread_trade} - {/if}
					{if $thread['special'] == 3}{lang thread_reward} - {/if}
					{if $thread['special'] == 4}{lang thread_activity} - {/if}
					{if $thread['special'] == 5}{lang thread_debate} - {/if}
					{if $thread[folder] == "new"}{lang have_newreplies} - {/if}
					{lang target_blank}" target="_blank" class="{if $thread['displayorder'] == 4}displayorder_4{/if}{if $thread['displayorder'] == 3}displayorder_3{/if}{if $thread['displayorder'] == 2}displayorder_2{/if}{if $thread['displayorder'] == 1}displayorder_1{/if}">
					<!--{if $thread[folder] == 'lock'}-->
						<span>已锁</span>
					<!--{elseif $thread['special'] == 1}-->
						<span>投票</span>
					<!--{elseif $thread['special'] == 2}-->
						<span>{lang thread_trade}</span>
					<!--{elseif $thread['special'] == 3}-->
						<span>悬赏</span>
					<!--{elseif $thread['special'] == 4}-->
						<span>活动</span>
					<!--{elseif $thread['special'] == 5}-->
						<span>辩论</span>
					<!--{elseif in_array($thread['displayorder'], array(1, 2, 3, 4))}-->
					    <span class="stick_$thread[displayorder]">顶$thread[displayorder]</span>
					<!--{else}-->
						<span>新窗</span>
					<!--{/if}-->
				</a>

				<!--{if $thread['digest'] > 0 && $filter != 'digest'}-->
				      <span class="digest_$thread[digest]" title="精华$thread[displayorder]">精$thread[displayorder]</span>
                <!--{/if}-->

				<!--{if $thread['attachment'] == 2}-->
                    <span class="image_s" title="有图">图片</span>
                <!--{elseif $thread['attachment'] == 1}-->
                    <span class="image_s" title="有附件">附件</span>
                <!--{/if}-->

			   <!--{if $thread['displayorder'] == 0}-->
                    <!--{if $thread[recommendicon] && $filter != 'recommend'}-->
                           <span class="recommend">推荐</span>
                    <!--{/if}-->
                    <!--{if $thread[heatlevel]}-->
                          <span class="hot">火</span>
                    <!--{/if}-->
                    <!--{if $thread['rate'] > 0}-->
                          <span class="rate">评分</span>
                    <!--{elseif $thread['rate'] < 0}-->
                          <img src="{IMGDIR}/disagree.gif" align="absmiddle" alt="disagree" title="{lang posts_deducted}" />
                    <!--{/if}-->

                    <!--{if $stemplate && $sortid}-->$stemplate[$sortid][$thread[tid]]<!--{/if}-->
                    <!--{if $thread['readperm']}--> - [{lang readperm} <span class="xw1">$thread[readperm]</span>]<!--{/if}-->
                    <!--{if $thread['price'] > 0}-->
                         <!--{if $thread['special'] == '3'}-->
                              - <a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=specialtype&specialtype=reward$forumdisplayadd[specialtype]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}&rewardtype=1" title="{lang show_rewarding_only}"><span class="xi1">[{lang thread_reward} <span class="xw1">$thread[price]</span> {$_G[setting][extcredits][$_G['setting']['creditstransextra'][2]][unit]}{$_G[setting][extcredits][$_G['setting']['creditstransextra'][2]][title]}]</span></a>
                         <!--{else}-->
                              - [{lang price} <span class="xw1">$thread[price]</span> {$_G[setting][extcredits][$_G['setting']['creditstransextra'][1]][unit]}{$_G[setting][extcredits][$_G['setting']['creditstransextra'][1]][title]}]
                         <!--{/if}-->
                     <!--{elseif $thread['special'] == '3' && $thread['price'] < 0}-->
                          - <a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=specialtype&specialtype=reward$forumdisplayadd[specialtype]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}&rewardtype=2" title="{lang show_rewarded_only}">[{lang reward_solved}]</a>
                     <!--{/if}-->
                     <!--{if $thread['mobile']}-->
					    <span>{lang post_mobile}</span>
					 <!--{/if}-->
			    <!--{/if}-->
             
                    <!--{if $thread['replycredit'] > 0}-->
                       - <span class="xi1">[{lang replycredit} <strong> $thread['replycredit']</strong> ]</span>
                    <!--{/if}-->

                    <!--{hook/forumdisplay_thread_subject $key}-->

              </div>
      </div>
  
      <div class="post-content cl">
	      <!--{eval $zhanzhuai_img = substr($thread[tid], -1); $zhanzhuai_img_jh = DB::fetch_all("SELECT * FROM ".DB::table('forum_attachment_'.$zhanzhuai_img.'')." WHERE `tid`= $thread[tid] AND isimage = '1' ORDER BY `dateline` DESC limit 0 , 1");}-->
		  <!--{if $zhanzhuai_img_jh}-->
          <div class="post-img">
               <!--{loop $zhanzhuai_img_jh $zhanzhuai_imgs}-->
               <!--{eval $piclists = getforumimg($zhanzhuai_imgs[aid], 0, 145, 100);}-->
                   <a href="forum.php?mod=viewthread&tid=$thread[tid]"><img src="$piclists"></a>
               <!--{/loop}-->
          </div>
		  <!--{/if}-->
          <div class="post-profile cl">
		     	  <div class="post-tit cl">
          <h1>
             <a href="forum.php?mod=viewthread&tid=$thread[tid]&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra"$thread[highlight]{if $thread['isgroup'] == 1 || $thread['forumstick']} target="_blank"{else} onclick="atarget(this)"{/if} class="s">$thread[subject]</a>
			<!--{if $thread[multipage]}--><span class="tps">$thread[multipage]</span><!--{/if}-->
			 <!--{if $_G['setting']['threadhidethreshold'] && $thread['hidden'] >= $_G['setting']['threadhidethreshold']}--><span class="xg1">{lang hidden}</span>&nbsp;<!--{/if}-->
          </h1>
	  </div>
             $message
          </div>
      </div>

	  <div class="post-actions cl">
			<span class="post-viem" style="margin-left: 0;">
			   <i class="zhanzhuai-icons"></i><!--{if $thread['isgroup'] != 1}-->$thread[views]<!--{else}-->{$groupnames[$thread[tid]][views]}<!--{/if}--></a>
			</span>

			<span class="post-reply">
			   <i class="zhanzhuai-icons"></i>{$thread[replies]}
			</span>

			<span class="post-fav">
			   <i class="zhanzhuai-icons"></i>{$thread[favtimes]}
			</span>
            
			<span class="post-lastreply y">
			    <!--{if $thread['lastposter']}--><a href="{if $thread[digest] != -2}home.php?mod=space&username=$thread[lastposterenc]{else}forum.php?mod=viewthread&tid=$thread[tid]&page={echo max(1, $thread[pages]);}{/if}" c="1">$thread[lastposter]</a><!--{else}-->$_G[setting][anonymoustext]<!--{/if}-->
			     <em>@</em>
			     <em><a href="{if $thread[digest] != -2 && !$thread[ordertype]}forum.php?mod=redirect&tid=$thread[tid]&goto=lastpost$highlight#lastpost{else}forum.php?mod=viewthread&tid=$thread[tid]{if !$thread[ordertype]}&page={echo max(1, $thread[pages]);}{/if}{/if}">$thread[lastpost]</a></em>
			</span>
       </div>
   </li>



					<!--{/loop}-->
						
						<!--{if $_G['hiddenexists']}-->							
							<div id="hiddenthread"{if $thread['hidden']} class="last"{/if}><a href="javascript:;" onclick="display_blocked_thread()">{lang other_reply_hide}</a></div>
						<!--{/if}-->


			<!--{else}-->
                 <div class="zhanzhuai-waterfall">
	                 <ul id="waterfall" class="waterfall cl">
						 <!--{loop $_G['forum_threadlist'] $key $thread}-->
						 <!--{if $_G['hiddenexists'] && $thread['hidden']}-->
							 <!--{eval continue;}-->
						 <!--{/if}-->
						 <!--{if !$thread['forumstick'] && ($thread['isgroup'] == 1 || $thread['fid'] != $_G['fid'])}-->
							 <!--{if $thread['related_group'] == 0 && $thread['closed'] > 1}-->
								 <!--{eval $thread[tid]=$thread[closed];}-->
							 <!--{/if}-->
						 <!--{/if}-->
						 <!--{eval $waterfallwidth = $_G[setting][forumpicstyle][thumbwidth] + 0; }-->
							
		    <li style="width:{$waterfallwidth}px">
			   <!--{if !$_GET['archiveid'] && $_G['forum']['ismoderator']}-->
				  <div style="position:absolute;margin:1px;padding:2px;background:#FFF;z-index: 199;">
				  <!--{if $thread['fid'] == $_G[fid]}-->
					  <!--{if $thread['displayorder'] <= 3 || $_G['adminid'] == 1}-->
						  <input onclick="tmodclick(this)" type="checkbox" name="moderate[]" value="$thread[tid]" />
					  <!--{else}-->
						  <input type="checkbox" disabled="disabled" />
					  <!--{/if}-->
				  <!--{else}-->
					  <input type="checkbox" disabled="disabled" />
				  <!--{/if}-->
				  </div>
			   <!--{/if}-->
               <a href="forum.php?mod=viewthread&tid=$thread[tid]&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra" {if $thread['isgroup'] == 1 || $thread['forumstick'] || CURMODULE == 'guide'} target="_blank"{else} onclick="atarget(this)"{/if} title="$thread[subject]" class="bor-img">
                   	<!--{if $thread['cover']}-->
						<img src="$thread[coverpath]" alt="$thread[subject]" width="{$_G[setting][forumpicstyle][thumbwidth]}" />
					<!--{else}-->
						<span class="nopic" style="width:{$_G[setting][forumpicstyle][thumbwidth]}px; height:{$_G[setting][forumpicstyle][thumbwidth]}px;"></span>
					<!--{/if}-->
               </a>
           <div class="zhazhuai-tit bgwhite">
		       <!--{hook/forumdisplay_thread $key}-->
               <h6><a href="forum.php?mod=viewthread&tid=$thread[tid]&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra"$thread[highlight]{if $thread['isgroup'] == 1 || $thread['forumstick']} target="_blank"{else} onclick="atarget(this)"{/if} title="$thread[subject]">$thread[subject]</a></h6>
               <p>$_G['forum'][name]</p>
               <div class="zhazhuai-tit-bottom cl">
                    <span class="view"><i class="zhanzhuai-icons"></i><!--{if $thread['isgroup'] != 1}-->$thread[views]<!--{else}-->{$groupnames[$thread[tid]][views]}<!--{/if}--></span>
                    <span class="hits"><i class="zhanzhuai-icons"></i><!--{if $thread[recommends]}-->$thread[recommends]<!--{else}-->0<!--{/if}--></span>
                    <span class="comment"><i class="zhanzhuai-icons"></i>$thread[replies]</span>
               </div>
			   <!--{hook/forumdisplay_author $key}-->
           </div>
                <div class="zf-bottom bgwhite">
                    <div class="user-sta z">
                        <a href="home.php?mod=space&uid=$thread[authorid]" c="1">
                            <span class="user-sta-pic"><!--{avatar($thread[authorid],middle)}--></span>
                            <span class="name">$thread[author]</span>
                        </a>
                    </div>
                    <a class="y time">$thread[dateline]</a>
                </div>
            </li>

							<!--{/loop}-->
						</ul>
                   </div>

						<div id="tmppic" style="display: none;"></div>
						<script type="text/javascript" src="$_G['style']['styleimgdir']/js/redef.js?{VERHASH}"></script>
						<script type="text/javascript" reload="1">
						var wf = {};

						_attachEvent(window, "load", function () {
							if($("waterfall")) {
								wf = waterfall();
							}

							<!--{if $page < $_G['page_next'] && !$subforumonly}-->
								var page = $page + 1,
									maxpage = Math.min($page + 10,$maxpage + 1),
									stopload = 0,
									scrolltimer = null,
									tmpelems = [],
									tmpimgs = [],
									markloaded = [],
									imgsloaded = 0,
									loadready = 0,
									showready = 1,
									nxtpgurl = 'forum.php?mod=forumdisplay&fid={$_G[fid]}&filter={$filter}&orderby={$_GET[orderby]}{$forumdisplayadd[page]}&page=',
									wfloading = "<img src=\"{IMGDIR}/loading.gif\" alt=\"\" width=\"16\" height=\"16\" class=\"vm\" /> {lang onloading}...",
									pgbtn = $("pgbtn").getElementsByTagName("a")[0];

								function loadmore() {
									var url = nxtpgurl + page + '&t=' + parseInt((+new Date()/1000)/(Math.random()*1000));
									var x = new Ajax("HTML");
									x.get(url, function (s) {
										s = s.replace(/\n|\r/g, "");
										if(s.indexOf("id=\"pgbtn\"") == -1) {
											$("pgbtn").style.display = "none";
											stopload++;
											window.onscroll = null;
										}

										s = s.substring(s.indexOf("<ul id=\"waterfall\""), s.indexOf("<div id=\"tmppic\""));
										s = s.replace("id=\"waterfall\"", "");
										$("tmppic").innerHTML = s;
										loadready = 1;
									});
								}

								window.onscroll = function () {
									if(scrolltimer == null) {
										scrolltimer = setTimeout(function () {
											try {
												if(page < maxpage && stopload < 2 && showready && ((document.documentElement.scrollTop || document.body.scrollTop) + document.documentElement.clientHeight + 500) >= document.documentElement.scrollHeight) {
													pgbtn.innerHTML = wfloading;
													loadready = 0;
													showready = 0;
													loadmore();
													tmpelems = $("tmppic").getElementsByTagName("li");
													var waitingtimer = setInterval(function () {
														stopload >= 2 && clearInterval(waitingtimer);
														if(loadready && stopload < 2) {
															if(!tmpelems.length) {
																page++;
																pgbtn.href = nxtpgurl + Math.min(page, $maxpage);
																pgbtn.innerHTML = "{lang next_page_extra}";
																showready = 1;
																clearInterval(waitingtimer);
															}
															for(var i = 0, j = tmpelems.length; i < j; i++) {
																if(tmpelems[i]) {
																	tmpimgs = tmpelems[i].getElementsByTagName("img");
																	imgsloaded = 0;
																	for(var m = 0, n = tmpimgs.length; m < n; m++) {
																		tmpimgs[m].onerror = function () {
																			this.style.display = "none";
																		};
																		markloaded[m] = tmpimgs[m].complete ? 1 : 0;
																		imgsloaded += markloaded[m];
																	}
																	if(imgsloaded == tmpimgs.length) {
																		$("waterfall").appendChild(tmpelems[i]);
																		wf = waterfall({
																			"index": wf.index,
																			"totalwidth": wf.totalwidth,
																			"totalheight": wf.totalheight,
																			"columnsheight": wf.columnsheight
																		});
																	}
																}
															}
														}
													}, 40);
												}
											} catch(e) {}
											scrolltimer = null;
										}, 320);
									}
								};
							<!--{/if}-->

						});

						</script>
					<!--{/if}-->
				<!--{else}-->
						<tbody class="bw0_all"><tr><th colspan="{if !$_GET['archiveid'] && $_G['forum']['ismoderator']}6{else}5{/if}"><p class="emp">{lang forum_nothreads}</p></th></tr></tbody>
					</table><!-- end of table "forum_G[fid]" branch 3/3 -->
				<!--{/if}-->
			<!--{if $_G['forum']['ismoderator'] && $_G['forum_threadcount']}-->
				<!--{template forum/topicadmin_modlayer}-->
			<!--{/if}-->
           <!--{if empty($_G['forum']['picstyle']) || $_G['cookie']['forumdefstyle']}-->
                </ul>
		   <!--{/if}-->
		</form>
	<!--{hook/forumdisplay_threadlist_bottom}-->

</div>

<!--{if $multipage && $filter != 'hot'}-->
	<!--{if !($_G[forum][picstyle] && !$_G[cookie][forumdefstyle])}-->
	<!--{else}-->
		<div id="pgbtn" class="pgbtn"><a href="forum.php?mod=forumdisplay&fid={$_G[fid]}&filter={$filter}&orderby={$_GET[orderby]}{$forumdisplayadd[page]}&{$multipage_archive}&page=$nextpage" hidefocus="true">{lang next_page_extra}</a></div>
	<!--{/if}-->
<!--{/if}-->
		<div class="bw0 pgs cl mt10" style=" margin-top: 20px;">
			<span id="fd_page_bottom">$multipage</span>
			<!--{hook/forumdisplay_postbutton_bottom}-->
		</div>

<!--{if !IS_ROBOT}-->
	<div id="filter_special_menu" class="p_pop" style="display:none" change="location.href='forum.php?mod=forumdisplay&fid=$_G[fid]&filter='+$('filter_special').value">
		<ul>
			<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">{lang all}{lang forum_threads}</a></li>
			<!--{if $showpoll}--><li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=specialtype&specialtype=poll$forumdisplayadd[specialtype]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">{lang thread_poll}</a></li><!--{/if}-->
			<!--{if $showtrade}--><li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=specialtype&specialtype=trade$forumdisplayadd[specialtype]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">{lang thread_trade}</a></li><!--{/if}-->
			<!--{if $showreward}--><li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=specialtype&specialtype=reward$forumdisplayadd[specialtype]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">{lang thread_reward}</a></li><!--{/if}-->
			<!--{if $showactivity}--><li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=specialtype&specialtype=activity$forumdisplayadd[specialtype]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">{lang thread_activity}</a></li><!--{/if}-->
			<!--{if $showdebate}--><li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=specialtype&specialtype=debate$forumdisplayadd[specialtype]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">{lang thread_debate}</a></li><!--{/if}-->
		</ul>
	</div>
	<div id="filter_reward_menu" class="p_pop" style="display:none" change="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=specialtype&specialtype=reward$forumdisplayadd[specialtype]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}&rewardtype='+$('filter_reward').value">
		<ul>
			<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=specialtype&specialtype=reward$forumdisplayadd[specialtype]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">{lang all_reward}</a></li>
			<!--{if $showpoll}--><li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=specialtype&specialtype=reward$forumdisplayadd[specialtype]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}&rewardtype=1">{lang rewarding}</a></li><!--{/if}-->
			<!--{if $showtrade}--><li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=specialtype&specialtype=reward$forumdisplayadd[specialtype]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}&rewardtype=2">{lang reward_solved}</a></li><!--{/if}-->
		</ul>
	</div>
	<div id="filter_dateline_menu" class="p_pop" style="display:none">
		<ul class="pop_moremenu">
			<li>{lang orderby}: 
				<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=author&orderby=dateline$forumdisplayadd[author]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" {if $_GET['orderby'] == 'dateline'}class="xw1"{/if}>{lang list_post_time}</a><span class="pipe">|</span>
				<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=reply&orderby=replies$forumdisplayadd[reply]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" {if $_GET['orderby'] == 'replies'}class="xw1"{/if}>{lang replies}</a><span class="pipe">|</span>
				<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=reply&orderby=views$forumdisplayadd[view]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" {if $_GET['orderby'] == 'views'}class="xw1"{/if}>{lang views}</a>
			</li>
			<li>{lang time}: 
			<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&orderby={$_GET['orderby']}&filter=dateline$forumdisplayadd[dateline]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" {if !$_GET['dateline']}class="xw1"{/if}>{lang all}{lang search_any_date}</a><span class="pipe">|</span>
				<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&orderby={$_GET['orderby']}&filter=dateline&dateline=86400$forumdisplayadd[dateline]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" {if $_GET['dateline'] == '86400'}class="xw1"{/if}>{lang last_1_days}</a><span class="pipe">|</span>
				<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&orderby={$_GET['orderby']}&filter=dateline&dateline=172800$forumdisplayadd[dateline]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" {if $_GET['dateline'] == '172800'}class="xw1"{/if}>{lang last_2_days}</a><span class="pipe">|</span>
				<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&orderby={$_GET['orderby']}&filter=dateline&dateline=604800$forumdisplayadd[dateline]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" {if $_GET['dateline'] == '604800'}class="xw1"{/if}>{lang list_one_week}</a><span class="pipe">|</span>
				<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&orderby={$_GET['orderby']}&filter=dateline&dateline=2592000$forumdisplayadd[dateline]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" {if $_GET['dateline'] == '2592000'}class="xw1"{/if}>{lang list_one_month}</a><span class="pipe">|</span>
				<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&orderby={$_GET['orderby']}&filter=dateline&dateline=7948800$forumdisplayadd[dateline]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" {if $_GET['dateline'] == '7948800'}class="xw1"{/if}>{lang list_three_month}</a>
			</li>
		</ul>
	</div>
	<!--{if !$_G['setting']['closeforumorderby']}-->
	<div id="filter_orderby_menu" class="p_pop" style="display:none">
		<ul>
			<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">{lang list_default_sort}</a></li>
			<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=author&orderby=dateline$forumdisplayadd[author]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">{lang list_post_time}</a></li>
			<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=reply&orderby=replies$forumdisplayadd[reply]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">{lang replies}</a></li>
			<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=reply&orderby=views$forumdisplayadd[view]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">{lang views}</a></li>
			<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=lastpost&orderby=lastpost$forumdisplayadd[lastpost]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">{lang lastpost}</a></li>
			<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=heat&orderby=heats$forumdisplayadd[heat]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">{lang order_heats}</a></li>
		</ul>
	</div>
	<!--{/if}-->
	<div id="filter_time_menu" class="p_pop" style="display:none">
		<ul>
			<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&orderby={$_GET['orderby']}&filter=dateline$forumdisplayadd[dateline]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" {if !$_GET['dateline']}class="xw1"{/if}>{lang all}{lang search_any_date}</a></li>
			<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&orderby={$_GET['orderby']}&filter=dateline&dateline=86400$forumdisplayadd[dateline]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" {if $_GET['dateline'] == '86400'}class="xw1"{/if}>{lang last_1_days}</a></li>
			<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&orderby={$_GET['orderby']}&filter=dateline&dateline=172800$forumdisplayadd[dateline]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" {if $_GET['dateline'] == '172800'}class="xw1"{/if}>{lang last_2_days}</a></li>
			<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&orderby={$_GET['orderby']}&filter=dateline&dateline=604800$forumdisplayadd[dateline]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" {if $_GET['dateline'] == '604800'}class="xw1"{/if}>{lang list_one_week}</a></li>
			<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&orderby={$_GET['orderby']}&filter=dateline&dateline=2592000$forumdisplayadd[dateline]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" {if $_GET['dateline'] == '2592000'}class="xw1"{/if}>{lang list_one_month}</a></li>
			<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&orderby={$_GET['orderby']}&filter=dateline&dateline=7948800$forumdisplayadd[dateline]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" {if $_GET['dateline'] == '7948800'}class="xw1"{/if}>{lang list_three_month}</a></li>
		</ul>
	</div>
<!--{/if}-->