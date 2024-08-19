<?php
namespace App\Services;
interface TodoListService{
    function addTodoList(string $id, string $todo, string $programming):void;
    function getTodoList():array;

    function editTodoList(string $id, string $todo, string $programming):array;
    function removeTodoList(string $idtodo);
}
?>