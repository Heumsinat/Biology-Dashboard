<?php

namespace App\Http\Controllers\Level;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Image;
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
        $this->validate($request,
        [
            'level_image' => 'image|mimes:jpeg,png,jpg,gif',
        ]);
        $photo = $request->file('level_image');
        if($photo != null ){
            $imagename = str_random(6).'_'.$photo->getClientOriginalName();
            $destinationPath = public_path('/level_img');
            // compressed image file size
            $thumb_img = Image::make($photo->getRealPath())->resize('auto', 'auto');
            $thumb_img->save($destinationPath.'/'.$imagename,80);
        }else $imagename ="";

      //  Level::create($requestData);
      Level::create([
              'level_number' => $request->level_number,
              'level_name' => $request->level_name,
              'level_short_name' => $request->level_short_name,
              'level_need_point' => $request->level_need_point,
              'level_image' => $imagename,
              'max_version' => $request->max_version
      ]);

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
        $this->validate($request,
        [
            'level_image' => 'image|mimes:jpeg,png,jpg,gif',
        ]);
        $level = Level::findOrFail($id);
        $photo = $request->file('level_image');
        $old_photo = $request->old_image;
        $destinationPath = public_path('/level_img');
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
        $level->update([
                'level_number' => $request->level_number,
                'level_name' => $request->level_name,
                'level_short_name' => $request->level_short_name,
                'level_need_point' => $request->level_need_point,
                'level_image' => $imagename,
                'max_version' => $request->max_version
        ]);
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
        $destinationPath = public_path('/level_img');
        $delete = Level::findOrFail($id);
        if($delete->level_image != ""){
          \File::delete($destinationPath.'/'.$delete->level_image);
        }
        $delete->delete();
        Session::flash('flash_message', 'Level deleted!');

        return redirect('admin/level');
    }
}
