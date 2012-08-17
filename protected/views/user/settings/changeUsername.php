<?php
$this->pageTitle=Yii::t('application', 'Change Username');
?>
<div class="action" id="user-settings-username">
	<div class="section">
		<div class="section-content">
			<div class="form-container">
				<?php echo CHtml::beginForm(array('/user/settings/changeUsername'),'post',array('class'=>'wf')); ?>
					<div class="header">
						<div class="title">
							<?php echo Yii::t('application', 'Change Username'); ?>
						</div>
					</div>
					<?php echo CHtml::errorSummary($form); ?>
					<fieldset class="top">
						<div class="row top bottom clearfix">
							<?php echo CHtml::activeLabel($form,'username'); ?>
							<?php echo CHtml::activeTextField($form,'username'); ?>
						</div>
					</fieldset>
					<fieldset class="buttons bottom">
						<?php echo CHtml::submitButton(Yii::t('application', 'Save Changes')); ?>
					</fieldset>
				<?php echo CHtml::endForm(); ?>
			</div>
		</div>
	</div>
</div>
