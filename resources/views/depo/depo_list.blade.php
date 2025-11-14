@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Depo Listesi</h1>
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
            <th>Depo Ad</th>
            <th>Oluşturan Kullanıcı</th>
            <th>Oluşturulma Tarihi</th>
            <th>Sil</th>
            <th>Düzenle</th>
        </tr>
    </thead>
    <tbody>


    @foreach ($depolar as $depo)
    <tr>
        <td>{{ $depo->depo_ad }}</td>
        <td>{{ $depo->user }}</td>
        <td>{{ $depo->created_at->format('d/m/Y') }}</td>
        <td>
            <form method="post" action="{{route('depo_delete', ['id' => $depo->id]) }}">
            @csrf
            <button type="submit" class="btn btn-danger" onclick="return confirm('Silmek istediğinizden emin misiniz?')"><i class="fa fa-trash-o"></i></button>  
            </form>    
        </td>
        
        <td><a  href="{{ route('depo_duzenle', ['id' => $depo->id]) }}" class="btn btn-default">Düzenle</a></td>
    </tr>
    @endforeach

    </tbody>
</table>
</div>

<script src="{{ asset('js/jstable.min.js') }} "></script>
<script>
new JSTable("#basic");
</script>


@endsection