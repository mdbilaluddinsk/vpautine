<form method="post" id="sms_registration" action="{$url}">
    {token}
    {if $id != 0}<input type="hidden" name="val[userId]" id="val[userId]" value="{$id}">{/if}
    <div class="table">
        <div class="table_left">
            <label>{phrase var='registration.sms_code'}</label>
        </div>
        <div class="table_right">
            <input type="text" id="val[smsCode]" name="val[smsCode]" />
        </div>
    </div>
    <div class="table">
        <div class="table_right">
            <input type="submit" id="val[submit]" name="val[submit]" value="submit" />
        </div>
    </div>
</form>