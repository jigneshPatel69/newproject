<?php


if(isset($_POST['insert']))
{
    try {

        // connect to mysql

        $pdoConnect = new PDO("mysql:host=localhost;dbname=data","root","");
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        exit();
    }

    // get values form input text and number
    $lname = $_POST['lname'];
    $lphone = $_POST['lphone'];
    $laddress = $_POST['laddress'];
    $lemail = $_POST['lemail'];
    $lfile = $_POST['lfile'];

    // mysql query to insert data

    $pdoQuery = "INSERT INTO `inquiry`(`name`, `phone`, `address`, `email`, `file`) VALUES (:lname,:lphone,:laddress,:lemail,:lfile)";

    $pdoResult = $pdoConnect->prepare($pdoQuery);

    $pdoExec = $pdoResult->execute(array(":lname"=>$lname,":lphone"=>$lphone,":laddress"=>$laddress,":lemail"=>$lemail,":lfile"=>$lfile));

        // check if mysql insert query successful
    if($pdoExec)
    {
        echo 'Data Inserted';
    }else{
        echo 'Data Not Inserted';
    }
}


?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>

    <div class="container-fluid bg">
      <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12"></div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <!--form start-->
            <form action="registration.php" class="form-container" method="post">
              <header class="header">
                <h3>Registration Form</h3>
              </header>
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="lname" class="form-control"  placeholder="Name" required>
              </div>
              <div class="form-group">
                <label>Phone</label>
                <input type="tel" name="lphone" class="form-control" placeholder="Phone number"required>
              </div>
              <div class="form-group">
                <label>Address</label>
                <input type="textarea" name="laddress" class="form-control"  placeholder="Address"required>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="lemail" class="form-control" placeholder="Email address"required>
              </div>
              <div class="form-group">
                <label for="Input File">File input</label>
                <input type="file" name="lfile" id="inputfile">
              </div>
              <button type="submit" name="insert" class="btn btn-success btn-block">Submit</button>
            </form>
            <!-- form end-->
          </div>
              <div class="col-md-4 col-sm-4 col-xs-12"></div>
            </div>
          </div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      </body>
      </html>
