<?php

namespace App\Http\Controllers;

use App\Models\JobType;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $jobTypes = JobType::all();
        return view('subject.index', compact('jobTypes'));
    }

    public function create()
    {
        return view('subject.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        JobType::create($request->all());

        return redirect()->route('subjects.index')->with('success', 'Subject updated successfully.');
    }

    public function show(JobType $jobType)
    {
        return view('subject.show', compact('jobType'));
    }

    public function edit(JobType $jobType)
    {
        return view('subject.edit', compact('jobType'));
    }

    public function update(Request $request, JobType $jobType)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $jobType->update($request->all());

        return redirect()->route('subjects.index')->with('success', 'Subject updated successfully.');
    }

    public function destroy(JobType $jobType)
    {
        $jobType->delete();

        return redirect()->route('subjects.index')->with('success', 'Subject deleted successfully.');
    }
}


