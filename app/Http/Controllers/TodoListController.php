<?php

namespace App\Http\Controllers;

use App\Services\TodoListService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class TodoListController extends Controller
{
    private TodoListService $todoListService;
    function __construct(TodoListService $todoListService){
        $this->todoListService = $todoListService;
    }
    function todolist(Request $request){
        $todolist = $this->todoListService->getTodoList();
        return response()->view('todolist',[
            'title' => 'page todolist',
            'todolist' => $todolist
        ]);
    }
    function addTodoList(Request $request){
        $todolist = $this->todoListService->getTodoList();
        $input_programming = $request->input('backend');
        $input_todolist = $request->input('todolist');
        if (empty($input_todolist) || empty($input_programming)) {
                return response()->view('todolist',[
                    'title' => 'page todolist',
                    'error' => 'error',
                    'todolist' => $todolist,
                ]);
        }
        $this->todoListService->addTodoList(uniqid(),$input_todolist, $input_programming);
        return redirect()->action([TodoListController::class,'todolist']);

    }
  
    function removeTodoList(Request $request,string $id):RedirectResponse{
        $this->todoListService->removeTodoList($id);
        return redirect()->action([TodoListController::class,'todolist']);
    }
}
