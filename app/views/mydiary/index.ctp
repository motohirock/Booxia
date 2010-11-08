<div>
<?php
if($this->Session->check('id')) {
    $con = mysqli_connect('localhost','feek','$_feek','booxia');
    if(!$con) {
        print "DB connect error";
    }
?>
<?php print $html->link("日記を書く","/mydiary/new_diary")?>
<div>
<table>
<tr>
<th>アーカイブ</th>
</tr>
<?php
$month = "";
foreach ($diaries_date_sort as $diary):
    $id = $diary['Diary']['id'];
    $date_word = $diary['Diary']['date'];
    $word = preg_split('/-/', $date_word);
    if($month !== $word[1]) {
        $sql = "SELECT * FROM diaries WHERE date like '" . $diary['Diary']['date'] . "'";
        $result = mysqli_query($con,$sql);
        if(!$result) { print "SQL実行失敗"; }
        $date = mysqli_fetch_array($result);
        if($date) {
            print "<tr><td>" . $html->link($word[0] . '年' . $word[1] . '月',"/diaries/index?year={$word[0]}&month={$word[1]}") . "</td></tr>";
        }
        $month = $word[1];
        $result->close();
    }
endforeach
?>
</table>
</div>

<div>
<table id="main_table">
    <tr><th colspan="2">日記一覧</th></tr>
<?php foreach ($diaries as $diary):
    $date_word = $diary['Diary']['date'];

    $word = preg_split('/-/', $date_word);
    $id = $diary['Diary']['id'];
?>
    <tr class="titledate">
        <td><?php print $diary['Diary']['title']; ?></td>
        <td><?php print $word[0] . "年" . $word[1] . "月" . $word[2] . "日"; ?></td>
    </tr>
    <tr>
　　　　<td colspan="2"><?php print nl2br($diary['Diary']['content']); ?></td>
    </tr>
    <tr>
        <td colspan="2"><hr /></td>
    </tr>
    <tr>
        <td colspan="2"><?php print $html->link('削除',"/diaries/delete_check/{$id}", null); ?>
        <?php print $html->link('編集',"/diaries/update_diary/{$id}"); ?></td>
    </tr>
<?php
endforeach
?>
</table>
</div>
<?php
}else {
    print "notlogin";
}
?>
</div>