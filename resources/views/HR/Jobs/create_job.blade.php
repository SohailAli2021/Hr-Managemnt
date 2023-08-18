<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <!-- jobs.create.blade.php -->


        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <h1>Create a New Job</h1>
                    <form action="{{ route('jobs.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="requirements">Requirements</label>
                            <textarea class="form-control" id="requirements" name="requirements" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="application_deadline">Application Deadline</label>
                            <input type="date" class="form-control" id="application_deadline" name="application_deadline" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Job</button>
                    </form>
                </div>
            </div>
        </div>
    
</body>
</html>