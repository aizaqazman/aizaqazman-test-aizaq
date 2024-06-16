@extends('layouts.app')

@section('styles')
<style>
    #outer
    {
        width: auto;
        text-align: center;
    }
    .inner
    {
        display: inline-block;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    
                @if (Session::has('alert-success"'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('alert-success') }}
                    </div>
                @endif

                @if (Session::has('alert-info"'))
                    <div class="alert alert-info" role="alert">
                        {{ Session::get('alert-info') }}
                    </div>
                @endif

                @if (Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                    </div>
                @endif

                <a class="btn btn-sm btn-info" href="{{ route('tasks.create') }}">Create Todo</a>
                   
                    @if (count($tasks) > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Title</td>
                                    <td>Description</td>
                                    <td>Completed</td>
                                    <td>Actions</td>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($tasks as $task)
                                    <tr>
                                        <td>{{ $task->title }}</td>
                                        <td>{{ $task->description }}</td>
                                        <td>
                                            @if ($task->is_completed == 1)
                                                <a class="btn btn-sm btn-success" href="">Completed</a>
                                            @else    
                                                <a class="btn btn-sm btn-danger" href="">Incompleted</a>
                                            @endif
                                        <td>
                                            <a class="inner btn btn-sm btn-success" href="{{ route('tasks.show', $task->id) }}">View</a>
                                            <a class="inner btn btn-sm btn-info" href="{{ route('tasks.edit', $task->id) }}">Edit</a>
                                            <form method="post" action="{{ route('tasks.destroy') }}" class="inner">
                                                @csrf
                                                @method('DELETE')
                                               <input type="hidden" name="task_id" value="{{ $task->id }}"> 
                                               <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                                            </form>
                                        </td>
                                    </tr>
                               @endforeach
                            </tbody>
                        </table>
                    @else
                    <h4>No Todo are created yet</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
