<?php

namespace App\Http\Controllers;

use App\Models\AdmitCard;
use Illuminate\Http\Request;

class AdmitCardController extends Controller
{
    public function create()
    {
        return view('admit.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name_bn' => 'required|string|max:255',
            'father_name_bn' => 'required|string|max:255',
            'mother_name_bn' => 'nullable|string|max:255',
            'school' => 'required|string|max:255',
            'exam_time' => 'required|string|max:15',
            'roll' => 'required|string|max:100|unique:admit_cards,roll',
            'exam_center_bn' => 'required|string|max:255',
            'exam_date' => 'required|date'
        ]);

        $admit = AdmitCard::create($data);

        return redirect()->route('admit.list')->with('success', 'Admit card saved.');
    }

    public function index()
    {
        $admitCards = AdmitCard::latest()->get();

        return view('admit.list', compact('admitCards'));
    }

    public function downloadPDF($id)
    {
        $admit = AdmitCard::findOrFail($id);

        return view('admit.pdf', compact('admit'));
    }
}
