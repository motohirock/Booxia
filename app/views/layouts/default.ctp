<?xml version="1.0" encoding="utf-8"?>
<?php echo $html->docType('xhtml-strict'); ?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
<?php echo $html->charset(); ?>
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta name="keywords" content="本棚,蔵書,管理,web,インターネット,コミュニティ,ポップ" />
<meta name="description" content="インターネット上で蔵書管理ができるWebサービスです。" />
<title>Web本棚コミュニティ | Booxia</title>
<?php echo $session->flash(); ?>
<?php
	echo $html->meta('icon');
	echo $html->css('import');
	echo $scripts_for_layout;
	echo $html->script('jquery-1.4.3.js');
	echo $html->script('swfobject.js');
	echo $html->script('booxia.js');
?>
</head>
<body>
    <div id="header">
    	<div class="wrapper">
            <h1><?php
					echo $html->link($html->image('booxia_logo.png',
					     array('alt' => 'Booxiaロゴ', 'width' => '220', 'height' => '90')), 
					     '/', array('escape' => false)) ?></h1>
            <div id="utility">
                <ul>
<?php
if (!$this->Session->check('id')) {
	echo<<<EOF
                    <li>{$html->link($html->image('btn_signup_blue.png', array('alt' => '新規登録', 'width' => '16', 'height' => '16')) . '新規登録',
					'/signup', array('escape' => false))}</li>\n
EOF;
} else {
	echo<<<EOF
                    <li>{$html->link($html->image('btn_home_blue.png', array('alt' => 'マイページ', 'width' => '16', 'height' => '16')) . 'マイページ',
					'/mypage', array('escape' => false))}</li>
                    <li>{$html->link($html->image('btn_logout_blue.png', array('alt' => 'ログアウト', 'width' => '16', 'height' => '16')) . 'ログアウト',
					'/logout', array('escape' => false))}</li>\n
EOF;
}
?>
                    <li><?php echo $html->link($html->image('btn_help_blue.png', array('alt' => 'ヘルプ', 'width' => '16', 'height' => '16')) . 'ヘルプ',
					'/help', array('escape' => false)) ?></li>
                </ul>
                <dl>
                    <dt>Booxia情報</dt>
<?php
if (!$this->Session->check('id')) {
	echo<<<EOF
                    <dd>ログイン後→受信箱の状態</dd>\n
EOF;
} else {
	echo<<<EOF
					<dd>{$html->link('未読メッセージ：1件', '/mybox')}</dd>\n
EOF;
}
?>
                </dl>
                <div id="search">
                    <p>▼気になる情報を検索！ <a href="search">詳細検索はこちら</a></p>
                    <form action="search" method="GET">
                        <fieldset>
                            <legend>検索</legend>
                                  <select id="search" name="type" ><!-- 書き換えする -->
                                      <option value="book">書籍</option>
                                      <option value="review">レビュー</option>
                                      <option value="pop">ポップ</option>
                                  </select>
                            <input type="text" name="keyword" />
                            <?php echo $form->submit('btn_search_blue.gif', array('div' => false, 'width' => '32', 'height' => '32')) . "\n" ?>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="global_navi">
       	<div class="wrapper">
            <ul>
                <li><?php echo $html->link('ホーム', '/') ?></li>
                <li><?php echo $html->link('Booxiaとは', '/about') ?></li>
                <li><?php echo $html->link('本棚', '/book') ?></li>
                <li><?php echo $html->link('レビュー', '/review') ?></li>
                <li><?php echo $html->link('ポップ', '/pop') ?></li>
                <li><?php echo $html->link('コミュニティ', '/community') ?></li>
            </ul>
        </div>
    </div>
<?php
if($this->here != '/'){
		echo<<<EOF
	<div id="pan_navi">
        <div class="wrapper">
			<p>{$html->link('ホーム', '/')} {$html->image('btn_arrow_right.png', array('alt' => 'の', 'width' => '16', 'height' => '16'))} ${navi}</p>
		</div>
	</div>
EOF;
}else{
	echo<<<EOF
    <div id="index_image">
        <div class="wrapper">
            <div id="index_flash">flash contents</div>
        </div>
    </div>
EOF;
}
?>
    <div id="container">
        <div class="wrapper">
            <div id="main">
			<?php echo $content_for_layout;	?>
			</div>
            <div id="sub">
<?php
if (!$this->Session->check('id')) {
	echo<<<EOF
                <div id="login">
                    <h3>ログイン</h3>
                    <form action="javascript:void(0);" method="POST">
					<!--{$form->create(array('type'=>'POST','action'=>'javascript:void(0);'))}-->
                    	<fieldset>
                        	<legend>ログイン</legend>
                            <dl>
		                        <dt>ユーザーID</dt>
								<input type="text" name="id" />
		                        <dt>パスワード</dt>
								<input type="password" name="password" />
                            </dl>
                        	<p><input type="submit" value="ログイン" /></p>
                        </fieldset>
                    </form>
                    <p><a href="remaind">ユーザーID・パスワードを忘れてしまった？</a></p>
                </div>
                <p id="signup" class="sub">
                    <a href="signup">{$html->image('signup.png', array('alt' => '新規登録', 'width' => '200', 'height' => '60'))}</a>
                </p>
EOF;
} else {
	echo<<<EOF
				<div id="status">
					<center><p class="icon">{$html->image('user.png', array('alt' => 'ユーザーアイコン', 'width' => '70', 'height' => '90'))}</p>
					<h3><font color="#09f">{$this->Session->read('id')} さん</font></h3>
					<p>{$html->link('マイページ', '/mypage')}</p></center>
				</div>
				<div class="sub">
					<h3>プロフィール</h3>
					<table>
						<tr>
							<th>{$html->link('My本棚', '/mybook')}</th>
							<td>123冊</td>
						</tr>
						<tr>
							<th>{$html->link('Myレビュー', '/myreview')}</th>
							<td>0件</td>
						</tr>
						<tr>
							<th>{$html->link('Myポップ', '/mypop')}</th>
							<td>1000枚</td>
						</tr>
						<tr>
							<th>{$html->link('日記', '/mydiary')}</th>
							<td>12件</td>
						</tr>
						<tr>
							<th>{$html->link('受信箱', '/mybox')}</th>
							<td>未読:1</td>
						</tr>
					</table>
					<p class="right"><a href="">プロフィールを確認する</a></p>
					<br class="clear" />
				</div>
				<div id="fav_users" class="sub">
					<h3>お気に入りユーザー</h3>
					<table>
						<tr>
							<td><a href="">{$html->image('user_small.png', array('alt' => 'お気に入りユーザー', 'width' => '30', 'height' => '30'))}</a></td>
							<td><a href="">{$html->image('user_small.png', array('alt' => 'お気に入りユーザー', 'width' => '30', 'height' => '30'))}</a></td>
							<td><a href="">{$html->image('user_small.png', array('alt' => 'お気に入りユーザー', 'width' => '30', 'height' => '30'))}</a></td>
							<td><a href="">{$html->image('user_small.png', array('alt' => 'お気に入りユーザー', 'width' => '30', 'height' => '30'))}</a></td>
							<td><a href="">{$html->image('user_small.png', array('alt' => 'お気に入りユーザー', 'width' => '30', 'height' => '30'))}</a></td>
						</tr>
						<tr>
							<td><a href="">{$html->image('user_small.png', array('alt' => 'お気に入りユーザー', 'width' => '30', 'height' => '30'))}</a></td>
							<td><a href="">{$html->image('user_small.png', array('alt' => 'お気に入りユーザー', 'width' => '30', 'height' => '30'))}</a></td>
							<td><a href="">{$html->image('user_small.png', array('alt' => 'お気に入りユーザー', 'width' => '30', 'height' => '30'))}</a></td>
							<td><a href="">{$html->image('user_small.png', array('alt' => 'お気に入りユーザー', 'width' => '30', 'height' => '30'))}</a></td>
							<td><a href="">{$html->image('user_small.png', array('alt' => 'お気に入りユーザー', 'width' => '30', 'height' => '30'))}</a></td>
						</tr>
					</table>
					<p class="right"><a href="fav_users">全員見る</a></p>
					<br class="clear">
				</div>
EOF;
}
?>
                <div id="ranking" class="sub">
                	<h3>ランキング</h3>
                    <p></p>
                </div>
            </div>
            <p class="pagetop"><a href="">▲ページの先頭へ戻る</a></p>
        </div>
    </div>
    <div id="footer_navi">
    	<div class="wrapper">
            <dl>
                <dt>about</dt>
                <dd><?php echo $html->link('Booxiaとは', '/about') ?></dd>
                <dd><?php echo $html->link('ニュースとトピックス', '/news') ?></dd>
            </dl>
            <dl>
                <dt>contents</dt>
                <dd><a href="book">本棚</a></dd><!-- 書き換えする -->
                <dd><a href="review">レビュー</a></dd><!-- 書き換えする -->
                <dd><a href="pop">ポップ</a></dd><!-- 書き換えする -->
                <dd><a href="community">コミュニティ</a></dd><!-- 書き換えする -->
            </dl>
<?php
if (isset($_SESSION["id"])) {
	echo<<<EOF
            <dl>
                <dt>ユーザーメニュー</dt>
                <dd><a href="mybook">本棚</a></dd><!-- 書き換えする -->
                <dd><a href="myreview">レビュー</a></dd><!-- 書き換えする -->
                <dd><a href="mypop">ポップ</a></dd><!-- 書き換えする -->
                <dd><a href="mydiary">日記</a></dd><!-- 書き換えする -->
                <dd><a href="mybox">メッセージBOX</a></dd><!-- 書き換えする -->
            </dl>
EOF;
}
?>
            <dl>
                <dt>etc</dt>
                <dd><a href="ranking">ランキング</a></dd><!-- 書き換えする -->
                <dd><a href="help">ヘルプ</a></dd><!-- 書き換えする -->
            </dl>
            <br class="wrapper" />
        </div>
    </div>
    <div id="footer">
        <div class="wrapper">
            <ul>
                <li><a href="./">トップページ</a></li><!-- 書き換えする -->
                <li><a href="mail">お問い合わせ</a></li><!-- 書き換えする -->
                <li><a href="privacy">プライバシーポリシー</a></li><!-- 書き換えする -->
                <li><a href="agreement">ご利用規約</a></li><!-- 書き換えする -->
            </ul>
            <p class="copyright">Copyright &copy; 2010 $_FEEK All Rights Reserved.</p>
        </div>
    </div>
	<div id="msg"><!--メッセージエリア--></div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>