<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data', 'autocomplete'=>'off'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

    <?php
    if (isset($isNew) && $isNew!=1) {
        ?>
        <div class="row">
            <?php echo $form->labelEx($model,'about'); ?>
            <?php echo $form->textArea($model,'about', array('maxlength' => 300, 'rows' => 6, 'cols' => 60)); ?>
            <?php echo $form->error($model,'about'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'photo'); ?>
            <div>
            <?php
                if ($photoExists) echo CHtml::image(Yii::app()->request->baseUrl.'/images/'.$model->getOldImage(), 'Your Photo', array('width'=>'70px'));
            ?>
            </div>
            <div>
                <?php echo $form->fileField($model, 'photo'); ?>
            </div>
            <?php echo $form->error($model, 'photo'); ?>
        </div>
        <?php
    }
    ?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->