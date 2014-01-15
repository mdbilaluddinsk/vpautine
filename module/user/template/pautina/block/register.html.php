<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_User
 * @version 		$Id: register.html.php 5064 2012-12-04 06:51:24Z Raymond_Benc $
 */

defined('PHPFOX') or exit('NO DICE!');

?>
{literal}
<script type="text/javascript">
    $Behavior.termsAndPrivacy = function()
    {
        $('#js_terms_of_use').click(function()
        {
            {/literal}
                tb_show('{phrase var='user.terms_of_use' phpfox_squote=true phpfox_squote=true phpfox_squote=true phpfox_squote=true phpfox_squote=true phpfox_squote=true}', $.ajaxBox('page.view', 'height=410&width=600&title=terms'));
                {literal}
                return false;
            });

            $('#js_privacy_policy').click(function()
            {
                {/literal}
                    tb_show('{phrase var='user.privacy_policy' phpfox_squote=true phpfox_squote=true phpfox_squote=true phpfox_squote=true phpfox_squote=true phpfox_squote=true}', $.ajaxBox('page.view', 'height=410&width=600&title=policy'));
                    {literal}
                    return false;
                });
            }
</script>
{/literal}

{if Phpfox::getLib('module')->getFullControllerName() == 'user.register' && Phpfox::isModule('invite')}
<div id="main_registration_form">

    <h1>{phrase var='user.sign_up_for_ssitetitle' sSiteTitle=$sSiteTitle}</h1>
    <div class="extra_info">
       <span>{phrase var='user.join_ssitetitle_to_connect_with_friends_share_photos_and_create_your_own_profile' sSiteTitle=$sSiteTitle}</span>
    </div>
    <div id="main_registration_form_holder">
        {if ((Phpfox::isModule('facebook') && Phpfox::getParam('facebook.enable_facebook_connect')) || (Phpfox::isModule('janrain') && Phpfox::getParam('janrain.enable_janrain_login'))) && !Phpfox::getService('invite')->isInviteOnly()}
        <div id="main_registration_custom">
            {phrase var='user.or_sign_up_with'}:
            {if Phpfox::isModule('facebook') && Phpfox::getParam('facebook.enable_facebook_connect')}
            <div class="header_login_block">
                <fb:login-button scope="publish_stream,email,user_birthday" v="2"></fb:login-button>
            </div>
            {/if}
            {if Phpfox::isModule('janrain') && Phpfox::getParam('janrain.enable_janrain_login')}
            <div class="header_login_block">
                <a class="rpxnow" onclick="return false;" href="{$sJanrainUrl}">{img theme='layout/janrain-icons.png'}</a>
            </div>
            {/if}
        </div>
        {/if}
        {/if}
        {if Phpfox::getLib('module')->getFullControllerName() != 'user.register'}
        <div class="user_register_holder">
            <div class="holder">
                <div class="user_register_intro">
                    {module name='user.welcome'}
                </div>
                <div class="user_register_form">

                    {if Phpfox::getParam('user.allow_user_registration')}
                    <div class="user_register_title">
                        {phrase var='user.sign_up'}
                        <div class="extra_info">
                            <span>{phrase var='user.it_s_free_and_always_will_be'}</span>
                        </div>
                    </div>
                    {/if}
                    {/if}
                    {if Phpfox::isModule('invite') && Phpfox::getService('invite')->isInviteOnly()}
                    <div class="main_break">
                        <div class="extra_info">
                            {phrase var='user.ssitetitle_is_an_invite_only_community_enter_your_email_below_if_you_have_received_an_invitation' sSiteTitle=$sSiteTitle}
                        </div>
                        <div class="main_break">
                            <form method="post" action="{url link='user.register'}">
                                <div class="table">
                                    <div class="table_left">
                                        {phrase var='user.email'}:
                                    </div>
                                    <div class="table_right">
                                        <input type="text" name="val[invite_email]" value="" />
                                    </div>
                                </div>
                                <div class="table_clear">
                                    <input type="submit" value="{phrase var='user.submit'}" class="button_register" />
                                </div>
                            </form>
                        </div>
                    </div>
                    {else}
                    {if isset($sCreateJs)}
                    {$sCreateJs}
                    {/if}
                    <div id="js_registration_process" class="t_center" style="display:none;">
                        <div class="p_top_8">
                            {img theme='ajax/add.gif' alt=''}
                        </div>
                    </div>
                    <div id="js_signup_error_message" style="width:350px;"></div>
                    {if Phpfox::getLib('module')->getFullControllerName() != 'user.login'}
                    {plugin call='user.template.login_header_set_var'}
                    <div id="header_menu_login_form">
                        {if isset($bCustomLogin)}
                        <div id="header_menu_login_holder">
                            {/if}
                            <form method="post" action="{url link='user.login'}">
                                <div class="login_form_wrapper">
                                <div class="header_menu_login_left">
                                    <input type="text" name="val[login]" value="" placeholder="{if Phpfox::getParam('user.login_type') == 'user_name'}{phrase var='user.user_name'}{elseif Phpfox::getParam('user.login_type') == 'email'}{phrase var='user.email'}{else}{phrase var='user.login'}{/if}" class="header_menu_login_input" tabindex="1" />

                                </div>
                                <div class="header_menu_login_right">
                                    <input type="password" name="val[password]" placeholder="{phrase var='user.password'}" value="" class="header_menu_login_input" tabindex="2" />

                                </div>
                                    <div class="header_menu_login_sub">
                                        <label><input type="checkbox" name="val[remember_me]" value="" checked="checked" tabindex="4" /> {phrase var='user.keep_me_logged_in'}</label>
                                    </div>
                                    <div class="header_menu_login_sub">
                                        <a href="{url link='user.password.request'}">{phrase var='user.forgot_your_password'}</a>
                                    </div>
                                <div class="header_menu_login_button">
                                    <input type="submit" value="{phrase var='user.login_singular'}" tabindex="3" />
                                </div>
                                    <div class="login_or_separator"></div>
                                </div>
                            </form>
                            {if isset($bCustomLogin)}
                        </div>
                        <div id="header_menu_login_custom">
                            {phrase var='user.or_login_with'}:
                            {if Phpfox::isModule('facebook') && Phpfox::getParam('facebook.enable_facebook_connect')}
                            <div class="header_login_block">
                                <fb:login-button scope="publish_stream,email,user_birthday" v="2"></fb:login-button>
                            </div>
                            {/if}
                            {if Phpfox::isModule('janrain') && Phpfox::getParam('janrain.enable_janrain_login')}
                            <div class="header_login_block">
                                <a class="rpxnow" onclick="return false;" href="{$sJanrainUrl}">{img theme='layout/janrain-icons.png'}</a>
                            </div>
                            {/if}
                            {plugin call='user.template.login_header_custom'}
                        </div>
                        {/if}
                    </div>
                    <script type="text/javascript">
                        {literal}

                        $Behavior.focusOnLogin = function()
                        {
                            if (window.location.href.indexOf('user/browse') < 0 )
                            {
                                $('.header_menu_login_input:first').focus();
                            }
                        }

                        {/literal}
                    </script>
                    {/if}
                    {if Phpfox::getParam('user.allow_user_registration')}
                    <div class="main_break" id="js_registration_holder">
                        <form method="post" action="{url link='registration.register'}" id="js_form" enctype="multipart/form-data">
                            {token}

                            <div id="js_signup_block">
                                {if isset($bIsPosted) || !Phpfox::getParam('user.multi_step_registration_form')}
                                <div>
                                    {template file='user.block.register.step1'}
                                    {template file='user.block.register.step2'}
                                </div>
                                {else}
                                {template file='user.block.register.step1'}
                                {/if}
                            </div>

                            {module name='registration.phone'}

                            {if Phpfox::isModule('captcha') && Phpfox::getParam('user.captcha_on_signup')}
                            <div id="js_register_capthca_image"{if Phpfox::getParam('user.multi_step_registration_form') && !isset($bIsPosted)} style="display:none;"{/if}>
                                {module name='captcha.form'}
                            </div>
                            {/if}

                            {if Phpfox::getParam('user.new_user_terms_confirmation')}
                            <div id="js_register_accept">
                                <div class="table">
                                    <div class="table_clear">
                                        <input type="checkbox" name="val[agree]" id="agree" value="1" class="checkbox v_middle" {value type='checkbox' id='agree' default='1'}/> {required}{phrase var='user.i_have_read_and_agree_to_the_a_href_id_js_terms_of_use_terms_of_use_a_and_a_href_id_js_privacy_policy_privacy_policy_a'}
                                    </div>
                                </div>
                            </div>
                            {/if}

                            <div class="table_clear">
                                {if isset($bIsPosted) || !Phpfox::getParam('user.multi_step_registration_form')}
                                <input type="submit" value="{phrase var='user.sign_up'}" class="button_register" id="js_registration_submit" />
                                {else}
                                <input type="button" value="{phrase var='user.sign_up'}" class="button_register" id="js_registration_submit" onclick="$Core.registration.submitForm();" />
                                {/if}
                            </div>
                        </form>
                    </div>
                {/if}
                {/if}
                {if Phpfox::getLib('module')->getFullControllerName() != 'user.register'}
            </div>

            <div class="clear"></div>

        </div>
        <div class="register_bottom_message">
            <div class="message_wrapper">
            <div class="message_container">
                <div class="message_header">
                    <h4>Знакомьтесь с людьми</h4>
                </div>
                <div class="message_content people">
                    <p>
                        Заведите новые знакомства, новых друзей, и может быть даже найдите свою любовь!
                    </p>
                </div>
            </div>

            <div class="message_container">
                <div class="message_header">
                    <h4>Делитесь информацией</h4>
                </div>
                <div class="message_content info-block">
                    <p>
                        Делитесь интересной информацией, фотографиями со своими друзями и знакомыми!
                    </p>
                </div>
            </div>

            <div class="message_container">
                <div class="message_header">
                    <h4>Общайтесь с легкостью</h4>
                </div>
                <div class="message_content talk">
                    <p>
                        Оставайтесь на связи  с вашими близкими даже вдали от дома!
                    </p>
                </div>
            </div>
            </div>
        </div>
        <div class="clear"></div>
        {module name='user.images'}
    </div>
    {/if}
    {if Phpfox::getLib('module')->getFullControllerName() == 'user.register'}
</div>
</div>
{/if}