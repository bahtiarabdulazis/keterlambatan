<?php

namespace App\Http\Controllers;

use App\Models\rayons;
use App\Models\User;
use Illuminate\Http\Request;

class RayonsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rayon = rayons::all();
        $user = User::all();
        return view('Rayon.index', compact('rayon', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        return view('Rayon.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rayon' => 'required',
            'user_id' => 'required'
        ]);

        rayons::create([
            'rayon' => $request->rayon,
            'user_id' => $request->user_id
        ]);

        return redirect()->route('rayon.index')->with('success', 'data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(rayons $rayons)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rayon = rayons::find($id);
        $users = User::all();

        return view('rayon.edit', compact('rayon', 'users'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'rayon' => 'required',
            'user_id' => 'required',
        ]);

        rayons::where('id', $id)->update([
            'rayon' => $request->rayon,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('rayon.index')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(rayons $rayon, $id)
    {
        rayons::where('id',$id)->delete();
        return redirect()->back()->with('deleted','hapus data succes');
    }
}
