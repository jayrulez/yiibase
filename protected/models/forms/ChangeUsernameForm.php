<?php

class ChangeUsernameForm extends CFormModel
{
	public $username;

	public function rules()
	{
		return array(
			array('username', 'required'),
			array('username', 'length', 'min'=>5, 'max'=>32),
			//array('username', 'unique', 'className'=>'User', 'attributeName'=>'username'),
		);
	}
	
	public function beforeValidate()
	{
		if(parent::beforeValidate())
		{
			return true;
		}
		return false;
	}
	
	public function process()
	{
		$this->validate();
		
		if(!$this->hasErrors())
		{
			if(($model = Yii::app()->getUser()->getModel()) !== null)
			{
				return $model->saveAttributes(array(
					'username'=>$this->username,
				));
			}
		}
		
		return false;
	}
	
	public function attributeLabels()
	{
		return array(
			'username'=>Yii::t('application', 'Username'),
		);
	}
}
