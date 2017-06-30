<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Admin;
use Illuminate\Http\Request;
use Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $admin = Admin::where('username', 'LIKE', "%$keyword%")
				->orWhere('email', 'LIKE', "%$keyword%")
				->orWhere('password', 'LIKE', "%$keyword%")
				->orWhere('role', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $admin = Admin::paginate($perPage);
        }

        return view('admin.admin.index', compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $data = [
            'username'=> $request->username,
            'email' => $request->email,
            'password' => md5($request->password),
            'role' => $request->role,
        ];
        Admin::create($data);

        Session::flash('flash_message', 'Admin added!');

        return redirect('admin/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $admin = Admin::findOrFail($id);

        return view('admin.admin.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);

        return view('admin.admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $admin = Admin::findOrFail($id);
        $data = [
            'username'=> $request->username,
            'email' => $request->email,
            'password' => md5($request->password), //hide password
            'role' => $request->role,
        ];
        $admin->update($data);

        Session::flash('flash_message', 'Admin updated!');

        return redirect('admin/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Admin::destroy($id);

        Session::flash('flash_message', 'Admin deleted!');

        return redirect('admin/admin');
    }
}
