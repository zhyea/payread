<?PHP exit('请支持正版 - 站拽设计 http://addon.discuz.com/?@57900.developer');?>	

<div class="zz_jianshu_forum cl">
     <div class="zz_jianshu_forumbanner">
	      <img src="$_G['style']['styleimgdir']/zz_jianshu_ficon.png" />
		  <span>
		      今日: $todayposts&nbsp;&nbsp;&nbsp;昨日: $postdata[0]&nbsp;&nbsp;&nbsp;帖子: $posts&nbsp;&nbsp;&nbsp;会员数: $_G['cache']['userstats']['totalmembers']&nbsp;&nbsp;&nbsp;<!--{if $_G['cache']['userstats']['newsetuser']}-->新会员: <a href="home.php?mod=space&username={echo rawurlencode($_G['cache']['userstats']['newsetuser'])}" target="_blank" style=" color: #c7254e;">$_G['cache']['userstats']['newsetuser']</a><!--{/if}-->
          </span>
	 </div>


<div class="zz_jianshu_forum_list">
 <ul class="cl"> 
<!--{loop $catlist $key $cat}-->	
    
   <!--{loop $cat[forums] $forumid}-->
   <!--{eval $forum=$forumlist[$forumid];}-->
   <!--{eval $forumurl = !empty($forum['domain']) && !empty($_G['setting']['domain']['root']['forum']) ? 'http://'.$forum['domain'].'.'.$_G['setting']['domain']['root']['forum'] : 'forum.php?mod=forumdisplay&fid='.$forum['fid'];}-->
	<li>
		<div class="zhanzhuai-block-icon">
             <!--{if $forum[icon]}-->
				$forum[icon]
			 <!--{else}-->
				<a href="$forumurl"{if $forum[redirect]} target="_blank"{/if}>
				    <img src="{IMGDIR}/forum{if $forum[folder]}_new{/if}.gif" alt="$forum[name]" />
				</a>
			 <!--{/if}-->       
		</div>
		<div class="zhanzhuai-block-content">
			<p class="zhanzhuai-block-name">
			   <a href="$forumurl"{if $forum[redirect]} target="_blank"{/if}{if $forum[extra][namecolor]} style="color: {$forum[extra][namecolor]};"{/if} class="active">$forum[name]</a>
			</p>
			<p class="zhanzhuai-block-description">
			   <!--{if $forum[description]}-->
			       <!--{echo cutstr($forum[description], 60)}-->
			   <!--{else}-->
			       呜呜...暂无专题描述
			   <!--{/if}-->
			</p>
		</div>
		<div class="zhanzhuai-block-ingress"><a href="$forumurl">进入专题</a></div>

		<div class="zhanzhuai-block-count">
			   <!--{if empty($forum[redirect])}-->
			       <span>今日 <!--{if $forum[todayposts] && !$forum['redirect']}-->$forum[todayposts]<!--{else}-->0 篇<!--{/if}--><em style="margin: 0 5px;">&middot;</em>主题 <!--{echo dnumber($forum[posts])}--> 篇</span>
			   <!--{/if}-->
		</div>
		
	    </li>
	<!--{/loop}-->
	
<!--{/loop}-->
</ul>
</div>

</div>

		<div class="wp cl">
			<!--[diy=diy3]--><div id="diy3" class="area"></div><!--[/diy]-->
		</div>

		<!--{if empty($gid) && $_G['setting']['whosonlinestatus']}-->
			<div id="online" class="oll">
				<div class="bm_h" style=" height: 55px;line-height: 55px;background: #fff;border-top: 0;border-right: 0;border-left: 0;margin-bottom: 10px;padding: 0;border-bottom: 1px solid #f0f0f0;">
				<!--{if $detailstatus}-->
					<span class="o"><a href="forum.php?showoldetails=no#online" title="{lang spread}"><img src="{IMGDIR}/collapsed_no.gif" alt="{lang spread}" /></a></span>
					<h3>
						<strong style="font-size: 16px;font-weight: 400;"><a href="home.php?mod=space&do=friend&view=online&type=member">{lang onlinemember}</a></strong>
						<span class="xs1">- <strong>$onlinenum</strong> {lang onlines}
						- <strong>$membercount</strong> {lang index_members}(<strong>$invisiblecount</strong> {lang index_invisibles}),
						<strong>$guestcount</strong> {lang index_guests}
						- {lang index_mostonlines} <strong>$onlineinfo[0]</strong> {lang on} <strong>$onlineinfo[1]</strong>.</span>
					</h3>
				<!--{else}-->
					<!--{if empty($_G['setting']['sessionclose'])}-->
						<span class="o"><a href="forum.php?showoldetails=yes#online" title="{lang spread}"><img src="{IMGDIR}/collapsed_yes.gif" alt="{lang spread}" /></a></span>
					<!--{/if}-->
					<h3>
						<strong>
							<!--{if !empty($_G['setting']['whosonlinestatus'])}-->
								{lang onlinemember}
							<!--{else}-->
								<a href="home.php?mod=space&do=friend&view=online&type=member">{lang onlinemember}</a>
							<!--{/if}-->
						</strong>
						<span class="xs1">- {lang total} <strong>$onlinenum</strong> {lang onlines}
						<!--{if $membercount}-->- <strong>$membercount</strong> {lang index_members},<strong>$guestcount</strong> {lang index_guests}<!--{/if}-->
						- {lang index_mostonlines} <strong>$onlineinfo[0]</strong> {lang on} <strong>$onlineinfo[1]</strong>.</span>
					</h3>
				<!--{/if}-->
				</div>
			<!--{if $_G['setting']['whosonlinestatus'] && $detailstatus}-->
				<dl id="onlinelist" class="bm_c">
					<dt class="ptm pbm bbda">$_G[cache][onlinelist][legend]</dt>
					<!--{if $detailstatus}-->
						<dd class="ptm pbm">
						<ul class="cl">
						<!--{if $whosonline}-->
							<!--{loop $whosonline $key $online}-->
								<li title="{lang time}: $online[lastactivity]">
								<img src="{STATICURL}image/common/$online[icon]" alt="icon" />
								<!--{if $online['uid']}-->
									<a href="home.php?mod=space&uid=$online[uid]">$online[username]</a>
								<!--{else}-->
									$online[username]
								<!--{/if}-->
								</li>
							<!--{/loop}-->
						<!--{else}-->
							<li style="width: auto">{lang online_only_guests}</li>
						<!--{/if}-->
						</ul>
					</dd>
					<!--{/if}-->
				</dl>
			<!--{/if}-->
			</div>
		<!--{/if}-->

		<!--{if empty($gid) && ($_G['cache']['forumlinks'][0] || $_G['cache']['forumlinks'][1] || $_G['cache']['forumlinks'][2])}-->
		<div class="lk" style="border-top: 1px solid #f0f0f0;">
			<div id="category_lk" class="bm_c ptm">
				<!--{if $_G['cache']['forumlinks'][0]}-->
					<ul class="m mbn cl">$_G['cache']['forumlinks'][0]</ul>
				<!--{/if}-->
				<!--{if $_G['cache']['forumlinks'][1]}-->
					<div class="mbn cl">
						$_G['cache']['forumlinks'][1]
					</div>
				<!--{/if}-->
				<!--{if $_G['cache']['forumlinks'][2]}-->
					<ul class="x mbm cl">
						$_G['cache']['forumlinks'][2]
					</ul>
				<!--{/if}-->
			</div>
		</div>
		<!--{/if}-->

</div>
