<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: track-entry.html.php 3954 2012-02-28 14:54:21Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<li class="js_music_store_album_holder"{if isset($phpfox.iteration.songs) && $phpfox.iteration.songs > 10} {/if}>
	<div class="block_listing_image">
		<a href="#" onclick="$.ajaxCall('music.playInFeed', 'id={$aSong.song_id}&amp;track=js_block_track_player{if isset($bIsMusicPlayer) && $bIsMusicPlayer}&amp;is_player=1{/if}'); return false;" class="no_ajax_link">
            {$aSong.title|clean|shorten:40:'...'|split:40}
            <span class="extra_info">
                {$aSong.duration}
            </span>
        </a>
	</div>
	<div class="clear"></div>
</li>