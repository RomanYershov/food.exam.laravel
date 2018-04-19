<div class="comment">
    <ul>
        <h4 style="text-decoration: underline;color: #2ab27b">{{$data['email']}}</h4>
        <li>{{$data['text']}} <i class="fas fa-comment-dots"></i></li>
        <li  style="float: right;">{{$data['date']}}
            @if(\Illuminate\Support\Facades\Auth::user() && $data['user_id']==\Illuminate\Support\Facades\Auth::user()->id)
                <a style="font-size:15px;" href="/delete/{{$data['code']}}" ><i class="fas fa-trash-alt"></i></a>
            @endif
        </li>
    </ul>

</div>