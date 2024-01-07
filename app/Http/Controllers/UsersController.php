<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('Users.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        $emailPrefix = substr($request->email, 0, 3);
        $namePrefix = substr($request->name, 0, 3);
        $generatedPassword = $emailPrefix . $namePrefix;

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($generatedPassword),
            'role' => $request->role,
        ]);

        return redirect()->route('user.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(user $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $users, $id)
    {
        $user = User::find($id);
        return view('Users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $users, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);
        
        if ($request->filled('password')) {
            $password = bcrypt($request->password);
            User::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $password,
                'role' => $request->role,
            ]);
        } else {
            User::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
            ]);
        }
        
        return redirect()->route('user.index')->with('success', 'data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $users, $id)
    {
        User::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'hapus data succes');
    }

    public function login()
    {
        return view('login');
    }

    public function loginAuth(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = $request->only(['email', 'password']);
        if(Auth::attempt($user)) {
            $user = Auth::user();
            if ($user->role == 'ps') {
                return redirect('/dashboardPs')->with('success', 'Login Success');
            } elseif ($user->role == 'admin') {
                return redirect('/')->with('success', 'Login Success');
            }

        } else {
            return back()->with('error', 'Email or Password Invalid');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Logout Success');
    }
  
}
