<!DOCTYPE html>
<html>
<head>
    <title>Employee List Report</title>
    <style>
           table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
<body>
    <h1>Employee List Report</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
				<th>Email</th>
				<th>Start Date</th>
				<th>Department Name</th>
				<th>Designation Name</th>
				<th>Status</th>
				<th>Job Status</th>
				<th>UserType</th>
               
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->Firstname }}</td>
                <td>{{ $employee->Email }}</td>
                <td>{{ $employee->start_date }}</td>
                <td>{{ $employee->department->DepName }}</td>
                <td>{{ $employee->designation->Name }}</td>
                <td>{{ $employee->emp_status->status }}</td>
                <td>{{ $employee->job_status }}</td>
                <td>{{ $employee->user->usertype }}</td>
                
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Include your additional content here -->

</body>
</html>
