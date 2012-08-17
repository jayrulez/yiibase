<?php

class LoginForm extends CFormModel
{
	public $username;

	public $password; 

	public $autologin;

	public function rules()
	{
		return array(
			array('username, password', 'required'),
			array('autologin','boolean'),
		);
	}
	
	public function beforeValidate()
	{
		if(parent::beforeValidate())
		{
			$this->username = strtolower($this->username);
			return true;
		}
		return false;
	}
	
	public function process()
	{
		$this->validate();
		
		if(!$this->hasErrors())
		{
			$userIdentity = Yii::app()->user->getIdentityInstance($this->username, $this->password);
			
			if(!$userIdentity->authenticate())
			{
				if($userIdentity->errorCode === $userIdentity::ERROR_USERNAME_INVALID)
				{
					$this->addError('username', Yii::t('application', 'Username is invalid.'));
				}else if($userIdentity->errorCode === $userIdentity::ERROR_EMAIL_ADDRESS_INVALID)
				{
					$this->addError('username', Yii::t('application', 'Email address is invalid.'));
				}else if($userIdentity->errorCode === $userIdentity::ERROR_PASSWORD_INVALID)
				{
					$this->addError('password', Yii::t('application', 'Password is invalid.'));
				}else{
					$this->addError('username', Yii::t('application', 'We are unable to access your account at this time, please try again later.'));
					Yii::log(Yii::t('application', 'Unable to login user "{username}" with password "{password}".', array(
	'{username}'=>$this->username,
	'{password}'=>$this->password,
)));
				}
				return false;
			}
			
			$duration = $this->autologin ? Environment::getParam('loginDuration', 0) : 0;
			
			Yii::app()->getUser()->login($userIdentity, $duration);

			return true;
		}
		return false;
	}
	
	public function attributeLabels()
	{
		return array(
			'username'=>Yii::t('application', 'Username or Email'),
			'password'=>Yii::t('application', 'Password'),
			'autologin'=>Yii::t('application', 'Keep me logged in'),
		);
	}

	public static function quickLogin($username, $password, $autologin = true)
	{
		$form = new self;
		$form->username = $username;
		$form->password = $password;
		$form->autologin = $autologin;
		return $form->process();
	}
}
