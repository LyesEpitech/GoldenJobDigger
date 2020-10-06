
<header>
	<div class="row heade sticky-top">

		<div class="col-sm-12">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<a class="navbar-brand" href="#">Home</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" href="#">Actus</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Companies</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Find a job
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="ads.php">Discover offers</a>
								<a class="dropdown-item" href="#">Discover events</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Advices</a>
							</div>
						</li>
						
					</ul>
					<form class="form-inline my-2 my-lg-0" id="buttonHeader">
						<button class="sign btn btn-outline-success my-2 my-sm-0" type="button" data-toggle="modal" data-target="#signInModal">Sign in</button>
						<button class="sign btn btn-outline-success my-2 my-sm-0" type="button" data-toggle="modal" data-target="#signUpModal">Sign up</button>
					</form>
				</div>
			</nav>
		</div>
	</div>
	<!-- MODAL SIGN IN -->
	<div class="modal fade" id="signInModal" tabindex="-1" role="dialog" aria-labelledby="signInModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="signInModalLabel">Sign In</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label for="exampleInputEmail1">Email address</label>
							<input name="EmailSignIn" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input name="PasswordSignIn" type="password" class="form-control" id="exampleInputPassword1">
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button name="SubmitSignIn" type="submit" class="btn btn-primary">Submit</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<!-- MODAL SIGN UP -->
	<div class="modal fade" id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="signUpModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="signUpModalLabel">Sign Up</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="POST" enctype="multipart/form-data">
					<div class="modal-body" id="modalBodySignUp">
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="RolesSignUp" id="Radio1" value="People" onchange="showPeople()" checked>
							<label class="form-check-label" for="Radio1">People</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="RolesSignUp" id="Radio2" value="Companies" onchange="showCompanies()">
							<label class="form-check-label" for="Radio2">Companies</label>
						</div>
						<div class="form-group">
							<label for="InputEmail1">Email address</label><i class="fas fa-info-circle"></i>
							<input name="EmailSignUp" type="email" class="form-control" id="InputEmail1" placeholder="example@example.com">
						</div>
						<div class="form-group">
							<label for="InputFirstName">First name</label><i class="fas fa-info-circle"></i>
							<input name="FirstNameSignUp" type="text" class="form-control" id="InputFirstName" placeholder="Bryan">
						</div>
						<div class="form-group">
							<label for="InputLastName">Last name</label><i class="fas fa-info-circle"></i>
							<input name="LastNameSignUp" type="text" class="form-control" id="InputLastName" placeholder="Johnson">
						</div>
						<div class="form-group">
							<label for="inputSex">Sex</label>
							<select name="SexSignUp" id="inputSex" class="form-control">
								<option selected>Male</option>
								<option>Female</option>
							</select>
						</div>
						<div class="form-group">
							<label for="InputDate">Date of birth</label>
							<input name="DateSignUp" type="date" class="form-control" id="InputDate">
						</div>
						<div class="form-group">
							<label for="inputAddress">Address</label><i class="fas fa-info-circle"></i>
							<input name="AdressSignUp" type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
						</div>
						<div class="form-group">
							<label for="inputCity">City</label><i class="fas fa-info-circle"></i>
							<input name="CitySignUp" type="text" class="form-control" id="inputCity" placeholder="New York">
						</div>
						<div class="form-group">
							<label for="inputZipCode">Zip Code</label><i class="fas fa-info-circle"></i>
							<input name="ZipCodeSignUp" type="text" class="form-control" id="inputZipCode" placeholder="10001">
						</div>
						<div class="form-group">
							<label for="InputPassword1">Password</label><i class="fas fa-info-circle"></i>
							<input name="Password1SignUp" type="password" class="form-control" id="InputPassword1" placeholder="p@sSw0rd">
						</div>
						<div class="form-group">
							<label for="InputPassword2">Confirm Password</label><i class="fas fa-info-circle"></i>
							<input name="Password2SignUp" type="password" class="form-control" id="InputPassword2" placeholder="p@sSw0rd">
						</div>
						<div class="form-group">
							<label for="InputResume">Your Resume</label>
							<input name="ResumeSignUp" type="file" class="form-control" id="InputResume" accept="application/pdf">
						</div>
						<div class="form-group form-check">
							<input name="TermsSignUp" type="checkbox" class="form-check-input" id="exampleCheck1">
							<label class="form-check-label" for="exampleCheck1">Accept Terms</label>
							<i class="fas fa-info-circle"></i>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button name="SubmitSignUp" type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</header>
