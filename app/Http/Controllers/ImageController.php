<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function imageUpload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // below 3method are same (change image name randomly and store in given folder)
        // $request->file('image')->store(); // store in storage/app/private folder
        // $request->file('image')->store('images'); // store in storage/app/private/images folder
        // $request->file('image')->store('images','local');// store in storage/app/private/images folder

        // $request->file('image')->store('images','public');//store in storage/app/public/images folder
        // ====== image infomation ======
        // $request->file('image')->extension(); // get image extension note: this extension can be changed by user
        // $request->file('image')->getClientOriginalExtension(); // get original image extension
        // $request->file('image')->hashName();  // get image name with hash name
        // $request->file('image')->getClientMimeType(); // get image mime type
        // $request->file('image')->getSize(); // get image size in bytes

        $imageName = time().'.'.$request->file('image')->extension();  //change image name with time stamp and get extention
        $originalName = $request->file('image')->getClientOriginalName(); // get original image

        //===== real name and private storage ======
        // $request->file('image')->storeAs('images',$originalName);//store in storage/app/private/images folder with original name
        // $request->file('image')->storeAs($originalName);//store in storage/app/public/images folder with original name
        // real name and public storage

        //===== real name and public storage ======

        // $path=$request->file('image')->storeAs('images',$imageName,'public');//store in storage/app/public/images folder with original name
        // $request->file('image')->storeAs('',$originalName,'public');//store in storage/app/public folder with original name

        //===== move method dont create any method. move image existing folder======
        $path=$request->file('image')->move(public_path('storage/images'),$imageName);//store in storage/app/public/images folder with original name


        // Save the file information to the database if needed
        Image::create(['file_name' => $imageName, 'file_path' => $path]);

        return back()
            ->with('success','You have successfully uploaded the image.')
            ->with('file',$originalName);
    }   

    public function imageList()
    {
        $images = Image::all();
        return view('image-list', compact('images'));
    }

    public function imageDelete(Request $request)
    {

        $image = Image::findOrFail($request->image_id);
        $image->delete();

        $imagePath=public_path('storage/'.$image->file_path);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }   

    
        

        return back()->with('success', 'Image deleted successfully.');
    }   
}
