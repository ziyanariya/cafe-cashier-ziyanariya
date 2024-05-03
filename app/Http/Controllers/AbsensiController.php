<?php

namespace App\Http\Controllers;

use App\Models\absensi;
use App\Http\Requests\StoreabsensiRequest;
use App\Http\Requests\UpdateabsensiRequest;
use Maatwebsite\Excel\Facades\Excel;
use PDOException;
use App\Exports\AbsensiExport;
use App\Imports\AbsensiImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Database\QueryException;
use Barryvdh\DomPDF\Facade\Pdf;


class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
        $data['absensi'] =  Absensi::orderBy('created_at','ASC')->get();

        return view('absensi.index')->with($data);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreabsensiRequest $request)
    {
        try {
            DB::beginTransaction();
            absensi::create($request->all());
            DB::commit();
            return redirect('absensi')->with('success', 'Data berhasil ditambahkan');
        } catch (QueryException $e) {
            DB::rollback();
            dd($e); // Menampilkan detail kesalahan
        } catch (Exception | PDOException $e) {
            DB::rollback();
            dd($e); // Menampilkan detail kesalahan
        }        
    }

    /**
     * Display the specified resource.
     */
    public function show(absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateabsensiRequest $request, absensi $absensi)
    {
        $absensi->update($request->all());
        return redirect('absensi')->with('success',' Update Data berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(absensi $absensi)
    {
        $absensi->delete();
        return redirect('/absensi')->with('success','Data berhasil dihapus!');
    }
    public function exportData(){
        $date = date('Y-m-d');
        return excel::download(new AbsensiExport, $date . '_Absensi.xlsx');
    }

    public function importData(Request $request){
        
        $validator = FacadesValidator::make($request->all(), [
            'import' => 'required'
        ]);
    
        $validated = $validator->validated();
    
        Excel::import(new AbsensiImport, $validated['import']);
    
        return redirect()->back()->with('success', 'Data berhasil diimport');
    
    }
    public function absensipdf()
    {
        $absensi =absensi::all();
        $pdf = pdf::loadView('absensi.data', compact('absensi'));
        return $pdf-> download('absensi.pdf');
    }

}
