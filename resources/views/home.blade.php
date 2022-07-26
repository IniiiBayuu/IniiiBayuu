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

                    {{ __('Kamu Telah Log-in!') }}
                    <br>
                    <div class="mb-3">
                <div class="d-grip gap-2"><br>
                    <a href="{{ route('siswa.index') }}" class="btn btn-primary">GO</a> 
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
