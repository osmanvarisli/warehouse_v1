@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Depo Düzenle</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>


<form method="post" action="{{route('urun_update', ['id' => $urun->id]) }}">
    @csrf


    <div class="row">
        <div class="col-xs-12 col-md-6">
            <div class="form-group">
                <label>Ürün Adı Girin</label>
                <input class="form-control" name="urun_adi" value="{{ $urun->urun_adi }}">
                <input type="hidden" class="form-control" name="urun_id" value="{{ $urun->id }}">
            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <div class="form-group">
                <label>Birim </label>
                <select name="birim" id="birim" class="form-control" >
                
                @php
                foreach($birimler as $birim)
                {
                    $s = $urun->birim == $birim->id ? "selected" : "";
                    echo("<option value='$birim->id'  $s>$birim->birim</option>");
                }
                @endphp
                </select>

            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <div class="form-group">
                <label>Barkod </label>
                <input class="form-control" name="barkod" value="{{ $urun->barkod }}">
            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <div class="form-group">
                <label>Tedarikci Bilgileri</label>
                <input class="form-control" name="tedarikci_bilgileri" value="{{ $urun->tedarikci_bilgileri }}">
            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <div class="form-group">
                <label>Açıklama</label>
                <input class="form-control" name="aciklama" value="{{ $urun->aciklama }}">
            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <div class="form-group">
                <label>Kategori Ad </label>
                <select name="kategori_id" id="kategori_id" class="form-control" >
                
                    @php
                    foreach($kategoriler as $kategori)
                    {
                        $s = $urun->kategori_id == $kategori->id ? "selected" : "";
                        echo("<option value='$kategori->id' $s>$kategori->kategori_adi</option>");
                    }
                    @endphp
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <div class="form-group">
                <label>Resim</label>
                <input class="form-control" name="resim" value="{{ $urun->resim }}">
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Ürün Güncelle</button>
</form>


@endsection