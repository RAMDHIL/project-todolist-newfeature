<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Silkscreen:wght@400;700&display=swap');
        .custom-silkscreen-regular {
            font-family: "Silkscreen", sans-serif;
            font-weight: 400;
            font-style: normal;
        }
        .custom-silkscreen-bold {
            font-family: "Silkscreen", sans-serif;
            font-weight: 700;
            font-style: normal;
         }

        
    </style>
</head>
<div class="container">
    <div class="row mt-5">
        <div class="col">
            <h2 class="text-center mt-5 bg-info p-2 rounded shadow-lg custom-silkscreen-regular">Todo List Project <span class="text-light custom-silkscreen-bold">by ramdhil</span></h2>
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
                <th scope="row">*****</th>
                <td>{{$todo['todo']}} </td>
                <td>{{$todo['programming_language'] }}</td>
                <td>
                    <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $todo['id'] }}">
                    update
                  </button></td>
                <td>
                    <form action="/todolist/{{$todo['id']}}/delete" method="POST">
                        @csrf
                        <button class="w-100 btn btn-lg btn-danger" type="submit">Remove</button>
                    </form>
                </td>
            </tr>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{ $todo['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/todolist/{{ $todo['id'] }}/update" method="POST">
                            @csrf
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Todolist</label>
                                  <input required type="text" name="edittodo" value="{{ $todo['todo'] }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                </div>
                                <div class="mb-5">
                                    <label for="disabledSelect" class="form-label">Pemilihan Bahasa Pemograman Sebelumnya </label>
                                    <select id="disabledSelect" class="form-select">
                                        <option>{{ $todo['programming_language'] }}</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <select name="editbackend" class="form-select form-select-sm" aria-label="Small select example">
                                        <option selected>Pilih lah Bahasa Pemograman Backend</option>
                                        <option value="Node Js">Node Js</option>
                                        <option value="Laravel">Laravel</option>
                                        <option value="TypeScript">TypeScript</option>
                                    </select>
                                </div>
                                <div class="mb-3 form-check">
                                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>       
                    </div>
                </div>
                </div>
            </div>
        @endforeach 
        </tbody>
    </table>  
</div>
</head>
<body>
    
</body>
</html>
