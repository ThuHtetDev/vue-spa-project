<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookShelf;
use App\Book;

class BookShelfController extends Controller
{
    public function index(){
      $shelf =  BookShelf::all();
      return response()->json($shelf);
    }
    public function getBooksByshelf($id){
      $findShelf = BookShelf::find($id);
      $books = $findShelf->books;
      $cup = [];
      foreach( $books as $pv){
          $cup[] = $pv;
      }
      return response()->json($cup);
    }
    public function createShelf(Request $request){
        $rr = json_decode($request['data']);
        // return response()->json($request->image->path());
        // $data = $request->validate([
        //     'shelf_name' => 'required',
        //     'about' => 'required',
        // ]);
        
        $createShelf = new \App\BookShelf();
        $createShelf->shelf_name = $rr->shelf_name;
        $createShelf->about = $rr->about;
        // $createShelf->shelf_name = $request['shelf_name'];
        // $createShelf->about =  $request['about'];
        //Handle image upload
         
              $filenameEx = $request->file('image')->getClientOriginalName();//get  name and extension
              $filenamePath = pathinfo($filenameEx,PATHINFO_FILENAME); // PATH WITH FILENAME
              $extension = $request->file('image')->getClientOriginalExtension();
              $filenameToStore = $filenamePath.'_'.time() .'_'.$extension;/// addition name and extension

              $path = $request->file('image')->storeAs('/public/images',$filenameToStore); // Save in Folder
           
      ////////////////////   
        // $input = time().'.'.$request->image->getClientOriginalExtension();
        // $destinationPath = public_path('/images');
        // $files = $request->image;
        // $files->move($destinationPath,$input);
        
        // $request->image->move(public_path('images'), $imgName);
        // $createShelf->image =  $_FILES['image']['name'];
     
        // $contents = file_get_contents($request->image->path());
        // ...or just move it somewhere else (eg: local `storage` directory or S3)
        // $newPath = $request->image->store('photos', 's3');
        $createShelf->image = $filenameToStore;
        $createShelf->save();
       
        return response()->json($createShelf);
    }
}
