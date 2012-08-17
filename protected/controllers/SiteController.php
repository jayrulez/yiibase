<?php

class SiteController extends Controller
{
	public function actionIndex()
	{
		if(!Yii::app()->getUser()->getIsGuest())
		{
			$this->redirect(array('/home'));
		}

		$this->render('index');
	}
}
