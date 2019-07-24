<div class="container">
    <div class="card">
        @unless(count($todos))
            <h2 class="text-center mt-3 mb-3">No Todos</h2>
        @else
            @foreach($todos as $todo)
                <div class="card-body">
                    {{ $todo->title }} -
                    @if($todo->user == Auth::user())
                        <button wire:click="delete($todo)" class="btn btn-danger">Delete</button>
                    @endif
                </div>
                <hr class="ml-3 mr-3">
            @endforeach
        @endunless
    </div>
</div>
