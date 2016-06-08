<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\booksSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="books-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
	
	<div style ="float: right; width: 60%; display: none;">
   <div class="row">
   <div class="col-md-3">
    <?= $form->field($model, 'bookName') ?>
    </div>
	 <div class="col-md-3">
    <?= $form->field($model, 'category') ?>
	</div>
    <div class="col-sm-6">
         <div class="form-group" style="margin-top: 23px">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
         </div>
    </div>
    </div>
	</div>
    <?php ActiveForm::end(); ?>

</div>
