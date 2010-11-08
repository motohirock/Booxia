<?php
echo $form->create('/mydiary');
echo $form->input('date');
echo $form->input('title');
echo $form->input('content',array('rows'=>'10'));
echo $form->input('id',array('type'=>'hidden','value'=>$id));
echo $form->end('日記を作成する');
?>
