<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        $questions = Question::query()->where('ilan_id', '=', 1)->get();

        // Question::create([
        //     'user_id' => Auth::id(),
        //     'ilan_id' => $request->ilan_id,
        //     'message' => $request->message,
        // ]);
        return view('ilanliste.ilan-detay', compact('questions'));
    }
    public function cevapla(Request $request)
    {
        $soru = Question::find($request->id);
        $soru->answer = $request->answer;
        $soru->save();
        return redirect()->back();
    }
}
