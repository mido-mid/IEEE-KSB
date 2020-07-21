<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::orderBy('id', 'desc')->paginate(10);
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $rules = [
            'name' => 'required|min:3|max:50',
        ];

        $this->validate($request, $rules);

        if(Role::create($request->all())) {
            return redirect('/admin/roles')->withStatus('Role successfully created');
        }else {
            return redirect('/admin/roles')->withStatus('Something Wrong, Try again');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , Role $role)
    {
        //
        $rules = [
            'name' => 'required|min:3|max:50',
        ];

        $this->validate($request, $rules);

        if($request->has('name')) {
            $role->name = $request->name;
        }
        if($role->isDirty()) {
            $role->save();
            return redirect('/admin/roles')->withStatus('role successfully updated.');
        }else {
            return redirect('/admin/roles/'.$committee->id.'/edit')->withStatus('Nothing Changed.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //

        $role->delete();
        return redirect('/admin/roles')->withStatus('role successfully deleted.');
    }
}
