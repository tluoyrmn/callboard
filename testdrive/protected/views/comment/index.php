<?php
/* @var $this CommentController */
/* @var $dataProvider CActiveDataProvider */

$this->menu=array(
	array('label'=>'Add Comment', 'url'=>array('create', 'promo_id'=>$promo_id)),
	array('label'=>'Home', 'url'=>array('site/index')),
);
?>

<h1>Promo #<?php echo $promo->id; ?></h1>

<?php $this->renderPartial('/promo/_view', array('data'=>$promo)); ?>
<br />

<h1>Comments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
