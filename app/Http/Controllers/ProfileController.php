<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
   $userAuth  = auth()->user();
   $genero = array('Hombre'=>'Hombre', 'Mujer'=>'Mujer');

   $user   = Profile::where('user_id',$userAuth->id)->first();


   if($user == NULL){
    $user = User::find($userAuth->id);
    $profile = new Profile;
    $profile->nombre = $userAuth->name;
    $user->profile()->save($profile);

   }else{
    $profile = User::find($userAuth->id)->profile;
   }
//dd($profile);
    return view('profile.index',compact('profile','genero'));
  }


   /**
   * Display a listing of the resource.
   *
   * @return Response
   */

  public function update(Request $request, $id)
  {

    //dd($request);
    $validate = $this->validate($request,[
        'name'     => 'required|max:150',
        'password'   => 'max:10|confirmed',
        'password_confirmation' => 'max:10'

      ]);

    $profile  = Profile::findOrFail($id);
    $profile->name   = $request->name;
    $profile->last_name = $request->last_name;
    //$profile->genero   = $request->genero;

    //dd($profile);
    if ($request->hasFile('avatar')) {
        $file = $request->file('avatar');
        $file->move(public_path().'/img',time().".".$file->getClientOriginalExtension());
        $profile->avatar=time().".".$file->getClientOriginalExtension();
      }
    $profile->update();
    $password = $request->password;

    if (!$password == NULL) {
      $password = bcrypt($request->password);
      //$profile->userProfile()->password->save($password);
      $profile->users->password = $password;
      $profile->users->save();
      //dd($profile->userProfile->password->save($password));

    }

    $request->session()->flash('succes', 'Perfil actualizado');
     return redirect('/profile');

  }


}
?>
