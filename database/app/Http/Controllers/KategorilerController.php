<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategoriler;
use Illuminate\Support\Facades\Auth;

class KategorilerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $kategoriler = kategoriler::all();
        return view('kategoriler.kategoriler_list',["kategoriler"=>$kategoriler]);

        #return view('kategoriler.kategoriler_list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategoriler.yeni_kategori');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kategoriler = new kategoriler();
        $kategoriler->kategori_adi = $request->kategori_adi;
        $kategoriler->ust_kategori_id = 0 ; //$request->ust_kategori_id;

        $kategoriler->user = Auth::user()->name;

        if($kategoriler->save()){
            $kategoriler = kategoriler::all();
            return view('kategoriler.kategoriler_list',["kategoriler"=>$kategoriler])->with('insert','Yeni Kategori Eklendi!');;    
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
        $kategori = kategoriler::where('id', $id)->first();
        return view('kategoriler.kategori_duzenle',["kategori"=>$kategori]);
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
        $kategori = kategoriler::find($id);
        $kategori->kategori_adi = $request->kategori_adi;
        $kategori->ust_kategori_id = 0 ; //$request->ust_kategori_id;
        $kategori->save();

        $kategoriler = kategoriler::all();
        return view('kategoriler.kategoriler_list',["kategoriler"=>$kategoriler])->with('update','Güncelleme başarılı!');
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
        $kategori=kategoriler::find($id);

        if($kategori)
        {
            if($kategori->delete()){
                $msg='Kategori Silindi.';
            }
            else{
                $msg="Yanlış giden bir şeyler oldu.";
            }   

        }
            else{
                $msg="Kategori Bulunamadı.";
        }

        $kategoriler = kategoriler::all();
        return view('kategoriler.kategoriler_list',["kategoriler"=>$kategoriler])->with('delete',$msg);; 
    }
}
