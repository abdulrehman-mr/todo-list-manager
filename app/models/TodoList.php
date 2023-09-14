<?php

class TodoList
{
    private $dataFile;

    public function __construct()
    {
        $this->dataFile = 'data/data.json';
    }

    public function addItem($task, $subtasks = [])
    {
        $items = $this->getItems();
        $items[] = [
            'task' => $task,
            'subtasks' => $subtasks
        ];
        $this->saveItems($items);
    }

    public function removeItem($type, $taskIndex, $subtaskIndex = null)
    {
        $items = $this->getItems();
    
        if ($type === 'task') {
            if (isset($items[$taskIndex])) {
                unset($items[$taskIndex]);
                $this->saveItems(array_values($items));
            }
        } elseif ($type === 'subtask' && isset($items[$taskIndex]['subtasks'][$subtaskIndex])) {
            unset($items[$taskIndex]['subtasks'][$subtaskIndex]);
            $items[$taskIndex]['subtasks'] = array_values($items[$taskIndex]['subtasks']);
            $this->saveItems($items);
        }
    }

    public function getItems()
    {
        if (file_exists($this->dataFile)) {
            $jsonData = file_get_contents($this->dataFile);
            return json_decode($jsonData, true);
        }
        return [];
    }

    private function saveItems($items)
    {
        $jsonData = json_encode($items);
        file_put_contents($this->dataFile, $jsonData);
    }
}
?>
