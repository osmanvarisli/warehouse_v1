@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <h1 class="page-header">Deniz Dental Depo Yönetim Sistemi</h1>
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel">
                            <img src="https://www.denizdental.com/images/dental_logo.png" alt="Deniz Dental"> 
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
