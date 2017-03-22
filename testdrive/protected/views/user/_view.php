<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('photo')); ?>:</b>
    <?php
    $path = realpath(Yii::app()->basePath . '/../images');
    $imagepath = $path . DIRECTORY_SEPARATOR . $data->photo;
    if (file_exists($imagepath) && is_file($imagepath)) {
        $imageurl = Yii::app()->request->baseUrl . '/images/' . $data->photo;
        $image = CHtml::image($imageurl, 'Your Photo', array('width' => '100px'));
        echo CHtml::link($image, $imageurl);
    } else {
        echo 'not set';
    }
    ?>

    <br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('about')); ?>:</b>
	<?php echo CHtml::encode($data->about); ?>
	<br />

</div>