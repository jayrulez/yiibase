<?php

class User extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email_address, username, password', 'required'),
			array('email_address', 'length', 'max'=>64),
			array('username, password', 'length', 'min'=>'5', 'max'=>32),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'email_address' => 'Email Address',
			'username' => 'Username',
			'password' => 'Password',
			'status' => 'Status',
			'create_ip' => 'Create Ip',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
		);
	}

	public function beforeSave()
	{
		if(parent::beforeSave())
		{
			$this->username = strtolower($this->username);
			$this->email_address = strtolower($this->email_address);

			if($this->getIsNewRecord())
			{
				$this->password = UserHelper::encryptPassword($this->password);
				$this->status = 0;
				$this->create_ip = Yii::app()->getRequest()->getUserHostAddress();
				$this->create_time = new CDbExpression('now()');
			}else{
				$this->update_time = new CDbExpression('now()');
			}

			return true;
		}
		return false;
	}

	public function afterSave()
	{
		parent::afterSave();
	}

	public function beforeFind()
	{
		if(parent::beforeFind())
		{
			$this->username = strtolower($this->username);
			$this->email_address = strtolower($this->email_address);
			
			return true;
		}
		return false;
	}

	public function updateActiveTime()
	{
		$this->saveAttributes(array(
			'active_time' => new CDbExpression('now()'),
		));
	}

	public function getDisplayName()
	{
		return $this->username;
	}
	
	public function getUrl()
	{
		return Yii::app()->createUrl('/user/profile/index', array(
			'id'=>$this->id,
		));
	}
	
	public function getLink($displayName = null, $htmlOptions = array())
	{
		return CHtml::link(($displayName !== null) ? $displayName : $this->getDisplayName(), $this->getUrl(), $htmlOptions);
	}
}
