@extends('layouts.main')
@section('content')
<style>
    .activeChat {
        background-color: #5a5b5e;
    }
</style>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<!-- ==========Breadcrumb-Section========== -->
<section class="breadcrumb-area profile-bc-area">
    <div class="container">
        <div class="content">
            <h2 class="title extra-padding">
                Chats
            </h2>
        </div>
    </div>
</section>
<!-- ==========Community-Section========== -->
<section class="community-section inner-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="mycontainer">
                    <aside>
                        <header>
                            <input type="text" placeholder="search">
                        </header>
                        <ul id="chatList">
                            @foreach($chats as $chat)
                            <li class="active" id="li{{$chat->id}}" data-id="{{$chat->id}}" onclick="openChat('{{Auth::id()}}','{{$chat->id}}','{{$chat->first_name}}','{{$chat->last_name}}','{{$chat->profile_image}}')">
                                <img src="{{asset('uploads/' . ($chat->profile_image ?? 'avatar.jpg'))}}" style="width: 55px; height: 55px;" alt="">
                                <div>
                                    <h2>{{$chat->first_name}} {{$chat->last_name}}
                                        @if(totalUnreadCount(Auth::user()->id, $chat->id) > 0)
                                        <span id="unreadChatBadge{{$chat->id}}" class="badge bg-danger">{{totalUnreadCount(Auth::user()->id, $chat->id)}}</span>
                                        @endif
                                    </h2>
                                    <h3 id="activity_status{{$chat->id}}" class="activity_status{{$chat->id}}">
                                        {!! Cache::has('user-is-online-' . $chat->id) ? "<span id='statusText{$chat->id}'>online</span> <span id='statusColor{$chat->id}' class='status green'></span>" : "<span id='statusText{$chat->id}'>offline</span> <span id='statusColor{$chat->id}' class='status orange'></span>" !!}
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </aside>
                    <main>
                        @if($chatee)
                        <header>

                            <img src="./../uploads/{{$chatee->profile_image}}" id="chatImage" style="width: 55px; height: 55px;" alt="">
                            <div>
                                <h2 id="chatName">{{$chatee->first_name}} {{$chatee->last_name}} <span id="activity_status{{$chatee->id}}" class="activity_status_header{{$chatee->id}}">{!! Cache::has('user-is-online-' . $chatee->id) ? "<small class='text-success'>online</small> <span class='status green'></span>" : "<small class='text-danger'>offline</small> <span class='status orange'></span>" !!}</span></h2>
                                <h3 id="chatCount">Already {{$chatCount}} Messages</h3>
                            </div>

                        </header>
                        @else
                        <header class="d-none" id="chatHead">

                            <img id="chatImage" style="width: 55px; height: 55px;" alt="">
                            <div>
                                <h2 id="chatName"></h2>
                                <h3 id="chatCount"></h3>
                            </div>

                        </header>
                        @endif
                        <ul id="chat" onload="this.scrollTop(this.prop('scrollHeight'));" @if(!$chatee) class="d-flex align-items-center justify-content-center">
                            <h5 class="text-center text-primary align-items-center justify-content-center">Open a chat to start sending messages!</h5>
                            @else
                            >@foreach($chatMessages as $chatMessage)
                            <li class="{{$chatMessage->sender_id === Auth::id() ? 'me' : 'you'}}">
                                <div class="entete">
                                    <h3>{{formatTime($chatMessage->created_at)}}</h3>
                                    <h2>{{$chatMessage->sender_id === Auth::id() ? 'You' : $chatee->first_name}}</h2>
                                    <span class="status {{$chatMessage->sender_id === Auth::id() ? 'blue' : 'green'}}"></span>
                                </div>
                                <div class="message">{{$chatMessage->message}}</div>
                            </li>
                            @endforeach
                            @endif

                        </ul>
                        @if($chatee)
                        <footer>
                            <form id="saveChatForm" autocomplete="off">
                                <input type="text" id="receiver_id" name="receiver_id" value="{{$chatee->id}}" hidden>
                                <input name="message" autocomplete="off" id="saveChatText" placeholder="Type your message" style="background-color: white;border: none; margin-bottom: 10px;">
                                <!-- <img src="../../../s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/ico_picture.png" alt="">
                                <img src="../../../s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/ico_file.png" alt=""> -->
                                <button type="submit" class="custom-button">Send</button>
                            </form>
                        </footer>
                        @else
                        <footer class="d-none" id="chatFoot">
                            <form id="saveChatForm" autocomplete="off">
                                <input type="text" id="receiver_id" name="receiver_id" value="" hidden>
                                <input name="message" autocomplete="off" id="saveChatText" placeholder="Type your message" style="background-color: white;border: none; margin-bottom: 10px;">
                                <!-- <img src="../../../s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/ico_picture.png" alt="">
                                <img src="../../../s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/ico_file.png" alt=""> -->
                                <button type="submit" class="custom-button">Send</button>
                            </form>
                        </footer>
                        @endif
                    </main>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('#chat').scrollTop($('#chat').prop("scrollHeight"));
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#saveChatForm').submit(function(event) {
        event.preventDefault();
        var message = $('#saveChatText').val();
        if (message == '') {
            alert("Please enter a message");
            return;
        }
        $.ajax({
            url: '/save-chat',
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                send_end: send_end,
                receiver_id: $('#receiver_id').val(),
                message: message
            },
            dataType: 'json',
            success: function(res) {
                if (res.success) {
                    console.log(res);
                    var saveMessage = res.message;
                    $('#saveChatText').val('');
                    var chatItem = `
                                <li class="me">
                                    <div class="entete">
                                        <h3>${formatTimeAndDate(saveMessage.created_at)}</h3>
                                        <h2>You</h2>
                                        <span class="status blue"></span>
                                    </div>
                                    <div class="message">${saveMessage.message}</div>
                                </li>
                            `;
                    $('#chat').append(chatItem);
                    $('#chatCount').text("Already " + saveMessage.chatCount + " messages");
                    if ($("#unreadChatBadge").length != 0) {
                        $('#unreadChatBadge').remove();
                    }
                    // after append scroll to bottom so latest chat message can be shown
                    $('#chat').scrollTop($('#chat').prop("scrollHeight"));

                } else {
                    alert("Error sending message: " + res.message);
                }
            },
            error: function(xhr, status, error) {
                console.error("Error sending message");
            }
        });
    })

    function openChat(userId, chateeId, chateeFirstName, chateeLastName, chateeProfileImage) {
        // changing UI colors status etc. starts here
        // if $('#chat') has following classes d-flex align-items-center justify-content-center then remove them
        $('#chat').empty();
        if ($('#chat').hasClass('d-flex align-items-center justify-content-center')) {
            $('#chat').removeClass('d-flex align-items-center justify-content-center');
        }
        // clear unread messages badge from both li and header
        if ($("#unreadChatBadge" + chateeId).length != 0) {
            $('#unreadChatBadge' + chateeId).remove();
        }
        if ($("#unreadChatBadge").length != 0) {
            $('#unreadChatBadge').remove();
        }
        $('#chatHead').removeClass('d-none');
        $('#chatFoot').removeClass('d-none');
        var selectedLiid = 'li' + chateeId;
        var lis = document.querySelectorAll('#chatList li');
        lis.forEach(function(li) {
            li.classList.remove('activeChat');
        });
        var selectedLi = document.getElementById(selectedLiid);
        selectedLi.classList.add('activeChat');

        var selectedLiStatus = document.getElementById('activity_status' + chateeId);
        var selectedLiText = selectedLiStatus.querySelector('#statusText' + chateeId);
        var selectedLiColor = selectedLiStatus.querySelector('#statusColor' + chateeId);
        selectedLiColorForText = selectedLiColor.classList[1];
        if (selectedLiColorForText == 'orange') {
            var textClass = 'text-danger';
        } else if (selectedLiColorForText == 'green') {
            var textClass = 'text-success';
        }
        $('#chatName').text(chateeFirstName + ' ' + chateeLastName);
        var statusHTML = `<span id="activity_status${chateeId}" class="activity_status_header${chateeId}"> <small class="${textClass}">${selectedLiText.innerHTML}</small> <span class="status ${selectedLiColor.classList[1]}"></span></span>`;
        $('#chatName').append(statusHTML);
        $('#chatImage').attr('src', './../uploads/' + chateeProfileImage);
        console.log("Existing rec id vale: " + $('#receiver_id').val());
        console.log("To be vale: " + chateeId);
        $('#receiver_id').val(chateeId);
        console.log("Changed id vale: " + $('#receiver_id').val());
        $.ajax({
            url: '/get-chat-messages/' + userId + '/' + chateeId,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                $('#chatCount').html('Already ' + response.chatCount + ' Messages');
                $('#chat').empty();
                response.chatMessages.forEach(function(chatMessage) {
                    if (chatMessage.sender_id == userId && chatMessage.receiver_id == chateeId) {
                        var listItemClass = 'me';
                        var statusClass = 'blue';
                        var senderName = 'You';
                    } else if (chatMessage.sender_id == chateeId && chatMessage.receiver_id == userId) {
                        var listItemClass = 'you';
                        var statusClass = 'green';
                        var senderName = chateeFirstName;
                    }
                    var chatMessageHTML = `<li class="${listItemClass}">
                                <div class="entete">
                                    <h3>${formatTimeAndDate(chatMessage.created_at)}</h3>
                                    <h2>${senderName}</h2>
                                    <span class="status ${statusClass}"></span>
                                </div>
                                <div class="message">${chatMessage.message}</div>
                            </li>`;
                    $('#chat').append(chatMessageHTML);
                });
                $('#chat').scrollTop($('#chat').prop("scrollHeight"));

            },
            error: function(xhr, status, error) {
                console.error("Error fetching chat messages");
            }
        });
        // fetching chats ends here
    }

    function formatTimeAndDate(timestamp) {
        var options = {
            hour: 'numeric',
            minute: 'numeric',
            hour12: true,
            day: 'numeric',
            month: 'short'
        };
        return new Date(timestamp).toLocaleDateString('en-US', options);
    }

    window.onload = function() {
        console.log("Echo is being loaded now...");
        Echo.join('status-update')
            .here((users) => {
                console.log("users: " + users);
                for (var x = 0; x < users.length; x++) {
                    // console.log(users[x].id);
                    changeStatus(users[x].id, 'online');
                    allUsers[users[x].id] = `online`;
                    console.log("All users: " + allUsers);
                }
            })
            .joining((user) => {
                // console.log(user.username + " : Joined");
                changeStatus(user.id, 'online');
            })
            .leaving((user) => {
                // console.log(user.username + " : Left");
                changeStatus(user.id, 'offline');
            })

        Echo.private('broadcast-message')
            .listen('.getChatMessage', (data) => {
                if (data.chat.receiver_id == send_end && data.chat.sender_id == $('#receiver_id').val()) {
                    var chatItem = `
                                <li class="you">
                                    <div class="entete">
                                        <h3>${formatTimeAndDate(data.chat.created_at)}</h3>
                                        <h2>Them</h2>
                                        <span class="status green"></span>
                                    </div>
                                    <div class="message">${data.chat.message}</div>
                                </li>
                            `;

                    $('#chat').append(chatItem);
                    // Make ajax get request to /countTotal/sender/receiver
                    $.ajax({
                            url: 'countTotal/' + send_end + '/' + $('#receiver_id').val(),
                            type: 'GET',
                            dataType: 'json',
                            success: function(data) {
                                $('#chatCount').text("Already " + data.chatCount + " messages");
                            }
                        })
                        .fail(function(xhr, status, error) {
                            console.error("Error fetching chat messages");
                        });
                    // scroll to bottom of this chat ul
                    var chat = document.getElementById('chat');
                    chat.scrollTop = chat.scrollHeight;
                    // make unread message count +1 
                    if ($("#unreadChatBadge").length == 0) {
                        var unreadChatBadge = `<span id="unreadChatBadge" class="badge bg-danger">1</span>`;
                        $('#chatName').append(unreadChatBadge);
                    } else {
                        var unreadChatBadge = $('#unreadChatBadge');
                        var unreadChatBadgeCount = parseInt(unreadChatBadge.text());
                        unreadChatBadgeCount++;
                        unreadChatBadge.text(unreadChatBadgeCount);
                    }

                } else {
                    // show unread badge in front chatContact in chat contact list and +1
                    if ($("#unreadChatBadge" + data.chat.sender_id).length == 0) {
                        var unreadChatBadge = `<span id="unreadChatBadge${data.chat.sender_id}" class="badge bg-danger">1</span>`;
                        $('#li' + data.chat.sender_id).append(unreadChatBadge);
                    } else {
                        var unreadChatBadge = $('#unreadChatBadge' + data.chat.sender_id);
                        var unreadChatBadgeCount = parseInt(unreadChatBadge.text());
                        unreadChatBadgeCount++;
                        unreadChatBadge.text(unreadChatBadgeCount);
                    }
                }
            });
    };

    function changeStatus(userId, status) {
        if (status == 'online') {
            $('.activity_status' + userId).html(`<span id='statusText${userId}'>online</span> <span id='statusColor${userId}' class='status green'></span>`);
            $('.activity_status_header' + userId).html(` <small id='statusText${userId}' class="text-success">online</small> <span id='statusColor${userId}' class='status green'></span>`);
        } else if (status == 'offline') {
            $('.activity_status' + userId).html(`<span id='statusText${userId}'>offline</span> <span id='statusColor${userId}' class='status orange'></span>`);
            $('.activity_status_header' + userId).html(` <small id='statusText${userId}' class="text-danger">offline</small> <span id='statusColor${userId}' class='status orange'></span>`);
        }
    }
</script>
@endsection