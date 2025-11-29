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
            'class' => 'required|string|max:50',
            'exam_time' => 'required|string|max:15',
            'roll' => 'required|string|max:100|unique:admit_cards,roll',
            'exam_center_bn' => 'required|string|max:255',
            'exam_date' => 'required|date'
        ]);

        $admit = AdmitCard::create($data);

        if ($request->has('save_and_create_another')) {
            return redirect()->route('admit.create')->with('success', 'Admit card saved. You can create another one now.');
        }

        return redirect()->route('admit.list')->with('success', 'Admit card saved.');
    }

    public function index(Request $request)
    {
        $query = AdmitCard::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name_bn', 'like', "%{$search}%")
                  ->orWhere('roll', 'like', "%{$search}%")
                  ->orWhere('exam_center_bn', 'like', "%{$search}%")
                  ->orWhere('school', 'like', "%{$search}%");
            });
        }

        if ($request->filled('sort')) {
            $query->orderBy($request->sort, $request->get('direction', 'asc'));
        } else {
            $query->latest();
        }

        $perPage = $request->get('per_page', 10);
        $admitCards = $query->paginate($perPage);

        if ($request->ajax()) {
            return view('admit.partials.admit_table', compact('admitCards'))->render();
        }

        return view('admit.list', compact('admitCards'));
    }

    public function downloadPDF($id)
    {
        $admit = AdmitCard::findOrFail($id);

        return view('admit.pdf', compact('admit'));
    }

    public function edit($id)
    {
        $admit = AdmitCard::findOrFail($id);
        return view('admit.edit', compact('admit'));
    }

    public function update(Request $request, $id)
    {
        $admit = AdmitCard::findOrFail($id);

        $data = $request->validate([
            'name_bn' => 'required|string|max:255',
            'father_name_bn' => 'required|string|max:255',
            'mother_name_bn' => 'nullable|string|max:255',
            'school' => 'required|string|max:255',
            'class' => 'required|string|max:50',
            'exam_time' => 'required|string|max:15',
            'roll' => 'required|string|max:100|unique:admit_cards,roll,' . $id,
            'exam_center_bn' => 'required|string|max:255',
            'exam_date' => 'required|date'
        ]);

        $admit->update($data);

        return redirect()->route('admit.list')->with('success', 'Admit card updated successfully.');
    }

    public function destroy($id)
    {
        $admit = AdmitCard::findOrFail($id);
        $admit->delete();

        return redirect()->route('admit.list')->with('success', 'Admit card deleted successfully.');
    }
}
