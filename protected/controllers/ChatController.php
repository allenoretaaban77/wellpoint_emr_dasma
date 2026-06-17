<?php

class ChatController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{

	}

	public function actionUpdate1()
	{
        $connection = Yii::app()->db; 
        $command = $connection->createCommand("delete from friend");
        $dataReaderIns = $command->query();

		$data = Invoice::model()->findAllBySql("select * from auth_users where status = 1 LIMIT 100");
		$idArr1 = array();
		$idArr2 = array();

		foreach($data as $row){
			$idArr1[] = $row['id'];
			$idArr2[] = $row['id'];	
		}

		echo "Number of users: ".count($idArr1)."<br><br>";

		for($i=0; $i<count($idArr1); $i++) {
			$id1 =  $idArr1[$i];
			for($j=0; $j<count($idArr2); $j++) {
				$id2 = $idArr2[$j];

				if($id1 != $id2) {
            		$command = $connection->createCommand("insert into friend (user_id, friend_user_id) values ($id1,$id2)");
            		$dataReaderIns = $command->query();
            		echo "$id1 | $id2 done....<br>";
        		}
			}
		}
	}
	public function actionUpdate2()
	{
        $connection = Yii::app()->db; 
        // $command = $connection->createCommand("delete from friend");
        // $dataReaderIns = $command->query();

		$data = Invoice::model()->findAllBySql("select * from auth_users where status = 1 LIMIT 31,30");
		$idArr1 = array();
		$idArr2 = array();

		foreach($data as $row){
			$idArr1[] = $row['id'];
			$idArr2[] = $row['id'];	
		}

		echo "Number of users: ".count($idArr1)."<br><br>";

		for($i=0; $i<count($idArr1); $i++) {
			$id1 =  $idArr1[$i];
			for($j=0; $j<count($idArr2); $j++) {
				$id2 = $idArr2[$j];

				if($id1 != $id2) {
            		$command = $connection->createCommand("insert into friend (user_id, friend_user_id) values ($id1,$id2)");
            		$dataReaderIns = $command->query();
            		echo "$id1 | $id2 done....<br>";
        		}
			}
		}
	}
}