<?php require_once '../app/views/templates/header.php' ?>

<?php
if($_SESSION['completeProfile']==1) {


    ?>
    <form>
        <div class="form-group">
            <label for="exampleInputEmail1">full name: <?= $data['usr']?></label>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">birthdate: <?= $data['birth']?></label>


        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address: <?= $data['email']?></label>

        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">phone number: <?= $data['phone']?></label>
        </div>
    </form>

    <?php
}else{


?>


    <div class="alert alert-danger" role="alert">
        <strong>profile not complete!</strong> <a href="#" class="alert-link">click update profile</a> to update your data
    </div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Open modal for edit profile</button>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>




                <div class="modal-body">
                    <form action="/Profile/update" method="post">
                        <div class="form-group">
                            <label for="recipient-name"  class="form-control-label">birthdate:</label>
                            <input id="birth" name="birth"  class="form-control" type="date">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name"  class="form-control-label">phone number:</label>
                            <input type="number" name="pn" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name"  class="form-control-label">first name:</label>
                            <input type="text" name="fn" class="form-control" id="fn">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name"  class="form-control-label">last name:</label>
                            <input type="text" class="form-control" name="ln" id="ln">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name"  class="form-control-label">email:</label>
                            <input type="email" name="useremail" class="form-control" id="useremail">
                        </div>


                        <button type="submit" class="btn btn-primary">update profile</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
<?}?>