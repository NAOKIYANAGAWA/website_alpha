<?php 
require_once(__DIR__ . '/../config/config.php');
$index = new \app\controller\Index();
$index->launch();
require('./header.php') 
?>

<body>
<?php echo '<div id="name"></div>'; ?>
<div><span id="url"></span>.</div>
</body>
<script>
// LIFFの初期化を行う
liff.init({
// 自分のLIFF ID（URLから『https://liff.line.me/』を除いた文字列）を入力する
liffId: "1655650638-RVMKlw1X"

}).then(() => { // 初期化完了. 以降はLIFF SDKの各種メソッドを利用できる

// 利用者のLINEアカウントのプロフィール名を取得
liff.getProfile().then(profile => {

// プロフィール名
const user_id = profile.userId

// HTMLに挿入

$.ajax({
    type: 'POST',
    url: '<?php echo SITE_URL . '/website_alpha/public_html/ajax.php';?>',
    data: "user_id="+user_id,
    success: function(data) {
        document.write(data);
    }
});

})
})
</script>