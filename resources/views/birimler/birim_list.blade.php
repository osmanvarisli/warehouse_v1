@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Birim Listesi</h1>
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
            <th>Birim Ad</th>
            <th>Oluşturan Kullanıcı</th>
            <th>Oluşturulma Tarihi</th>
            <th>Sil</th>
            <th>Düzenle</th>
        </tr>
    </thead>
    <tbody>


    @foreach ($birimler as $birim)
    <tr>
        <td>{{ $birim->birim }}</td>
        <td>{{ $birim->user }}</td>
        <td>{{ $birim->created_at->format('d/m/Y') }}</td>
        <td>
            <form method="post" action="{{route('birim_delete', ['id' => $birim->id]) }}">
            @csrf
            <button type="submit" class="btn btn-danger" onclick="return confirm('Silmek istediğinizden emin misiniz?')"><i class="fa fa-trash-o"></i></button>  
            </form>    
        </td>
        
        <td><a  href="{{ route('birim_duzenle', ['id' => $birim->id]) }}" class="btn btn-default">Düzenle</a></td>
    </tr>
    @endforeach

    </tbody>
</table>
</div>

<script src="js/jstable.min.js"></script>
<script>
new JSTable("#basic");
</script>


@endsection