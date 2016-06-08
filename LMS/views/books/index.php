<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\booksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Book Management';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-index">

<?php echo $this->render('_search', ['model' => $searchModel]); ?>
<br>
    <h1><?= Html::encode($this->title) ?></h1>
	<br>

    <p>
        <?= Html::a('Add Book', null, ['value'=>Url::to('index.php?r=books/create'),'class' => 'btn btn-success', 'id'=>'modalButton']) ?>
        <?= Html::a('Add Category', null, ['value'=>Url::to('index.php?r=category/create'),'class' => 'btn btn-warning', 'id'=>'categoryModalButton']) ?>
    </p>
	<br><br>
	<div class="table-responsive">
		<?= GridView::widget([
			'dataProvider' => $dataProvider,
			'filterModel' => $searchModel,
			'columns' => [
				['class' => 'yii\grid\SerialColumn'],
				'bookName',
				'category',
				[
				 'attribute' => 'Quantity',
				 'value' => 'quantity'
			   ],

				['class' => 'yii\grid\ActionColumn'],
			],
		]); ?>
	</div>
</div>
