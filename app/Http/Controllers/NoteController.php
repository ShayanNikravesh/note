<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::all();
        return view('index',compact('notes'));
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
    public function store(Request $request)
    {
        
        $note = $request->validate([
            'note' => ['required'],
        ]);

        $note = new Note();
        $note->note = $request->note;
        $note->save();

        Alert::toast('Note Saved!', 'success')->background('#1a1a2e')->flash();

        return redirect()->action([NoteController::class, 'index']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $note = Note::find($id);
        return view('edit',compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $note = Note::find($id);
        $note->note = $request->note;
        $note->save();

        Alert::toast('Note Updated!', 'success')->background('#1a1a2e')->flash();

        return redirect()->action([NoteController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $note = Note::find($id);
        $note->delete();

        Alert::toast('Note Deleted!', 'success')->background('#1a1a2e')->flash();

        return redirect()->action([NoteController::class, 'index']);
    }

    public function ChangeStatus(string $id)
    {

        $note = Note::findOrFail($id);

        $note->status = $note->status === 'done' ? 'pending' : 'done';
        $note->save();

        return response()->json([
            'success' => true,
            'status' => $note->status,
            'message' => 'Status Changed',
        ]);
        
    }

}
