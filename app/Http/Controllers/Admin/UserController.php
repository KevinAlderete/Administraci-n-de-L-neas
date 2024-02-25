<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{ 
    public function profile()
    {
        return view('admin.users.profile', array('user' => Auth::user()));
    }

    public function index(Request $request)
    {
        $users = User::search(request('search'))->paginate(5);
        return view('admin.users.index', compact('users'), array('user' => Auth::user()));
    }

    public function show(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.users.role', compact('user', 'roles', 'permissions'), array('userid' => Auth::user()));
    }

    public function assignRole(Request $request, User $user)
    {
        if($user->hasRole($request->role)){
            return back()->with('messageAlert', 'Rol existente.');
        }

        $user->assignRole($request->role);
        return back()->with('message', 'Role asignado.');
    }

    public function removeRole(User $user, Role $role)
    {
        if($user->hasRole($role)){
            $user->removeRole($role);
            return back()->with('messagedestroy', 'Rol Removido.');
        }

        return back()->with('messageAlert', 'Rol no existente.');

    }

    public function givePermission(Request $request, User $user)
    {
        if($user->hasPermissionTo($request->permission)){
            return back()->with('messageAlert', 'Permiso existente.');
        }
        $user->givePermissionTo($request->permission);
        return back()->with('message', 'Permiso agregado.');
    }

    public function revokePermission(User $user, Permission $permission)
    {
        if($user->hasPermissionTo($permission)){

            $user->revokePermissionTo($permission);
            return back()->with('messagedestroy', 'Permiso removido.');
        }
    }

    public function destroy(User $user)
    {
        if($user->hasRole('admin')){
            return back()->with('messageAlert', 'No puedes eliminar un usuario admin.');
        }
        $user->delete();
        return back()->with('messagedestroy', 'Usuario eliminado.');
    }

    public function create()
    {
        return view('admin.users.create', array('user' => Auth::user()));
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate(['name' => ['required'], 'email' => ['required'], 'password' => ['required']]);
            
        try{
            User::create($validated);
            return to_route('admin.users.index')->with('message', 'Usuario creado correctamente.');
        }catch(\Exception $e){
            return back()->with('messageAlert', 'Correo existente, pruebe otro.');
        }
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate(['name' => 'required', 'email' => 'required']);

        if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/'. $filename ) );

    		// $user = Auth::user();
    		$user->avatar = $filename;
    	}
        
        $password=$request->input('password');
        if($password) $validated['password'] = $password;
        $user->update($validated);
        
        
        return to_route('admin.users.profile')->with('message', 'Usuario actualisado correctamente.');
    }
}
