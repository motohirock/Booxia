<div>
	<h2><?php echo $this->Session->read('id') ?> さんのページ</h2>
	<ul>
		<!--サムネイル表示したり最新の何件か出したりする予定-->
		<li><a href="">My本棚</a></li>
		<li><a href="">Myレビュー</a></li>
		<li><a href="">Myポップ</a></li>
		<li><a href="mydiary">日記</a></li>
		<li><a href="">受信箱</a></li>
		<li><a href="">登録情報を確認する</a></li>
	</ul>
</div>
<div>
	<h2><?php echo $this->Session->read('id') ?> さんの読書データ</h2>
	<div><br><br><br><br><br><center>読書量や読書傾向のグラフ表示</center><br><br><br><br><br></div>
</div>
<div>
	<h2>ニュース</h2>
	<ul>
		<li>2010/11/01 12:00 <a href="">□□</a>さんがあなたをお気に入り登録しました！</li>
		<li>2010/11/01 09:00 <a href="">●●</a>さんが日記「<a href="">○○</a>」を書きました！</li>
		<li>2010/11/01 06:00 <a href="">■■</a>さんが<a href="">××</a>さんをお気に入り登録しました！</li>
		<li>2010/11/01 03:00 <a href="">△△</a>さんからメッセージが届きました！ <a href="mybox">→確認する</a></li>
		<li>2010/11/01 00:00 <a href="">●●</a>さんが『<a href="">●●</a>』のレビューを書きました！</li>
	</ul>
</div>