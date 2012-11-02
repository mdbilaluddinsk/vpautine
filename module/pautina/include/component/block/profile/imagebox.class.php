<?php
    defined('PHPFOX') or exit('NO DICE!');

class Pautina_Component_Block_Profile_Imagebox extends Phpfox_Component
{
    public function process()
    {
        $aUser = $this->getParam('aUser');
        if (!$aUser) {
            return false;
        }

        $loginUserId = Phpfox::getUserId();

        $showAddLink = false;
        if ($loginUserId == $aUser['user_id']) {
            $showAddLink = true;
        }

        $imageboxService = Phpfox::getService('pautina.profile.imagebox');
        $photoCount = $imageboxService->getPhotoCount($aUser['user_id']);

        if ($photoCount == 0) {
            return false;
        }

        $photos = $imageboxService->getPhotos($aUser['user_id']);
        $allPhotoLink = Phpfox::getService('user')->getLink($aUser['user_id']) . 'photo';

        $this->template()->assign(
            array(
                'photos'        => $photos,
                'photoCount'    => $photoCount,
                'allPhotoLink'  => $allPhotoLink,
                'showAddLink'   => $showAddLink
            )
        );

        return 'block';
    }
}
?>