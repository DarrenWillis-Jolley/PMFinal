<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Employee list table</title>
    <style>
        table, th, tr, td { border: solid 2px black;}
    </style>
</head>
<body>
<h1> Employee list table</h1>
<table>
    <thead>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    </thead>

    <tbody>
    <?php
    $conn = mysqli_connect("localhost", "root", "inet2005", "PMPayroll");
    $result2 = mysqli_query($conn,"SELECT employee_id, first_name, last_name, salary_id FROM employees  ");
    while($row = mysqli_fetch_assoc($result2)):
        ?>
        <tr>
            <td><?php echo $row['employee_id'] ?></td>
            <td><?php echo $row['first_name'] ?></td>
            <td><?php echo $row['last_name'] ?></td>
            <td>
                <form name="PayForm" action="PayForm.php" method="POST">

                    <input type="hidden" name="Payemployee_id" value="<?php echo $row['employee_id']; ?>" />
                    <input type="hidden" name="Payfirst_name" value="<?php echo $row['first_name']; ?>" />
                    <input type="hidden" name="Paylast_name" value="<?php echo $row['last_name']; ?>" />
                    <input type="hidden" name="Paysalary_id" value="<?php echo $row['salary_id']; ?>" />


                    <input type="submit" name="PayFormButton" value="PayForm" />
                </form>
            </td>
        </tr>

        <?php
    endwhile;
    mysqli_close($conn);





    ?>
    </tbody>
</table>
<a href="SalaryBracketForm.php">Salary Bracket Form</a>


</body>
</html>