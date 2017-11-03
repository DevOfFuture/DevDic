@extends('admin.layouts.app')

@section('title', 'Page Title')


@section('content')
  <div class="col-md-6" style="margin-left: auto; margin-right: auto;">
    <div class=""> 
       @if( @$status )
             <div class="alert alert-info"> {{ $status }} </div>
       @endif
    </div>

    <form method="POST" action="/admin/add_language">
      <div class="form-group">
        <label for="exampleFormControlInput1">Language Name</label>
        <input name="name" type="text" class="form-control" placeholder="language name, eg: php">
      </div>
      
      <div class="form-group">
        <label for="exampleFormControlInput1">extension</label>
        <input name="extension" type="text" class="form-control" placeholder="language extension, eg: .php">
      </div>

      <div class="form-group">
        <label for="exampleFormControlTextarea1">Summary</label>
        <textarea class="form-control" name="summary" rows="3"></textarea>
      </div>

      <div class="form-group">
        <label for="exampleFormControlTextarea1">Description {maybe show code to print "Hello World"}</label>
        <textarea class="form-control" name="description" rows="6"></textarea>
      </div>

      <button type="submit" role="submit" class="btn btn-primary">Confirm and Submit</button>
      
    </form>
  </div>
@endsection