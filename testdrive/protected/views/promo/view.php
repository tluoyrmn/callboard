<?php
/* @var $this PromoController */
/* @var $model Promo */

?>

<h1>Promo #<?php echo $model->id; ?></h1>

<?php

$path = realpath(Yii::app()->basePath . '/../images');
$imagepath = $path . DIRECTORY_SEPARATOR . $model->photo;

$imageurl = Yii::app()->request->baseUrl . '/images/' . $model->photo;
$image = CHtml::image($imageurl, $model->caption, array('width' => '100px'));

$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'caption',
        array(
            'type'=>'raw',
            'label'=>CHtml::encode($model->getAttributeLabel('text')),
            'value'=>nl2br(trim($model->text))
        ),
        array(
            'type'=>'raw',
            'label'=>CHtml::encode($model->getAttributeLabel('photo')),
            'value'=>file_exists($imagepath) && is_file($imagepath) ? $image : ''
        ),
	),
)); ?>
