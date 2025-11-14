@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Depo Düzenle</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>


<form method="post" action="{{route('depo_update', ['id' => $depo->id]) }}">
    @csrf
    <div class="form-group">
        <label>Depo Adı Girin</label>
        <input class="form-control" name="depo_ad" value="{{ $depo->depo_ad }}">
        <input type="hidden" class="form-control" name="depo_id" value="{{ $depo->id }}">
    </div>

    <button type="submit" class="btn btn-primary">Depo Güncelle</button>
</form>


@endsection