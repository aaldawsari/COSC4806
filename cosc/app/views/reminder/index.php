<?php require_once '../app/views/templates/header.php'?>

<h2>Reminder Page</h2>

<table class='table table-striped table-condensed'>
	<tr>
		<th>Subject</th>
		<th>Action</th>
	</tr>
	
    <?php foreach ($data['list'] as $items){ ?>
        <tr>
            <td><?=$items['Subject']?></td>
			<td><a href="/remind/remove/<?=$items['Id']?>">Remove</a>
				<a href="/remind/<?=$items['Id']?>">View</a>
				<a href="/remind/update/<?=$items['Id']?>">Update</a>
			</td>
        </tr>
    <?php }?>

</table>
    <a href= '/remind/create'> create new reminder</a>
<?php require_once '../app/views/templates/footer.php'?>