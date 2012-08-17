<?php

class SettingsController extends AuthenticatedController
{
	public function init()
	{
		parent::init();
		
		Layout::addBlock('sidebar.left', array(
			'id'=>'sidebar',
			'content'=>$this->renderPartial('sidebar', array(), true),
		));
	}
	
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionChangePassword()
	{
		$changePasswordForm = new ChangePasswordForm;
		
		if(($post = Yii::app()->getRequest()->getPost('ChangePasswordForm')) !== null)
		{
			$changePasswordForm->attributes = $post;

			if($changePasswordForm->process())
			{
				$this->redirect(Yii::app()->getRequest()->getUrlReferrer());
			}
		}
		
		if(Yii::app()->getRequest()->getIsAjaxRequest())
		{
			$this->renderPartial('changePassword', array(
				'form'=>$changePasswordForm,
			));
		}else{
			$this->render('changePassword', array(
				'form'=>$changePasswordForm,
			));
		}
	}
	
	public function actionChangeUsername()
	{
		$changeUsernameForm = new ChangeUsernameForm;
		$changeUsernameForm->username = (($user=Yii::app()->getUser()->getModel()) !== null) ? $user->username : '';
		
		if(($post = Yii::app()->getRequest()->getPost('ChangeUsernameForm')) !== null)
		{
			$changeUsernameForm->attributes = $post;

			if($changeUsernameForm->process())
			{
				$this->redirect(Yii::app()->getRequest()->getUrlReferrer());
			}
		}
		
		if(Yii::app()->getRequest()->getIsAjaxRequest())
		{
			$this->renderPartial('changeUsername', array(
				'form'=>$changeUsernameForm,
			));
		}else{
			$this->render('changeUsername', array(
				'form'=>$changeUsernameForm,
			));
		}
	}
	
	public function actionChangeEmailAddress()
	{
		$changeEmailAddressForm = new ChangeEmailAddressForm;
		$changeEmailAddressForm->emailAddress = (($user=Yii::app()->getUser()->getModel()) !== null) ? $user->email_address : '';
		
		if(($post = Yii::app()->getRequest()->getPost('ChangeEmailAddressForm')) !== null)
		{
			$changeEmailAddressForm->attributes = $post;

			if($changeEmailAddressForm->process())
			{
				$this->redirect(Yii::app()->getRequest()->getUrlReferrer());
			}
		}
		
		if(Yii::app()->getRequest()->getIsAjaxRequest())
		{
			$this->renderPartial('changeEmailAddress', array(
				'form'=>$changeEmailAddressForm,
			));
		}else{
			$this->render('changeEmailAddress', array(
				'form'=>$changeEmailAddressForm,
			));
		}
	}
}
