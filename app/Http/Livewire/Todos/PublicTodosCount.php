<?php

namespace App\Http\Livewire\Todos;

use Livewire\Component;
use App\Todo;

class PublicTodosCount extends Component
{
    public $count;

    public function mount()
    {
        $this->count = Todo::get()->where('public', true)->count();
    }

    public function render()
    {
        return view('livewire.todos.public-todos-count');
    }
}
