@extends('layouts.default')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="text-left">
                <h2>Password details</h2>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="text-right">
                <a class="btn btn-primary" href="{{ route('mypasswords.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-block">
        
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <h2 class="card-title">{{ $password->page }}</h2>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Login:</strong>
                    {{ $password->login }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password:</strong>
                    {{ $password->password }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    {{ $password->description }}
                </div>
            </div>
        </div>
    </div>

@endsection