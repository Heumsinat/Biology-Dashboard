<?php

namespace App\Http\Controllers\Question;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;

class QuestionController extends Controller
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
            $question = Question::where('question_number', 'LIKE', "%$keyword%")
				->orWhere('question_topic', 'LIKE', "%$keyword%")
				->orWhere('question_difficulty', 'LIKE', "%$keyword%")
				->orWhere('number_of_answer', 'LIKE', "%$keyword%")
				->orWhere('correct_answer_number', 'LIKE', "%$keyword%")
				->orWhere('answer', 'LIKE', "%$keyword%")
				->orWhere('question_sound_path', 'LIKE', "%$keyword%")
				->orWhere('question_correct_answer_sound_path', 'LIKE', "%$keyword%")
				->orWhere('question_incorrect_answer_sound_path', 'LIKE', "%$keyword%")
				->orWhere('question_message_sound_path', 'LIKE', "%$keyword%")
				->orWhere('max_version', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $question = Question::paginate($perPage);
        }

        return view('question.question.index', compact('question'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('question.question.create');
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
//        //dd($request->file('question_sound_path'));
//        if ($request->hasFile('question_sound_path')) {
//            $audio_file = $request->file('question_sound_path');
//            $filename = $audio_file->getClientOriginalName();
//            $location = public_path() . '/question_sound';
//            $audio_file->move($location,$filename);
//        }


//        $this->validate($request,
//            [
//                'question_sound_path' => 'sound|mimes:mp3',
//                'question_correct_answer_sound_path' => 'sound|mimes:mp3',
//                'question_incorrect_answer_sound_path' => 'sound|mimes:mp3',
//                'question_message_sound_path' => 'sound|mimes:mp3',
//            ]);
        $sound1 = $request->file('question_sound_path');
        $sound2 = $request->file('question_correct_answer_sound_path');
        $sound3 = $request->file('question_incorrect_answer_sound_path');
        $sound4 = $request->file('question_message_sound_path');

        if($sound1 && $sound2 && $sound3 && $sound4 != null ){
            $soundname1 = $sound1->getClientOriginalName();
            $soundname2 = $sound2->getClientOriginalName();
            $soundname3 = $sound3->getClientOriginalName();
            $soundname4 = $sound4->getClientOriginalName();

            $location = public_path('/question_sound');

            $sound1->move($location,$soundname1);
            $sound2->move($location,$soundname2);
            $sound3->move($location,$soundname3);
            $sound4->move($location,$soundname4);

            // compressed image file size
//            $thumb_sound1 = Image::make($sound1->getRealPath())->resize('auto', 'auto');
//            $thumb_sound2 = Image::make($sound2->getRealPath())->resize('auto', 'auto');
//            $thumb_sound3 = Image::make($sound3->getRealPath())->resize('auto', 'auto');
//            $thumb_sound4 = Image::make($sound4->getRealPath())->resize('auto', 'auto');
//            $thumb_sound1->save($destinationPath.'/'.$soundname1,80);
//            $thumb_sound2->save($destinationPath.'/'.$soundname2,80);
//            $thumb_sound3->save($destinationPath.'/'.$soundname3,80);
//            $thumb_sound4->save($destinationPath.'/'.$soundname4,80);
        }else{
            $soundname1 ="";
            $soundname2 ="";
            $soundname3 ="";
            $soundname4 ="";
        }

        //  question::create($requestData);
        Question::create([
            'question_number' => $request->question_number,
            'question_topic' => $request->question_topic,
            'question_difficulty' => $request->question_difficulty,
            'number_of_answer' => $request->number_of_answer,
            'correct_answer_number' => $request->correct_answer_number,
            'answer' => $request->answer,
            'question_sound_path' => $soundname1,
            'question_correct_answer_sound_path' => $soundname2,
            'question_incorrect_answer_sound_path' => $soundname3,
            'question_message_sound_path' => $soundname4,
            'max_version' => $request->max_version
        ]);

        Session::flash('flash_message', 'Question added!');

        return redirect('admin/question');
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
        $question = Question::findOrFail($id);

        return view('question.question.show', compact('question'));
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
        $question = Question::findOrFail($id);

        return view('question.question.edit', compact('question'));
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

//        $this->validate($request,
//            [
//                'question_sound_path' => 'sound|mimes:mp3',
//                'question_correct_answer_sound_path' => 'sound|mimes:mp3',
//                'question_incorrect_answer_sound_path' => 'sound|mimes:mp3',
//                'question_message_sound_path' => 'sound|mimes:mp3',
//            ]);
        $question = Question::findOrFail($id);
        $sound1 = $request->file('question_sound_path');
        $sound2 = $request->file('question_correct_answer_sound_path');
        $sound3 = $request->file('question_incorrect_answer_sound_path');
        $sound4 = $request->file('question_message_sound_path');
        $old_sound1 = $request->old_audio1;
        $old_sound2 = $request->old_audio2;
        $old_sound3 = $request->old_audio3;
        $old_sound4 = $request->old_audio4;
        $location = public_path('/question_sound');
        if($sound1 && $sound2 && $sound3 && $sound4 == NULL){
            $soundname1 = $old_sound1;
            $soundname2 = $old_sound2;
            $soundname3 = $old_sound3;
            $soundname4 = $old_sound4;
            var_dump("old");
        }else {
            \File::delete($location.'/'.$old_sound1);
            \File::delete($location.'/'.$old_sound2);
            \File::delete($location.'/'.$old_sound3);
            \File::delete($location.'/'.$old_sound4);
            var_dump($old_sound1);
            var_dump($old_sound2);
            var_dump($old_sound3);
            var_dump($old_sound4);
            $soundname1 = $sound1->getClientOriginalName();
            $soundname2 = $sound2->getClientOriginalName();
            $soundname3 = $sound3->getClientOriginalName();
            $soundname4 = $sound4->getClientOriginalName();
            // compressed image file size
//            $thumb_sound1 = Image::make($sound1->getRealPath())->resize('auto', 'auto');
//            $thumb_sound2 = Image::make($sound2->getRealPath())->resize('auto', 'auto');
//            $thumb_sound3 = Image::make($sound3->getRealPath())->resize('auto', 'auto');
//            $thumb_sound4 = Image::make($sound4->getRealPath())->resize('auto', 'auto');
//            $thumb_sound1->save($destinationPath.'/'.$soundname1,80);
//            $thumb_sound2->save($destinationPath.'/'.$soundname2,80);
//            $thumb_sound3->save($destinationPath.'/'.$soundname3,80);
//            $thumb_sound4->save($destinationPath.'/'.$soundname4,80);
        }
        $question->update([
            'question_number' => $request->question_number,
            'question_topic' => $request->question_topic,
            'question_difficulty' => $request->question_difficulty,
            'number_of_answer' => $request->number_of_answer,
            'correct_answer_number' => $request->correct_answer_number,
            'answer' => $request->answer,
            'question_sound_path' => $soundname1,
            'question_correct_answer_sound_path' => $soundname2,
            'question_incorrect_answer_sound_path' => $soundname3,
            'question_message_sound_path' => $soundname4,
            'max_version' => $request->max_version
        ]);

        Session::flash('flash_message', 'Question updated!');

        return redirect('admin/question');
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
        $destinationPath = public_path('/question_sound');
        $delete = Question::findOrFail($id);
        if($delete->question_sound_path != ""){
            \File::delete($destinationPath.'/'.$delete->question_sound_path);
        }
        else if($delete->question_correct_answer_sound_path != ""){
            \File::delete($destinationPath.'/'.$delete->question_correct_answer_sound_path);
        }
        else if($delete->question_incorrect_answer_sound_path != ""){
            \File::delete($destinationPath.'/'.$delete->question_incorrect_answer_sound_path);
        }
        else if($delete->question_message_sound_path != ""){
            \File::delete($destinationPath.'/'.$delete->question_message_sound_path);
        }
        $delete->delete();

        Session::flash('flash_message', 'Question deleted!');

        return redirect('admin/question');
    }
}
