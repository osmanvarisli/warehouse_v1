<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\urunler;
use App\Models\birimler;
use App\Models\kategoriler;
use App\Models\depolar;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use App\Models\stok_giris;
use App\Models\stok_hareket;
use DB;

class GirilenStokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stoklar = DB::table('stok_giris')
        ->Join('depolar', 'depolar.id', '=', 'stok_giris.depo_id')
        ->select('stok_giris.*', 
        'depolar.depo_ad  as depo_ad')
        ->get();

       
        //dd(DB::getQueryLog()); 
        
        //dd($urunler);
        return view('girilen_stok.girilen_stok_list',["stoklar"=>$stoklar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $birimler = birimler::all();
        $kategoriler = kategoriler::all();
        $depolar = depolar::all();
        $urunler = urunler::all();
        return view('girilen_stok.yeni_girilen_stok',["birimler"=>$birimler,"kategoriler"=>$kategoriler,"depolar"=>$depolar,"urunler"=>$urunler]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $stok_giris = new stok_giris();
        $stok_giris->depo_id = $request->depo;
        $stok_giris->giris_tarihi = date('Y-m-d', strtotime($request->tarih));
        $stok_giris->aciklama = $request->aciklama;
        $stok_giris->user = Auth::user()->name;

        if($stok_giris->save()){
            $stok_id=$stok_giris->id;

            
            $adet_ler = $request->adet;
            $urun_id_ler = $request->id;
            
            foreach($adet_ler as $key => $n ) 
            {
                if (intval($urun_id_ler[$key])>0) {
                    $stok_hareket = new stok_hareket();
                    $stok_hareket->stok_id = $stok_id;
                    $stok_hareket->islem = 1;

                    $stok_hareket->urun_id = intval($urun_id_ler[$key]);
                    $stok_hareket->adet = intval($adet_ler[$key]);
                    $stok_hareket->user = Auth::user()->name;
                    $stok_hareket->save();
                }

           
            }	


            $msg="Kayıt Yapıldı ";
            return redirect()->route('girilen_stoklar_list')->with('mesaj',$msg);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stok_giris = stok_giris::where('id', $id)->first();
        $stok_hareket = stok_hareket::select("stok_hareket.*","birimler.birim","urunler.urun_adi")
        ->Join('urunler', 'stok_hareket.urun_id', '=', 'urunler.id')
        ->Join('birimler', 'urunler.birim', '=', 'birimler.id')
        ->where('stok_id', $id)
        ->where('stok_hareket.islem',1)->get();

        $birimler = birimler::all();
        $kategoriler = kategoriler::all();
        $depolar = depolar::all();
        $urunler = urunler::all();

        return view('girilen_stok.girilen_stok_duzenle',["stok_giris"=>$stok_giris,"stok_hareket"=>$stok_hareket,"birimler"=>$birimler,"kategoriler"=>$kategoriler,"depolar"=>$depolar,"urunler"=>$urunler]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $stok_giris = stok_giris::find($id);
        $stok_giris->depo_id = $request->depo;
        $stok_giris->giris_tarihi = date('Y-m-d', strtotime($request->tarih));
        $stok_giris->aciklama = $request->aciklama;
        $stok_giris->user = Auth::user()->name;

        if($stok_giris->save()){

            $stok_id=$stok_giris->id;

            $stok_hareket = stok_hareket::where('stok_id', $stok_id)->where('islem',1)->delete();

         
            $adet_ler = $request->adet;
            $urun_id_ler = $request->id;
            
            foreach($adet_ler as $key => $n ) 
            {
                if (intval($urun_id_ler[$key])>0) {
                    $stok_hareket = new stok_hareket();
                    $stok_hareket->stok_id = $stok_id;
                    $stok_hareket->islem = 1;

                    $stok_hareket->urun_id = intval($urun_id_ler[$key]);
                    $stok_hareket->adet = intval($adet_ler[$key]);
                    $stok_hareket->user = Auth::user()->name;
                    $stok_hareket->save();
                }

           
            }	


            $msg="Düzeltme Yapıldı ";
            return redirect()->route('girilen_stoklar_list')->with('duzelt',$msg);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $stok_giris = stok_giris::where('id', $id)->delete();
        $stok_hareket = stok_hareket::where('stok_id', $id)->where('islem',1)->delete();


        $msg="Stok / Stoklar Silindi ";
        return redirect()->route('girilen_stoklar_list')->with('delete',$msg);
    }

    public function sorgu(Request $request)
    {
        
        $query = $request->get('query');
        
        $filterResult = urunler::select(
                DB::raw("CONCAT(urun_adi,' -- ',urunler.barkod,' -- ',urunler.aciklama) AS name"),
                "urunler.id as id",
                "urun_adi as urun_adi",
                "birimler.birim as birim",
                "urunler.barkod as barkod"
                )
        ->Join('birimler', 'urunler.birim', '=', 'birimler.id')
        ->where('urun_adi', 'LIKE', '%'. $query. '%')
       
        -> orwhere('barkod', 'LIKE', '%'. $query. '%')
        -> orwhere('aciklama', 'LIKE', '%'. $query. '%')

        
        //$filterResult = user::where('name', 'LIKE', '%'. $query. '%')
        ->get();
        return response()->json($filterResult);

    }


}
