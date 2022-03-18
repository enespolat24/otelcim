<?php

namespace App\Http\Controllers;

use App\Models\Ilan;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ilan = Ilan::all();
        return view('ilanliste.list', compact('ilan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sehirFiltre(Request $request)
    {
            $search = $request->input('search');

            // Search in the title and body columns from the posts table
            $results = Ilan::query()
                ->where('sehir', 'LIKE', "%{$search}%")
                ->orWhere('baslik', 'LIKE', "%{$search}%")
                ->orWhere('ilce', 'LIKE', "%{$search}%")
                ->orWhere('adres', 'LIKE', "%{$search}%")
                ->orWhere('aciklama', 'LIKE', "%{$search}%")
                ->get();

            // Return the search view with the resluts compacted
            return view('ilanliste.list', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ilceFiltre($ilce)
    {
        $sonuc = Ilan::where('ilce', 'like', '%'.$ilce.'%')->get();

        if (!$sonuc->count()) {
          return "sonuç bulunamadı";
        }

        return $sonuc;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        Ilan::create([
            'baslik' => $request->baslik,
            'aciklama' => $request->aciklama,
            'fiyat' => $request->fiyat,
            'kira_sure_gun' => $request->kira_sure_gun,
            'sehir' => $request->sehir,
            'ilce' => $request->ilce,
            'adres' => $request->adres
        ]);

        auth()->user()->ilanlar()->save($product);
        return "ilan başarıyla eklendi";
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ilan  $ilan
     * @return \Illuminate\Http\Response
     */
    public function edit(Ilan $ilan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ilan  $ilan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ilan = Ilan::find($id);
        if (auth()->user()->id !== $ilan->user_id) {
            return response()->json(['message' => 'Action Forbidden']);
        }

        $ilan->baslik = $request->baslik;
        $ilan->aciklama = $request->aciklama;
        $ilan->fiyat = $request->fiyat;
        $ilan->sehir = $request->sehir;
        $ilan->ilce = $request->ilce;
        $ilan->adres = $request->adres;
        $ilan->adres = Auth::user()->id;
        $ilan->save();

        return  "ilan başarıyla güncellendi";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ilan  $ilan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ilan = Ilan::find($id);
        if (auth()->user()->id !== $ilan->user_id) {
            return "işlem engellendi";
        }
        $ilan->delete();
        return "ilan başarıyla silindi";
    }
}
