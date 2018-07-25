<?php $this->load->view('partials/head.php') ?>
<body>
    <div class="container">
          <div class="header clearfix">
			  <h3 class="text-muted"><a href="/" style="text-decoration: none; color: black">Sales Force</a></h3>
		  </div>

          <div class="col offset-sm-2 col-sm-8">
          	  <h3 style="text-align: center">Login</h3>
	          <form method="post" action="/action/login">
          		<div class="form-group">
				    <label>Email address</label>
				    <input type="email" class="form-control" id="" name="email" placeholder="Enter email" required>
				    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
				</div>
				<div class="form-group">
				    <label>Password</label>
				    <input type="password" class="form-control" id="" name="password" placeholder="Password" required>
				</div>
				<div class="form-group">
				    <button class="btn btn-block btn-success">Login</button>
				</div>
				
	          </form>
          </div>
          <?php $this->load->view('partials/footer.php') ?>
    </div>
</body>
<?php $this->load->view('partials/scripts.php') ?>
</html>