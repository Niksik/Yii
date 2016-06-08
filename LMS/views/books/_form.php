<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Category;

/* @var $this yii\web\View */
/* @var $model app\models\Books */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="books-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bookName')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'category')->dropDownList(
			ArrayHelper::map(Category::find()->all(), 'categoryType', 'category'),
			['prompt'=>'Select a category']
	)?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
