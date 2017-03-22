<?php
/* @var $this UserController */
/* @var $model User */


$this->menu=array(
	array('label'=>'My Profile', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Edit My Profile</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'isNew'=>0, 'photoExists'=>$photoExists)); ?>