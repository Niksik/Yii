<?php

/* @var $this yii\web\View */
$this->title = 'Welcome';

?>
<style>
  .glyphicon{
	font-size:50px;
}
</style>

						

<div class="site-index">

    <div class="jumbotron">
	<center>
        <h1>Welcome  <?= Yii::$app->session['username'];?> !</h1>
            <?php
			 $query = (new \yii\db\Query())
						->from('issuedBooks')
					    ->where('dateToReturn < CURDATE() and status = "O"')
						->count();
			    if($query > 0)
				{
					$this->title='Welcome ('.$query.')';
					$msg = ($query == 1)?'You have a overdued book':'You have overdued books';
					echo '<div class="alert alert-danger" role="alert">
						  <a href="#" class="alert-link">
						  '.$msg.'
						  </a>
						  </div>';
				}
				
				$query = (new \yii\db\Query())
						->from('issuedBooks')
					    ->where('dateToReturn = CURDATE() and status = "O"')
						->count(); 
				 if($query > 0)
				{
					$msg = ($query == 1)?'You have a book that is due today':'You have books that are due today';
					echo '<div class="alert alert-warning" role="alert">
						  <a href="#" class="alert-link">
						  '.$msg.'
						  </a>
						  </div>';
				}
			?>
		<br>
		<br>
		
		<div class="row">
		 <?php
		 $query = (new \yii\db\Query())
					->from('issuedBooks')
					->where('dateToReturn < CURDATE() and status = "O"')
					->count();
			    if($query > 0)
				{
					
					echo '<div class="col-lg-3 col-md-6" >
							<div class="panel panel-danger" style=" border: 1px solid red;">
								<div class="panel-heading">
									<div class="row">
										<div class="col-xs-3">
											<i class="glyphicon glyphicon-calendar" aria-hidden="true"></i>
										</div>
										<div class="col-xs-9 text-right">
											<div class="huge">'.$query.'</div>
											<div>Overdue Books</div>
										</div>
									</div>
								</div>
								<a href="#">
									<div class="panel-footer">
									 
									</div>
								</a>
							</div>
						 </div>';
				}
		?>
		 <?php
		 $query = (new \yii\db\Query())
					->from('issuedBooks')
					->where('dateToReturn = CURDATE() and status = "O"')
					->count();
			  
				 if($query > 0)
				{	
					echo '<div class="col-lg-3 col-md-6" >
							<div class="panel panel-yellow">
								<div class="panel-heading">
									<div class="row">
										<div class="col-xs-3">
											<i class="glyphicon glyphicon-calendar" aria-hidden="true"></i>
										</div>
										<div class="col-xs-9 text-right">
											<div class="huge">'.$query.'</div>
											<div>Due Books</div>
										</div>
									</div>
								</div>
								<a href="#">
									<div class="panel-footer">
									 
									</div>
								</a>
							</div>
						 </div>';
		        }
				
		?>
		<div class="col-lg-3 col-md-6">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
						<i class="glyphicon glyphicon-share-alt" aria-hidden="true" style="font-size: 50px;"></i>
						</div>
						<div class="col-xs-9 text-right">
							<div class="huge"><?=$query?></div>
							<div>Issued Books</div>
						</div>
					</div>
				</div>
				<a href="#">
					<div class="panel-footer">
					 
					</div>
				</a>
			</div>
          </div>
			
		 <div class="col-lg-3 col-md-6">
			<div class="panel" style="background-color: #E67E22; color: white">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<i class="glyphicon glyphicon-user" aria-hidden="true"></i>
						</div>
						<div class="col-xs-9 text-right">
							<div class="huge">
							 <?php $query = (new \yii\db\Query())
									->from('students')
									->count(); 
									echo $query; 
							 ?>
						</div>
							<div>No. Students</div>
						</div>
					</div>
				</div>
				<a href="#">
					<div class="panel-footer">
						
					</div>
				</a>
			</div>
         </div>
		  
		  <div class="col-lg-3 col-md-6">
			<div class="panel" style="background-color: #1BBC9B; color: white">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
						   <i class="glyphicon glyphicon-book" aria-hidden="true"></i>
						</div>
						<div class="col-xs-9 text-right">
							<div class="huge">
							<?php $query = (new \yii\db\Query())
											->from('books')
											->count(); 
									echo $query; 
							 ?>
						</div>
							<div>No. Books</div>
						</div>
					</div>
				</div>
				<a href="#">
					<div class="panel-footer">
						
					</div>
				</a>
			</div>
         </div>
		  
    </div>
</center>
</div>
    <div class="body-content" >

<center>
<!-- start feedwind code --><script type="text/javascript">document.write('\x3Cscript type="text/javascript" src="' + ('https:' == document.location.protocol ? 'https://' : 'http://') + 'feed.mikle.com/js/rssmikle.js">\x3C/script>');</script><script type="text/javascript">(function() {var params = {rssmikle_url: "http://news.yahoo.com/rss/",rssmikle_frame_width: "100%",rssmikle_frame_height: "350",frame_height_by_article: "0",rssmikle_target: "_blank",rssmikle_font: "Arial, Helvetica, sans-serif",rssmikle_font_size: "12",rssmikle_border: "off",responsive: "off",rssmikle_css_url: "",text_align: "left",text_align2: "left",corner: "off",scrollbar: "on",autoscroll: "on",scrolldirection: "up",scrollstep: "8",mcspeed: "20",sort: "Off",rssmikle_title: "on",rssmikle_title_sentence: "",rssmikle_title_link: "",rssmikle_title_bgcolor: "#21C7CD",rssmikle_title_color: "#FFFFFF",rssmikle_title_bgimage: "",rssmikle_item_bgcolor: "#FFFCFC",rssmikle_item_bgimage: "",rssmikle_item_title_length: "55",rssmikle_item_title_color: "#040E17",rssmikle_item_border_bottom: "on",rssmikle_item_description: "on",item_link: "off",rssmikle_item_description_length: "150",rssmikle_item_description_color: "#666464",rssmikle_item_date: "gl1",rssmikle_timezone: "Etc/GMT",datetime_format: "%b %e, %Y %l:%M %p",item_description_style: "text+tn",item_thumbnail: "crop",item_thumbnail_selection: "enclosure",article_num: "15",rssmikle_item_podcast: "off",keyword_inc: "",keyword_exc: ""};feedwind_show_widget_iframe(params);})();</script><div style="font-size:10px; text-align:center; width:100%;"><a href="http://feed.mikle.com/" target="_blank" style="color:#CCCCCC;">RSS Feed Widget</a><!--Please display the above link in your web page according to Terms of Service.--></div><!--  end  feedwind code -->
</center> 

    </div>
</div>
