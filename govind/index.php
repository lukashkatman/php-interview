<?php
/**
 * Created by PhpStorm.
 * User: rnsdk
 * Date: 8/12/2017
 * Time: 12:18 PM
 */
 require_once 'core/init.php';
 $information = new Information();
 $info = $information->getInformation();
 $info = $information->data();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
  
	<script src="js/jquery"></script>
  
</head>
<body>

<h2 class="text-center">PHP Test</h2>
<br>
<div class="divider"></div>
<div class="row">
    <div class="container">
        <div class="col-md-6">
            <form action="index.php" method="get">
                <div class="form-group">
                    <label for="search">Search</label>
                    <input type="text" class="form-control"  name="search" id="search" placeholder="Search">
                    <input type="submit" value="Search">
                </div>
            </form>
            <div class="divider">

            </div>
                <table class="table table-bordered">

                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                    </tr>
					<tbody id='tdata'>
					<?php 
					foreach($info as $data):
					?>
                   <tr>
				   <td><?= $data->name ?></td>
				   <td><?= $data->email ?></td>
				   <td><?= $data->contact ?></td>
				   </tr>
                  <?php endforeach; ?>
</tbody>

                </table>
        </div>
        <div class="col-md-6">
            <form id="getInfo" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control"   name="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control"  name="email" placeholder="email">
                </div>
                <div class="form-group">
                    <label for="email">Contactl</label>
                    <input type="number" class="form-control"  name="contact" placeholder="contact">
                </div>
				<input type="hidden" name="token" value="<?php echo Token::generate(); ?>"/>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</div>
<script>
$("#getInfo").submit(function(e) {

    var url = "backend.php"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
           url: url,
           data: $("#getInfo").serialize(), // serializes the form's elements.
           success: function(data)
           {
			  
				   $("#tdata").append(data)
			   
           }
         });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});
</script>
</body>
</html>
