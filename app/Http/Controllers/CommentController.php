<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;
use App\Models\Project;

class CommentController extends Controller
{

    public function storeComment(Request $request, Project $project)
    {
        $request->validate([
            'text' => 'required',
        ]);

        $comment = new Comments();
        $comment->text = $request->input('text');
        $comment->project_id = $project->id;
        $comment->user_id = auth()->user()->id;
        $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    public function delete(Request $request)
    {
        $id=$request->id;
        $comment = Comments::where('id',$id)->first();
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
    public function update(Request $request){

        $request->validate([
            'text' => 'required',
        ]);
      $id=$request->id;
      $comment = Comments::where('project_id',$id)->first();
      $comment->text = $request->text;
      $comment->save();
      return back();
    }
}