@extends('layout')
@section('content')
  <div class="flex justify-center items-center h-screen w-screen "> 
    <div>
        <h2 class="text-xl mx-auto text-center w-full " >User Dashboard</h2>
        <p class="p-4">Welcome, {{ auth()->user()->name }}!</p>
        <form method="POST" action="{{ route('signout') }}" >
          @csrf
          @method('POST')
          <button class="bg-white shadow-md rounded-md p-2 mx-auto" >
              signout
          </button>
        </form>
    </div>
  </div>
@endsection