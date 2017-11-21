<?php require_once '../app/views/templates/header.php' ?>

    <h2>Report Page</h2>


    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Most user with reminders</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Range</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">total logins by user</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <table class='table table-striped table-condensed'>
                <tr>
                    <th>user with the most reminders</th>

                </tr>

                <?php $items=  $data['list']; ?>
                <tr>
                    <td><? echo $items[0];?></td>
                </tr>


            </table>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <form action="/Report/range" method="post">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">From</label>
                    <div class="col-sm-10">
                        <input id="date" name="from" class="form-control" type="date">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">To</label>
                    <div class="col-sm-10">
                        <input id="date" name="to" class="form-control" type="date">
                    </div>
                </div>
                <div class="form-group row">
                <button type="submit" class="btn btn-primary">get reminders</button>
                </div>
            </form>

        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
    </div>
<?php require_once '../app/views/templates/footer.php'?>