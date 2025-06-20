<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserManager extends Controller
{

    public function index(Request $request)
    {
        // Set the default number of items per page to 10 if not provided
        $perPage = $request->get('perPage', 10);

        // Query builder to fetch users
        $query = User::query();

        // Apply column search filter if 'search' query parameter exists
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $column = $request->get('column', 'nama'); // Default search column is 'nama'

            // Filter by the selected column
            $query->where($column, 'like', '%' . $search . '%');
        }

        // Apply role filter if 'role' query parameter exists
        if ($request->has('role') && $request->role != '') {
            $query->where('role', $request->role);
        }

        // Fetch users with pagination
        $users = $query->paginate($perPage); // Pagination with the selected perPage value

        return view('guru.pages.users.index', compact('users'));
    }



    public function create()
    {
        // Menampilkan form untuk membuat pengguna baru
        return view('guru.pages.users.create');
    }

    public function getUsers(Request $request)
    {

        $users = User::all();
        return response()->json($users);
    }

    public function store(Request $request)
    {
        // Validate the form input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|unique:users,nis',
            'kelas' => 'required|in:A,B,C,D',
            'role' => 'required|in:guru,siswa',

            // Conditional password validation
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ]);

        // Create the user with the validated data
        $user = new User();
        $user->nama = $validated['nama'];
        $user->nis = $validated['nis'];
        $user->kelas = $validated['kelas'];

        // Only hash and save the password if it's provided
        if ($request->filled('password')) {
            $user->password = Hash::make($validated['password']);
        }

        $user->role = $validated['role'];
        $user->save();

        // Redirect back with success message
        return redirect()->route('guru.user.index')->with('success', 'User created successfully!');
    }


    public function show($id)
    {
        // Menampilkan detail pengguna
        $user = User::findOrFail($id);
        return view('guru.pages.users.show', compact('user'));
    }


    public function edit($id)
    {
        // Menampilkan form untuk mengedit data pengguna
        $user = User::findOrFail($id);
        return view('guru.pages.users.edit', compact('user'));
    }


    public function update(Request $request, $id)
    {
        // Validate the form input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|unique:users,nis,' . $id, // Unique except for the current user
            'kelas' => 'required|in:A,B,C,D',
            'role' => 'required|in:guru,siswa',

            // Conditional password validation
            'password' => 'nullable|min:5',
            'password_confirmation' => 'nullable|same:password',
        ]);

        // Find the user to update
        $user = User::findOrFail($id);

        // Update the user's information
        $user->update([
            'nama' => $validated['nama'],
            'nis' => $validated['nis'],
            'kelas' => $validated['kelas'],
            'role' => $validated['role'],
        ]);

        // Redirect to the user list with success message
        return redirect()->route('guru.user.index')->with('success', 'User updated successfully!');
    }



    public function destroy($id)
    {
        // Menghapus data pengguna
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('guru.user.index')->with('success', 'User berhasil dihapus!');
    }
}
