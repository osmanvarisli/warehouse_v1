@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Depo Oluştur</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>


<form method="post" action="{{route('depo_store')}}">
    @csrf
    <div class="form-group">
        <label>Depo Adı Girin</label>
        <input class="form-control" name="depo_ad">
    </div>

    <button type="submit" class="btn btn-primary">Depo Oluştur</button>
  </form>


@endsection