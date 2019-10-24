@extends('layouts.app')

@section('content')

    <div class="col-md-12 col-lg-12 background-news-feed">
        <div class="container">
            <div style="height: 15px; background: #f4f6f8;"></div>
            <div class="news-feed col-md-10">
                <div class="header-card col-md-12 col-lg-12">
                    <div class="user">
                        <a class="avatar" href="{{ url('/user/'.$post->user->id) }}"><i class="fas fa-user"></i></a>
                        <a href="{{ url('/user/'.$post->user->id) }}">{{ $post->user->name }}</a>
                    </div>
                </div>
                <div class="body-card col-md-12 col-lg-12">
                    <div class="title-blog">
                        <a href="{{ url('/post/'.$post->id) }}"><p>{{ $post->title }}</p></a>
                        <p style="font-size: 18px;">#{{ $post->category->name }}</p>
                    </div>
                    <div class="content-blog">
                        <span>Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum </span>
                    </div>
                </div>
                <div class="footer-card col-md-12 col-lg-12">
                    <div>
                        <a href="{{ url('/post/'.$post->id) }}" style="font-size: 18px;"><i class="fas fa-comment">Comment ( {{ count($comments) }} )</i></a>
                    </div>
                </div>
                <div class="comment-post">
                        <form action="{{ url('/comment_post/'.$post->id) }}" method="post" style="padding: 15px 0;">
                            @csrf
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Enter comment" name="content-comment">
							</div>
							<button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        @foreach ($comments as $comment)
                        @if($comment->is_active == true)
                        <div style="margin: 5px; 0">
                                <div class="comment-user" style="display: inline-block; background: #f2f4f6; border-radius: 10px; padding: 5px; position: relative;">
                                    @if(Auth::user()->role == 2)
                                        <i class="fas fa-ellipsis-v" style="position: absolute; right: -15px; cursor: pointer;" data-toggle="modal" data-target="#myModal" onclick="modal_hide({{ $comment->id }})" title="Hide commet"></i>
                                    @endif
                                    <div>
                                        <a href="{{ url('/user/'.$comment->id) }}">{{ $comment->user->name }}</a>
                                    </div>
                                    <div>
                                        <span>{{ $comment->content }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @endforeach
					</div>
            </div>
            <div style="height: 15px; background: #f4f6f8;"></div>
        </div>
    </div>
    @if(Auth::user()->role == 2)
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <h4 style="display: block;" class="modal-title">Do you want hide this comment?</h4>
            </div>
            <form action="" method="post" id="form-modal">@csrf</form>
            <div class="modal-footer">
                <button class="btn btn-danger" onclick="event.preventDefault();
                document.getElementById('form-modal').submit();">Yes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
            </div>

        </div>
    </div>

    <script>
        function modal_hide(id) {
            $('#form-modal').attr('action', '{{ url('/hide_comment') }}'+'/'+id);
        }
    </script>
    @endif
@endsection
