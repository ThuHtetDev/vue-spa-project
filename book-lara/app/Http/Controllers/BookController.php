<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    public function index(){
        $books =  Book::all();
        return response()->json($books);
    }

    public function createBook(Request $request){
        $rr = json_decode($request['data']);
        // return response()->json($request->image->path());
        // $data = $request->validate([
        //     'shelf_name' => 'required',
        //     'about' => 'required',
        // ]);
        
        $createBook = new \App\Book();
        $createBook->isbn = \Str::random(8);
        $createBook->shelf_id = $rr->shelf_id;
        $createBook->book_title = $rr->book_title;
        $createBook->review = $rr->review;
        $createBook->author = $rr->author;


        $filenameEx = $request->file('image')->getClientOriginalName();//get  name and extension
        $filenamePath = pathinfo($filenameEx,PATHINFO_FILENAME); // PATH WITH FILENAME
        $extension = $request->file('image')->getClientOriginalExtension();
        $filenameToStore = $filenamePath.'_'.time() .'_'.$extension;/// addition name and extension
        $path = $request->file('image')->storeAs('/public/images',$filenameToStore); // Save in Folder
           
        $createBook->book_image = $filenameToStore;
        $createBook->save();
       
        return response()->json($createBook);
    }
}
