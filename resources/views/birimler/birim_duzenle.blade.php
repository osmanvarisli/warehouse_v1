@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Birim Düzenle</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>


<form method="post" action="{{route('birim_update', ['id' => $birim->id]) }}">
    @csrf
    <div class="form-group">
        <label>Birim Adı Girin</label>
        <input class="form-control" name="birim" value="{{ $birim->birim }}">
        <input type="hidden" class="form-control" name="id" value="{{ $birim->id }}">
    </div>

    <button type="submit" class="btn btn-primary">Birim Güncelle</button>
</form>


@endsection