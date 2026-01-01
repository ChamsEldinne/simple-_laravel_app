@extends('layout')

@section('content')
<div class="flex justify-center" >
    <div class="mt-5 w-fit flex items-center flex-col">
        <div class="flex justify-between w-full" >
            <h2 class="my-4 mx-auto text-xl font-semibold w-full ">Admin Dashboard</h2>
            <form method="POST" action="{{ route('signout') }}" >
                @csrf
                @method('POST')
                <button class="bg-white shadow-md rounded-md p-2" >
                    signout
                </button>
            </form>  
        </div>

        <table class="table table-bordered p-2 bg-white rounded-xl shadow-md min-w-[650px] ">
            <thead class="p-2 border-b  " >
                <tr class="" >
                    <th class="p-2" >#</th>
                    <th class="p-2" >Name</th>
                    <th class="p-2" >Email</th>
                    <th class="p-2">Status</th>
                    <th class="p-2" >Change Status</th>
                    <th class="p-2" >Delete</th>
                </tr>

            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="p-2 border-b  " >
                         <td class="p-2">
                            {{ $users->firstItem() + $loop->index }}
                        </td>
                        <td class="p-2">{{ $user->name }}</td>
                        <td class="p-2">{{ $user->email }}</td>
                        <td class="p-2">{{ $user->status }}</td>

                        <td class=" text-center p-2">
                            <!-- Toggle status -->
                            <form method="POST" action="{{ route('admin.users.changeStatus', $user) }}">
                                @csrf
                                @method('PATCH')
                                <button
                                    class="relative inline-flex items-center h-4 w-10 rounded-full transition-colors duration-300
                                        {{ $user->status === 'active' ? 'bg-green-500 hover:bg-green-600' : 'bg-red-500 hover:bg-red-600' }}"
                                >
                                    <span
                                        class="absolute left-0 top-1/2 -translate-y-1/2 w-6  h-6 rounded-full bg-white shadow-md transform transition-transform duration-300
                                        {{ $user->status === 'active' ? 'translate-x-5' : 'translate-x-0' }}"
                                    ></span>

                                    <span class="sr-only">
                                        {{ $user->status === 'active' ? 'Block user' : 'Activate user' }}
                                    </span>
                                </button>
                            </form>
                        </td>
                        <td class="text-center p-2 " >
                            <!-- Delete -->
                            <form method="POST" action="{{ route('admin.users.destroy', $user) }}"
                                onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button >
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @if($users->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center p-4 ">No users found</td>
                    </tr>
                @endif
            </tbody>
        </table>

        <div class="mt-4">
           {{ $users->links() }}
        </div>
    </div>

</div>
@endsection
