<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>LTO - Client Registration</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
</head>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="img/logo.png" alt="bootstrap 4 login page">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Register</h4>
							<form method="POST" action="conClientRegister.php" class="my-login-validation" novalidate="">
								<div class="form-group">
									<label for="name">Name</label>
									<input id="name" type="text" class="form-control" name="name" required autofocus>
									<div class="invalid-feedback">
										What's your name?
									</div>
								</div>

								<div class="form-group">
									<label for="email">E-Mail</label>
									<input id="email" type="email" class="form-control" name="email" required>
									<div class="invalid-feedback">
										Your email is invalid
									</div>
								</div>

								<div class="form-group">
									<label for="password">Password</label>
									<input id="password" type="password" class="form-control" name="password" required>
									<div class="invalid-feedback">
										Enter your Password
									</div>
								</div>

								<div class="form-group">
									<label for="conpassword">Confirm Password</label>
									<input id="conpassword" type="password" class="form-control" name="conpassword" required>
									<div class="invalid-feedback">
										Enter your Password
									</div>
								</div>

								<div class="form-group">
									<label for="dob">Birthday</label>
									<input id="dob" type="date" class="form-control" name="dob" required>
									<div class="invalid-feedback">
										Date of birth invalid
									</div>
								</div>

								<div class="form-group">
									<label for="address">Address</label>
									<input id="address" type="text" class="form-control" name="address" required>
									<div class="invalid-feedback">
										Enter your Full Address
									</div>
								</div>

								<div class="form-group">
									<label for="address">Contact #</label>
									<input id="contact" type="number" class="form-control" name="contact" required>
									<div class="invalid-feedback">
										Enter Contact Number
									</div>
								</div>

								<div class="form-group">
									<label for="password">Gender</label>
									<select name ="gender" id = "gender" class="form-control">
                                  <option>Male</option>
                                  <option>Female</option>
                                </select>
									<div class="invalid-feedback">
										Enter your gender
									</div>
								</div>

								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="agree" id="agree" class="custom-control-input" required="">
										<label for="agree" class="custom-control-label">I agree to the <a href="terms.php">Terms and Conditions</a></label>
										<div class="invalid-feedback">
											You must agree with our Terms and Conditions
										</div>
									</div>
								</div>

								<div class="form-group m-0">
									<input type="submit" name="register" class="btn btn-primary btn-block" disabled="disabled" id="register" value="Register" />
								</div>
								<div class="mt-4 text-center">
									Already have an account? <a href="login.php">Login</a>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/my-login.js"></script>
	<script type="text/javascript">
		 var checker = document.getElementById('agree');
		 var sendbtn = document.getElementById('register');
		 // when unchecked or checked, run the function
		 checker.onchange = function(){
		if(this.checked){
		    sendbtn.disabled = false;
		} else {
		    sendbtn.disabled = true;
		}

		}
	</script>
</body>
</html>