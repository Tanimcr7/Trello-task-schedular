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
            <h2 class="text-center">All Students</h2><br>
             <a href="{{route('c')}}" class="btn btn-primary">add a student</a>
        <br>

        <div>

        <table>
        <tr>
        <th>Name</th>
        <th>Roll</th>
        <th>Mark</th>
        <th>Action</th>
        </tr>
        

        @foreach($temp as $n)
            <tr> 
            <td>
            {{$n->s_name}}</td>
            <td>
            {{$n->s_roll}}
            </td>
            <td>
            {{$n->mark}}</td>
            <td><a type='button' href="{{url('student/edit', $n->id)}}">Update</a>
            <a type='button' href="{{url('student/delete', $n->id)}}">Delete</a>
            </td>
            </tr>
        @endforeach
        </table>


        <!-- <ul class="list">
        <li>Name (Roll)  (Mark)</li>
            @if(isset($temp) && !empty($temp))
            @foreach($temp as $n)
            
        <li>
            {{$n->s_name}} ({{$n->s_roll}}) ({{$n->mark}})   
            
        </li>
        @endforeach
        @endif
        </ul> -->
        
        </div>

        </div>
    </div>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>