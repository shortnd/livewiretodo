@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="card">
          <div class="card-header">
              Create Todo
          </div>

          <div class="card-body">
            <form action="{{ route('todos.store') }}" method="POST">
                  @csrf

                  <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" class="form-control" name="title" id="title" required autofocus>
                  </div>

                  <div class="form-group">
                      <label for="body">Body</label>
                      <textarea name="body" id="body" cols="30" rows="10" class="form-control" required></textarea>
                  </div>

                  <div class="form-group mb-0">
                      <button type="submit" class="btn btn-success">Add Todo</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
@endsection
