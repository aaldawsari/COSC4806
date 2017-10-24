<?php require_once '../app/views/templates/headerPublic.php' ?>
<div>
    <div>
                <h1>You are not logged in</h1>


    </div>

    <div class="row">

            <form action="/login/index" method="post">

					<div>
					  <label>Username</label>
					  <div>
						<input type="text" name="username" placeholder="Username">
					  </div>
					</div>
					<div>
					  <label for="password">Password</label>
					  <div>
						<input type="password" name="password" placeholder="Password">
					  </div>
					</div>
					<div>

						<button type="submit">Submit</button>

					</div>

			</form>
			<a href="/login/register"> Sign up</a>

    </div>

    <?php require_once '../app/views/templates/footer.php' ?>
