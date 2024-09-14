<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index(Request $request){
        $idea = Idea::orderBy('created_at','DESC');
        if($request->has('search')){
            $idea->where('content', 'like', '%' . $request->search . '%');
        }
        return view('dashboard', [
            'ideas' => $idea->paginate(5)
        ] );
    }

    public function edit(Idea $idea){
        if(auth()->id() !== $idea->user_id){
            abort(404);
        }
        $editing = true;
        return view('ideas.show', compact('editing','idea'));
    }

    public function update(Request $request, Idea $idea){
        if(auth()->id() !== $idea->user_id){
            abort(404);
        }
        $valid = $request->validate([
            'content' => 'required|max:10'
        ]);
        $idea->update($valid);
        return redirect()->route('ideas.show',$idea->id)->with('success','idea updated successfuly');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'content' => 'required|max:10'
        ]);
        $validated['user_id'] = auth()->id();
        Idea::create($validated);
        return redirect()->back()->with('success','idea created successfuly');
    }

    public function destroy(Idea $idea){
        if(auth()->id() !== $idea->user_id){
            abort(404);
        }
        $idea->delete();
        return redirect('/')->with('success','idea deleted successfuly');
    }

    public function show(Idea $idea){
        return view('ideas.show', compact('idea'));
    }
}
