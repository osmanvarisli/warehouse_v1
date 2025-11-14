@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Ürün Oluştur</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>


<form method="post" action="{{route('urun_store')}}">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-md-6">
            <div class="form-group">
                <label>Ürün Adı Girin</label>
                <input class="form-control" name="urun_adi">
            </div>            
            
            @if ($errors->has('urun_adi'))
            <span class="text-danger">{{ $errors->first('urun_adi') }}</span>
            @endif

        </div>
        <div class="col-xs-12 col-md-6">    
            <div class="form-group">
                <label>Birim </label>
                <select name="birim" id="birim" class="form-control" >
                
                @php
                foreach($birimler as $birim)
                {
                    //$s = $role_id == $v ? "selected" : "";
                    echo("<option value='$birim->id'>$birim->birim</option>");
                }
                @endphp
                </select>

            </div>

        </div>
        <div class="col-xs-12 col-md-6">    
            <div class="form-group">
                <label>Barkod </label>
                <input class="form-control" name="barkod">
            </div>

            @if ($errors->has('barkod'))
            <span class="text-danger">{{ $errors->first('barkod') }}</span>
            @endif

        </div>
        <div class="col-xs-12 col-md-6">
            <div class="form-group">
                <label>Tedarikci Bilgileri</label>
                <input class="form-control" name="tedarikci_bilgileri">
            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <div class="form-group">
                <label>Açıklama</label>
                <input class="form-control" name="aciklama">
            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <div class="form-group">
                <label>Kategori </label>

                <select name="kategori_id" id="kategori_id" class="form-control" >
                
                    @php
                    foreach($kategoriler as $kategori)
                    {
                        //$s = $role_id == $v ? "selected" : "";
                        echo("<option value='$kategori->id'>$kategori->kategori_adi</option>");
                    }
                    @endphp
                    </select>

            </div>
        </div>
    <!--
        <div class="col-xs-12 col-md-6">
            <div class="form-group">
                <label>Resim</label>
                <input type="file" class="form-control" name="resim" />

                @if ($errors->has('resim'))
                <span class="text-danger">{{ $errors->first('resim') }}</span>
                @endif
                
            </div>
        </div>
    -->
    </div>

    <button type="submit" class="btn btn-primary">Ürün Oluştur</button>
</form>

@endsection