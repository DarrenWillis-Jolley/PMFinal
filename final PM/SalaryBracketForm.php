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
<h1> Employee salary list table</h1>
<table>
    <thead>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>7
    <th>Salary Scale ID</th>
    <th>Base salary</th>
    <th>Title</th>
    </thead>

    <tbody>
    <?php
    $conn = mysqli_connect("localhost", "root", "inet2005", "PMPayroll");

    $result2 = mysqli_query($conn,"SELECT employees.employee_id, employees.first_name, employees.last_name 
, salary_scales.positiongroup_id, salary_scales.base_salary,  salary_scales.position_group
FROM employees 
INNER JOIN salary_scales ON salary_scales.positiongroup_id = employees.positiongroup_id ");
    while($row = mysqli_fetch_assoc($result2)):
        ?>
        <tr>
            <td><?php echo $row['employee_id'] ?></td>
            <td><?php echo $row['first_name'] ?></td>
            <td><?php echo $row['last_name'] ?></td>
            <td><?php echo $row['positiongroup_id'] ?></td>
            <td><?php echo $row['base_salary'] ?></td>
            <td><?php echo $row['position_group'] ?></td>

        </tr>


        <?php
    endwhile;
    mysqli_close($conn);





    ?>
    </tbody>
</table>
<a href="JustTheTable.php">Back Employee Table</a>

</body>
</html>