<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


    <h1>Leave Request Form</h1>

    <form action="{{ route('employee.requestleave.submit') }}" method="POST">
        @csrf
        <div>
            <label for="leave_type">Leave Type:</label>
            <select name="leave_type" id="leave_type">
                <option value="casual">Casual</option>
                <option value="maternity">Maternity</option>
                <option value="sick">Half Day</option>
                <option value="sick">Sick</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div>
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" id="start_date" required>
        </div>
        <div>
            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" id="end_date" required>
        </div>
        <div>
            <label for="reason">Reason:</label>
            <textarea name="reason" id="reason" rows="4" required></textarea>
        </div>
        <button type="submit">Submit Leave Request</button>
    </form>




</body>
</html>