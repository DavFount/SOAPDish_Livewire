<?php

namespace App\Http\Controllers;

use App\Models\Study;
use Illuminate\Http\Request;

class StudiesController extends Controller
{
    public function index()
    {
        return view('studies.index', [
            'studies' => Study::latest()->where('public', true)->paginate()
        ]);
    }

    public function create()
    {
        return view('studies.create');
    }

    public function store(Request $request)
    {
        $study = new Study();

        return redirect(route('studies.show', [
            'study' => $study
        ]))->with('success', 'Study Created Successfully!');
    }

    public function show(Study $study)
    {
        return view('studies.show', [
            'study' => $study,
        ]);
    }

    public function edit(Study $study)
    {
        return view('studies.edit', [
            'study' => $study,
        ]);
    }

    public function update(Request $request, Study $study)
    {
        $this->validateStudy($study);

        return redirect(route('studies.show'), [
            'study' => $study,
        ])->with('success', 'Study Updated Successfully!');
    }

    protected function validateStudy(?Study $study = null): array
    {
        $study ??= new Study();

        return request()->validate([
            'title' => ['required', 'max:23', 'string'],
            'verse' => ['required', 'max:23', 'string'],
            'body' => ['required', 'string'],
        ]);
    }

    public function destroy(Study $study)
    {
        $study->delete();

        return redirect(route('dashboard'))->with('success', 'Study Deleted Successfully');
    }
}
