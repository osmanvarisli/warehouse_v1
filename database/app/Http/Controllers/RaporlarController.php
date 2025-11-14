<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\urunler;
use App\Models\birimler;
use App\Models\kategoriler;
use App\Models\depolar;
use Illuminate\Support\Facades\Auth;

use App\Models\stok_giris;
use App\Models\stok_cikis;
use App\Models\stok_hareket;

use DB;


class RaporlarController extends Controller
{

    public function urun_stok_durum(Request $request)
    {
        if (!is_null($request->depo)){

            DB::enableQueryLog();

            $veriler = urunler::Join('stok_hareket', 'stok_hareket.urun_id', '=', 'urunler.id')

            ->Join('birimler', 'urunler.birim', '=', 'birimler.id')
            ->Join('kategoriler', 'urunler.kategori_id', '=', 'kategoriler.id')

            ->LeftJoin('stok_giris', 'stok_giris.id', '=', 'stok_hareket.stok_id')
            ->leftJoin('stok_cikis', 'stok_cikis.id', '=', 'stok_hareket.stok_id')

            ->select('urunler.urun_adi','urunler.birim','urunler.barkod','urunler.id','urunler.kategori_id',
            'birimler.birim as birim_ad','kategoriler.kategori_adi','urunler.resim','urunler.user','urunler.created_at')

            ->selectRaw("SUM(stok_hareket.islem*stok_hareket.adet) as adet")
            ->groupBy('urunler.urun_adi','urunler.birim','urunler.barkod','urunler.id','urunler.kategori_id',
            'birimler.birim','kategoriler.kategori_adi','urunler.resim','urunler.user','urunler.created_at')
            ->where('stok_giris.depo_id',$request->depo)
            ->orwhere('stok_cikis.depo_id',$request->depo)
            ->get();

            //dd(DB::getQueryLog());

        }
        else{

            $veriler = (array)null;
        }

        $kategoriler = kategoriler::all();
        $depolar = depolar::all();
        $depo_id=$request->depo;
        return view('raporlar.rapor_urun_stok_durum',["veriler"=>$veriler,"depolar"=>$depolar,"depo_id"=>$depo_id]);
    }


    public function urun_takip()
    {
        //
    }

    public function sorgu(Request $request)
    {
        
        $query = $request->get('query');
        
        $filterResult = urunler::select("urunler.id","urun_adi as name","birimler.birim")
        ->Join('birimler', 'urunler.birim', '=', 'birimler.id')
        ->where('urun_adi', 'LIKE', '%'. $query. '%')
       
        -> orwhere('barkod', 'LIKE', '%'. $query. '%')
        -> orwhere('aciklama', 'LIKE', '%'. $query. '%')
        
        //$filterResult = user::where('name', 'LIKE', '%'. $query. '%')
        ->get();
        return response()->json($filterResult);

    }

    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
