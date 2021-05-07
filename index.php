<?php require_once("partials/head.php"); ?>
<?php require_once("partials/nav.php"); ?>

<?php include_once("config/db.php"); ?>
<div class="container mt-5 shadow p-5">
    <h2 class="text-center">Enter Employee Information</h2>
    <br>
    <form action="add.php" method="post">
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter  name !">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="marketVlu">email id</label>
                    <input type="text" class="form-control" name="email_id" placeholder="Enter email id !">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label for="position">Position</label>
                    <input type="text" class="form-control" name="position" placeholder="Enter Employee position !">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="club">Department</label>
                    <input type="text" class="form-control" name="department" placeholder="Enter Department Name !">
                </div>
            </div>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary form-control" name="submit">
        </div>
    </form>

    <br><br>

    <?php
    $query = "SELECT * FROM employee";
    $result = mysqli_query($conn, $query);
    $records = mysqli_num_rows($result);


    ?>
    <table class="table text-white bg-transparent">
        <thead>
            <th>Name</th>
            <th>email_id</th>
            <th>Position</th>
            <th>Department</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php
            if ($records) {
                while ($rows = mysqli_fetch_assoc($result)) {
            ?>
                    <tr>
                        <td><?php echo $rows['name']; ?></td>
                        <td><?php echo $rows['email_id']; ?></td>
                        <td><?php echo $rows['position']; ?></td>
                        <td><?php echo $rows['department']; ?></td>
                        <td>
                            <a href="add.php?id=<?php echo $rows['id']; ?>" class="btn btn-primary" type="button" name="edit">edit</a>
                            <a href="delete.php?id=<?php echo $rows['id']; ?>" class="btn btn-danger">delete</a>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>
<?php require_once("partials/footer.php"); ?>