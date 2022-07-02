@extends('user.layoutUser')

@section('contentUser')
<div class="col">
    <div class="container main-container">
        <div class="content col">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Alertas</div>

                        <div class="card-body">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif

                            {{ __('You are logged in!') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection