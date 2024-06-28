<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::where('user_id', Auth::id())->paginate(10);
        return view('notes.index', compact('notes'));
    }

    public function create()
    {
        $categories = Category::where('user_id', Auth::id())->get();
        return view('notes.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $note = new Note();
        $note->title = $request->title;
        $note->content = $request->content;
        $note->category_id = $request->category_id;
        $note->user_id = Auth::id();
        $note->save();

        return redirect()->route('notes.index')->with('success', 'Note created successfully.');
    }

    public function edit(Note $note)
    {
        $this->authorize('update', $note); // Authorize user to edit note
        $categories = Category::where('user_id', Auth::id())->get();
        return view('notes.edit', compact('note', 'categories'));
    }

    public function update(Request $request, Note $note)
    {
        $this->authorize('update', $note); // Authorize user to update note

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $note->title = $request->title;
        $note->content = $request->content;
        $note->category_id = $request->category_id;
        $note->save();

        return redirect()->route('notes.index')->with('success', 'Note updated successfully.');
    }

    public function destroy(Note $note)
    {
        $this->authorize('delete', $note); // Authorize user to delete note
        $note->delete();
        return redirect()->route('notes.index')->with('success', 'Note deleted successfully.');
    }
}

