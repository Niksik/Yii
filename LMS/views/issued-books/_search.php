<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IssuedBooksSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="issued-books-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'issueId') ?>

    <?= $form->field($model, 'bookId') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'dateIssued') ?>

    <?php // echo $form->field($model, 'dateToReturn') ?>

    <?php // echo $form->field($model, 'idNumber') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
