<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\IssuedBooks */

$this->title = $model->issueId;
$this->params['breadcrumbs'][] = ['label' => 'Issued Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="issued-books-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->issueId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->issueId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'issueId',
            'bookId',
            'username',
            'dateIssued',
            'dateToReturn',
            'idNumber',
        ],
    ]) ?>

</div>
