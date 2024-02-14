<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class UserController extends Controller

{
    function profile(){
        return view('admin.user.profile');
    }
    function profile_update(Request $request){

    if($request->photo == ''){
        User::find(Auth::id())->update([
       'name'=>$request->name,
        ]);
        return back()->with('success', 'update succesfully');
    }
    else
    {
        if(Auth::user()->photo != null){
       $curent=public_path('uploads/users/'.Auth::user()->photo);
       unlink($curent);
        }

     $manager = new ImageManager(new Driver());
     $photo = $request->photo;
     $extension = $photo->extension();
      $file_name = Auth::id().'.'.$extension;
       $img= $manager->read($photo)->save(public_path('uploads/users/'.$file_name));
       User::find(Auth::id())->update([
        'name'=>$request->name,
        'photo'=>$file_name,
         ]);
         return back()->with('success', 'Profile update succesfully');
    }}
    function user_list(){
        $users=user::all();
        return view('admin.user.user_list', compact('users'));
    }
}
