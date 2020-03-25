<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model {
    protected $fillable = ['title', 'description', 'condition', 'created_at', 'updated_at'];

    private $id;
    private $title;
    private $description;
    private $condition;

    public function getId() 
    {
        return $this->id;
    }

    public function setId($id) 
    {
        $this->id = $id;
    }

    public function getTitle() 
    {
        return $this->title;
    }

    public function setTitle($title) 
    {
        $this->title = $title;
    }

    public function getDescription() 
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getCondition() 
    {
        return $this->condition;
    }

    public function setCondition($condition)
    {
        $this->condition = $condition;
    }
}