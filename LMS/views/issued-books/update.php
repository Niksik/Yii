<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\IssuedBooks */

$this->title = 'Update Issued Books: ' . $model->issueId;
$this->params['breadcrumbs'][] = ['label' => 'Issued Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->issueId, 'url' => ['view', 'id' => $model->issueId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="issued-books-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
