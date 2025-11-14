@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Ürünler Listesi</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>


@if(Session::has('message'))
<div class="bg-green-100 border-t-4 border-green-500 px-4 py-3">
    <p class="text-sm">{{ Session::get('message') }}</p>
</div>
@endif

<table id="basic" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Urun Ad</th>
            <th>Birim</th>
            <th>Barkod</th>
            <th>Kategori</th>
            <th>Resim</th>
            <th>Oluşturan Kullanıcı</th>
            <th>Oluşturulma Tarihi</th>
            <th>Sil</th>
            <th>Düzenle</th>
        </tr>
    </thead>
    <tbody>
  

    @foreach ($urunler as $urun)
    <tr>
        <td>{{ $urun->urun_adi }}</td>
        <td>{{ $urun->birim_ad }}</td>
        <td>{{ $urun->barkod }}</td>
        <td>{{ $urun->kategori_adi }}</td>
        <td>{{ $urun->resim }}</td>
        <td>{{ $urun->user }}</td>
        <td>{{ $urun->created_at }}</td>
        <td>
            <form method="post" action="{{route('urun_delete', ['id' => $urun->id]) }}">
            @csrf
            <button type="submit" class="btn btn-danger" onclick="return confirm('Silmek istediğinizden emin misiniz?')"><i class="fa fa-trash-o"></i></button>  
            </form>    
        </td>
        
        <td><a  href="{{ route('urun_duzenle', ['id' => $urun->id]) }}" class="btn btn-default">Düzenle</a></td>
    </tr>
    @endforeach

    </tbody>
</table>


<script src="js/jstable.min.js"></script>
<script>
new JSTable("#basic");
</script>

@endsection