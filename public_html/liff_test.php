<?php require('./header.php') ?>

<body>
<div>Hello <span id="name">world</span>.</div>
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
const name = profile.userId

// HTMLに挿入
document.querySelector("#name").innerText = name
document.querySelector("#url").innerText = '<p>asasa</p>'
})
})
</script>