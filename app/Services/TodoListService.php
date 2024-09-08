<?php
namespace App\Services;
interface TodoListService{
    function addTodoList(string $todo, string $programming):void;
    function getTodoList():array;
    function removeTodoList(string $idtodo);
    function updateTodo(string $id,array $request):void;
}
?>