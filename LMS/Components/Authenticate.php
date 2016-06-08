

<?php


    function checkUser()
	{
		 if(Yii::$app->session['username']== null){
		   header("Location: index.php?r=/site/login"); 
		   exit();
	   }
	}
	

?>