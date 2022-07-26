@extends('layouts.dashboard')

@section('content')
    @foreach ($posts as $p)
        <div class="posty">
            <div class="post-bar">
                <div class="post_topbar">
                    <div class="usy-dt">
                        @php($id_image = Auth::user()->user_profile->image)
                        <img width="50px" src="{{ url('/data_file/' . $id_image) }}" alt="">
                        <div class="usy-name">
                            <h3>{{ $p->user->name }}</h3>
                            <span><img src="{{ asset('v2/images/clock.png') }}" alt="">{{ $p->created_at }}</span>
                        </div>
                    </div>
                    <div class="ed-opts">
                        <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                        <ul class="ed-options">
                            <li><a class="btn btn-sm btn-success" href="{{ route('posts.edit',$p->id) }}">Edit</a></li>
                            @if (Auth::user()->user_profile->id == $p->user_id)
                               <li>
                                <form action="{{ route('posts.destroy',$p->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                                </li>
                            @endif

                        </ul>
                    </div>
                </div>
                <div class="job_descp">
                    <p>{{ $p->content }}</p>
                    <p><img width="200px" src="{{ url('/data_image/' . $p->image) }}"></p>
                    <ul class="skill-tags" style="margin-top:10px">
                        <li><a class="badge bg-warning" href="{{ url('/data_file/' . $p->file) }}" target="_blank"
                                style="text-decoration: none;">Attachment file</a></li>
                        <li>
                            @foreach ( $p->tags as $t)
                                <a href="#" title="">{{ $t->name }}</a></li>
                            @endforeach
                    </ul>
                </div>
            </div>
            <!--post-bar end-->
            <div style="margin: 50px"></div>
            <div class="comment-section">
                <div class="comment-sec">
                    <ul>
                        @forelse ($p->comments as $c)
                            <li>
                                <div class="comment-list">
                                    <div class="bg-img">
                                        <img height="30px" src="{{ url('/data_file/' . $id_image) }}" alt="">
                                    </div>
                                    <div class="comment">
                                        <h3>{{ $c->user->name }}</h3>
                                        <span><img src="{{ asset('v2/images/clock.png') }}" alt=""> {{ $c->created_at }}</span>
                                        <p>{{ $c->content }}</p>

                                        @if(Auth::user()->id === $c->user_id)
                                        <p><form action="{{ route('comments.destroy',$c->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-sm btn-success" href="{{ route('comments.edit',$c->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                        </form>
                                        </p>
                                        @else
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <!--comment-list end-->
                            </li>

                        @empty
                            <p>No comment entries ...</p>
                        @endforelse


                    </ul>
                </div>
                <!--comment-sec end-->
                <div class="post-comment">
                    <div class="cm_img">
                        <img width="40px" src="{{ url('/data_image/' . $id_image) }}" alt="">
                    </div>
                    <div class="comment_box">
                        <form action="{{ route('comments.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $p->id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="text" name="content" placeholder="Post a comment">
                            <button type="submit">Send</button>
                        </form>
                    </div>
                </div>
                <!--post-comment end-->
            </div>
            <!--comment-section end-->
        </div>
        <!--posty end-->
    @endforeach
@endsection
