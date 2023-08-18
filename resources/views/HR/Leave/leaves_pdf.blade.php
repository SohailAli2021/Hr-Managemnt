<!DOCTYPE html>
<html>
<head>
    <title>Leave Requests</title>
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
</head>
<body>
    <h1>Leave Requests</h1>
    <table>
        <thead>
            <tr>
                <th>Employee Name</th>
                <th>Leave Type</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Reason</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leaveRequests as $leave)
                <tr>
                    <td>{{ $leave->employee->Firstname }}</td>
                    <td>{{ $leave->leave_type }}</td>
                    <td>{{ $leave->start_date }}</td>
                    <td>{{ $leave->end_date }}</td>
                    <td>{{ $leave->status }}</td>
                    <td>{{ $leave->reason }}</td>
                   
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
