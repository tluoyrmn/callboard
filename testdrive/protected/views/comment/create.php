<?php
/* @var $this CommentController */
/* @var $model Comment */

$this->menu=array(
	array('label'=>'Back to Home', 'url'=>array('site/index')),
    array('label'=>'Promo #'.$promo->id.' Comments', 'url'=>array('comment/index', 'promo_id'=>$promo->id))
);
?>

<h1>Promo #<?php echo $promo->id; ?></h1>

<?php $this->renderPartial('/promo/_view', array('data'=>$promo)); ?>
<br />

<h1>Comment / Rating Add</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>