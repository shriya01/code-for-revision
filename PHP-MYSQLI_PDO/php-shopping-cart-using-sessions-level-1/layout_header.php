
<?php
$_SESSION['cart']=isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo isset($page_title)?$page_title:'PHP Shopping Cart With Session'; ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Latest compiled and minified Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	<!-- our custom CSS -->
	<link rel="stylesheet" href="libs/css/custom.css" />
</head>
<body>
    <?php include 'navigation.php'; ?>
    	<div class="container"><!-- .container start -->
		<div class="row"><!-- .row start -->
			<div class="col-sm-12">
				<div class="page-header">
					<h1><?php echo isset($page_title) ? $page_title : "PHP Shopping Cart With Session"; ?></h1>
				</div>
			</div>
