<?php

namespace App\Http\Controllers;

use App\Models\rayons;
use App\Models\lates;
use App\Models\students;
use App\Models\rombels;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboardPs()
    {

        $rayon = rayons::where('user_id', Auth::user()->id)->first();

        $totalStudents = students::where('rayon_id', $rayon->id)->count();

        $today = now()->format('Y-m-d');
        $totalLateStudents = lates::whereHas('student', function ($query) use ($rayon) {
            $query->where('rayon_id', $rayon->id);
        })
            ->whereDate('date_time_late', $today)
            ->count();

            return view('homePs', compact('totalStudents', 'totalLateStudents'));
            }



    public function index()
    {
        $student = students::all();
        $rombel = rombels::all();
        $rayon = rayons::all();
        return view('student.index', compact('student', 'rombel', 'rayon'));
    }

    public function count()
    {
        $jmlStudent = students::count();
        $jmlRombel = rombels::count();
        $jmlRayon = rayons::count();
        $jmlAdmin = User::where('role', 'admin')->count();
        $jmlPs = User::where('role', 'ps')->count();
        return view('home', compact('jmlStudent', 'jmlRombel', 'jmlRayon', 'jmlAdmin', 'jmlPs'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rombel = rombels::all();
        $rayon = rayons::all();
        return view('student.create', compact('rombel', 'rayon'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'rombel_id' => 'required',
            'rayon_id' => 'required'
        ]);

        students::create([
            'nis' => $request->nis,
            'name' => $request->name,
            'rombel_id' => $request->rombel_id,
            'rayon_id' => $request->rayon_id
        ]);

        return redirect()->route('student.index')->with('success', 'data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(students $students)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = students::find($id);
        $rombel = rombels::all();
        $rayon = rayons::all();

        return view('student.edit', compact('student', 'rombel', 'rayon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'rombel_id' => 'required',
            'rayon_id' => 'required'
        ]);

        students::where('id', $id)->update([
            'nis' => $request->nis,
            'name' => $request->name,
            'rombel_id' => $request->rombel_id,
            'rayon_id' => $request->rayon_id
        ]);

        return redirect()->route('student.index')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(students $student, $id)
    {
        students::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'hapus data succes');
    }
}
