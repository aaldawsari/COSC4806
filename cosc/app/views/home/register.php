<?php require_once '../app/views/templates/headerPublic.php' ?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Please create an account</h1>
            </div>
        </div>
    </div>

    <div>

            <form action="/login/register" method="post">
					<div>
					  <label for="username">New Username</label>
					  <div>
						<input type="text" name="username" placeholder="Username">
					  </div>
					</div>
					<div>
					  <label for="password">New Password</label>
					  <div>
						<input type="password" name="password" placeholder="Password">
					  </div>
					</div>
					<div>
					  <div>
						<button type="submit">register</button>
					  </div>
					</div>
			</form>
    </div>

    <?php require_once '../app/views/templates/footer.php' ?>
