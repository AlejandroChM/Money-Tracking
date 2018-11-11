<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="UTF-8">
				<title>MoneyTracking</title>
					<link rel="stylesheet" href="<?php
					/**
					 * update.phhtml
					 *
					 * @author Jose Alejandro Chan Martin <alejandrochanmartin1@gmail.com>
					 */
						 echo APP_URL_CSS."bootstrap.min.css"; ?>">
					</head>
		<body>
			<nav class="navbar navbar-default ">
				<div class="container-fluid">
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li role="presentation">
								<a href="<?php echo APP_URL.'transactions'; ?>" class="nav-item nav-link">
									<span class="glyphicon glyphicon glyphicon glyphicon-usd" aria-hidden="true"></span>
								Transactions</a>
							</li>
							<li role="presentation">
								<a href="<?php echo APP_URL.'accounts'; ?>" class="nav-item nav-link">
									<span class="glyphicon glyphicon glyphicon glyphicon-credit-card" aria-hidden="true"></span>
								Accounts</a>
							</li>
							<li role="presentation">						
								<a href="<?php  echo APP_URL.'categories';?>" class="nav-item nav-link">
									<span class="glyphicon glyphicon-folder-close" aria-hidden="true"></span>
								Categories</a>					
							</li>	
						</ul>
					</div>
				</div>
			</nav>
			<div class="container">
				<div clas="row">
			<?php  
			/**
			 * php
			 */
			if (isset($this->flashMessage)) {
				echo "<h4>".$this->flashMessage."</h4>";
			}
			?>

