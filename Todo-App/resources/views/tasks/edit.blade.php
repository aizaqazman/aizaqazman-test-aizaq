@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Todo App</div>

                <div class="card-body">
                    <h4>Edit Form</h4>
                    <form method="post" action="{{ route('tasks.update') }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="task_id" value="{{ $task->id }}">
                        <div class="mb-3">
                            <label for="form-label">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $task->title }}">
                        </div>
                        <div class="mb-3">
                            <label for="form-label">Description</label>
                            <textarea name="description" class="form-control" cols="5" rows="5">
                                {{ $task->description }}
                            </textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Status</label>
                            <select name="is_completed" class="form-control">
                                <option disabled selected>Select Option</option>
                                <option value="1">Completed</option>
                                <option value="0">In Completed</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
