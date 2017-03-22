<?php
/* @var $this SiteController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle = Yii::app()->name;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
)); ?>
    <br/>
<?php
    if ($isLogin) {
    ?>
        <h1>Create Promo</h1>

        <?php $this->renderPartial('/promo/_form', array('model'=>$model)); ?>
    <?php
    }
    ?>