<?php

class RegisterForm extends CFormModel
{
	public $username;
	public $password; 
	public $email_address;

	public function rules()
	{
		return array(
			array('email_address, username, password', 'required'),
			array('username, password', 'length', 'min'=>5, 'max'=>32),
			array('email_address', 'length', 'max'=>64),
			array('email_address', 'email'),
			array('email_address', 'unique', 'className'=>'User', 'attributeName'=>'email_address'),
			array('username', 'unique', 'className'=>'User', 'attributeName'=>'username'),
		);
	}
	
	public function process()
	{
		$this->validate();
		
		if(!$this->hasErrors())
		{
			$user = new User;
			$user->username = $this->username;
			$user->password = $this->password;
			$user->email_address = $this->email_address;
			
			if(!$user->save())
			{
				foreach($user->getErrors() as $errors)
				{
					foreach($errors as $field => $message)
					{
						if(in_array($field, $this->attributes))
						{
							$this->addError($field, $message);
						}
					}
				}
				return false;
			}

			return true;
		}
		return false;
	}
	
	public function attributeLabels()
	{
		return array(
			'username' => Yii::t('application', 'Username'),
			'password' => Yii::t('application', 'Password'),
			'email_address' => Yii::t('application', 'Email Address'),
		);
	}
}
