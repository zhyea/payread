<?php echo '站拽设计，客服QQ：2050094712';exit;?>

<!--{loop $thread_list $post_list}-->

<!--{eval $zhanzhuaibzz_pic = substr($post_list[tid], -1); $threadpic = DB::fetch_all("SELECT * FROM ".DB::table('forum_attachment_'.$zhanzhuaibzz_pic.'')." WHERE `tid`= $post_list[tid] AND isimage = '1' ORDER BY `dateline` DESC limit 0 , 1");}-->
<!--{eval $num = count($threadpic);}-->

<!--{eval require_once(DISCUZ_ROOT."./source/function/function_post.php");}-->
<!--{eval $forum_name = DB::fetch_all('SELECT * FROM '.DB::table('forum_forum').' WHERE fid = '.$post_list['fid'].' LIMIT  0 ,'. 5);}--> 


<li id="normalthread_$post_list[tid]" class="zhanzhuai-post-list thread-list">
    <div class="post-form cl">
         <span class="post-form-name z">来自: 
		 <!--{loop $forum_name $forumname}-->
			 <a href="forum.php?mod=forumdisplay&fid=$forumname[fid]" target="_blank">$forumname[name]</a>
		 <!--{/loop}-->
		 </span>
    </div>
 
    <div class="post-author cl">	
        <div class="post-author-basic">
            <a href="home.php?mod=space&uid=$post_list[authorid]" target="_blank">
				<img src="{echo avatar($post_list[authorid],'middle',1);}">
				<span class="author-name">$post_list[author]</span>
            </a>
        </div>		       
        <div class="post_dateline">{echo date('Y-m-d', $post_list['dateline']);}</div>	
        <div class="icons y">
		     <!--{if $post_list[folder] == 'lock'}-->
				 <span>已锁</span>
			 <!--{elseif $post_list['special'] == 1}-->
				 <span>投票</span>
			 <!--{elseif $post_list['special'] == 2}-->
				 <span>{lang thread_trade}</span>
			 <!--{elseif $post_list['special'] == 3}-->
				 <span>悬赏</span>
			 <!--{elseif $post_list['special'] == 4}-->
				 <span>活动</span>
			 <!--{elseif $post_list['special'] == 5}-->
				 <span>辩论</span>
			 <!--{elseif in_array($post_list['displayorder'], array(1, 2, 3, 4))}-->
				 <span class="stick_$post_list[displayorder]">顶$post_list[displayorder]</span>
			 <!--{/if}-->
			 <!--{if $post_list['digest'] > 0 && $filter != 'digest'}-->
				 <span class="digest_$post_list[digest]" title="精华$post_list[displayorder]">精$post_list[displayorder]</span>
             <!--{/if}-->
		     <!--{if $post_list['attachment'] == 2}-->
                 <span class="image_s" title="有图">图片</span>
             <!--{elseif $post_list['attachment'] == 1}-->
                 <span class="image_s" title="有附件">附件</span>
             <!--{/if}-->
			 <!--{if $post_list[heatlevel]}-->
                 <span class="hot">火</span>
             <!--{/if}-->


        </div>
    </div>

    <div class="post-content cl">
	     <!--{if $num >0}-->
         <div class="post-img">
              <a href="forum.php?mod=viewthread&tid=$post_list[tid]">
             	<!--{loop $threadpic $zhanzhuaibzz_pic}-->
			        <!--{eval $tupian = getforumimg($zhanzhuaibzz_pic[aid], 0, 145, 100); }-->   		          
			        <img src="$tupian" alt="$post_list[subject]"/>
                <!--{/loop}-->
			  </a>
         </div>
		 <!--{/if}-->

         <div class="post-profile cl">
     	      <div class="post-tit cl">
                  <h1><a href="forum.php?mod=viewthread&tid=$post_list[tid]" target="_blank">$post_list[subject]</a></h1>
              </div>
              <!--{echo messagecutstr(DB::result_first('SELECT `message` FROM '.DB::table('forum_post').' WHERE `tid` ='.$post_list[tid].' AND `first` =1'),140);}-->        
		 </div>
    </div>

    <div class="post-actions cl">
        <span class="post-viem" style="margin-left: 0;"><i class="zhanzhuai-icons"></i>$post_list[views]</span>
        <span class="post-reply"><i class="zhanzhuai-icons"></i>$post_list[replies]</span>
        <span class="post-fav"><i class="zhanzhuai-icons"></i>$post_list[favtimes]</span>
        <span class="post-lastreply y">
		    <a href="space-username-admin.html" c="1" mid="card_4392">$post_list[lastposter]</a>     
			<em>@</em>
            <em><a href="forum.php?mod=redirect&amp;tid=105&amp;goto=lastpost#lastpost"><!--{echo dgmdate($post_list[lastpost], 'u', '9999', getglobal('setting/dateformat'))}--></a></em>
        </span>
    </div>
</li>


<!--{/loop}-->