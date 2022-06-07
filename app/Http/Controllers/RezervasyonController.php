<?php

namespace App\Http\Controllers;

use App\Models\Rezervasyon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RezervasyonController extends Controller
{
    public function index(Request $request)
    {
        $rezervasyon = Rezervasyon::query()->where('user_id', '=', Auth::user()->id)->get();

        return view('rezervasyon-page', compact('rezervasyon'));
    }

    public function rezervasyonYap(Request $request)
    {
        $rezervasyon = new Rezervasyon();
        $rezervasyon->ilan_id = $request->ilan_id;
        $rezervasyon->user_id = $request->user_id;
        $rezervasyon->baslangic_tarihi = $request->baslangic;
        $rezervasyon->fiyat = $request->fiyat;
        $rezervasyon->bitis_tarihi = $request->bitis;
        $rezervasyon->kisi_sayisi = $request->kisi_sayi;
        $rezervasyon->save();
        return redirect()->back();
    }
    public function rezervasyonIptal($id)
    {
$rezervasyon = Rezervasyon::find($id);

        if (Auth::user()->id == $rezervasyon->user_id) {
            $rezervasyon->delete();
            return redirect()->back();
        }
        else {
            abort(403);
        }
    }

}
