<style>
  body {
  background-color: #f1f1f1;
}

.vertical-center {
  min-height: 100%;
  min-height: 100vh;

  display: flex;
  align-items: center;
}
</style>
</head>
<body>
<?php $this->view('includes/header',$data)?>

    
<div class="vertical-center">
		<div class="container">
			<div id="notfound" class="text-center ">
				<h1>😮</h1>
				<h2>Oops! Page Not Be Found</h2>
				<p>Sorry but the page you are looking for does not exist.</p>
				<a href="<?=ROOT?>home">Back to homepage</a>
			</div>
		</div>
	</div>
  

  <!--   Core JS Files   -->
<?php $this->view('includes/footer',$data)?>
</body>
</html>