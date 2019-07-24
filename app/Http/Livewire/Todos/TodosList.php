<?php

namespace App\Http\Livewire\Todos;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class TodosList extends Component
{
    public $todos;

    public function mount()
    {
        $this->todos = Auth::user()->todos()->get();
    }
    public function render()
    {
        return view('livewire.todos.todos-list');
    }
}
