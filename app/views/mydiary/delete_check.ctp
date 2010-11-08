<p>この内容の日記を削除しますか？</p>
<?php $id = $diary['Diary']['id']; ?>
<table>
    <tr>
        <td>時刻:<?php print $diary['Diary']['date'] ?></td>
    </tr>
    <tr>
        <td>タイトル:<?php print $diary['Diary']['title'] ?></td>
    </tr>
    <tr>
　　　　<td>内容:<?php print nl2br($diary['Diary']['content']) ?></td>
    </tr>
</table>
<?php print $html->link("日記を削除します","/diaries/delete_done/{$id}"); ?>
<br />
<br />
<?php print $html->link("削除せずに戻る","/diaries/"); ?>
