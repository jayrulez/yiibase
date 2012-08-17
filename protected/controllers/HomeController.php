<?php

class HomeController extends AuthenticatedController
{
	public function actionIndex()
	{
		$this->render('index');
	}
}
