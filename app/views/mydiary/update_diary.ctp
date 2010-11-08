<h2>編集画面</h2>
<?php
    print $form->create('Diary',array('action'=>'update_done'));
    print $form->input('date');
    print $form->input('title');
    print $form->input('content',array('rows'=>'10'));
    print $form->end('編集した内容を確認する');
    print $html->link('内容を編集せずに戻る',"/diaries");
?>
