<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\birimler;
use Illuminate\Support\Facades\Auth;

class BirimlerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $birimler = birimler::all();
        return view('birimler.birim_list',["birimler"=>$birimler]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('birimler.yeni_birim');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $birimler = new birimler();
        $birimler->birim = $request->birim;
        $birimler->user = Auth::user()->name;
        if($birimler->save()){
            $birimler = birimler::all();
            return view('birimler.birim_list',["birimler"=>$birimler])->with('insert','Yeni Birim Eklendi!');
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
        $birim = birimler::where('id', $id)->first();
        return view('birimler.birim_duzenle',["birim"=>$birim]);
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
        $birim = birimler::find($id);
        $birim->birim = $request->birim;
        $birim->save();

        $birimler = birimler::all();
        return view('birimler.birim_list',["birimler"=>$birimler])->with('update','Güncelleme başarılı!');;   
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
        $birim=birimler::find($id);

        if($birim)
        {
            if($birim->delete()){
                $msg='Birim Silindi.';
            }
            else{
                $msg="Yanlış giden bir şeyler oldu.";
            }   

        }
            else{
                $msg="Birim Bulunamadı.";
        }

        $birimler = birimler::all();
        return view('birimler.birim_list',["birimler"=>$birimler])->with('delete',$msg);
    }
}
