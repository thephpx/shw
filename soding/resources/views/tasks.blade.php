@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<br/>
<a class="btn btn-success btn-xs pull-right" href="{!! url('/task/add') !!}">Add New Task</a>
<br/><br/>
<div class="clearfix"></div>
@if(session()->has('message'))
<div class="alert alert-info">{{ session()->get('message') }}</div>
@endif
<table class="table">
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Description</th>
		<th>Created</th>
		<th>Updated</th>
		<th>&nbsp;</th>
	</tr>

	@foreach($tasks as $task)
	<tr>
		<td>{{ $task->id }}</td>
		<td>{{ $task->name }}</td>
		<td>{{ $task->description }}</td>
		<td>{{ $task->dateCreated }}</td>
		<td>{{ $task->dateUpdated }}</td>
		<td>
			<a class="btn btn-xs btn-warning" href="{!! url('/task/edit/'.$task->id) !!}">Update</a>
			<a class="btn btn-xs btn-danger" href="{!! url('/task/delete/'.$task->id) !!}">Delete</a>
		</td>
	</tr>
	@endforeach
</table>

{{ $tasks->links() }}

@endsection