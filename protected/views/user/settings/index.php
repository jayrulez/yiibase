<?php
$this->pageTitle=Yii::t('application', 'Settings');
?>
<div class="action" id="user-settings-index">
	<div class="section">
		<div class="section-header clearfix">
			<div class="left"><?php echo Yii::t('application', 'Username'); ?></div>
			<div class="middle"></div>
			<div class="right">
			<?php echo CHtml::ajaxLink(Yii::t('application', 'edit'), Yii::app()->createUrl('/user/settings/changeUsername'), array(
				'replace'=>'#changeUsernameBlock',
			)); ?>
			</div>
		</div>
		<div class="section-content" id="changeUsernameBlock"></div>
	</div>
	
	<div class="section">
		<div class="section-header clearfix">
			<div class="left"><?php echo Yii::t('application', 'Email Address'); ?></div>
			<div class="middle"></div>
			<div class="right">
				<?php echo CHtml::ajaxLink(Yii::t('application', 'edit'), Yii::app()->createUrl('/user/settings/changeEmailAddress'), array(
					'replace'=>'#changeEmailAddressBlock',
				)); ?>
			</div>
		</div>
		<div class="section-content" id="changeEmailAddressBlock"></div>
	</div>
	
	<div class="section">
		<div class="section-header clearfix">
			<div class="left"><?php echo Yii::t('application', 'Password'); ?></div>
			<div class="middle"></div>
			<div class="right">
				<?php echo CHtml::ajaxLink(Yii::t('application', 'edit'), Yii::app()->createUrl('/user/settings/changePassword'), array(
					'replace'=>'#changePasswordBlock',
				)); ?>
			</div>
		</div>
		<div class="section-content" id="changePasswordBlock"></div>
	</div>
</div>
