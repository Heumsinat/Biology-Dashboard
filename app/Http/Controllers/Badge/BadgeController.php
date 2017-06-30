<?php

namespace App\Http\Controllers\Badge;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Badge;
use Illuminate\Http\Request;
use Session;

class BadgeController extends Controller
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
            $badge = Badge::where('badge_number', 'LIKE', "%$keyword%")
				->orWhere('badge_level', 'LIKE', "%$keyword%")
				->orWhere('badge_short_name', 'LIKE', "%$keyword%")
				->orWhere('badge_long_name', 'LIKE', "%$keyword%")
				->orWhere('badge_level_name', 'LIKE', "%$keyword%")
				->orWhere('badge_level_type', 'LIKE', "%$keyword%")
				->orWhere('start_need_point', 'LIKE', "%$keyword%")
				->orWhere('max_need_point', 'LIKE', "%$keyword%")
				->orWhere('incorrect_answer_to_lose', 'LIKE', "%$keyword%")
				->orWhere('badge_image', 'LIKE', "%$keyword%")
				->orWhere('max_version', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $badge = Badge::paginate($perPage);
        }

        return view('badge.badge.index', compact('badge'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('badge.badge.create');
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
        
        Badge::create($requestData);

        Session::flash('flash_message', 'Badge added!');

        return redirect('admin/badge');
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
        $badge = Badge::findOrFail($id);

        return view('badge.badge.show', compact('badge'));
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
        $badge = Badge::findOrFail($id);

        return view('badge.badge.edit', compact('badge'));
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
        
        $badge = Badge::findOrFail($id);
        $badge->update($requestData);

        Session::flash('flash_message', 'Badge updated!');

        return redirect('admin/badge');
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
        Badge::destroy($id);

        Session::flash('flash_message', 'Badge deleted!');

        return redirect('admin/badge');
    }
}
