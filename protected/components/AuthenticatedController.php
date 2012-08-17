<?php

class AuthenticatedController extends Controller
{
	public function init()
	{
		parent::init();
		
		$model = Yii::app()->getUser()->getModel();
		
		if($model !== null)
		{
			$model->updateActiveTime();
		}else{
			$this->redirect(Yii::app()->getUser()->loginUrl);
		}
	}
}
