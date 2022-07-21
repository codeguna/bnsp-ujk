@extends('layouts.app')

@section('template_title')
    User Profile
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('User Profile') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('user-profiles.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>User Id</th>
										<th>Full Name</th>
										<th>City</th>
										<th>Image</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($userProfiles as $userProfile)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $userProfile->user_id }}</td>
											<td>{{ $userProfile->full_name }}</td>
											<td>{{ $userProfile->city }}</td>
											<td><img width="150px" src="{{ url('/data_file/'.$userProfile->image) }}"></td>

                                            <td>
                                                <form action="{{ route('user-profiles.destroy',$userProfile->id) }}" method="GET">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('user-profiles.show',$userProfile->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('user-profiles.edit',$userProfile->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $userProfiles->links() !!}
            </div>
        </div>
    </div>
@endsection
