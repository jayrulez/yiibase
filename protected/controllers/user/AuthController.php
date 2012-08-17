<?php

class AuthController extends Controller
{
	public function actionIndex()
	{
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionLogin()
	{
		if(!Yii::app()->getUser()->getIsGuest())
		{
			$this->redirect(Yii::app()->homeUrl);
		}

		$loginForm = new LoginForm;
		
		if(($post = Yii::app()->getRequest()->getPost('LoginForm')) !== null)
		{
			$loginForm->attributes = $post;

			if($loginForm->process())
			{
				$this->redirect(Yii::app()->homeUrl);
			}
		}

		$this->render('login', array(
			'form'=>$loginForm,
		));
	}

	public function actionRegister()
	{
		if(!Yii::app()->getUser()->getIsGuest())
		{
			$this->redirect(Yii::app()->homeUrl);
		}

		$registerForm = new RegisterForm;
		
		if(($post = Yii::app()->getRequest()->getPost('RegisterForm')) !== null)
		{
			$registerForm->attributes = $post;

			if($registerForm->process())
			{
				$this->redirect(LoginForm::quickLogin($registerForm->username, $registerForm->password) ? Yii::app()->homeUrl : Yii::app()->getUser()->loginUrl);
			}
		}

		$this->render('register', array(
			'form'=>$registerForm,
		));
	}

	public function actionLogout()
	{
		if(!Yii::app()->getUser()->getIsGuest())
		{
			Yii::app()->getUser()->logout();
		}

		$this->redirect(Yii::app()->homeUrl);
	}
}
