@extends('layouts.app')

@section('template_title')
    {{ $userProfile->name ?? 'Show User Profile' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show User Profile</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('user-profiles.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Full Name:</strong>
                            {{ $userProfile->full_name }}
                        </div>
                        <div class="form-group">
                            <strong>City:</strong>
                            {{ $userProfile->city }}
                        </div>
                        <div class="form-group">
                            <strong>Image:</strong>
                            <img width="150px" src="{{ url('/data_file/'.$userProfile->image) }}">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
