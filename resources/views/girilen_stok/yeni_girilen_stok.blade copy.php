@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Yeni Stok Gir</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>




<form method="post" action="{{route('girilen_stok_store')}}">
    @csrf

    <div class="row">
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label>Tarih</label>
                <input class="form-control datepicker" name="tarih" data-date-format="dd-mm-yyyy">
            </div>
        </div>
        <script type="text/javascript">
            $('.datepicker').datepicker(
                'setDate', 'now'
            );
            $(function () {
                $('#datepicker').datetimepicker({locale:'tr'});
                });
            /*

var orderDate = '2021-03-05';
$('#order_date').datepicker('update', new Date(Date.parse(orderDate)));

            */
        </script>

        <div class="col-12 col-md-6">
            <div class="form-group">
                <label>Depo</label>

                <select name="depo" id="depo" class="form-control" >
        
                    @php
                    foreach($depolar as $depo)
                    {
                        //$s = $role_id == $v ? "selected" : "";
                        echo("<option value='$depo->id'>$depo->depo_ad</option>");
                    }
                    @endphp
                </select>

            </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12 col-md-12">






   <style>
.typeahead{width:98%;}
    </style>
            
 

            <input type="text" id="search" name="search" placeholder="Ürün Ara" class="form-control" />


            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
            </script>
            <script type="text/javascript">
                var route = "{{ url('autocomplete-search') }}";
                $('#search').typeahead({

                    updater: function(selection){

                        //alert(selection.name);
                        var data = $("#tb tr:eq(1)").clone(true).appendTo("#tb");
                              data.removeClass('hidden');
                              data.find("input#id").val(selection.id);
                              data.find("td:first").html(selection.name);
                              data.find("td:eq(2)").html(selection.birim);

                    },

                    source: function (query, process) {
                        return $.get(route, {
                            query: query
                        }, function (data) {
                            //alert(data);
                            return process(data);
                        });
                    },

                });


            </script>




            <table  class="table table-hover small-text table-bordered table-striped" id="tb">
                <tr class="tr-header">
                <th>Ürün Adı</th>
                <th>Adet</th>
                <th>Birim</th>
                <th></th>
                
                <tr class="hidden">
                    <td>Ürün Adı</td>
                    <td>
                        <input type="text" name="adet[]" class="form-control"> 
                        <input type="hidden" name="id[]" id="id">  
                    </td>
                    <td>Birim</td>
                    <td><a href='javascript:void(0);'  class='remove'><span class='glyphicon glyphicon-remove'></span></a></td>
                </tr>
                </table>

                <script>
                    $("#tb").on("click", ".remove", function() {
                        $(this).closest("tr").remove();
                    }); 
                </script>
                




        </div>
        
        <div class="col-12 col-md-12">
            <div class="form-group">
                <label>Açıklama</label>
                <textarea class="form-control" name="aciklama"></textarea>
            </div>
        </div>

      </div>

    <button type="submit" class="btn btn-primary">Stok gir</button>
</form>


@endsection