@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-lg-8 m-auto">
      <div class="card">
        <div class="card-header">
  <h3 class="text-center"> User list</h3>
        </div>
        <div class="card-body">
   <table class="table table-bordered">
    <tr>
        <th>sl</th>
        <th>name</th>
        <th>Email</th>
        <th>photo</th>
        <th>action</th>
    </tr>
    @foreach ($users as $sl=>$user )


    <tr>
        <td>{{ $sl+1 }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td><img width="60" src="{{ asset('uploads/users') }}/{{ $user->photo }}" alt=""></td>
        <td>
            <a href="" class="btn btn-danger"> Delete</a>
        </td>
    </tr>
    @endforeach
   </table>
        </div>
      </div>
    </div>
</div>
@endsection
