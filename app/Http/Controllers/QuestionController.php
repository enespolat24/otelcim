<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function index(Request $request)
    {

    }
    public function cevapla(Request $request)
    {
        $soru = Question::find($request->id);
        $soru->answer = $request->answer;
        $soru->save();
        return redirect()->back();
    }

    public function soruSor(Request $request)
    {
        Question::create([
            'user_id' => Auth::user()->id,
            'ilan_id' => $request->ilan_id,
            'message' => $request->soru,
        ]);
        return redirect()->back();
    }
}
