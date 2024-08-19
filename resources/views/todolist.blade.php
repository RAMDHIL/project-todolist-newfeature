<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<div class="container">
    <div class="row mt-5">
        <div class="col">
            <h2 class="text-center mt-5 bg-info p-2 rounded shadow-lg">Todo List Project <span class="text-light">by ramdhil</span></h2>
            <form action="/logout" method="POST">
                @csrf
                <button class="btn btn-danger" type="submit">Log out</button>
            </form>
        </div>
        <div class="col">
            <div class="card shadow-lg d-flex justify-center align-items-center" style="width: 18rem;">    
                <div class="card-body">
                    <form action="/todolist" method="POST">
                        <div class="mb-4">
                            @csrf
                            <label for="exampleInputEmail1" class="form-label">Todo List</label>
                            <input type="text" placeholder="masukan todo list" name="todolist" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                           
                            @if (isset($error))
                            <div id="emailHelp" class="form-text text-danger">$error</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <select name="backend" class="form-select form-select-sm" aria-label="Small select example">
                                <option selected>Pilih lah Bahasa Pemograman Backend</option>
                                <option value="Node Js">Node Js</option>
                                <option value="Laravel">Laravel</option>
                                <option value="TypeScript">TypeScript</option>
                            </select>
                        </div>
                        <div>
                            <button class="btn btn-success" type="submit">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-striped mt-5">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Todo</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($todolist as $todo)
            <tr>
                <th scope="row">{{$todo['id']}}</th>
                <td>{{$todo['todo']}} </td>
                <td>{{$todo['programming'] }}</td>
                <td>
                    <form action="/todolistedit/{{ $todo['id'] }}/edit" method="POST">
                        @csrf
                        <button class="btn btn-info" type="submit">edit</button>
                    </form>
                </td>
                <td>
                    <form action="/todolist/{{$todo['id']}}/delete" method="POST">
                        @csrf
                        <button class="w-100 btn btn-lg btn-danger" type="submit">Remove</button>
                    </form>
                </td>
            </tr>
        @endforeach 
        </tbody>
    </table>  
</div>
</head>
<body>
    
</body>
</html>