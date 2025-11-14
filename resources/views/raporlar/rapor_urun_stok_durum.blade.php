@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Stok Durum</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>


<div class="row">
    <form method="post" action="{{route('rapor_urun_stok_durum')}}">
        @csrf
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label>Depo</label>

                <select name="depo" id="depo" class="form-control" >
        
                    @php
                    foreach($depolar as $depo)
                    {
                        $s = $depo->id == $depo_id ? "selected" : "";
                        echo("<option value='$depo->id' $s >$depo->depo_ad</option>");
                    }
                    @endphp
                </select>

            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
            <label></label>
            <button type="submit" class="btn btn-primary">Sorgula</button>
            </div>
        </div>

    </form>
  </div>
  @php
@endphp
  <table id="basic" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Urun Ad</th>
            <th>Birim</th>
            <th>Barkod</th>
            <th>Kategori</th>
            <th>Resim</th>
            <th>Oluşturan Kullanıcı</th>
            <th>adet</th>
            <th>Oluşturulma Tarihi</th>
        </tr>
    </thead>
    <tbody>
  

    @foreach ($veriler as $urun)
    <tr>
        <td>{{ $urun->urun_adi }}</td>
        <td>{{ $urun->birim_ad }}</td>
        <td>{{ $urun->barkod }}</td>
        <td>{{ $urun->kategori_adi }}</td>
        <td>{{ $urun->resim }}</td>
        <td>{{ $urun->user }}</td>
        <td>{{ $urun->adet }}</td>
        <td>{{ $urun->created_at }}</td>
    </tr>
    @endforeach

    </tbody>
</table>

@endsection