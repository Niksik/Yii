<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
 
use app\models\Books;
use app\models\Students;
/* @var $this yii\web\View */
/* @var $model app\models\IssuedBooks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="issued-books-form">

    <?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'bookId')->dropDownList(
			ArrayHelper::map(Books::find()->all(), 'bookId', 'bookName'),
			['prompt'=>'Select a Book']
	)?>
	
	 <?= $form->field($model, 'idNumber')->dropDownList(
			ArrayHelper::map(Students::find()->all(), 'idNumber', 'idNumber'),
			['prompt'=>'Select a Student']
	)?>
    <?php
	    echo $form->field($model, 'dateIssued')->widget(DatePicker::classname(), [
			'options' => ['placeholder' => 'Enter date issued ...'],
			'pluginOptions' => [
				'autoclose'=>true,
				'format' => 'yyyy-m-d'
			]
		]);
		
		echo $form->field($model, 'dateToReturn')->widget(DatePicker::classname(), [
			'options' => ['placeholder' => 'Enter to be returned ...'],
			'pluginOptions' => [
				'autoclose'=>true,
				'format' => 'yyyy-m-d'
			]
		]);
	?>


   <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
