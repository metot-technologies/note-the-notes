<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArchiveController extends Controller
{
    public function index()
    {
        $notes = Note::onlyTrashed()->get();
        return view('archive.main', ["notes" => $notes]);
    }

    public function archive(Note $note, $id)
    {
        $note = Note::find($id);
        if (!$note){
            abort(404);
        }
        if ($note->user_id != Auth::user()->id){
            abort(403);
        }
        $delete = $note->delete();
        if ($delete) {
            return redirect()->route('archive.main');
        }else{
            return redirect()->back()->withErrors(['deleteError' => 'Failed archiving note, Try again!']);
        }
    }

    public function restore(Note $note, $id)
    {
        $note = Note::withTrashed()->find($id);
        if (!$note){
            abort(404);
        }
        if ($note->user_id != Auth::user()->id){
            abort(403);
        }
        $restore = $note->restore();
        if ($restore) {
            return redirect()->route('main');
        }else{
            return redirect()->back()->withErrors(['deleteError' => 'Failed restoring note, Try again!']);
        }
    }
}
