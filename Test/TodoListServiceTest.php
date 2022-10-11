<?php
require_once __DIR__ . '/../Entity/TodoList.php';
require_once __DIR__ . '/../Repository/TodoListRepository.php';
require_once __DIR__ . '/../Service/TodoListService.php';

use Entity\TodoList;
use Repository\TodoListRepositoryImpl;
use Service\TodoListServiceImpl;

function testShow():void
{
    $todolistRepository = new TodoListRepositoryImpl();
    $todolistRepository->todolist[1] = new TodoList("Belajar PHP");
    $todolistRepository->todolist[2] = new TodoList("Belajar PHP OOP");
    $todolistRepository->todolist[3] = new TodoList("Belajar PHP Database");

    $todolistService = new TodoListServiceImpl($todolistRepository);

    $todolistService->show();
}

function testAdd():void
{
    $todolistRepository = new TodoListRepositoryImpl();
    $todolistService = new TodoListServiceImpl($todolistRepository);
    $todolistService->add("Belajar PHP");
    $todolistService->add("Belajar PHP OOP");
    $todolistService->add("Belajar PHP Database");

    $todolistService->show();
}

function testDelete():void
{
    $todolistRepository = new TodoListRepositoryImpl();
    $todolistService = new TodoListServiceImpl($todolistRepository);
    $todolistService->add("Belajar PHP");
    $todolistService->add("Belajar PHP OOP");
    $todolistService->add("Belajar PHP Database");

    $todolistService->show();
    $todolistService->delete(4);
    $todolistService->show();
}
//testShow();
//testAdd();
testDelete();