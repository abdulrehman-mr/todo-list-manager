<?php
// Define routes
$uri = htmlspecialchars($_SERVER['REQUEST_URI']);

if ($uri === '/' || $uri === '/todo/' ||  $uri === '/todo/index.php' ||  $uri === '/index.php') {
    // Load necessary controllers
    require_once 'app/controllers/TodoListController.php';
    $action = isset($_POST['action']) ? $_POST['action'] : '';
    $todoListController = new TodoListController();
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Handle the todo list actions (add, remove, etc.)
        if ($action === 'add') {
            $task = isset($_POST['task']) ? sanitizeInput($_POST['task']) : '';
            $subtasks = isset($_POST['subtasks']) ? sanitizeSubtasks($_POST['subtasks']) : [];
            
            if (!empty($task)) {
                $todoListController->addItem($task, $subtasks);
                echo 'Item added successfully.';
            } else {
                echo 'Task is required.';
            }
        } elseif ($action === 'remove') {
            $type = isset($_POST['type']) ? $_POST['type'] : '';
            $taskIndex = isset($_POST['taskIndex']) ? (int) $_POST['taskIndex'] : 0;
            $subtaskIndex = isset($_POST['subtaskIndex']) ? (int) $_POST['subtaskIndex'] : null;
            
            $todoListController->removeItem($type, $taskIndex, $subtaskIndex);
            echo 'Item removed successfully.';
        } elseif ($action === 'get') {
            $items = $todoListController->getItems();
            echo json_encode($items);
        } else {
            include 'app/views/todo-list.php';
        }
    } else {
        // Render the todo list view
        include 'app/views/todo-list.php';
    }
} else {
    // Handle 404 error or redirect to the homepage
    // ...
}
