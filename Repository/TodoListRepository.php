<?php

namespace Repository;

use Entity\TodoList;

interface TodoListRepository{
    function save(TodoList $todoList):void;
    function delete(int $number):bool;
    function findAll():array;
}

class TodoListRepositoryImpl implements TodoListRepository
{
    public array $todolist = [];

    public function save(TodoList $todoList): void
    {
        $number = sizeof($this->todolist) + 1;
        $this->todolist[$number] = $todoList;
    }

    public function delete(int $number): bool
    {
        if ($number > sizeof($this->todolist)){
            return  false;
        }

        for ($i = $number; $i < sizeof($this->todolist);  $i++){
            $this->todolist[$i] = $this->todolist[$i + 1];
        }

        unset($this->todolist[sizeof($this->todolist)]);

        return true;
    }

    public function findAll(): array
    {
        return $this->todolist;
    }
}
