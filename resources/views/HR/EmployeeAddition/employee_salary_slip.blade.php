<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Salary Slip</title>
    <style>
       
    </style>
</head>
<body>
    <h1>Employee Salary Slip</h1>
    <h2>Employee Details:</h2>
    <p>Name: {{ $employee->Firstname }}</p>
    <p>Email: {{ $employee->Email }}</p>
    <p>Designation: {{ $employee->designation->Name }}</p>

    <h2>Salary Slip:</h2>
    <p>Month: {{ date('F', mktime(0, 0, 0, $selectedMonth, 1)) }}</p>
    <p>Basic Salary: {{ $salarySlip->basic_salary }}</p>
    <p>Bonus: {{ $salarySlip->bonus }}</p>
    <p>Allowance: {{ $salarySlip->allowance }}</p>
    <p>Conveyance: {{ $salarySlip->conveyance }}</p>
    <p>Total Salary: {{ $salarySlip->total_salary }}</p>

    <h2>Deductions:</h2>
    <p>Tax : {{ $salarySlip->tax }}</p>
    <p>Fund: {{ $salarySlip->fund }}</p>

    <h2>Overtime:</h2>
    <p>Overtime Earnings: {{ $salarySlip->overtime_earnings }} (1 hour = 150 rupees)</p>

    <h2>Net Salary: {{ $salarySlip->net_salary }}</h2>
</body>
</html>
