<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel app\models\IssuedBooksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Issued Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="issued-books-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Issue a Book',null, ['value'=>Url::to('index.php?r=issued-books/create'),'class' => 'btn btn-success', 'id'=>'modalButton']) ?>
    </p>
	<div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
		'rowOptions' => function($model){
			if(date("Y-m-d") > $model->dateToReturn){
				return ['class'=>'danger'];
			}
			else if(date("Y-m-d") == $model->dateToReturn){
				return ['class'=>'warning'];
			}
			else{
				return ['class'=>'success'];
			}
		},
        'columns' => [
           ['class' => 'yii\grid\SerialColumn'],

		   [
			 'attribute' => 'Book',
			 'value' => 'book.bookName'
		   ],
		    'idNumber',
		   [
			 'attribute' => 'Student Name',
			 'value' => 'student.fullName'
		   ],
		   [
			 'attribute' => 'issued Date',
			 'format' => ['date', 'php:M-d-Y'],
			 'value' => 'dateIssued',
		   ],
		   [
			 'attribute' => 'Return Date',
			 'format' => ['date', 'php:M-d-Y'],
			 'value' => 'dateToReturn'
		   ],
           [
			'attribute' => 'No. days',
			'format' => 'raw',
			'value' => function ($model) {  
                $diff = new stdClass;			
				$ref = new DateTime($model->dateToReturn);
				$now = new DateTime();
				if($now > $ref){
					$diff = $ref->diff($now);	
				}else{
					$diff->d = 0;
				}
						
					
					return ''.$diff->d.'';
			}
			],
		   [
			'attribute' => '',
			'format' => 'raw',
			'value' => function ($model) {     
					$path = Url::to(['update-status', 'id'=> $model->issueId]);
					return '<a class="btn btn-primary btn-block" href="'.$path.'">Returned</a>';
			},
           ],
		    
            ['class' => 'yii\grid\ActionColumn'],]
    ]); 
	?>
   </div>
</div>
