<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Support\Facades\Validator;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Client\Events\ResponseReceived;
use Illuminate\Http\Request;

class ApiBookController extends Controller
{
   public function index()
   {
    $books = Book::get();
        return response()->json($books);
   }
   public function show($id)
   {
        $books = Book::with('categories')->findOrFail($id);
        return response()->json($books);
   }
   public function store(Request $request)
   {
    $validator = Validator::make($request->all(), [
        'title' => 'required|string|max::100',
        'desc' => 'required|string',
        'img'=>'image|nullable',
       'category_ids'=>'required',
        'category_ids.*'=>'exists:categories,id'
    ]);

    if ($validator->fails()) {
            $errors = $validator->erors();
            return response()->json($errors);
    }

    //move
    $img = $request->file('img');
    $ext = $img->getClientOriginalExtension();
    $name =uniqid() . "$ext";
    $img->move(public_path('uploades/books'), "$name");


     $book =Book::create([
        'title' => $request->title,
        'desc' => $request->desc,
        'img'=>$name
    ]);

    $book->categories()->sync($request->category_ids);
        $success = "book created successfully";
        return response()->json($success);

   }
   public function update( Request $request , $id)
   {
    //validation 
    $request->validate([
        'title' => 'required|string|max::100',
        'desc' => 'required|string',
        'img'=>'image|nullable',
        
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
        $success = 'your book updated successfully';
        return response()->json($success);
    }
    public function delete($id){
        $book = Book::findOrFail($id);
        if ($book->img !== null) {
            unlink(public_path('uploades/books/' . $book->img));
        }
        $book->categories()->sync([]);
        $book->delete();
        

        $success = 'your book deleted successfully';
        return response()->json($success);
    }
}
