<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;

	const ERROR_EMAIL_ADDRESS_INVALID = 4;

	/**
	 * Authenticates a user.
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		if(strpos($this->username, '@'))
		{
			$user = User::model()->findByAttributes(array(
				'email_address'=>$this->username,
			));
			$errorCode = self::ERROR_EMAIL_ADDRESS_INVALID;
		}else{
			$user = User::model()->findByAttributes(array(
				'username'=>$this->username,
			));
			$errorCode = self::ERROR_USERNAME_INVALID;
		}
		
		if($user === null)
		{
			$this->errorCode=$errorCode;
		}else if($user->password !== UserHelper::encryptPassword($this->password))
		{
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}else{
			$this->_id = $user->id;
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
	
	public function getId()
	{
		return $this->_id;
	}
}
