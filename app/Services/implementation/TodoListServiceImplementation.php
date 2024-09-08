<?php 

    
    namespace App\Services\Implementation;
    use App\Models\Todo;
    use App\Services\TodoListService;
    use Illuminate\Support\Facades\Session;
    use Illuminate\Support\Facades\DB;

    class TodoListServiceImplementation implements TodoListService{

        
        function addTodoList(string $todo,string $programming): void{

            $todo = new Todo([
                'todo' => $todo,
                'programming_language' => $programming
            ]);
           
            $todo->save();
        }

      
        function getTodoList(): array{
            return Todo::query()->get()->toArray();
        }
        function removeTodoList(string $idtodo){
            $todo = Todo::find($idtodo);          
            $todo->delete();
        }
        function updateTodo(string $id,array $request):void{
            $todo = Todo::find($id);
            $todo->update($request);
        }
    }
    ?>