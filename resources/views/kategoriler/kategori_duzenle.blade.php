@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Kategori Düzenle</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>


<form method="post" action="{{route('kategori_update', ['id' => $kategori->id]) }}">
    @csrf
    <div class="form-group">
        <label>Kategori Adı Girin</label>
        <input class="form-control" name="kategori_adi" value="{{ $kategori->kategori_adi }}">
        <input type="hidden" class="form-control" name="kategori_id" value="{{ $kategori->id }}">
    </div>

    <button type="submit" class="btn btn-primary">Kategori Güncelle</button>
  </form>


@endsection