<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Http\Requests\StoreJenisRequest;
use App\Http\Requests\UpdateJenisRequest;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDOException;
use App\Exports\Jenisxport;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Imports\JenisImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator as FacadesValidator;


class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['jenis'] =  Jenis::orderBy('created_at','ASC')->get();

        //menampilkan data
        return view('jenis.index')->with($data);
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
    public function store(StoreJenisRequest $request)
    {
        try{
            DB::beginTransaction();
            Jenis::create($request->all());
            DB::commit();
            return redirect('jenis')->with('success','Data berasil ditambahkan');
        }catch (QueryException | Exception | PDOException) {
            DB::rollback();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Jenis $jenis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jenis $jenis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJenisRequest $request, Jenis $jeni)
    {
        $jeni->update($request->all());
        return redirect('jenis')->with('success',' Update Data berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jenis $jeni)
    {
        $jeni->delete();
        return redirect('/jenis')->with('success','Data berhasil dihapus!');
    }

    public function exportData(){
        $date = date('Y-m-d');
        return excel::download(new Jenisxport, $date . '_Jenis.xlsx');
    }

    public function importData(Request $request){
        
        $validator = FacadesValidator::make($request->all(), [
            'import' => 'required'
        ]);
    
        $validated = $validator->validated();
    
        Excel::import(new JenisImport, $validated['import']);
    
        return redirect()->back()->with('success', 'Data berhasil diimport');
    
    }

    public function jenispdf()
    {
        $jenis = jenis::all();
        $pdf = pdf::loadView('jenis.data', compact('jenis'));
        return $pdf-> download('jenis.pdf');
    }
}
