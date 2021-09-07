<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Livewire\Component;

class Task extends Component
{
    /**
     * @var \App\Task
     */
    public $task;
    public $isCompleted;

    public function mount(Todo $task)
    {
        $this->task = $task;
        $this->isCompleted = $this->task->completed;
    }

    public function render()
    {
        return view('livewire.task');
    }

    public function toggle()
    {
        $this->isCompleted = !$this->isCompleted;

        $this->task->completed = $this->isCompleted;

        $this->task->save();
        $this->task->refresh();
    }

    public function delete()
    {
        $this->task->delete();
        $this->emit('taskDeleted');
    }
}
