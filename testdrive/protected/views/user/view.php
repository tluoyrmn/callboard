<?php
/* @var $this UserController */
/* @var $model User */

$this->menu=array(
	array('label'=>'Edit Profile', 'url'=>array('update', 'id'=>$model->id)),
);
?>

<h1>My Profile</h1>

<?php
    if ($photoExists) {
        $imageurl = Yii::app()->request->baseUrl . '/images/' . $model->photo;
        $image = CHtml::image($imageurl, 'Your Photo', array('width' => '100px'));
        $imagelink = CHtml::link($image, $imageurl);
    } else {
        $imagelink = 'not set';
    }

    $this->widget('zii.widgets.CDetailView', array(
        'data'=>$model,
        'attributes'=>array(
            'username',
            array(
                'type'=>'raw',
                'label'=>CHtml::encode($model->getAttributeLabel('photo')),
                'value'=>$imagelink
            ),
            array(
                'type'=>'raw',
                'label'=>CHtml::encode($model->getAttributeLabel('about')),
                'value'=>strlen(trim($model->about))? nl2br(trim($model->about)) : '-'
            )
	    ),
    ));
?>
