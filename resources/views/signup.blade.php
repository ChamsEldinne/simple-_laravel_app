@extends('layout')

@section('content')
  <div class="w-screen h-screen flex justify-center items-center "> 
    <div class="p-4 rounded-xl shadow-md  bg-white " >
      <h2 class="text-xl mx-auto text-center w-full " >Create Account</h2>
      <form class="p-4" method="POST" action="{{ route('signup') }}">
        @csrf
        <div class="flex flex-col gap-2" >
          <label for="name">Full Name:</label>
          <input class="p-2 border rounded-md " type="text" id="name" name="name" required>
        </div>
        <div class="flex flex-col gap-2" >
          <label for="email">Email:</label>
          <input class="p-2 border rounded-md " type="email" id="email" name="email" required>
        </div>
        <div class="flex flex-col gap-2" >
          <label for="password">Password:</label>
          <input class="p-2 border rounded-md min-w-52 " type type="password" id="password" name="password" required>
        </div>
        <div class="flex flex-col gap-2" >
          <label for="password_confirmation">Confirm Password:</label>
          <input class="p-2 border rounded-md min-w-52 " type type="password" id="password_confirmation" name="password_confirmation" required>
        </div>
        <button class="px-5 bg-blue-500 text-white py-2 rounded-md my-2 mx-auto w-full " type="submit">Sign Up</button>
      </form>
      <a href="/signin" class="" > signin </a>
    </div>
  </div>
@endsection

