<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Livewire\Component;

class TaskList extends Component
{
    public $tasks;

    protected $listeners = [
        'taskDeleted' => 'refreshTasks',
        'taskAdded' => 'refreshTasks'
    ];

    public function mount()
    {
        $this->tasks = Todo::all();
    }

    public function tasks()
    {
        return Todo::all();
    }

    public function render()
    {
        return view('livewire.task-list');
    }

    public function refreshTasks()
    {
        $this->tasks = Todo::all();

    }
}
