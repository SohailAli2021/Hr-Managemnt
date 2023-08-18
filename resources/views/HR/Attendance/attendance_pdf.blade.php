<!DOCTYPE html>
<html>
<head>
    <title>Attendance Report</title>
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
    <h1>Attendance Report for {{ $employee->Firstname }}</h1>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendance as $entry)
            <tr>
                <td>{{ $entry->date }}</td>
                <td>{{ $entry->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Include your additional content here -->

</body>
</html>
