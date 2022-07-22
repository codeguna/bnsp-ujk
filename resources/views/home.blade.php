@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <form action="{{ route('posts.store') }}" method="POST">
                            @csrf
                            <div class="col-md-12">
                            <div class="mb-3">
                                <label>Create Post</label>
                              <textarea name="content" class="form-control" cols="30" rows="4"></textarea>
                            </div>
                            <button class="btn btn-primary">Post</button>
                        </div>
                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
