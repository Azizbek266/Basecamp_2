<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Project;
use Egulias\EmailValidator\Parser\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function create()
    {
        return view('project.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'text' => 'required',
        ]);

        $project = new Project;
        $project->name = $request->name;
        $project->text = $request->text;
        $project->user_id = auth()->user()->id;
        $project->save();

        return redirect()->route('home'); 
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('project.edit', compact('project'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'text' => 'required',
        ]);
        $id = $request->id;
        // $project->update($request->only(['name', 'text']));
        $project = Project::where('id',$id)->first();
        $project->name=$request->name;
        $project->text=$request->text;
        $project->save();
        
        return redirect()->route('home');

    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $project = Project::where('id',$id)->first();
        $project->delete();

        return redirect()->route('home'); 
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        $comments = Comments::where('project_id', $id)->get();
        return view('project.view', compact('project', 'comments'));
    }

}
