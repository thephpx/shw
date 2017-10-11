@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<div class="row">
	<div class="col-lg-4 col-lg-offset-3">
		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
		<form method="post" action="{!! url('/task/edit/'.$task->id) !!}">
			{{ csrf_field() }}
			<div class="form-group">
				<label class="control-label">Name:</label>
				<input class="form-control" type="text" name="name" value="{{ $task->name }}"/>
			</div>
			<div class="form-group">
				<label class="control-label">Description:</label>
				<input type="text" class="form-control" name="description" value="{{ $task->description }}"/>
			</div>
			<button type="submit" class="btn btn-success">Save</button>
		</form>
	</div>
</div>
@endsection