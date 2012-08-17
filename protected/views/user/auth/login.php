<?php
$this->pageTitle=Yii::t('application', 'Login');
?>
<div class="action" id="user-auth-login">
	<div class="section">
		<div class="section-content">
			<div class="form-container">
				<?php echo CHtml::beginForm(Yii::app()->getUser()->loginUrl,'post',array('class'=>'wf')); ?>
					<div class="header">
						<div class="title">
							<?php echo Yii::t('application', '{appName} Login', array(
								'{appName}'=>Yii::app()->name,
							)); ?>
						</div>
					</div>
					<?php echo CHtml::errorSummary($form); ?>
					<fieldset class="top">
						<div class="row top clearfix">
							<?php echo CHtml::activeLabel($form,'username'); ?>
							<?php echo CHtml::activeTextField($form,'username'); ?>
						</div>
						<div class="row clearfix">
							<?php echo CHtml::activeLabel($form,'password'); ?>
							<?php echo CHtml::activePasswordField($form,'password'); ?>
						</div>
						<div class="row inline bottom clearfix">
							<?php echo CHtml::activeCheckBox($form,'autologin'); ?>
							<?php echo CHtml::activeLabel($form,'autologin'); ?>
						</div>
					</fieldset>
					<fieldset class="buttons bottom">
						<?php echo CHtml::submitButton(Yii::t('application', 'Login')); ?>
					</fieldset>
				<?php echo CHtml::endForm(); ?>
			</div>
		</div>
	</div>
</div>
