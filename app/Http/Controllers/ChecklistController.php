<?php

// Controller for Checklist
namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Checklist;

class ChecklistController extends Controller
{
    public function index()
    {
        $checklists = Checklist::all();
        return view('checklists.index', compact('checklists'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'deskripsi_pekerjaan' => 'required|string',
            'jam_inspeksi' => 'required',
            'nama_pic' => 'required|string',
            'status_pekerjaan' => 'required|array',
            'tahun' => 'required|integer',
            'bulan' => 'required|integer',
            'area' => 'required|string',
        ]);

        Checklist::create($request->all());
        return redirect()->route('checklists.index')->with('success', 'Checklist saved successfully');
    }



    public function exportPDF()
    {
        $checklists = Checklist::all();

        $pdf = Pdf::loadView('checklists.export', compact('checklists'))->setPaper('A4', 'landscape');

        return $pdf->download('checklist_report.pdf');
    }
}
