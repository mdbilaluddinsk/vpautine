<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Friend
 * @version 		$Id: small.html.php 3990 2012-03-09 15:28:08Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<ul class="block_listing">
{foreach from=$aFriends key=iKey name=friend item=aFriend}
    <li>
        <div class="block_listing_image">
            {img user=$aFriend suffix='_100_square' max_width=100 max_height=100}
        </div>
        <div class="block_listing_title">
            {$aFriend|user:'':'':40|split:10}
        </div>
        <div class="clear"></div>
	</li>
{/foreach}
</ul>

{foreach from=$aFriendLists item=aLists}
	<div class="title"><a href="{url link=''$aUser.user_name'.friend' list=$aLists.list_id}">{$aLists.name|clean} ({$aLists.friends_total})</a></div>
	<div class="content">
		<ul class="block_listing">
		{foreach from=$aLists.friends item=aList}
		<li>


            <div class="block_listing_image">
                {img user=$aList suffix='_100_square' max_width=100 max_height=100}
            </div>

            <div class="block_listing_title">
                {$aList|user:'':'':'':12:true|shorten:40:'...'}
            </div>
            <div class="clear"></div>
		</li>	
		{/foreach}
		</ul>
	</div>
{/foreach}