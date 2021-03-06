<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>GRAYCODE JavaScript</title>
	<script>
		window.addEventListener('DOMContentLoaded', function(){

			document.getElementById('link_page_top').style.visibility = 'hidden';

			document.getElementById('link_page_top').addEventListener('transitionend', function(){

				if( document.getElementById('link_page_top').className !== 'view' ) {
					document.getElementById('link_page_top').style.visibility = 'hidden';
				}
			});

			window.addEventListener('scroll', function(){
				if( 200 < window.scrollY ) {
					document.getElementById('link_page_top').style.visibility = 'visible';
					document.getElementById('link_page_top').classList.add('view');

				} else {
					document.getElementById('link_page_top').classList.remove('view');
				}
			});
		});

        window.addEventListener('DOMContentLoaded', function(){

window.addEventListener('scroll', function(){
    console.log("横スクロール：" + window.scrollX);
    console.log("縦スクロール：" + window.scrollY);
});

});
	</script>
	<style>
		body {
			height: 2000px;
			background-color: #f7f7f7;
		}

		#content1 {
			padding: 20px;
			height: 300px;
			background-color: #3f98d1;
		}

		#link_page_top {
			position: fixed;
			right: 30px;
			bottom: 30px;
			padding: 10px;
			color: #fff;
			font-size: 86%;
			text-decoration: none;
			border-radius: 5px;
			background: #333;
			opacity: 0.0;
			transition: ease .3s opacity;
		}
		#link_page_top.view {
			opacity: 1.0;
		}
	</style>
</head>
<body>
<h1>JavaScriptレシピ</h1>
<section id="content1"></section>
<a id="link_page_top" href="#">ページ先頭に戻る</a>
</body>
</html>