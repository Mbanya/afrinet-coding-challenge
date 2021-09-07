<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Livewire\Component;

class AddTask extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.add-task');
    }

    public function save()
    {
        $task = new Todo();
        $task->task_name = $this->name;
        $task->save();

        $this->reset();

        $this->emit('taskAdded');
    }
}
