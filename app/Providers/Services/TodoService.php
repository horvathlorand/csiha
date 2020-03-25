<?php 

namespace App\Providers\Services;

interface TodoService 
{
    /**
     * Getting todos
     */
    public function showTodos();

    /**
     * Create todo
     */
    public function createTodo($todo);

    /**
     * Edit todo
     */
    public function editTodo($id);

    /**
     * Update todo
     */
    public function updateTodo($id, $todo);

    /**
     * Delete todo
     */
    public function deleteTodo($id);

    /**
     * Filter todos
     */
    public function filterTodos($filterId);
}