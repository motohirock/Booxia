<?php
class MydiaryController extends AppController {

	var $name = 'Mydiary';
	var $uses = "Diary";

    function index() {
		$this->set('navi', '日記');
        //GETで渡された日付を取得
        if(isset($this->params['url']['year']) && isset($this->params['url']['month'])) {
            $year = $this->params['url']['year'];
            $month = $this->params['url']['month'];
        }

        //セッションにいれたユーザの名前を変数にIN
        $username = $this->Session->read('id');
        
        //SQL文発行 ちきしょうちきしょう・・・・
        if(!empty($year) && !empty($month)) {
            $sql = "SELECT * FROM diaries AS Diary, users AS U "
                 . "WHERE Diary.user_id = U.user_id AND U.id = '"
                 . $username
                 . "' AND Diary.date like "
                 . "'%" .  $year . "_" . $month . "%'"
                 . " ORDER BY date DESC";
        }else{
            $sql = "SELECT * FROM diaries AS Diary, users AS Users "
                 . "WHERE Diary.user_id = Users.user_id and Users.id = '"
                 . $username
                 . "' ORDER BY date DESC";
        }
        //SQL実行
        $Diaries = $this->Diary->query($sql);
        
        //日記メイン表示
        //$Diaries = $this->Diary->find("all",array('order'=>'date desc'));
        $this->set("diaries",$Diaries);
        
        //書き込んだ日記の日付Link表示だはぁ・・・・
        //$DiariesDate = $this->Diary->find("all",array('order'=>'date'));
        $date_sql = "SELECT * FROM diaries AS Diary, users AS Users "
                  . "WHERE Diary.user_id = Users.user_id and Users.id = '"
                  . $username
                  . "' ORDER BY date DESC";
        $date_sort = $this->Diary->query($date_sql);
        $this->set("diaries_date_sort",$date_sort);
        
        /*
        //POST
        $username = $this->params['data']['Diary']['username'];
        $password = $this->params['data']['Diary']['password'];
        $this->set('username',$username);
        $this->set('password',$password);
        */
    }
     
    function view($id = null) {
		$this->set('navi', '日記');
        $this->Diary->date = $id;
        $this->set('diary',$this->Diary->read());
    }
    
    function new_diary(){
		$this->set('navi', '日記');
        //ユーザごとのID取得
        $username = $this->Session->read('id');
        $this->set('id',$username);
        if(!empty($this->data)) {
            if($this->Diary->save($this->data)) {
                $this->flash('日記を作成しました','/mydiary');
           }
        }
    }
    
    function delete_check($id = null) {
		$this->set('navi', '日記');
        $this->Diary->id = $id;
        $this->set('diary',$this->Diary->read());
    }

    function delete_done($id) {
		$this->set('navi', '日記');
        $this->Diary->delete($id);
        $this->flash('日記を削除しました','/mydiary');
    }
    
    function update_diary($id = null){
		$this->set('navi', '日記');
        $this->Diary->id = $id;
        if(empty($this->data)) {
            $this->data = $this->Diary->read();
        }else{
            if($this->Diary->save($this->data['Diary'])) {
                $this->flash('内容を編集しました','/mydiariy');
            }
        }
    }
}
?>