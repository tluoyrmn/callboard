<?php
/* @var $this PromoController */
/* @var $data Promo */
?>

<div class="view">
    <h4><?php echo CHtml::encode($data->caption); ?></h4>

	<?php echo nl2br($data->text); ?>
    <div>
    <?php
        $path = realpath(Yii::app()->basePath . '/../images');
        $imagepath = $path . DIRECTORY_SEPARATOR . $data->photo;
        if (file_exists($imagepath) && is_file($imagepath)) {
            $imageurl = Yii::app()->request->baseUrl . '/images/' . $data->photo;
            $image = CHtml::image($imageurl, $data->caption, array('width' => '200px'));
            echo CHtml::link($image, $imageurl);
        }
    ?>
    </div>
</div>