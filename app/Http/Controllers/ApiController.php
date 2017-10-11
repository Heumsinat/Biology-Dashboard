<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Level;
use App\Test;
use Auth;

class ApiController extends Controller
{
    public function question() {
        $questions = Question::all();
        return $questions->toJson();
    }
    public  function level() {
        $level = Level::all();
        return $level->toJson();
    }
    public  function test(Request $request){
        $this->validate($request,
            [
                'name' => 'required',
                'email' => 'required'
            ]);
        Test::create($request->all());
        return response('Test created successful!!!!', 200)
            ->header('Content-Type', 'text/plain');
    }
    public  function updatetest(Request $request, $id){
        $this->validate($request,
            [
                'name' => 'required',
                'email' => 'required'
            ]);
        $test = Test::findOrFail($id);
        $test->update($request->all());
        return response('Test updated successful!!!!', 200)
            ->header('Content-Type', 'text/plain');
    }
    public function deletetest($id){
        $delete = Test::findOrFail($id);
        $delete->delete();
        return response('Test deleted successful!!!!', 200)
            ->header('Content-Type', 'text/plain');
    }
    public function  login(Request $request){
        if (Auth::attempt(array('email' => $request->email, 'password' => $request->password)) && Auth::user()->admin == 0){
            return response('true');
        }
        else {
            return response('false');
        }
    }
}
