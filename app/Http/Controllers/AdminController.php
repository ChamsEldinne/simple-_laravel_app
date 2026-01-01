<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        $users = User::where('type', 'user')->latest()->paginate(10);
        return view('admin.dashboard', compact('users'));
    }

    // public function getAllUsers()
    // {
        
    // }

    public function changeUserStatus(User $user)
    {

        $user->update([
            'status' => $user->status === 'active' ? 'inactive':'active',
        ]);

        return back()->with('success', 'User status updated.');
    }

    public function destroy(User $user)
    {
        if ($user->role === 'admin') {
            abort(403);
        }

        $user->delete();

        return back()->with('success', 'User deleted.');
    }
}
