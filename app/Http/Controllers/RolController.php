<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
     $roles = Role::Paginate(5);
     return view('admin.roles.index',compact('roles'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $roles = Role::Paginate(2);
    $permisos = Permission::all();
    return view('admin.roles.create',compact('permisos', 'roles'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {

      $validate = $this->validate($request,[
        'name'=>'required|max:30',
      ]);

      $role = Role::create($request->all());
      $role->permissions()->sync($request->permissions);
      $request->session()->flash('succes', 'Rol creado correctamente');

       return redirect('admin/roles');



  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    $role  = Role::findOrFail($id);
   // dd($id);
    //$roles = Role::all();
    $permisos = Permission::all();
    return view('admin.roles.show',compact('permisos', 'role'));


  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit(Role $role)
  {

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, Role $role)
  {

    $validate = $this->validate($request,[
      'name'=>'required|max:30'
    ]);
    //dd($role);
    $role->update($request->all());
    $request->session()->flash('succes',  'Rol actualizado correctamente');
    return redirect('admin/roles');

    dd($role);
    if ($request->roles) {
      $user->roles()->sync($request->roles);
      $request->session()->flash('succes', 'Rol asignado correctamente');
     } else {
      $request->session()->flash('error',  'Rol no asignado');
     }
     return redirect('admin/users');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */

  public function destroy(Request $request,$id)
  {

      $rol = Role::findOrFail($id);
      $rol->delete();
      $request->session()->flash('succes', 'Rol eliminado correctamente');
      return redirect('admin/roles');

  }
}

?>
