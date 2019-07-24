@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($todos as $todo)
        <div class="card">
            <div class="card-body">
                {{ $todo->title }}
            </div>
        </div>
        @endforeach
    </div>
@endsection
