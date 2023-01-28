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
            'desc' => 'required|string',
            'img'=>'image|nullable'
        ]);
        //move
        $img = $request->file('img');
        $ext = $img->getClientOriginalExtension();
        $name = "book -" . uniqid() . "$ext";
        $img->move(public_path('uploades/books'), "$name");


         Book::create([
            'title' => $request->title,
            'desc' => $request->desc,
            'img'=>$name
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
            'desc' => 'required|string',
            'img'=>'image|nullable'
        ]);
        $book = Book::findOrFail($id);
        $name = $book->img;
        if($request->hasFile('img')){
            //move
            

            
            if($name !== null){
                unlink(public_path('uploades/books/') . $book->img);
            }
            $img = $request->file('img');
            $ext = $img->getClientOriginalExtension();
            $name = "book -" . uniqid() . "$ext";
            $img->move(public_path('uploades/books'), "$name");
            
        }

        $book->update([
            'title' => $request->title,
            'desc' => $request->desc,
            'img'=>$name
        ]);
        return redirect(route('books.show',$id));
    }
    public function delete($id){
        $book = Book::findOrFail($id);
        if ($book->img !== null) {
            unlink(public_path('uploades/books/' . $book->img));
        }
        $book->delete($id);
        return redirect(route('books.index'))->with('success', 'book deleted successfully ');
    }
}
