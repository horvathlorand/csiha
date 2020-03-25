<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Providers\Services\TodoService;

class TodoController extends Controller
{

    private $todoService;

    public function __construct(TodoService $todoService) 
    {
      $this->todoService = $todoService;
    }
  
    public function store(Request $request)
    {
        $this->todoService->createTodo($this->setTodo($request));
    }

    public function index()
    {
        return $this->todoService->showTodos();
    }

    public function edit($id)
    {
        return $this->todoService->editTodo($id);
    }

    public function update($id, Request $request)
    {
        $this->todoService->updateTodo($id, $this->setTodo($request));
    }

    public function delete($id)
    {
        $this->todoService->deleteTodo($id);
    }

    public function filter($filterId)
    {
        return $this->todoService->filterTodos($filterId);
    }

    private function setTodo($request)
    {
        $todo = new Todo();
        $todo->setTitle($request->title);
        $todo->setDescription($request->description);
        $todo->setCondition($request->condition);

        return $todo;
    }
}