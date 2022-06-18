<?PHP exit('请支持正版 - 站拽设计 http://addon.discuz.com/?@57900.developer');?>
<!--{if $list['threadcount']}-->
	<!--{loop $list['threadlist'] $key $thread}-->
		<!--{eval require_once(DISCUZ_ROOT."./source/function/function_post.php");}-->
		<!--{eval $from_forum = C::t('forum_forum')->fetch_info_by_fid($thread['fid']);}--> 
        <!--{eval $thread['name'] = $from_forum['name'];}--> 
        <!--{eval $messages = DB::result(DB::query("SELECT message FROM ".DB::table('forum_post')." WHERE `tid`= '$thread[tid]' AND first = 1"));}-->
		<!--{eval $message = messagecutstr($messages,140);}-->
<li id="$thread[id]" class="zhanzhuai-post-list"{if $_G['hiddenexists'] && $thread['hidden']} style='display:none'{/if}>
      <div class="post-form cl">
          <span class="post-form-name z">来自: 
		      <a href="forum.php?mod=forumdisplay&fid=$thread[fid]" target="_blank">$thread['name']</a>
              <!--{if !$thread['forumstick'] && $thread['closed'] > 1 && ($thread['isgroup'] == 1 || $thread['fid'] != $_G['fid'])}-->
				  <!--{eval $thread[tid]=$thread[closed];}-->
			  <!--{/if}-->
				   $thread[typehtml] $thread[sorthtml]
			  <!--{if $thread['moved']}-->
					{lang thread_moved}:<!--{eval $thread[tid]=$thread[closed];}-->
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
				      <span class="digest_$thread[digest]" title="精华$thread[digest]">精$thread[digest]</span>
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
             <a href="forum.php?mod=viewthread&tid=$thread[tid]&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra"$thread[highlight]{if $thread['isgroup'] == 1 || $thread['forumstick']} target="_blank"{else} onclick="atarget(this)"{/if} class="s">$thread[subject]</a><!--{if $_G['setting']['threadhidethreshold'] && $thread['hidden'] >= $_G['setting']['threadhidethreshold']}-->&nbsp;<span class="xg1">{lang hidden}</span>&nbsp;<!--{/if}--><!--{if $view == 'hot'}-->&nbsp;<span class="xi1">$thread['heats']{lang guide_attend}</span>&nbsp;<!--{/if}-->
			
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
<!--{else}-->
	<div class="zhanzhuai_noreplythread">
         <span></span>
         <p>{lang guide_nothreads}， <a onclick="showWindow('nav', this.href, 'get', 0)" href="forum.php?mod=misc&amp;action=nav">成为第一个吐槽的人</a></p>
    </div>
<!--{/if}-->