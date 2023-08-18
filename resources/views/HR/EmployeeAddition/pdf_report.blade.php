<!DOCTYPE html>
<html>
<head>
    <title>Salary Slip Report</title>
    <style>
       
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: left;
        }
       
    </style>
</head>
<body>
    <h1>Salary Slip Report</h1>

    <table>
        <thead>
            <tr>
                <th>Employee Name</th>
               
                <th>Basic Salary</th>
                <th>Bonus</th>
                <th>Allowance</th>
                <th>Conveyance</th>
                <br>
                <th>Total Salary</th>
                <th>Tax</th>
                <th>Fund</th>
                <th>Total Deductions</th>
                <th>Overtime Earnings</th>
                <th>Net Salary</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($salarySlips as $salarySlip)
                <tr>
                    <td>{{ $salarySlip->employee->Firstname }}</td>
                    <td>{{ $salarySlip->basic_salary }}</td>
                    <td>{{ $salarySlip->bonus }}</td>
                    <td>{{ $salarySlip->allowance }}</td>
                    <td>{{ $salarySlip->conveyance }}</td>
                    <br>
                    <td>{{ $salarySlip->total_salary }}</td>
                    <td>{{ $salarySlip->tax }}</td>
                    <td>{{ $salarySlip->fund }}</td>
                    <td>{{ $salarySlip->total_deductions }}</td>
                    <td>{{ $salarySlip->overtime_earnings }}</td>
                    <td>{{ $salarySlip->net_salary }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
