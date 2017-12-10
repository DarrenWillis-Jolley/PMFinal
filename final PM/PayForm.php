<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee list table</title>
    <style>
        table, th, tr, td { border: solid 2px black; padding-left: 3px; padding-right: 3px; padding-bottom: 3px; text-align: center}
    </style>
</head>
<h1> Employee Pay Form</h1>
<body>
<table>
    <thead>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    </thead>

    <tbody>
    <?php
    $conn = mysqli_connect("localhost", "root", "inet2005", "PMPayroll");
    $result2 = mysqli_query($conn,"SELECT employee_id, first_name, last_name FROM employees 
where employees.employee_id =  " . $_POST['Payemployee_id']);
    while($row = mysqli_fetch_assoc($result2)):
        ?>
        <tr>
            <td><?php echo $row['employee_id'] ?></td>
            <td><?php echo $row['first_name'] ?></td>
            <td><?php echo $row['last_name'] ?></td>
        </tr>

        <?php
    endwhile;
    mysqli_close($conn);





    ?>
    </tbody>
</table>


<table>
    <thead>
    <th>Gross Salary</th>
    <th>Insurance</th>
    <th>Pension</th>
    <th>Benefits</th>
    <th>Net Salary</th>
    <th>Tax </th>
    <th>Final Pay</th>
    </thead>

    <tbody>
    <?php
    $conn = mysqli_connect("localhost", "root", "inet2005", "PMPayroll");
    $result2 = mysqli_query($conn,"SELECT employee_id, first_name, last_name FROM employees 
WHERE employee_id = ");
    $result2 .= $_POST['Payemployee_id'];
    $result3 = mysqli_query($conn,"SELECT tax.tax_percentage, tax.tax_id, employees.experience ,employees.employee_id, salary.gross_salary, 
                      salary.insurance_percent, salary.benefits_percent, salary.pension_percent 
                        FROM salary 
                        INNER JOIN employees
                        ON salary.salary_id = employees.salary_id
                      INNER JOIN tax 
                        on salary.tax_id = tax.tax_id
                        where employees.employee_id =" . $_POST['Payemployee_id']);


    while($row = mysqli_fetch_assoc($result3)):
$salary = $row['gross_salary'];

    $insurance_percent = $salary * $row['insurance_percent'];
    $benefits_percent = $salary * $row['benefits_percent'];
    $pension_percent = $salary * $row['pension_percent'];
    $netSalary = $salary - ($insurance_percent + $benefits_percent + $pension_percent);
    $tax = $netSalary / $row['tax_percentage'];
    $finalPay = $netSalary - $tax;

        ?>
        <tr>
            <td><?php echo $salary ?></td>
            <td><?php echo $insurance_percent ?></td>
            <td><?php echo $benefits_percent ?></td>
            <td><?php echo  $pension_percent ?></td>
            <td><?php echo $netSalary ?></td>
            <td><?php echo $tax ?> </td>
            <td><?php echo $finalPay ?> </td>


        </tr>

        <?php
    endwhile;
    mysqli_close($conn);





    ?>
    </tbody>
</table>
<a href="SalaryBracketForm.php">Salary Bracket Form</a>
<a href="JustTheTable.php">Employee List</a>

</body>
</html>