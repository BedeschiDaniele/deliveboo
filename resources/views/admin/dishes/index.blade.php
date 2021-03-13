@extends('layouts.admin.dashboard')

@section('content')
     @if(session()->get('message'))
          <div class="alert alert-success">
               {{ session()->get('message') }}
          </div><br/>
     @elseif (session()->get('deleted'))
          <div class="alert alert-danger">
               {{ session()->get('deleted') }}
          </div><br/>
     @endif
     <h1>pagina vuota</h1>   

@endsection
