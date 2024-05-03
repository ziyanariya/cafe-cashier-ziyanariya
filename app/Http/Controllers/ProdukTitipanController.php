<?php

namespace App\Http\Controllers;

use App\Models\ProdukTitipan;
use App\Http\Requests\StoreProdukTitipanRequest;
use App\Http\Requests\UpdateProdukTitipanRequest;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProduktitipaniExport;
use App\Imports\ProduktitipanImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Barryvdh\DomPDF\Facade\Pdf;


class ProdukTitipanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['produktitipan'] =  Produktitipan::orderBy('created_at','ASC')->get();

        return view('produktitipan.index')->with($data);
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
    public function store(StoreProdukTitipanRequest $request)
    {
        try{
            DB::beginTransaction();
            Produktitipan::create($request->all());
            DB::commit();
            return redirect('produktitipan')->with('success','Data berasil ditambahkan');
        }catch (QueryException | Exception | PDOException) {
            DB::rollback();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProdukTitipan $produkTitipan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProdukTitipan $produkTitipan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdukTitipanRequest $request, ProdukTitipan $produktitipan)
    {
        $produktitipan->update($request->all());
        return redirect('produktitipan')->with('success',' Update Data berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProdukTitipan $produktitipan)
    {
        $produktitipan->delete();
        return redirect('/produktitipan')->with('success','Data berhasil dihapus!');
    }
    public function exportData(){
        $date = date('Y-m-d');
        return excel::download(new ProduktitipaniExport, $date . '_Produktitipani.xlsx');
    }
    public function importData(Request $request){
        
        $validator = FacadesValidator::make($request->all(), [
            'import' => 'required'
        ]);
    
        $validated = $validator->validated();
    
        Excel::import(new ProduktitipanImport, $validated['import']);
    
        return redirect()->back()->with('success', 'Data berhasil diimport');
    
    }
    public function produktitipanpdf()
    {
        $produktitipan = produktitipan::all();
        $pdf = pdf::loadView('produktitipan.data', compact('produktitipan'));
        return $pdf-> download('produktitipan.pdf');
    }
}
