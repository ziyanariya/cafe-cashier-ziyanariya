<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Http\Requests\StorekategoriRequest;
use App\Http\Requests\UpdatekategoriRequest;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDOException;
use App\Exports\KategoriExport;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Imports\KategoriImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator as FacadesValidator;




class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['kategori'] =  Kategori::orderBy('created_at','ASC')->get();

        return view('kategori.index')->with($data);
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
    public function store(StorekategoriRequest $request)
    {
        try{
            DB::beginTransaction();
            Kategori::create($request->all());
            DB::commit();
            return redirect('kategori')->with('success','Data berasil ditambahkan');
        }catch (QueryException | Exception | PDOException) {
            DB::rollback();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatekategoriRequest $request, kategori $kategori)
    {
        $kategori->update($request->all());
        return redirect('kategori')->with('success',' Update Data berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kategori $kategori)
    {
        
        $kategori->delete();
        return redirect('/kategori')->with('success','Data berhasil dihapus!');
    }

    
    public function exportData(){
        $date = date('Y-m-d');
        return excel::download(new KategoriExport, $date . '_Kategori.xlsx');
    }
    public function importData(Request $request){
        
        $validator = FacadesValidator::make($request->all(), [
            'import' => 'required'
        ]);
    
        $validated = $validator->validated();
    
        Excel::import(new KategoriImport, $validated['import']);
    
        return redirect()->back()->with('success', 'Data berhasil diimport');
     
    }
    public function kategoripdf()
    {
        $kategori = kategori::all();
        $pdf = pdf::loadView('kategori.data', compact('kategori'));
        return $pdf-> download('kategori.pdf');
    }

}

