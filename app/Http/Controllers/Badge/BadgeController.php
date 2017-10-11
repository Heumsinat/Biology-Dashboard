<?php

namespace App\Http\Controllers\Badge;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Image;
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

        $this->validate($request,
            [
                'badge_image' => 'image|mimes:jpeg,png,jpg,gif',
            ]);
        $photo = $request->file('badge_image');
        if($photo != null ){
            $imagename = str_random(6).'_'.$photo->getClientOriginalName();
            $destinationPath = public_path('/badge_img');
            // compressed image file size
            $thumb_img = Image::make($photo->getRealPath())->resize('auto', 'auto');
            $thumb_img->save($destinationPath.'/'.$imagename,80);
        }else $imagename ="";

        //  Badge::create($requestData);
        Badge::create([
            'badge_number' => $request->badge_number,
            'badge_level' => $request->badge_level,
            'badge_short_name' => $request->badge_short_name,
            'badge_long_name' => $request->badge_long_name,
            'badge_level_name' => $request->badge_level_name,
            'badge_level_type' => $request->badge_level_type,
            'start_need_point' => $request->start_need_point,
            'max_need_point' => $request->max_need_point,
            'incorrect_answer_to_lose' => $request->incorrect_answer_to_lose,
            'badge_image' => $imagename,
            'max_version' => $request->max_version
        ]);

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

        $this->validate($request,
            [
                'badge_image' => 'image|mimes:jpeg,png,jpg,gif',
            ]);
        $badge = Badge::findOrFail($id);
        $photo = $request->file('badge_image');
        $old_photo = $request->old_image;
        $destinationPath = public_path('/badge_img');
        if($photo == NULL){
            $imagename = $old_photo;
            var_dump("old");
        }else {
            \File::delete($destinationPath.'/'.$old_photo);
            var_dump($old_photo);
            $imagename = str_random(6).'_'.$photo->getClientOriginalName();

            // compressed image file size
            $thumb_img = Image::make($photo->getRealPath())->resize('auto', 'auto');
            $thumb_img->save($destinationPath.'/'.$imagename,80);
        }
        $badge->update([
            'badge_number' => $request->badge_number,
            'badge_level' => $request->badge_level,
            'badge_short_name' => $request->badge_short_name,
            'badge_long_name' => $request->badge_long_name,
            'badge_level_name' => $request->badge_level_name,
            'badge_level_type' => $request->badge_level_type,
            'start_need_point' => $request->start_need_point,
            'max_need_point' => $request->max_need_point,
            'incorrect_answer_to_lose' => $request->incorrect_answer_to_lose,
            'badge_image' => $imagename,
            'max_version' => $request->max_version
        ]);

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
        $destinationPath = public_path('/badge_img');
        $delete = Badge::findOrFail($id);
        if($delete->badge_image != ""){
            \File::delete($destinationPath.'/'.$delete->badge_image);
        }
        $delete->delete();

        Session::flash('flash_message', 'Badge deleted!');

        return redirect('admin/badge');
    }
}
