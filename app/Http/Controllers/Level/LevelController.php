<?php

namespace App\Http\Controllers\Level;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Level;
use Illuminate\Http\Request;
use Session;

class LevelController extends Controller
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
            $level = Level::where('level_number', 'LIKE', "%$keyword%")
				->orWhere('level_name', 'LIKE', "%$keyword%")
				->orWhere('level_short_name', 'LIKE', "%$keyword%")
				->orWhere('level_need_point', 'LIKE', "%$keyword%")
				->orWhere('level_image', 'LIKE', "%$keyword%")
				->orWhere('max_version', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $level = Level::paginate($perPage);
        }

        return view('level.level.index', compact('level'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('level.level.create');
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

        $requestData = $request->all();
        
        Level::create($requestData);

        Session::flash('flash_message', 'Level added!');

        return redirect('admin/level');
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
        $level = Level::findOrFail($id);

        return view('level.level.show', compact('level'));
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
        $level = Level::findOrFail($id);

        return view('level.level.edit', compact('level'));
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
        
        $requestData = $request->all();
        
        $level = Level::findOrFail($id);
        $level->update($requestData);

        Session::flash('flash_message', 'Level updated!');

        return redirect('admin/level');
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
        Level::destroy($id);

        Session::flash('flash_message', 'Level deleted!');

        return redirect('admin/level');
    }
}
