@extends('admin.layouts.app')

@section('title', 'Page Title')


@section('content')
  <div class="col-md-10" style="margin-left: auto; margin-right: auto;">

     <table class="table table-bordered">
        <thead>
            <tr>
            <th>#</th>
            <th>Language Name</th>
            <th>Summary</th>
            <th>Description</th>
            <th>extension</th>
            <th> Action </th>
            </tr>
        </thead>
        <tbody>

        @foreach($data as $item)
            <tr> 
              <th> {{$loop->iteration}} </th>
              <td> {{$item->name}} </td>
              <td> {{$item->summary}} </td>
              <td> 
                  <p class="read"> {{$item->description}} </p>
                  <small><a href="#" id="readMore">Show Less</a></small>
              </td>
              <td> {{$item->extension}} </td>
              <td> <a href="/admin/edit_language/{{$item->id}}">Edit</a> </td>
            </tr>
        @endforeach

        </tbody>
        </table>

       <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">Previous</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav>
  </div>
@endsection