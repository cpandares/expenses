<?php

namespace App\Http\Controllers;

use App\ExpenseReport;
use App\Mail\SummaryReports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ExpenseReportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenseReports = ExpenseReport::all();
        return view('reports.index',compact('expenseReports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $report = new ExpenseReport();

        $validation = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

       


        $report->title = $request->title;
        $report->description = $request->description;
        $report->save();
        return redirect('/expense-reports')->with([
            'message' =>'Report created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = ExpenseReport::findOrFail($id);
        return view('reports.detail',compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $report = ExpenseReport::findOrFail($id);
        return view('reports.edit',compact('report'));
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $report = ExpenseReport::findOrFail($id);
        $validation = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        $report->title = $request->title;
        $report->description = $request->description;

        $report->update();

        return redirect('/expense-reports')->with([
            'message' => 'Report updated successfully'
        
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = ExpenseReport::find($id);
        $report->delete();
        return redirect('/expense-reports')->with([
            'message' => 'Report deleted successfully'
        ]);
    }


    public function sendEmail(Request $request, $id){
        $report = ExpenseReport::findOrFail($id);
        Mail::to($request->email)->send(new SummaryReports($report));
        return redirect('/expense-reports')->with([
            "message"=>"report send"
        ]);
    }

}
