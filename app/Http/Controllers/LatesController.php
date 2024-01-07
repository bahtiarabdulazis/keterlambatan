<?php

namespace App\Http\Controllers;

use App\Models\lates;
use App\Models\rayons;
use App\Models\students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportStudent;
use App\Exports\ExportStudentPs;

class LatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lates = lates::all();
        $student = students::all();
        return view('lates.index', compact('lates', 'student'));
    }

    public function indexPs() 
    {
        $rayon = rayons::where('user_id', Auth::user()->id)->first();
    
        $lates = lates::with('student')
            ->whereHas('student', function ($query) use ($rayon) {
                $query->where('rayon_id', $rayon->id);
            })
            ->get();
        
        return view('latesPs.indexPs', compact('lates'));
    }
    
    public function dataSiswa() 
   {
       $rayon = rayons::where('user_id', Auth::user()->id)->first();
   
       $lates = lates::with('student')
           ->whereHas('student', function ($query) use ($rayon) {
               $query->where('rayon_id', $rayon->id);
           })
           ->get();
   
       $groupedLates = $lates->groupBy('student.nis');
   
       return view('latesPs.dataSiswa', compact('groupedLates'));
   }

    public function detail($nis)
    {
        $student = students::where('nis', $nis)->first();
        $lates = lates::whereHas('student', function ($query) use ($nis) {
            $query->where('nis', $nis);
        })->get();

        if ($student && $lates) {
            return view('lates.detail', compact('student', 'lates'));
        } else {
            return redirect()->route('lates.index')->with('error', 'Data tidak ditemukan.');
        }
    }
    public function detailPs($nis)
    {
        $studentPs = students::where('nis', $nis)->first();
        $latesPs = lates::whereHas('student', function ($query) use ($nis) {
            $query->where('nis', $nis);
        })->get();

        if ($studentPs && $latesPs) {
            return view('latesPs.detailPs', compact('studentPs', 'latesPs'));
        } else {
            return redirect()->route('latesPs.index')->with('error', 'Data tidak ditemukan.');
        }
    }

    public function cetak_pdf($nis)
    {
        $student = students::where('nis', $nis)->first();

        if ($student) {
            return view('lates.cetak_pdf', compact('student'));
        } else {
            return redirect()->route('lates.index')->with('error', 'Data tidak ditemukan.');
        }
    }


    function view_pdf($nis)
    {
        $mpdf = new \Mpdf\Mpdf();
        $student = students::where('nis', $nis)->first();
        $mpdf->WriteHTML(view('lates.cetak_pdf', compact('student')));
        $mpdf->Output();
    }

    function download_pdf($nis)
    {
        $mpdf = new \Mpdf\Mpdf();
        $student = students::where('nis', $nis)->first();
        $mpdf->WriteHTML(view('lates.cetak_pdf', compact('student')));
        $mpdf->Output('download-pdf-surat.pdf','D');
    }

    public function cetak_pdfPs($nis)
    {
        $studentPs = students::where('nis', $nis)->first();

        if ($studentPs) {
            return view('latesPs.cetak_pdfPs', compact('studentPs'));
        } else {
            return redirect()->route('latesps.indexPs')->with('error', 'Data tidak ditemukan.');
        }
    }


    function view_pdfPs($nis)
    {
        $mpdf = new \Mpdf\Mpdf();
        $studentPs = students::where('nis', $nis)->first();
        $mpdf->WriteHTML(view('latesPs.cetak_pdfPs', compact('studentPs')));
        $mpdf->Output();
    }

    function download_pdfPs($nis)
    {
        $mpdf = new \Mpdf\Mpdf();
        $studentPs = students::where('nis', $nis)->first();
        $mpdf->WriteHTML(view('latesPs.cetak_pdfPs', compact('studentPs')));
        $mpdf->Output('download-pdf-surat.pdf','D');
    }

    public function cetak_excel()
    {
        $student = students::all();
        $lates = lates::all();

        if ($student && $lates) {
            return view('lates.cetak_excel', compact('student','lates'));
        } else {
            return redirect()->route('lates.index')->with('error', 'Data tidak ditemukan.');
        }
    }

    function export_excel(){
        return Excel::download(new ExportStudent,"keterlambatan.xlsx");
    }

    public function cetak_excelPs()
    {
        $rayon = rayons::where('user_id', Auth::user()->id)->first();
    
        $lates = lates::with('student')
            ->whereHas('student', function ($query) use ($rayon) {
                $query->where('rayon_id', $rayon->id);
            })
            ->get();
    
            return Excel::download(new ExportStudentPs($lates), "keterlambatan_rayon.xlsx");

        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $student = students::all();
        return view('lates.create', compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'student_id' => 'required',
            'date_time_late' => 'required',
            'information' => 'required',
            'bukti' => 'mimes:jpg,jpeg,png,gif|max:1024'
        ]);

        if ($request->hasFile('bukti')) {
            $bukti_file = $request->file('bukti');
            $bukti_nama = $bukti_file->hashName();
            $bukti_file->move(public_path('image'), $bukti_nama);

            $data_lates['bukti'] = $bukti_nama;
        }

        lates::create([
            'student_id' => $request->student_id,
            'date_time_late' => $request->date_time_late,
            'information' => $request->information,
            'bukti' => $bukti_nama
        ]);

        return redirect()->route('lates.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(lates $lates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    { {
            $lates = lates::find($id);
            $student = students::all();

            return view('lates.edit', compact('lates', 'student'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required',
            'date_time_late' => 'required',
            'information' => 'required',
            'bukti' => 'nullable|mimes:jpg,jpeg,png,gif|max:1024'
        ]);

        $dataToUpdate = [
            'student_id' => $request->student_id,
            'date_time_late' => $request->date_time_late,
            'information' => $request->information,
        ];

        if ($request->hasFile('bukti')) {
            $bukti_file = $request->file('bukti');
            $bukti_nama = $bukti_file->hashName();
            $bukti_file->move(public_path('image'), $bukti_nama);

            $dataToUpdate['bukti'] = $bukti_nama;
        }

        lates::where('id', $id)->update($dataToUpdate);

        return redirect()->route('lates.index')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(lates $lates, $id)
    {
        lates::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'hapus data succes');
    }
}
