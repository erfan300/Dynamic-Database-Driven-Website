<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project_table;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CreateProjectController extends Controller
{

    function DataInsert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:100|unique:projects',
            'start_date' => 'nullable|date|after_or_equal:today',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'phase' => 'nullable|in:design,development,testing,deployment,complete',
            'description' => 'nullable|string|max:500'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors()->all());
        }

        $title = $request->input('title');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $phase = $request->input('phase');
        $description = $request->input('description');
        $uid = session('user_id');

        if (!$uid) {
            return response()->json(['error' => 'User not logged in'], 401);
        }

        $isInsertSuccess = Project_table::insert([
            'title' => $title,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'phase' => $phase,
            'description' => $description,
            'uid' => $uid
        ]);

        if ($isInsertSuccess) {
            return view('redirect');
        } else {
            return response()->json(['error' => 'Insert unsuccess'], 500);
        }
    }

    function show(){
        $data = Project_table::paginate(35);
        return view('view',['projects'=>$data]);
    }

    public function display($title)
    {
        $project = DB::table('projects')
                    ->leftJoin('users', 'projects.uid', '=', 'users.uid')
                    ->select('projects.*', 'users.email')
                    ->where('projects.title', $title)
                    ->first();
        
        return view('project', compact('project'));
    }
    public function search(Request $request)
    {
        $q = $request->input('q');

        $projects = DB::table('projects')
            ->leftJoin('users', 'projects.uid', '=', 'users.uid')
            ->select('projects.*', 'users.email')
            ->where('projects.title', 'like', "%$q%")
            ->orWhere('projects.end_date', 'like', "%$q%")
            ->get();

        return view('search', compact('projects', 'q'));
    }
    public function update($title)
    {
        $data = Project_table::where('title', $title)->first();
    
        // Only allow the user who submitted the project to update it
        if ($data->uid != session('user_id')) {
            return redirect()->route('view')->with('error', 'You are not authorized to update this project');
        }
    
        return view('update', ['data' => $data]);
    }
    
    public function updateProject(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:projects,title,' . $request->input('pid') . ',pid',
            'start_date' => 'nullable|date|after_or_equal:today',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'phase' => 'nullable|in:design,development,testing,deployment,complete',
            'description' => 'nullable|string|max:500'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $pid = $request->input('pid');
        $title = $request->input('title');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $phase = $request->input('phase');
        $description = $request->input('description');
    
        $isUpdateSuccess = Project_table::where('pid', $pid)->update([
            'title' => $title,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'phase' => $phase,
            'description' => $description,
        ]);
    
        if ($isUpdateSuccess) {
            return redirect()->route('view')->with('success', 'Project updated successfully');
        } else {
            return redirect()->back()->with('error', 'Project update failed')->withInput();
        }
    }
    

  
}
