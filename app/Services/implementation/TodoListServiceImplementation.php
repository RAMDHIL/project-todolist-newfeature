<?php 
    namespace App\Services\Implementation;
    use App\Services\TodoListService;
    use Illuminate\Support\Facades\Session;

    class TodoListServiceImplementation implements TodoListService{

        
        function addTodoList(string $id, string $todo,string $programming): void{
            if (!Session::exists("todolist")) {
                Session::put("todolist",[]);
            }
            Session::push("todolist",[
                'id' => $id,
                'todo' => $todo,
                'programming' => $programming
            ]);
        }

        function editTodoList(string $id, string $todo, string $programming): array{
            $todolist = Session::get("todolist",[]);
            foreach ($todolist as $index => $item) {
                if ($item['id'] == $id) {
                    $todolist[$index]['todo'] = $todo;
                    $todolist[$index]['programming'] = $programming;
                    Session::put("todolist",$todolist);
                    return $todolist[$index];
                }
            }
            return [];
        }
        function getTodoList(): array{
            return Session::get('todolist',[]);
        }
        function removeTodoList(string $idtodo){
            $todolist = Session::get("todolist");
            foreach ($todolist as $index => $value) {
                if ($value['id'] == $idtodo) {
                    unset($todolist[$index]);
                    break;   
                }
            }
            Session::put("todolist", $todolist);
        }
    }
    ?>