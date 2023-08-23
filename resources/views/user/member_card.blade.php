@foreach ($users as $user)
<div class="col-lg-4 col-md-6">
    <div class="single-community-box">
        <div class="img">
            <img src="{{asset('uploads/' . ($user->profile_image ?? 'avatar.jpg'))}}" style="width: 360px; height: 360px;" alt="">
        </div>
        <div class="content">
            <p class="date" style="height: 28px;">
                @if($user->show_last_login === 1)
                Last active: @php
                $datetime = \Carbon\Carbon::createFromDate($user->last_login);
                echo $datetime->diffForHumans();
                @endphp
                @endif
            </p>
            <a href="member/{{$user->username}}" class="title">
                {{$user->first_name . ' ' . $user->last_name}}
                <br>
                <small><strong style="color: blue;"> {{$user->iam}}</strong></small>
            </a>
        </div>
        <div class="box-footer">
            <a href="member/{{$user->username}}" class="btn btn-sm btn-primary bg-grad">View Profile</a>
            <a href="member/like/{{$user->username}}" class="btn btn-sm btn-success bg-grad2">Like Profile</a>
            <a href="member/report/{{$user->username}}" class="btn btn-sm btn-danger">Report Profile</a>
        </div>
    </div>
</div>
@endforeach