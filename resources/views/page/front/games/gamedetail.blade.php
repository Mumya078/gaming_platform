<link rel="stylesheet" href="{{asset('/assets/front/gamedetail.scss')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@extends("layouts.front.frontbase")

@section("content")
    <div class="main">
        <div class="frame">
            <div class="game-holder">
                <img class="game-img-holder" src="/games/{{$game->name}}/{{$game->image}}">
                <div class="playbutton">
                    <a href="{{route('play_game',$game->id)}}">
                        <img src="/assets/images/playbutton.png">
                    </a>
                </div>
                <div class="rating">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= round($game->rate))
                            <span class="fa fa-star checked"></span>
                        @else
                            <span class="fa fa-star"></span>
                        @endif
                    @endfor
                </div>
            </div>
            <div class="sub-menu">
                <div class="headers">
                    <div style="border: 2px solid black;border-radius: 20px">
                        <a class="tab" data-content="desc">Description</a>
                        <a class="tab" data-content="comment">Comment</a>
                    </div>
                </div>
                <div id="comment" class="tab-content">
                    <div class="comment-container">
                        @foreach($comments as $rs)
                            @php
                            $user = \App\Models\User::find($rs->user_id);
                            @endphp
                            <div class="comments">
                                <div class="pp">
                                    <img src="/assets/images/pngwing.com.png">
                                </div>
                                <div class="text">
                                    <h4>{{$user->name}}</h4>
                                    <p>{{$rs->text}}</p>
                                </div>
                                <div class="comment-rate">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $rs->rate)
                                            <span class="fa fa-star checked"></span>
                                        @else
                                            <span class="fa fa-star"></span>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="write-comment">
                        <div class="write-comment-container">
                            <form action="{{route('upload_comment',$game->id)}}" method="post">
                                @csrf
                                <label style="margin-left: 360px;font-size: 18px"> Yorum Yap...</label>
                                <div class="form-group">
                                    <textarea name="comment" style="max-height: 100%;border: 1px solid black;" class="form-control" rows="1" placeholder="Enter ..."></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="rate" style="margin-left: 250px">
                                        <input type="radio" id="star5" name="rate" value="5" />
                                        <label for="star5" title="text">5 stars</label>
                                        <input type="radio" id="star4" name="rate" value="4" />
                                        <label for="star4" title="text">4 stars</label>
                                        <input type="radio" id="star3" name="rate" value="3" />
                                        <label for="star3" title="text">3 stars</label>
                                        <input type="radio" id="star2" name="rate" value="2" />
                                        <label for="star2" title="text">2 stars</label>
                                        <input type="radio" id="star1" name="rate" value="1" />
                                        <label for="star1" title="text">1 star</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit" style="margin-left: 50px">
                                    Gönder
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="desc" class="tab-content active">
                    <div class="desc-main">
                        <div class="desc-text">
                            <p>
                                {{$game->desc}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tabs = document.querySelectorAll('.tab');
            const tabContents = document.querySelectorAll('.tab-content');

            tabs.forEach(tab => {
                tab.addEventListener('click', function () {
                    const contentId = tab.getAttribute('data-content');

                    // Tüm içerikleri gizle ve sekmelerin aktif sınıflarını kaldır
                    tabContents.forEach(content => content.classList.remove('active'));
                    tabs.forEach(tab => tab.classList.remove('active-tab'));

                    // Tıklanan sekmenin içeriğini ve sekmeyi göster
                    document.getElementById(contentId).classList.add('active');
                    tab.classList.add('active-tab');
                });
            });
        });
        document.querySelectorAll('.rate label').forEach(function(label) {
            label.addEventListener('click', function(event) {
                event.preventDefault();
                const radioId = label.getAttribute('for');
                document.getElementById(radioId).checked = true;
            });
        });

    </script>
@endsection


