@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $todo->title }}</h2>

    <div>
        {{ $todo->body }}
    </div>

    <div>
        {{ $todo->public ? "Public" : "Not Public" }}
        <form action="{{ route('todos.make-public', $todo) }}" method="post">
            @csrf
            @method("PUT")
            <label>Public: <input type="checkbox" name="public" id="public" onclick="this.form.submit()" {{ $todo->public ? "checked" : "" }}/></label>
        </form>
    </div>

    <div>
        {{ $todo->completed ? "Completed" : "Not Completed" }}
        @unless($todo->completed)
            <form action="{{ route('todos.completed', $todo) }}" method="post">
                @csrf
                @method("PUT")
                <label>Complete:
                    <input type="checkbox" name="completed" id="completed" onclick="this.form.submit()">
                </label>
            </form>
        @endunless
    </div>
</div>
@endsection
