<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\Modal;
use yii\widgets\Breadcrumbs;
use app\assets\MainAsset;

MainAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
	<link rel="icon" href="favicon.ico" type="image/x-icon">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody();

      //set menu list items class to active
       switch($_GET['id'])
	   {
		   case 1: 
		     $link[1] = 'e';
		   break;
		   case 2: 
		     $link[2] = 'e';
		   break;
		   case 3: 
		     $link[3] = 'e';
		   break;
		   case 4: 
		     $link[4] = 'e';
		   break;
	   }
      
 ?>
  <div id="wrapper">

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php?site/index&id=1">Library Management System</a>
            </div>
            <ul class="nav navbar-right top-nav">
                 <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
					Signed in as: <?= Yii::$app->session['username']; ?>
                    <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                       
                        <li><?= Html::a('Settings',['users/index'], null)?> </span></li>
                        <li class="divider"></li>
                        <li>
                          <?= Html::a('Log Out',['site/login', 'option' =>1], null)?> </span>
						</li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
				   <li id="dashboardLin" <?php if(isset($link[1])) echo'class="active"'; ?>>
                         <?= Html::a('Dashboard',['site/index', 'id'=>'1'],null)?> 
                    </li>
                    <li id="issuedBookLink" <?php if(isset($link[2])) echo'class="active"'; ?>>
                     <a href="index.php?r=issued-books/index&id=2"> Issued Books
					  <span class="badge badge-primary" style="float: right; background-color: red;"> <?php $query = (new \yii\db\Query())
						->from('issuedBooks')
						->where('dateToReturn < CURDATE() and status = "O"')
						->count();;echo $query; ?> </span>
                     </a>							
                    </li>
                    <li id="bookLink" <?php if(isset($link[3])) echo'class="active"'; ?>>
                         <?= Html::a('Book Management',['books/index', 'id'=>'3'], null)?> 
                    </li>
					<li id="studentLink" <?php if(isset($link[4])) echo'class="active"'; ?>>
                         <?= Html::a('Student Management',['students/index', 'id'=>'4'], null)?> 
                    </li>
                   
                </ul>
            </div>
       
            <!-- /.navbar-collapse -->
        </nav>

  <div id="page-wrapper" style ="overflow-y: auto;">
     <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?> 
	<div class="container-fluid">
	   <?= $content ?>
	</div>
  </div>
</div>
<?php $this->endBody() ?>

  <?php
	    Modal::begin(['header'=>'<h4>Library Management System</h4>',
					  'id'=>'modal',
					  'size'=>'modal-lg']);
	
		echo "<div id='modalContent'></div>";
		Modal::end();
	?>
</body>
</html>
<?php $this->endPage() ?>
