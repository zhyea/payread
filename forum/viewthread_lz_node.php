<?PHP exit('请支持正版 - 站拽设计 http://addon.discuz.com/?@57900.developer');?>
<!--{eval
$needhiddenreply = ($hiddenreplies && $_G['uid'] != $post['authorid'] && $_G['uid'] != $_G['forum_thread']['authorid'] && !$post['first'] && !$_G['forum']['ismoderator']);
$postshowavatars = !($_G['setting']['bannedmessages'] & 2 && ($post['memberstatus'] == '-1' || ($post['authorid'] && !$post['username']) || ($post['groupid'] == 4 || $post['groupid'] == 5) || ($post['status'] & 1)));
}-->
<!--{block authorverifys}-->
<!--{loop $post['verifyicon'] $vid}-->
	<a href="home.php?mod=spacecp&ac=profile&op=verify&vid=$vid" target="_blank"><!--{if $_G['setting']['verify'][$vid]['icon']}--><img src="$_G['setting']['verify'][$vid]['icon']" class="vm" alt="$_G['setting']['verify'][$vid][title]" title="$_G['setting']['verify'][$vid][title]" /><!--{else}-->$_G['setting']['verify'][$vid]['title']<!--{/if}--></a>
<!--{/loop}-->
<!--{loop $post['unverifyicon'] $vid}-->
	<a href="home.php?mod=spacecp&ac=profile&op=verify&vid=$vid" target="_blank"><img src="$_G['setting']['verify'][$vid]['unverifyicon']" class="vm" alt="$_G['setting']['verify'][$vid][title]" title="$_G['setting']['verify'][$vid][title]" /></a>
<!--{/loop}-->
<!--{/block}-->
<!--{if $post['first'] &&  $_G['forum_threadstamp']}-->
	<div id="threadstamp"><img src="{STATICURL}image/stamp/$_G[forum_threadstamp][url]" title="$_G[forum_threadstamp][text]" /></div>
<!--{/if}-->
<!--{if empty($post['deleted'])}-->

<!--{if $post['first']}-->

        <div class="works-show-share-bottom ">
            <div class="wp cl" style="position: relative;">
                <div class="labels cl">
                    <span>标签：</span>
		   <!--{if $post['first'] && ($post[tags] || $relatedkeywords) && $_GET['from'] != 'preview'}-->
               <!--{if $post[tags]}-->
					<!--{eval $tagi = 0;}-->
					<!--{loop $post[tags] $var}-->
						<a title="$var[1]" href="misc.php?mod=tag&id=$var[0]" target="_blank">$var[1]</a>
					<!--{eval $tagi++;}-->
					<!--{/loop}-->
			   <!--{/if}-->
			   <!--{if $relatedkeywords}--><span>$relatedkeywords</span><!--{/if}-->
			<!--{else}-->
                     <span>暂无标签</span>
            <!--{/if}-->
		        </div>
            </div>
        </div>

<div class="zhanzhuai_viewthread" style="padding-top: 20px;">
<table id="pid$post[pid]" class="plhin" summary="pid$post[pid]" cellspacing="0" cellpadding="0">
<tr>
	<td class="plc"<!--{if $close_leftinfo}--> style="width:100%"<!--{/if}-->>

		<!--{ad ad_a_pr/thread/a_pr/3/$postcount}-->

		<div class="pct">
			<!--{ad/thread/a_pt/2/$postcount}-->
			<!--{if empty($ad_a_pr_css)}-->
				<style type="text/css">.pcb{margin-right:0}</style>
				<!--{eval $ad_a_pr_css=1;}-->
			<!--{/if}-->

			<!--{if !$post['first'] && $post['replycredit'] > 0}-->
				<div class="cm">
					<h3 class="psth xs1"><span class="icon_ring vm"></span>
						{lang replycredit} <span class="xw1 xs2 xi1">+{$post['replycredit']}</span> {$_G['setting']['extcredits'][$_G['forum_thread']['replycredit_rule']['extcreditstype']][unit]}{$_G['setting']['extcredits'][$_G['forum_thread']['replycredit_rule']['extcreditstype']][title]}
					</h3>
				</div>
			<!--{/if}-->

			<!--{subtemplate forum/viewthread_node_body}-->
		</div>

		<!--{if helper_access::check_module('collection') && !$_G['forum']['disablecollect']}-->
			<!--{if $post['relatecollection']}-->
				<div class="cm">
					<h3 class="psth xs1"><span class="icon_ring vm"></span>{lang collection_related}</h3>
					<ul class="mbw xl xl2 cl">
					<!--{loop $post['relatecollection'] $var}-->
						<li>&middot; <a href="forum.php?mod=collection&action=view&ctid=$var[ctid]" title="$var[name]" target="_blank" class="xi2 xw1">$var[name]</a><span class="pipe">|</span><span class="xg1">{lang collection_threadnum}: $var[threadnum], {lang collection_follow}: $var[follownum]</span></li>
					<!--{/loop}-->
					<!--{if $post['releatcollectionmore']}-->
						<li>&middot; <a href="forum.php?mod=collection&tid=$_G[tid]" target="_blank" class="xi2 xw1">{lang more}</a></li>
					<!--{/if}-->
					</ul>
				</div>
				<!--{if $post['sourcecollection']['ctid']}-->
				<div>
					{lang collection_fromctid}
					<form action="forum.php?mod=collection&action=comment&ctid={$ctid}&tid={$_G[tid]}" method="POST" class="ptm pbm cl">
						<input type="hidden" name="ratescore" id="ratescore" />
						<span class="clct_ratestar">
							<span class="btn">
								<a href="javascript:;" onmouseover="rateStarHover('clct_ratestar_star',1)" onmouseout="rateStarHover('clct_ratestar_star',0)" onclick="rateStarSet('clct_ratestar_star',1,'ratescore')">1</a>
								<a href="javascript:;" onmouseover="rateStarHover('clct_ratestar_star',2)" onmouseout="rateStarHover('clct_ratestar_star',0)" onclick="rateStarSet('clct_ratestar_star',2,'ratescore')">2</a>
								<a href="javascript:;" onmouseover="rateStarHover('clct_ratestar_star',3)" onmouseout="rateStarHover('clct_ratestar_star',0)" onclick="rateStarSet('clct_ratestar_star',3,'ratescore')">3</a>
								<a href="javascript:;" onmouseover="rateStarHover('clct_ratestar_star',4)" onmouseout="rateStarHover('clct_ratestar_star',0)" onclick="rateStarSet('clct_ratestar_star',4,'ratescore')">4</a>
								<a href="javascript:;" onmouseover="rateStarHover('clct_ratestar_star',5)" onmouseout="rateStarHover('clct_ratestar_star',0)" onclick="rateStarSet('clct_ratestar_star',5,'ratescore')">5</a>
							</span>
							<span id="clct_ratestar_star" class="star star$memberrate"></span>
						</span>
						&nbsp;<button type="submit" value="submit" class="pn"><span>{lang collection_rate}</span></button>
					</form>
				</div>
				<!--{/if}-->
			<!--{/if}-->
		<!--{/if}-->
	</td></tr>

<tr>
<td>


   <div class="author-card cl">
       <!--{eval $zhanzhuai_author_count = DB::fetch_first("SELECT * FROM ".DB::table('common_member_count')." WHERE `uid` = '$authorid'");}-->
	   <!--{eval $bio = DB::result(DB::query("SELECT bio FROM ".DB::table('common_member_profile')." WHERE uid = '$thread[authorid]'"));}-->
       <div class="card-media">
            <a href="home.php?mod=space&uid=$_G[forum_thread][authorid]" title="$_G[forum_thread][author]" class="avatar-container-48" target="_blank">
                <!--{avatar($_G[forum_thread][authorid],middle)}-->
            </a>            
			<a href="home.php?mod=space&uid=$_G[forum_thread][authorid]" title="$_G[forum_thread][author]" class="author-name" target="_blank">$_G[forum_thread][author]</a>
            <p>写了&nbsp;$zhanzhuai_author_count['threads']&nbsp;篇文章，拥有财富&nbsp;$zhanzhuai_author_count['extcredits2']，被&nbsp;$zhanzhuai_author_count['follower']&nbsp;人关注</p>

	  <!--{eval $zz_follow = 0;}-->
      <!--{eval $zz_follow = C::t('home_follow')->fetch_all_by_uid_followuid($_G['uid'], $authorid);}-->
      <!--{if !$zz_follow}-->
            <a id="followmod_$authorid" href="home.php?mod=spacecp&ac=follow&op=add&hash={FORMHASH}&fuid=$authorid" class="follow-button" title="关注作者">+&nbsp;关注</a>
      <!--{else}-->
            <a id="followmod_$authorid" href="home.php?mod=spacecp&ac=follow&op=del&hash={FORMHASH}&fuid=$authorid" class="follow-button" title="取消关注">取消关注</a>
      <!--{/if}-->

	</div>
        <!--{if !empty($bio)}--><div class="signature">$bio</div><!--{/if}-->
</div>


   <div class="works-show-share cl">
        <div class="works-show-share-top">
            <div class="wp cl" style="position: relative;">
                <div class="share z">
                     <span>我要分享：</span>
				     <div class="bdsharebuttonbox">
                          <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
						  <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
						  <a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a>
						  <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
					 </div>
					 <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"32"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>

            </div>
         

          	<!--{if ($_G['group']['allowrecommend'] || !$_G['uid']) && $_G['setting']['recommendthread']['status']}-->
				 <!--{if !empty($_G['setting']['recommendthread']['addtext'])}-->
					<div class="zhanzhuai_dzan">
					    
						<a id="recommend_add" href="forum.php?mod=misc&action=recommend&do=add&tid=$_G[tid]&hash={FORMHASH}" {if $_G['uid']}onclick="ajaxmenu(this, 3000, 1, 0, '43', 'recommendupdate({$_G['group']['allowrecommend']})');return false;"{else} onclick="showWindow('login', this.href)"{/if} onmouseover="this.title = $('recommendv_add').innerHTML + ' {lang activity_member_unit}$_G[setting][recommendthread][addtext]'" title="{lang maketoponce}" style="display: block;position: relative;padding-top: 10px;">
						    <span class="bg-zan"></span>
							<i id="recommendv_add">$_G[forum_thread][recommend_add]</i></a>
					</div>
				 <!--{/if}-->
			<!--{/if}-->

            <div class="coll-rep y">
			    <!--{if $post['invisible'] == 0}-->
					<!--{if $post['authorid'] != $_G['uid']}-->
						<a class="icon-article-jb" href="javascript:;" onclick="showWindow('miscreport$post[pid]', 'misc.php?mod=report&rtype=post&rid=$post[pid]&tid=$_G[tid]&fid=$_G[fid]', 'get', -1);return false;"><i class="zhanzhuai-icons"></i>{lang report}</a>
					<!--{/if}-->
				<!--{/if}-->

			    <a class="icon-article-sc" href="home.php?mod=spacecp&ac=favorite&type=thread&id=$_G[tid]&formhash={FORMHASH}" id="k_favorite" onclick="showWindow(this.id, this.href, 'get', 0);" onmouseover="this.title = $('favoritenumber').innerHTML + ' {lang activity_member_unit}{lang thread_favorite}'"><i class="zhanzhuai-icons"></i>收藏</a>
            </div>
         
            </div>
        </div>
  </div>
</td>
</tr>
	<tr>
<td class="plc plm">
		<!--{if $locations[$post[pid]]}-->
			<div class="mobile-location">$locations[$post[pid]][location]</div>
		<!--{/if}-->
		<!--{if !IS_ROBOT && $post['first'] && !$_G['forum_thread']['archiveid']}-->

			<!--{if $post['invisible'] == 0}-->
				<div id="p_btn" class="mtw mbm hm cl" style="margin-top: 10px !important;padding: 0;">
					<!--{if !empty($_G['setting']['pluginhooks']['viewthread_share_method'])}-->
						<div class="tshare cl">
							<b>{lang viewthread_share_to}:&nbsp;</b>
                               <!--{hook/viewthread_share_method}-->
						</div>
					<!--{/if}-->
					<!--{hook/viewthread_useraction}-->

				</div>
			<!--{/if}-->

		<!--{/if}-->

		<!--{if $post['signature'] && ($_G['setting']['bannedmessages'] & 4 && ($post['memberstatus'] == '-1' || ($post['authorid'] && !$post['username']) || ($post['groupid'] == 4 || $post['groupid'] == 5) || ($post['status'] & 1)))}-->
			<div class="sign">{lang member_signature_banned}</div>
		<!--{elseif $post['signature'] && !$post['anonymous'] && $showsignatures}-->
			<div class="sign" style="max-height:{$_G['setting']['maxsigrows']}px;maxHeightIE:{$_G['setting']['maxsigrows']}px;">$post[signature]</div>
		<!--{elseif !$post['anonymous'] && $showsignatures && $_G['setting']['globalsightml']}-->
			<div class="sign">$_G['setting']['globalsightml']</div>
		<!--{/if}-->
		<!--{hook/viewthread_postsightmlafter $postcount}-->
		<!--{ad/thread/a_pb/1/$postcount}-->
	</td>
</tr>
<tr id="_postposition$post['pid']"></tr>
<!--{if !$_G['forum_thread']['archiveid']}-->
<tr>
	<td class="plc zhanzhuai_zt_cz">
		<div class="po hin" style="padding-bottom: 0;">
			<span class="y">
                    <!--{if $_G['group']['raterange'] && $post['authorid']}-->
						<a href="javascript:;" id="ak_rate" onclick="showWindow('rate', 'forum.php?mod=misc&action=rate&tid=$_G[tid]&pid=$post[pid]', 'get', -1);return false;" title="{lang rate_position}"><i><img src="{IMGDIR}/agree.gif" alt="{lang rate}" align="absmiddle"/>{lang rate}</i></a>
					<!--{/if}-->
					<!--{if !$post['anonymous'] && $post['first'] && helper_access::check_module('follow')}-->
						<a class="followp" href="home.php?mod=spacecp&ac=follow&op=relay&tid=$_G[tid]&from=forum" onclick="showWindow('relaythread', this.href, 'get', 0);" title="{lang follow_spread}"><i><img src="{IMGDIR}/rt.png" alt="{lang thread_realy}" align="absmiddle"/>{lang thread_realy}<!--{if $_G['forum_thread']['relay']}--><span id="relaynumber" style="display:none">{$_G['forum_thread']['relay']}</span><!--{/if}--></i></a>
					<!--{/if}-->
					<!--{if $post['first'] && helper_access::check_module('share')}-->
						<a class="sharep" href="home.php?mod=spacecp&ac=share&type=thread&id=$_G[tid]" onclick="showWindow('sharethread', this.href, 'get', 0);" title="{lang share_digest}"><i><img src="{IMGDIR}/oshr.png" alt="{lang thread_share}" align="absmiddle"/>{lang thread_share}<!--{if $_G['forum_thread']['sharetimes']}--><span id="sharenumber">{$_G['forum_thread']['sharetimes']}</span><!--{/if}--></i></a>
					<!--{/if}-->

					<!--{if !$_G['forum']['disablecollect'] && helper_access::check_module('collection')}-->
						<a href="forum.php?mod=collection&action=edit&op=addthread&tid=$_G[tid]" id="k_collect" onclick="showWindow(this.id, this.href);return false;" onmouseover="this.title = $('collectionnumber').innerHTML + ' {lang activity_member_unit}{lang collection}'" title="{lang thread_collect}"><i><img src="{IMGDIR}/collection.png" alt="{lang thread_share}" align="absmiddle"/>{lang collection}<span id="collectionnumber"{if !$post['releatcollectionnum']} style="display:none"{/if}>{$post['releatcollectionnum']}</span></i></a>
					<!--{/if}-->
					<!--{if ($_G['group']['allowrecommend'] || !$_G['uid']) && $_G['setting']['recommendthread']['status']}-->
						<!--{if !empty($_G['setting']['recommendthread']['subtracttext'])}-->
						<a id="recommend_subtract" href="forum.php?mod=misc&action=recommend&do=subtract&tid=$_G[tid]&hash={FORMHASH}" {if $_G['uid']}onclick="ajaxmenu(this, 3000, 1, 0, '43', 'recommendupdate(-{$_G['group']['allowrecommend']})');return false;"{else} onclick="showWindow('login', this.href)"{/if} onmouseover="this.title = $('recommendv_subtract').innerHTML + ' {lang activity_member_unit}$_G[setting][recommendthread][subtracttext]'" title="{lang makebottomonce}"><i><img src="{IMGDIR}/rec_subtract.gif" alt="$_G['setting']['recommendthread'][subtracttext]" align="absmiddle"/>$_G['setting']['recommendthread'][subtracttext]<span id="recommendv_subtract"{if !$_G['forum_thread']['recommend_sub']} style="display:none"{/if}>$_G[forum_thread][recommend_sub]</span></i></a>
						<!--{/if}-->
					<!--{/if}-->
			</span>

			<div class="pob cl">
				<em>
					<!--{if $post['invisible'] == 0}-->
						<!--{if $allowpostreply && $post['allowcomment'] && (!$thread['closed'] || $_G['forum']['ismoderator'])}--><a class="cmmnt" href="forum.php?mod=misc&action=comment&tid=$post[tid]&pid=$post[pid]&extra=$_GET[extra]&page=$page{if $_G['forum_thread']['special'] == 127}&special=$specialextra{/if}" onclick="showWindow('comment', this.href, 'get', 0)">{lang comments}</a><!--{/if}-->
					<!--{if (!$_G['uid'] || $allowpostreply) && !$needhiddenreply}-->
						<!--{if $post['first']}-->
							<a class="fastre" href="forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$_G[tid]&reppost=$post[pid]&extra=$_GET[extra]&page=$page" onclick="showWindow('reply', this.href)">{lang reply}</a>
						<!--{else}-->
							<a class="fastre" href="forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$_G[tid]&repquote=$post[pid]&extra=$_GET[extra]&page=$page" onclick="showWindow('reply', this.href)">{lang reply}</a>
						<!--{/if}-->
					<!--{/if}-->
					<!--{/if}-->
					<!--{if (($_G['forum']['ismoderator'] && $_G['group']['alloweditpost'] && (!in_array($post['adminid'], array(1, 2, 3)) || $_G['adminid'] <= $post['adminid'])) || ($_G['forum']['alloweditpost'] && $_G['uid'] && ($post['authorid'] == $_G['uid'] && $_G['forum_thread']['closed'] == 0) && !(!$alloweditpost_status && $edittimelimit && TIMESTAMP - $post['dbdateline'] > $edittimelimit)))}-->
						<a class="editp" href="forum.php?mod=post&action=edit&fid=$_G[fid]&tid=$_G[tid]&pid=$post[pid]{if !empty($_GET[modthreadkey])}&modthreadkey=$_GET[modthreadkey]{/if}&page=$page"><!--{if $_G['forum_thread']['special'] == 2 && !$post['message']}-->{lang post_add_aboutcounter}<!--{else}-->{lang edit}</a><!--{/if}-->
					<!--{elseif $_G['uid'] && $post['authorid'] == $_G['uid'] && $_G['setting']['postappend']}-->
						<a class="appendp" href="forum.php?mod=misc&action=postappend&tid=$post[tid]&pid=$post[pid]&extra=$_GET[extra]&page=$page" onClick="showWindow('postappend', this.href, 'get', 0)">{lang postappend}</a>
					<!--{/if}-->
					<!--{if $post['first'] && $post['invisible'] == -3}-->
						<!--<a class="psave" href="forum.php?mod=misc&action=pubsave&tid=$_G[tid]">{lang published}</a>-->
					<!--{/if}-->
					<!--{if $post['invisible'] == -2 && !$post['first']}-->
						<span class="xg1">({lang moderate_need})</span>
					<!--{/if}-->
					<!--{if $post['first'] && $allowblockrecommend}--><a class="push" href="javascript:;" onclick="modaction('recommend', '$_G[forum_firstpid]', 'op=recommend&idtype={if $_G[forum_thread][isgroup]}gtid{else}tid{/if}&id=$_G[tid]&pid=$post[pid]', 'portal.php?mod=portalcp&ac=portalblock')">{lang modmenu_blockrecommend}</a><!--{/if}-->
					<!--{if !$_G['forum_thread']['special'] && !$rushreply && !$hiddenreplies && $_G['setting']['repliesrank'] && !$post['first'] && !($post['isWater'] && $_G['setting']['filterednovote'])}-->
					<a class="replyadd" href="forum.php?mod=misc&action=postreview&do=support&tid=$_G[tid]&pid=$post[pid]&hash={FORMHASH}" {if $_G['uid']}onclick="ajaxmenu(this, 3000, 1, 0, '43', '');return false;"{else} onclick="showWindow('login', this.href)"{/if} onmouseover="this.title = ($('review_support_$post[pid]').innerHTML ? $('review_support_$post[pid]').innerHTML : 0) + ' {lang activity_member_unit} {lang support_reply}'">{lang support_reply} <span id="review_support_$post[pid]">$post[postreview][support]</span></a>
					<a class="replysubtract" href="forum.php?mod=misc&action=postreview&do=against&tid=$_G[tid]&pid=$post[pid]&hash={FORMHASH}" {if $_G['uid']}onclick="ajaxmenu(this, 3000, 1, 0, '43', '');return false;"{else} onclick="showWindow('login', this.href)"{/if} onmouseover="this.title = ($('review_against_$post[pid]').innerHTML ? $('review_against_$post[pid]').innerHTML : 0) + ' {lang activity_member_unit} {lang against_reply}'">{lang against_reply} <span id="review_against_$post[pid]">$post[postreview][against]</span></a>
					<!--{/if}-->
					<!--{hook/viewthread_postfooter $postcount}-->

				</em>

				<p>
				<!--{if $post['invisible'] == 0}-->
					<!--{if $_G['setting']['magicstatus']}-->
						<a href="javascript:;" id="mgc_post_$post[pid]" onmouseover="showMenu(this.id)" class="showmenu">{lang thread_magic}</a>
					<!--{/if}-->

					<!--{if $_G['forum_thread']['special'] == 3 && ($_G['forum']['ismoderator'] && (!$_G['setting']['rewardexpiration'] || $_G['setting']['rewardexpiration'] > 0 && ($_G[timestamp] - $_G['forum_thread']['dateline']) / 86400 > $_G['setting']['rewardexpiration']) || $_G['forum_thread']['authorid'] == $_G['uid']) && $post['authorid'] != $_G['forum_thread']['authorid'] && $post['first'] == 0 && $_G['uid'] != $post['authorid'] && $_G['forum_thread']['price'] > 0}-->
						<a href="javascript:;" onclick="setanswer($post['pid'], '$_GET[from]')">{lang reward_set_bestanswer}</a>
					<!--{/if}-->

					<!--{if !$post['first'] && $_G['group']['raterange'] && $post['authorid']}-->
						<a href="javascript:;" onclick="showWindow('rate', 'forum.php?mod=misc&action=rate&tid=$_G[tid]&pid=$post[pid]', 'get', -1);return false;">{lang rate}</a>
					<!--{/if}-->

					<!--{if !empty($postlist[$post[pid]]['totalrate']) && $_G['forum']['ismoderator']}-->
						<a href="forum.php?mod=misc&action=removerate&tid=$_G[tid]&pid=$post[pid]&page=$page" onclick="showWindow('rate', this.href, 'get', -1)">{lang removerate}</a>
					<!--{/if}-->
				<!--{/if}-->

					<!--{hook/viewthread_postaction $postcount}-->
				</p>

				<!--{if $_G['setting']['magicstatus']}-->
					<ul id="mgc_post_$post[pid]_menu" class="p_pop mgcmn" style="display: none;">
					<!--{if $post['first']}-->
						<!--{if !empty($_G['setting']['magics']['bump'])}-->
							<li><a href="home.php?mod=magic&mid=bump&idtype=tid&id=$_G[tid]" id="a_bump" onclick="showWindow(this.id, this.href)"><img src="{STATICURL}image/magic/bump.small.gif" />$_G['setting']['magics']['bump']</a></li>
						<!--{/if}-->
						<!--{if !empty($_G['setting']['magics']['stick'])}-->
							<li><a href="home.php?mod=magic&mid=stick&idtype=tid&id=$_G[tid]" id="a_stick" onclick="showWindow(this.id, this.href)"><img src="{STATICURL}image/magic/stick.small.gif" />$_G['setting']['magics']['stick']</a></li>
						<!--{/if}-->
						<!--{if !empty($_G['setting']['magics']['close'])}-->
							<li><a href="home.php?mod=magic&mid=close&idtype=tid&id=$_G[tid]" id="a_stick" onclick="showWindow(this.id, this.href)"><img src="{STATICURL}image/magic/close.small.gif" />$_G['setting']['magics']['close']</a></li>
						<!--{/if}-->
						<!--{if !empty($_G['setting']['magics']['open'])}-->
							<li><a href="home.php?mod=magic&mid=open&idtype=tid&id=$_G[tid]" id="a_stick" onclick="showWindow(this.id, this.href)"><img src="{STATICURL}image/magic/open.small.gif" />$_G['setting']['magics']['open']</a></li>
						<!--{/if}-->
						<!--{if !empty($_G['setting']['magics']['highlight'])}-->
							<li><a href="home.php?mod=magic&mid=highlight&idtype=tid&id=$_G[tid]" id="a_stick" onclick="showWindow(this.id, this.href)"><img src="{STATICURL}image/magic/highlight.small.gif" />$_G['setting']['magics']['highlight']</a></li>
						<!--{/if}-->
						<!--{if !empty($_G['setting']['magics']['sofa'])}-->
							<li><a href="home.php?mod=magic&mid=sofa&idtype=tid&id=$_G[tid]" id="a_stick" onclick="showWindow(this.id, this.href)"><img src="{STATICURL}image/magic/sofa.small.gif" />$_G['setting']['magics']['sofa']</a></li>
						<!--{/if}-->
						<!--{if !empty($_G['setting']['magics']['jack'])}-->
							<li><a href="home.php?mod=magic&mid=jack&idtype=tid&id=$_G[tid]" id="a_jack" onclick="showWindow(this.id, this.href)"><img src="{STATICURL}image/magic/jack.small.gif" />$_G['setting']['magics']['jack']</a></li>
						<!--{/if}-->
						<!--{hook/viewthread_magic_thread}-->
					<!--{/if}-->
					<!--{if !empty($_G['setting']['magics']['repent']) && $post['authorid'] == $_G['uid'] && !$rushreply}-->
						<li><a href="home.php?mod=magic&mid=repent&idtype=pid&id=$post[pid]:$_G[tid]" id="a_repent_$post[pid]" onclick="showWindow(this.id, this.href)"><img src="{STATICURL}image/magic/repent.small.gif" />$_G['setting']['magics']['repent']</a></li>
					<!--{/if}-->
					<!--{if !empty($_G['setting']['magics']['anonymouspost']) && $post['authorid'] == $_G['uid']}-->
						<li><a href="home.php?mod=magic&mid=anonymouspost&idtype=pid&id=$post[pid]:$_G[tid]" id="a_anonymouspost_$post[pid]" onclick="showWindow(this.id, this.href)"><img src="{STATICURL}image/magic/anonymouspost.small.gif" />$_G['setting']['magics']['anonymouspost']</a><li>
					<!--{/if}-->
					<!--{if !empty($_G['setting']['magics']['namepost'])}-->
						<li><a href="home.php?mod=magic&mid=namepost&idtype=pid&id=$post[pid]:$_G[tid]" id="a_namepost_$post[pid]" onclick="showWindow(this.id, this.href)"><img src="{STATICURL}image/magic/namepost.small.gif" />$_G['setting']['magics']['namepost']</a><li>
					<!--{/if}-->
					<!--{hook/viewthread_magic_post $postcount}-->
					</ul>
					<script type="text/javascript" reload="1">checkmgcmn('post_$post[pid]')</script>
				<!--{/if}-->
			</div>
		</div>
	</td>
</tr>
<!--{/if}-->
<tr class="ad">
	<td class="plc">
		<!--{if $post['first'] && $_G[forum_thread][special] == 5 && $_G[forum_thread][displayorder] >= 0}-->
			<ul class="ttp cl">
				<li style="display:inline;margin-left:12px"><strong class="bw0 bg0_all">{lang debate_filter}: </strong></li>
				<li{if !isset($_GET['stand'])} class="xw1 a"{/if}><a href="forum.php?mod=viewthread&tid=$_G[tid]&extra=$_GET[extra]" hidefocus="true">{lang all}</a></li>
				<li{if $_GET['stand'] == 1} class="xw1 a"{/if}><a href="forum.php?mod=viewthread&tid=$_G[tid]&extra=$_GET[extra]&stand=1" hidefocus="true">{lang debate_square}</a></li>
				<li{if $_GET['stand'] == 2} class="xw1 a"{/if}><a href="forum.php?mod=viewthread&tid=$_G[tid]&extra=$_GET[extra]&stand=2" hidefocus="true">{lang debate_opponent}</a></li>
				<li{if isset($_GET['stand']) && $_GET['stand'] == 0} class="xw1 a"{/if}><a href="forum.php?mod=viewthread&tid=$_G[tid]&extra=$_GET[extra]&stand=0" hidefocus="true">{lang debate_neutral}</a></li>
			</ul>
		<!--{/if}-->
		<!--{if $_G['forum_thread']['replies']}--><!--{ad/interthread/a_p/$postcount}--><!--{/if}-->
	</td>
</tr>
</table>
</div>

<!--{/if}-->

<!--{if !empty($aimgs[$post[pid]])}-->
<script type="text/javascript" reload="1">
	aimgcount[{$post[pid]}] = [<!--{echo dimplode($aimgs[$post[pid]]);}-->];
	attachimggroup($post['pid']);
	<!--{if empty($_G['setting']['lazyload'])}-->
		<!--{if !$post['imagelistthumb']}-->
			attachimgshow($post[pid]);
		<!--{else}-->
			attachimgshow($post[pid], 1);
		<!--{/if}-->
	<!--{/if}-->
	var aimgfid = 0;
	<!--{if $_G['forum']['picstyle'] && ($_G['forum']['ismoderator'] || $_G['uid'] == $_G['thread']['authorid'])}-->
		aimgfid = $_G[fid];
	<!--{/if}-->
	<!--{if $post['imagelistthumb']}-->
		attachimglstshow($post['pid'], <!--{echo intval($_G['setting']['lazyload'])}-->, aimgfid, '{$_G[setting][showexif]}');
	<!--{/if}-->
</script>
<!--{/if}-->
<!--{else}-->
	<table id="pid$post[pid]" summary="pid$post[pid]" cellspacing="0" cellpadding="0">
	<tbody>
		<tr>
			<!--{if !$close_leftinfo}-->
			<td class="pls"></td>
			<!--{/if}-->
			<td class="plc"<!--{if $close_leftinfo}--> style="width:100%"<!--{/if}-->>
				<div class="pi">
					<strong><a><!--{if !empty($postno[$post[number]])}-->$postno[$post[number]]<!--{else}--><em>{$post[number]}</em>{$postno[0]}<!--{/if}--></a></strong>
				</div>
				<div class="pct">{lang post_deleted}</div>
			</td>
		</tr>
		<tr class="ad">
			<!--{if !$close_leftinfo}-->
			<td class="pls"></td>
			<!--{/if}-->
			<td class="plc"></td>
		</tr>
	</tbody>
</table>
<!--{/if}-->
<!--{hook/viewthread_endline $postcount}-->
