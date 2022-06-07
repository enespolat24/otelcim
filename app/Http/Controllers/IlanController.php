<?php

namespace App\Http\Controllers;

use App\Models\Ilan;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

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
    public function store(Request $request)
    {
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

        return redirect()->back();
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

    public function ilanDetay($id)
    {
        $yetkili = Ilan::find($id);

        $questions = Question::query()->where('ilan_id', '=', $id)->orderby('created_at', 'desc')->get();

        $ilan = Ilan::find($id);
        $firstPhoto = $ilan->getMedia("default",["order" => 0])->first()->getUrl();
        $secondPhoto = $ilan->getMedia("default",["order" => 1])->first()->getUrl();
        $thirdPhoto = $ilan->getMedia("default",["order" => 2])->first()->getUrl();
        return view('ilanliste.ilan-detay', compact('ilan', 'questions', 'yetkili', 'firstPhoto','secondPhoto','thirdPhoto'));
    }
    public function fiyatGuncelle(Request $request,$id){
        $ilan = Ilan::find($id);
        $ilan->fiyat = $request->fiyat;
        $ilan->save();
        return redirect()->back();
    }
    public function ilanBaslikAciklama(Request $request, $id){
        $ilan = Ilan::find($id);
        $ilan->baslik = $request->baslik;
        $ilan->sehir = $request->sehir;
        $ilan->ilce = $request->ilce;
        $ilan->adres = $request->adres;
        $ilan->aciklama = $request->aciklama;
        $ilan->save();
        return redirect()->back();
    }

    public function ilanlarim()
    {
        $ilanlar = Ilan::where('user_id', '=', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        return view('ilanlarim', compact('ilanlar'));
    }
    public function ilanEkleSayfa(Request $request){
        $userId = Auth::user()->id;
        $user = User::find($userId);
        if(! $user->is_hotel_manager){
            abort(403);
        }
        return view('ilan-ekle');
    }
    public function ilanEkle(Request $request)
    {
        $userId = Auth::user()->id;
        $user = User::find($userId);
        if(! $user->is_hotel_manager){
            abort(403);
        }

        $ilan = new Ilan();
        $ilan->baslik = $request->title;
        $ilan->aciklama = $request->aciklama;
        $ilan->fiyat = $request->fiyat;
        $ilan->sehir = $request->sehir;
        $ilan->ilce = $request->ilce;
        $ilan->adres = $request->adres;
        $ilan->user_id = $userId;

        $ilan->photos[0] = $request->file('first-img');
        $ilan->photos[1] = $request->file('second-img');
        $ilan->photos[2] = $request->file('third-img');

        $ilan->addMediaFromRequest('first-img')->withCustomProperties(['order' => 0])->toMediaCollection();
        $ilan->addMediaFromRequest('second-img')->withCustomProperties(['order' => 1])->toMediaCollection();
        $ilan->addMediaFromRequest('third-img')->withCustomProperties(['order' => 2])->toMediaCollection();


        $ilan->save();

        return redirect()->back();
    }
    public function ilanEdit(Request $request, $id)
    {
        $questions = Question::query()->where('ilan_id', '=', $id)->get();
        $ilan = Ilan::find($id);
        $firstPhoto = $ilan->getMedia("default",["order" => 0])->first()->getUrl();
        $secondPhoto = $ilan->getMedia("default",["order" => 1])->first()->getUrl();
        $thirdPhoto = $ilan->getMedia("default",["order" => 2])->first()->getUrl();

        $ilan = Ilan::find($id);
        if($ilan->user_id == Auth::user()->id){
            return view('ilan-edit', compact('ilan','questions','firstPhoto','secondPhoto','thirdPhoto'));
        }
        else{
            abort(403);
        }
    }
    public function ilanFotografGuncelle(Request $request){

        $ilan = Ilan::find($request->id);
        $ilanmedia = $ilan->getMedia();

        if ($request->file('firstPhoto')) {
            $ilan->getMedia("default",["order" => 0])->first()->delete();
            $ilan->addMediaFromRequest('firstPhoto')->withCustomProperties(['order' => 0])->toMediaCollection();
        }
        if($request->file('secondPhoto')){
            $ilan->getMedia("default",["order" => 1])->first()->delete();
            $ilan->addMediaFromRequest('secondPhoto')->withCustomProperties(['order' => 1])->toMediaCollection();
        }
        if ($request->file('thirdPhoto')) {
            $ilan->getMedia("default",["order" => 2])->first()->delete();
            $ilan->addMediaFromRequest('thirdPhoto')->withCustomProperties(['order' => 2])->toMediaCollection();
        }
        $ilan->save();

        return redirect()->back();
    }
}
