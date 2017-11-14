<?php require_once '../app/views/templates/headerPublic.php' ?>
<div class="container">
    <div>
                <h1>You are not logged in</h1>


    </div>

    <div>

            <form action="/login/index" method="post">

					<div class="form-group">
					  <label>Username</label>
					  <div>
						<input type="text" class="form-control" name="username" placeholder="Username">
					  </div>
					</div>
					<div>
					  <label for="password">Password</label>
					  <div>
						<input type="password" class="form-control" name="password" placeholder="Password">
					  </div>
					</div>
					<div>

						<button type="submit" class="btn btn-primary">login</button>

					</div>

			</form>
			<a href="/login/register"> Sign up</a>

    </div>

    <?php require_once '../app/views/templates/footerPublic.php' ?>
