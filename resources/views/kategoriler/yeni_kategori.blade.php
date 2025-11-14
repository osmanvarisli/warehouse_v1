@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Kategori Oluştur</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>


<form method="post" action="{{route('kategori_store')}}">
    @csrf
    <div class="form-group">
        <label>Kategori Adı Girin</label>
        <input class="form-control" name="kategori_adi">
    </div>

    <button type="submit" class="btn btn-primary">Kategori Oluştur</button>
</form>


@endsection