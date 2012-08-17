<?php
$this->pageTitle=Yii::t('application', 'Register');
?>
<div class="action" id="user-auth-register">
	<div class="section">
		<div class="section-content">
			<div class="form-container">
				<?php echo CHtml::beginForm(Yii::app()->getUser()->registerUrl,'post',array('class'=>'wf')); ?>
					<div class="header">
						<div class="title">
							<?php echo Yii::t('application', '{appName} Registration', array(
								'{appName}'=>Yii::app()->name,
							)); ?>
						</div>
					</div>
					<?php echo CHtml::errorSummary($form); ?>
					<fieldset class="top">
						<div class="row top clearfix">
							<?php echo CHtml::activeLabel($form,'email_address'); ?>
							<?php echo CHtml::activeTextField($form,'email_address'); ?>
						</div>
						<div class="row clearfix">
							<?php echo CHtml::activeLabel($form,'username'); ?>
							<?php echo CHtml::activeTextField($form,'username'); ?>
						</div>
						<div class="row bottom clearfix">
							<?php echo CHtml::activeLabel($form,'password'); ?>
							<?php echo CHtml::activePasswordField($form,'password'); ?>
						</div>
					</fieldset>
					<fieldset class="buttons bottom">
						<?php echo CHtml::submitButton(Yii::t('application', 'Register')); ?>
					</fieldset>
				<?php echo CHtml::endForm(); ?>
			</div>
		</div>
	</div>
</div>
