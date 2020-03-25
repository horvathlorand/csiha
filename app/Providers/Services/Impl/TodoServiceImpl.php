<?php 

namespace App\Providers\Services\Impl;

use App\Models\Todo;
use App\Providers\Services\TodoService;

class TodoServiceImpl implements TodoService 
{

    public function showTodos() 
    {
        return Todo::get();
    }

    public function createTodo($todo) 
    {

        if ($todo) {
            Todo::create([
                'title' => $todo->getTitle(),
                'description' => $todo->getDescription(),
                'condition' => $todo->getCondition()
            ]);
        }
    }

    public function editTodo($id)
    {
        return $this->getTodo($id);
    }

    public function updateTodo($id, $todo)
    {
        $actualTodo = $this->getTodo($id);

        if ($actualTodo) 
        {
            $actualTodo->update([
                'title' => $todo->getTitle(),
                'description' => $todo->getDescription(),
                'condition' => $todo->getCondition()
            ]);
        }
        
    }

    public function deleteTodo($id)
    {
        $todo = $this->getTodo($id);

        if ($todo)
        {
            $todo->delete();
        }
    }

    public function filterTodos($filterId)
    {
        return Todo::whereCondition($filterId)->get();
    }

    private function getTodo($id)
    {
        return Todo::whereId($id)->first();
    }
}