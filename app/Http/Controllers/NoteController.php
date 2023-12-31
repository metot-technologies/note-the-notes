<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::where('user_id', Auth::user()->id)->get();
        return view('main', ["notes" => $notes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoteRequest $request)
    {
        $request->validated();
        $note = new Note([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'content' => $request->content
        ]);
        $save = $note->save();
        if ($save) {
            return redirect()->route('main');
        }else{
            return redirect()->back()->withErrors(['msg' => 'Failed saving note, Try again!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note, $id)
    {
        $note = Note::find($id);

        if (!$note){
            abort(404);
        }

        if ($note->user_id != Auth::user()->id){
            abort(403);
        }

        return view('edit', ['note' => $note]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoteRequest $request, Note $note, $id)
    {
        $request->validated();

        $note = Note::find($id);

        if (!$note){
            abort(404);
        }

        if ($note->user_id != Auth::user()->id){
            abort(403);
        }

        $update = $note->update([
            'user_id' => $note->user_id,
            'title' => $request->title,
            'content' => $request->content
        ]);

        if ($update) {
            return redirect()->route('main');
        }else{
            return redirect()->back()->withErrors(['msg' => 'Failed updating note, Try again!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note, $id)
    {
        $note = Note::find($id);
        if (!$note){
            abort(404);
        }
        if ($note->user_id != Auth::user()->id){
            abort(403);
        }
        $delete = $note->forceDelete();
        if ($delete) {
            return redirect()->route('main');
        }else{
            return redirect()->back()->withErrors(['deleteError' => 'Failed deleting note, Try again!']);
        }
    }
}
