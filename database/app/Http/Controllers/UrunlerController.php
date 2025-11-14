<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\urunler;
use App\Models\birimler;
use App\Models\kategoriler;
use Illuminate\Support\Facades\Auth;

use DB;

class UrunlerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
/*
        $urunler = urunler::all();
        $birimler = birimler::all();
        $kategoriler = kategoriler::all();
        

       $urunler=urunler::join('birimler', 'urunler.birim', '=', 'birimler.id')
        ->Join('kategoriler', 'urunler.kategori_id', '=', 'kategoriler.id')

        ->get();
 */
        //DB::enableQueryLog();

        $urunler = DB::table('urunler')
        ->Join('birimler', 'urunler.birim', '=', 'birimler.id')
        ->Join('kategoriler', 'urunler.kategori_id', '=', 'kategoriler.id')
        ->select('urunler.*', 
        'birimler.birim  as birim_ad',
        'kategoriler.kategori_adi  as kategori_adi')
        ->get();

       
        //dd(DB::getQueryLog()); 
        
        //dd($urunler);
        return view('urunler.urunler_list',["urunler"=>$urunler]);

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
        return view('urunler.yeni_urun',["birimler"=>$birimler,"kategoriler"=>$kategoriler]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'urun_adi' => 'required|max:255',
            'resim' => 'mimes:jpeg,png,jpg,gif,svg|max:112048',
        ]);

        $urun = new urunler();
        $urun->urun_adi = $request->urun_adi;
        $urun->birim = $request->birim;
        $urun->barkod = $request->barkod;
        $urun->tedarikci_bilgileri = $request->tedarikci_bilgileri;
        $urun->aciklama = $request->aciklama;
        $urun->kategori_id = $request->kategori_id;

        
        if($request->hasfile('resim'))
        {
            $file = $request->file('resim');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/resimler/', $filename);

            $urun->resim = $filename;
        }
        
        

        $urun->user = Auth::user()->name;

        if($urun->save()){
            return redirect()->route('urunler_list')->with('insert','Yeni Ürün Eklendi!');    
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
        $urun = urunler::where('id', $id)->first();
        $birimler = birimler::all();
        $kategoriler = kategoriler::all();
        return view('urunler.urun_duzenle',["urun"=>$urun,"birimler"=>$birimler,"kategoriler"=>$kategoriler]);
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
        $urun = urunler::find($id);
        $urun->urun_adi = $request->urun_adi;
        $urun->birim = $request->birim;
        $urun->barkod = $request->barkod;
        $urun->tedarikci_bilgileri = $request->tedarikci_bilgileri;
        $urun->aciklama = $request->aciklama;
        $urun->kategori_id = $request->kategori_id;
        $urun->resim = $request->resim;
        $urun->save();


        return redirect()->route('urunler_list')->with('update','Güncelleme başarılı!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*
        Silme şartlarını yerine getirmesi gerekli önce onlar kontrol edilmeli
        
        */
        $urun=urunler::find($id);

        if($urun)
        {
            if($urun->delete()){
                $msg='Ürün Silindi.';
            }
            else{
                $msg="Yanlış giden bir şeyler oldu.";
            }   

        }
            else{
                $msg="Ürün Bulunamadı.";
        }

        return redirect()->route('urunler_list')->with('delete',$msg);
    }
}
