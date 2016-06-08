<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\IssuedBooks */

$this->title = 'Create Issued Books';
$this->params['breadcrumbs'][] = ['label' => 'Issued Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="issued-books-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
