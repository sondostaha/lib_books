<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notes;
use Illuminate\Support\Facades\Auth;
class NotesController extends Controller
{
    public function create()
    {
        return view('notes.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required'
        ]);
        Notes::create([
            'content' => $request->content,
            'user_id' => Auth::user()->id,
        ]);
        return redirect(route('books.index'));
    }
}
