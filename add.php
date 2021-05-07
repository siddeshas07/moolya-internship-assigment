<?php
  require_once ('config/db.php');


  // CREATE DATA
  if(isset($_POST['submit']) && isset($_POST['submit']) != ''){


    $id = (!empty($_GET['id']))? $_GET['id'] : '';


    // VALIDATION
    // CHECKING FOR EMPTY.... IF INPUT IS EMPTY IT WILL NOT SAVE TO DATABASE
    $name = (!empty($_POST['name'])) ? $_POST['name'] : '';
    $email_id = (!empty($_POST['email_id'])) ? $_POST['email_id'] : '';
    $department  = (!empty($_POST['department'])) ? $_POST['department'] : '';
    $position = (!empty($_POST['position'])) ? $_POST['position'] : '';



    if($id){
        // IF URL HAS ID IT WILL UPDATE
        // $query = "UPDATE players SET name='$name', market_value='$marketVlu', club='$club', position= '$position' WHERE id='$id'";
        $query = "UPDATE employee SET name='$name', email_id='$email_id', department='$department', position= '$position' WHERE id='$id'";
        $msg = "updated";
      }else{
        // IF URL DON'T HAVE ID IT WILL ADD RECORD
        // echo "<h2>name is $name market value $marketVlu club $club position is $position </h2>";
        $query ="INSERT INTO employee (name,position ,department,email_id) VALUES ('$name' , '$position', '$department', '$email_id')";
        $msg = 'inserted';
      }





        //   echo "<h2> $name  $email_id $department $position </h2> ";
        //  $conn = mysqli_connect("localhost", "root", "", "crud");
        //   $query ="INSERT INTO employee (name,position ,department,email_id) VALUES ('$name' , '$position', '$department', '$email_id')";
          //$query ="INSERT INTO empoylee (name,position) VALUES ('$position')";
          if(mysqli_query($conn,$query))
        //  {
        header('Location: index.php?data_recorded');
             echo"sucessful";
         
        //  }
        if($conn)
        {
            echo"db is connected";
        }
    }

        if (isset($_GET['id'])&& $_GET['id']!= '')
        {
        
        $employee_id=$_GET['id'];
        $query ="SELECT * FROM `employee` where id=$employee_id";
        $result = mysqli_query($conn,$query);
        $record=mysqli_fetch_row($result);

        $name =$record[0];
        $position=$record[1];
        $department=$record[2];
        $email_id=$record[3];
        }

  
        ?>


        
<?php require_once("partials/head.php"); ?>
<?php require_once("partials/nav.php"); ?>

<div class="container mt-5 shadow p-5">
      <h2 class="text-center">Enter Employee Information</h2>
      <br>
      <form action="" method="post">
          <div class="form-row">
              <div class="col">
                  <div class="form-group">
                      <label for="name">Employee Name</label>
                      <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" placeholder="Enter employee name !">
                  </div>
              </div>
              <div class="col">
                  <div class="form-group">
                      <label for="email_id">email_id</label>
                      <input type="text" class="form-control" name="email_id" value="<?php echo $email_id; ?>" placeholder="Enter  email_id !">
                  </div>
              </div>
          </div>
          <div class="form-row">
              <div class="col">
                  <div class="form-group">
                      <label for="position">Position</label>
                      <input type="text" class="form-control" name="position" value="<?php echo $position; ?>" placeholder="Enter employee position !">
                  </div>
              </div>
              <div class="col">
                  <div class="form-group">
                      <label for="department">Departement</label>
                      <input type="text" class="form-control" name="department" value="<?php echo $department; ?>" placeholder="EnterDepartment !">
                  </div>
              </div>
          </div>
          <div class="form-group">
              <input type="submit" class="btn btn-primary form-control" name="submit" >
          </div>
      </form>

      <br><br>

  </div>
  <?php require_once("partials/footer.php"); ?>