<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
class BookController extends Controller
{
    public function index(){
        $books = Book::paginate(3);
        return view('book.index' , compact('books'));
    }
    public function show($id){
        $books = Book::findOrFail($id);
        return view('book.show', compact('books'));
    }
    public function create(){
        return view('book.create');
    }

    public function store(Request $request){
        //validation 
        $request->validate([
            'title' => 'required|string|max::100',
            'desc' => 'required|string'
        ]);
         Book::create([
            'title' => $request->title,
            'desc' => $request->desc
        ]);

        return redirect(route('books.index'));
    }

    public function edit($id){
        $book = Book::findOrFail($id);
        return view('book.edit', compact('book'));
    }
    public function update( Request $request , $id){
        //validation 
        $request->validate([
            'title' => 'required|string|max::100',
            'desc' => 'required|string'
        ]);
        Book::findOrFail($id)->update([
            'title' => $request->title,
            'desc' => $request->desc
        ]);
        return redirect(route('books.show',$id));
    }
    public function delete($id){
        Book::findOrFail($id)->delete($id);
        return redirect(route('books.index'))->with('success', 'book deleted successfully ');
    }
}
