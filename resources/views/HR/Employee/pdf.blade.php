<!DOCTYPE html>
<html>
<head>
    <title>Employee Data</title>
    <!-- Include your CSS styles here if needed -->

</head>
<body>
    <h1>Employee Data</h1>
    <p><strong>Employee Name:</strong> {{ $employee->Firstname }}</p>
    <p><strong>Email:</strong> {{ $employee->Email }}</p>
    <p><strong>Job Status:</strong> {{ $employee->job_status }}</p>
    <p><strong>Department:</strong> {{ $employee->department->DepName }}</p>
    <p><strong>start date:</strong> {{ $employee->start_date }}</p>
    <p><strong>status:</strong> {{ $employee->emp_status->status }}</p>
    

</body>
</html>
