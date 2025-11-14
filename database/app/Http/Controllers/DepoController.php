<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\depolar;
use Illuminate\Support\Facades\Auth;

class DepoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depolar = depolar::all();
        return view('depo.depo_list',["depolar"=>$depolar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('depo.yeni_depo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $depolar = new depolar();
        $depolar->depo_ad = $request->depo_ad;
        $depolar->user = Auth::user()->name;
        if($depolar->save()){
            $depolar = depolar::all();
            return view('depo.depo_list',["depolar"=>$depolar])->with('insert','Yeni Depo Eklendi!');;    
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
        $depo = depolar::where('id', $id)->first();
        return view('depo.depo_duzenle',["depo"=>$depo]);
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
        $depo = depolar::find($id);
        $depo->depo_ad = $request->depo_ad;
        $depo->save();

        $depolar = depolar::all();
        return view('depo.depo_list',["depolar"=>$depolar])->with('update','Güncelleme başarılı!');;    
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
        $depo=depolar::find($id);

        if($depo)
        {
            if($depo->delete()){
                $msg='Depo Silindi.';
            }
            else{
                $msg="Yanlış giden bir şeyler oldu.";
            }   

        }
            else{
                $msg="Depo Bulunamadı.";
        }

        $depolar = depolar::all();
        return view('depo.depo_list',["depolar"=>$depolar])->with('delete',$msg);
    }
}
