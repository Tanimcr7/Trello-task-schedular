<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">

        <div class="col-md-6">
            <h2 class="text-center">Add Student</h2>
        <br>

            <form  action="{{url('student/update', $temp->id)}}" method="post">
            @csrf
            
            <div class="form-group">
                <label for="Name">Student name</label>
                <input type="text" class="form-control" name="s_name" value="{{$temp->s_name}}">
            
            </div>

            <div class="form-group">
                <label for="Roll">Student roll</label>
                <input type="number" class="form-control" name="s_roll" value="{{$temp->s_roll}}">
            
            </div>
            <div class="form-group">
                <label for="Marks">Marks</label>
                <input type="number" class="form-control" name="mark" value="{{$temp->mark}}">
            
            </div>

                <button type="submit" class="btn-primary btn">Update</button>
            </form>
        </div>
    </div>
 




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>