<?php
/* @var $this CommentController */
/* @var $data Comment */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
    <br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('body')); ?>:</b><br />
	<?php echo nl2br($data->body); ?>
	<br /><br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rating')); ?>:</b>
	<?php echo CHtml::encode($data->rating); ?>
	<br />


</div>