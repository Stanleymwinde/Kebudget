<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;



class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function showReports()
    {
        $reports = Report::all();
        return view('admin.reports.show', compact('reports'));
    }

    public function createReport()

    {
        return view('admin.reports.create');
    }

    public function storeReport(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'file' => 'required',
        ]);


        $title = $request->input('title');

        if (Report::latest()->first() !== null) {
            $reportsId = Report::latest()->first()->id + 1;
        } else {
            $reportsId = 1;
        }

        $slug = Str::slug($title, '-') . '-' . $reportsId;
        $user_id = Auth::user()->id;
        $description = $request->input('description');



        //File upload
        $imagePath = 'storage/' . $request->file('file')->store('reportsFiles', 'public');

        $report = new Report();
        $report->title = $request->input('title');
        $report->description = $description;
        $report->slug = $slug;
        $report->file = $imagePath;
        $report->user_id = $user_id;
        $report->save();


        return redirect()->route('dashboard.showReports')->with('status', 'Report Created Successfully');
    }

    public function downloadReport(Report $report)
    {
        return response()->download(public_path($report->file));
    }

    public function singleReport(Report $report)

    {

        return view('admin.reports.single', compact('report'));
    }

    public function editReport(Report $report)
    {
        return view('admin.reports.edit', compact('report'));
    }

    public function updateReport(Request $request, Report $report)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'file' => 'required',
        ]);

        $report->title = $request->input('title');
        $report->description = $request->input('description');

        if ($request->hasFile('file')) {
            $imagePath = 'storage/' . $request->file('file')->store('reportsFiles', 'public');
            $report->file = $imagePath;
        }

        $report->save();

        return redirect()->route('dashboard.showReports')->with('status', 'Report Updated Successfully');
    }

    public function deleteReport(Report $report)
    {
        $report->delete();
        return redirect()->route('dashboard.showReports')->with('status', 'Report Deleted Successfully');
    }
}
