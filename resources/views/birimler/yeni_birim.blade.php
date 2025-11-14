@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Birim Oluştur</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>


<form method="post" action="{{route('birim_store')}}">
    @csrf
    <div class="form-group">
        <label>Birim Adı Girin</label>
        <input class="form-control" name="birim">
    </div>

    <button type="submit" class="btn btn-primary">Birim Oluştur</button>
  </form>


@endsection