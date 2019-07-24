<div class="container">
    @unless(count($todos))
        <div class="card">
            <h2 class="text-center mt-3 mb-3">No Todos</h2>
        </div>
    @else
        @foreach($todos as $todo)
            <div class="card">
                <div class="card-body">
                    {{ $todo->title }}
                    <br>
                    @if($todo->user == Auth::user())
                        <a href="{{ route('todos.show', $todo) }}" class="btn btn-success">Edit</a>
                        <button wire:click="delete($todo)" class="btn btn-danger">Delete</button>
                    @endif
                </div>
            </div>
        @endforeach
    @endunless
</div>
