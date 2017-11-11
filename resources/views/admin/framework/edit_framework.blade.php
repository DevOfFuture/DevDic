@extends('admin.layouts.app')

@section('title', 'Edit Framework')


@section('content')
  <div class="col-md-6" style="margin-left: auto; margin-right: auto;">
    <div class=""> 
       @if( @$status )
             <div class="alert alert-info"> {{ $status }} </div>
       @endif
    </div>

    <form method="POST" action="/admin/edit_framework">

      <input name="id" type="hidden" value="{{ $data->id }}">

      <div class="form-group">
        <label for="exampleFormControlInput1">Framework Name</label>
        <input name="name" type="text" class="form-control" value="{{ $data->name }}" placeholder="framework name, eg: laravel" required>
      </div>
      
      <div class="form-group">
        <label for="exampleFormControlInput1">extension</label>
        <input name="extension" type="text" class="form-control" value="{{ $data->extension }}" placeholder="framework extension, eg: .php" required>
      </div>

      <div class="form-group">
        <label for="exampleFormControlTextarea1">Summary</label>
        <textarea class="form-control" name="summary" rows="3 required">{{ $data->summary }}</textarea>
      </div>

      <div class="form-group">
        <label for="exampleFormControlTextarea1">Description {maybe show code to print "Hello World"}</label>
        <textarea class="form-control" name="description" rows="6" required>{{ $data->description }}</textarea>
      </div>

      <button type="submit" role="submit" class="btn btn-primary">Confirm and Submit</button>
      
    </form>
  </div>
@endsection