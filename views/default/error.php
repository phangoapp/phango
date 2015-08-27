<?php

function HomeView($title, $content)
{

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Phango Framework</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<style type="text/css">
	
	h1, h2, h3 {
	
		
		/*border: solid #cdcdcd 1px;*/
		padding:5px 10px 5px 10px;
		margin:0px;
		background: #b80505;
		color: #fbfbfb;
		
	}
	
	body {
	
		background: #fbfbfb;
		margin-left:15px;
		margin-right:15px;
		font-size:14px;
		font-family: 'Open Sans', sans-serif;
	
	}
	
	 #container {
	 
		margin-left:auto;
		margin-right:auto;
		padding:10px 20px 10px 20px;
		margin:0px;
	 
	 }
	 
	 .body {
	 
		padding:10px 20px 10px 20px;
		border: solid #c4c4c4 1px;
		margin:0px;
		background: #fff;
		
	 }
	 
	 .footer {
	 
		text-align:right;
		padding:3px 6px 3px 6px;
		font-size:8pt;
	 
	 }
	 
	 .code {
	 
		
		
		
	 
	 }
	 
	</style>
</head>
<body>

<div id="container">
	<h1><?php echo $title; ?></h1>

	<div class="body">
		<?php echo $content; ?>
	</div>

	<div class="footer">Phango, a system created for create webapps</div>
</div>

</body>
</html>
<?php

}

?>