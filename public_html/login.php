<?php
require_once(__DIR__ . '/../config/config.php');

?>

<?php require('./header.php') ?>

<section class='login'>
    <div class="login-wrapper">
        <div class="login-title-wrapper"><p>ログイン</p></div>
        <div class="login-button-wrapper">
            <button type='button'>
                <a href="https://access.line.me/oauth2/v2.1/authorize?response_type=code&client_id=1655650638&redirect_uri=https://naokiyanagawa.cf/website_alpha/public_html/callback.php&state=<?=md5(uniqid())?>&scope=profile%20openid&nonce=09876xyz"><img src="../images/line_btn_login_base.png" alt=""></a>
            </button>
        </div>
    </div>
</section>





<?php require('./footer.php') ?>

<style>
.login {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 50px;
}
.login-wrapper {
    width: 600px;
    height: 400px;
    box-shadow: 0px 0px 4px;
}
.login-title-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 50px;
}
.login-title-wrapper p {
    font: 20px "Fira Sans", sans-serif;
    color: ##636e72;
}
.login-button-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
}
.login-button-wrapper button {
    margin-top: 100px;
    padding: 0px;
    background: #55efc4;
    border: 0px;
}
.login-button-wrapper button:hover {
    opacity: .8;
}
.login-button-wrapper img {
    width: 150px;
}
</style>