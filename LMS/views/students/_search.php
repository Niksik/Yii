<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\studentsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="students-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idNumber') ?>

    <?= $form->field($model, 'fullName') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'phoneNumber') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
