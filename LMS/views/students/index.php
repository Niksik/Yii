<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\studentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add Students', null, ['value'=>Url::to('index.php?r=students/create'),'class' => 'btn btn-primary', 'id'=>'modalButton']) ?>
    </p>
	<div class="table-responsive">
		<?= GridView::widget([
			'dataProvider' => $dataProvider,
			'filterModel' => $searchModel,
			'columns' => [
				['class' => 'yii\grid\SerialColumn'],

				'idNumber',
				'fullName',
				[
				 'attribute' => 'Email',
				 'value' => 'email'
			   ],
				[
				 'attribute' => 'Phone Number',
				 'value' => 'phoneNumber'
			   ],

				['class' => 'yii\grid\ActionColumn'],
			],
		]); ?>
	</div>
</div>
