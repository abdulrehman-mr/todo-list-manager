<?php

require_once 'app/models/TodoList.php';
require_once 'app/models/Utilities.php';
class TodoListController
{
    public function addItem($task, $subtasks = [])
    {
        $todoList = new TodoList();
        $todoList->addItem($task, $subtasks);
    }

    public function removeItem($type, $taskIndex, $subtaskIndex = null)
    {
        $todoList = new TodoList();
        $todoList->removeItem($type, $taskIndex, $subtaskIndex);
    }

    public function getItems()
    {
        $todoList = new TodoList();
        return $todoList->getItems();
    }
}
?>
