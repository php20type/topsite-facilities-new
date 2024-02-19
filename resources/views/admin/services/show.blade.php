@extends('layouts.app', [
    'title' => 'Topside Facilities Management - customer',
])
@section('page_style')
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

         <style>
            #chat_area {
                min-height: 500px;
                /*overflow-y: scroll*/
                ;
            }

            #chat_history {
                min-height: 500px;
                max-height: 500px;
                overflow-y: scroll;
                margin-bottom: 16px;
                background-color: #ece5dd;
                padding: 16px;
            }

            #user_list {
                min-height: 500px;
                max-height: 500px;
                overflow-y: scroll;
            }
        </style>
@endsection
@section('content')
    <!-- dashboard screen start -->
    <aside class="app-sidebar">
        <div id="close"><a href="javascript:void(0)"><i class="fa-regular fa-xmark"></i></a></div>
        <div class="profile-header">
            <a href="#"><img src="{{ URL::asset('img/logo/logo.svg') }}" alt="user" /></a>
        </div>
        <nav class="sidebar-nav">
            <ul class="list-inline">
                @foreach ($services as $serviceItem)
                    <li class="{{ $service->id == $serviceItem->id ? 'active' : '' }}">
                        <a
                            href="{{ route('admin.service.show', ['property' => $property->id, 'service' => $serviceItem->id]) }}">
                            {{ $serviceItem->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </aside>


    <div class="main-content app-content">
        <!-- Header section start -->
        <div class="top-header">
            <div class="sidemenu-toggle">
                <a href="javascript:void(0)" id="menu-toggle">
                    <svg width="46" height="46" viewBox="0 0 46 46" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect x="1" y="1" width="44" height="44" rx="9" fill="#4DA6FF" fill-opacity="0.15"
                            stroke="#4DA6FF" stroke-width="2"></rect>
                        <rect x="13" y="14" width="10" height="3" rx="1.5" fill="#4DA6FF"></rect>
                        <rect x="13" y="21" width="20" height="3" rx="1.5" fill="#4DA6FF"></rect>
                        <rect x="23" y="28" width="10" height="3" rx="1.5" fill="#4DA6FF"></rect>
                    </svg>
                </a>
            </div>
            <div class="title-header ms-4">
                <h2>Work Progress</h2>
            </div>
            <div class="right-content">
                <form class="search-property position-relative me-3" action="" id="">
                    <input type="text" placeholder="Search Property..." class="form-control" />
                    <span class="search-svg"><img src="{{ URL::asset('img/home/search.svg') }}"></span>
                </form>
                <div class="action-button">
                    <a href="#" class="me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"
                            fill="none">
                            <rect width="48" height="48" rx="10" fill="#389BFE" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M24.5 29.8476C30.1392 29.8476 32.7481 29.1242 33 26.2205C33 23.3188 31.1812 23.5054 31.1812 19.9451C31.1812 17.1641 28.5452 14 24.5 14C20.4548 14 17.8188 17.1641 17.8188 19.9451C17.8188 23.5054 16 23.3188 16 26.2205C16.253 29.1352 18.8618 29.8476 24.5 29.8476Z"
                                stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path opacity="0.4" d="M26.8889 32.8574C25.5247 34.3721 23.3967 34.3901 22.0195 32.8574"
                                stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"
                            fill="none">
                            <rect width="48.0001" height="48" rx="10" fill="#389BFE" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M24.0008 27.6172C19.6854 27.6172 16.0002 28.2526 16.0002 30.7973C16.0002 33.342 19.6621 34.0002 24.0008 34.0002C28.3161 34.0002 32.0002 33.3638 32.0002 30.8201C32.0002 28.2764 28.3395 27.6172 24.0008 27.6172Z"
                                stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd"
                                d="M24.0008 23.9874C26.8327 23.9874 29.128 21.7511 29.128 18.9932C29.128 16.2353 26.8327 14 24.0008 14C21.1689 14 18.8726 16.2353 18.8726 18.9932C18.863 21.7418 21.1434 23.9781 23.9647 23.9874H24.0008Z"
                                stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <!-- Header section end -->

        <!-- Work Progress section start -->
        <section class="WorkProgress">
            <div class="container-fluid">
                <div class="back mb-3">
                    <a href="{{ route('admin.property.details', ['id' => $property->id]) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12"
                            fill="none">
                            <path
                                d="M0.469669 5.46967C0.176777 5.76256 0.176777 6.23744 0.469669 6.53033L5.24264 11.3033C5.53553 11.5962 6.01041 11.5962 6.3033 11.3033C6.59619 11.0104 6.59619 10.5355 6.3033 10.2426L2.06066 6L6.3033 1.75736C6.59619 1.46447 6.59619 0.989593 6.3033 0.696699C6.01041 0.403806 5.53553 0.403806 5.24264 0.696699L0.469669 5.46967ZM21 5.25L1 5.25V6.75L21 6.75V5.25Z"
                                fill="#31903C"></path>
                        </svg> &nbsp; Back </a>
                </div>
                <div class="content-chat-message-user">
                    <div class="head-chat-message-user row">
                        <div class="user-box-left-fix col-6">
                            <div class="user-round">
                                <img src="{{ URL::asset('img/logo/logo.svg') }}" alt="user photo" />
                            </div>
                            <div class="user-info">
                                <h4>{{ $property->user->name }}</h4>
                                <h6>Last online {{ $property->user->created_at->diffForHumans() }}</h6>
                            </div>
                        </div>
                        <!-- Example split danger button -->
                        <div class="container col-2">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Dropdown Menu
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @foreach ($property->services as $ser)
                                        @if ($service->id == $ser->id)
                                            @if ($ser->pivot->status === 'NEW')
                                                <li><a class="dropdown-item" href="#">In Progress</a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                            @elseif($ser->pivot->status === 'In Progress')
                                                <li><a class="dropdown-item" href="#">Ready for Review</a></li>
                                            @endif
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Chat Messages Container -->
                    <div class="body-chat-message-user">
                        @foreach ($messages as $message)
                            <div class="chat-active">
                                <h4>{{ $message->created_at->format('m/d/Y h:i A') }}</h4>
                            </div>
                            <div class="message-user-left">
                                <div class="message-user-profile">
                                    <img src="{{ URL::asset('img/logo/logo.svg') }}">
                                </div>
                                <div class="message-user-left-text">
                                    <!-- Display message content here -->
                                    <p>{{ $message->content }}</p>
                                    <span class="time">{{ $message->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Chat Footer -->
                    <div class="footer-chat-message-user">
                        <form action="" method="POST">
                            @csrf
                            <div class="message-user-send">
                                <div class="action-left-button">
                                    <a href="#">
                                        <i class="fa-light fa-image"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fa-light fa-plus"></i>
                                    </a>
                                </div>
                                <input type="text" name="message" id="message-input"
                                    placeholder="Type a message here..." class="form-control">
                                <div class="action-right-button">
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <!-- Your SVG Icon -->
                                        </svg>
                                    </a>
                                    <button type="submit" id="send-message-btn">
                                        <i class="fa-solid fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </section>

        <!-- Work Progress section end -->

    </div>

    <!-- dashboard screen end -->

     @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-sm-4 col-lg-3">
            <div class="card">
                <div class="card-header"><b>Connected User</b></div>
                <div class="card-body" id="user_list">

                </div>
            </div>
        </div>
        <div class="col-sm-4 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col col-md-6" id="chat_header"><b>Chat Area</b></div>
                        <div class="col col-md-6" id="close_chat_area"></div>
                    </div>
                </div>
                <div class="card-body" id="chat_area">

                </div>
            </div>
        </div>
        <div class="col-sm-4 col-lg-3">
            <div class="card" style="height:255px; overflow-y: scroll;">
                <div class="card-header">
                    <input type="text" class="form-control" placeholder="Search User..." autocomplete="off"
                        id="search_people" onkeyup="search_user('{{ Auth::id() }}', this.value);" />
                </div>
                <div class="card-body">
                    <div id="search_people_area" class="mt-3"></div>
                </div>
            </div>
            <br />
            <div class="card" style="height:255px; overflow-y: scroll;">
                <div class="card-header"><b>Notification</b></div>
                <div class="card-body">
                    <ul class="list-group" id="notification_area">

                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_scripts')
    <script>
        $(document).ready(function() {
            // Handle sending messages
            $('#send-message-btn').click(function(e) {
                e.preventDefault();
                var message = $('#message-input').val();
                if (message.trim() !== '') {
                    $.ajax({
                        type: 'POST',
                        url: '/send-message', // Define your route
                        data: {
                            message: message
                        },
                        success: function(response) {
                            // Handle success response
                            // You may update the chat interface with the new message
                        },
                        error: function(xhr, status, error) {
                            // Handle error response
                        }
                    });
                }
            });
        });

        /* websocket chat module script */
            var conn = new WebSocket('ws://127.0.0.1:8090/?token={{ Auth::guard('admin')->user()->token }}');
            var from_user_id = "{{ Auth::guard('admin')->user()->id }}";
            var to_user_id = "";

            // dipanggil ketika koneksi baru websocket sudah dihidupkan
            conn.onopen = function(e) {
                console.log("Connection established!");

                load_unconnected_user(from_user_id); // akan ngeload list user yg mau dichat
                load_unread_notification(from_user_id); // akan menampilkan list notification
                load_connected_chat_user(from_user_id); // akan menampilkan list user yg approved chat_request
            };

            // dipanggil ketika pesan telah diterima
            conn.onmessage = function(e) {
                var data = JSON.parse(e.data);

                if (data.image_link) {
                    //Display Code for uploaded Image
                    document.getElementById('message_area').innerHTML =
                        `<img src="{{ asset('images/`+data.image_link+`') }}" class="img-thumbnail img-fluid" />`;
                }

                if (data.status) {
                    var online_status_icon = document.getElementsByClassName('online_status_icon');

                    // data yg akan ditampilkan di user terkoneksi
                    for (var count = 0; count < online_status_icon.length; count++) {
                        if (online_status_icon[count].id == 'status_' + data.id) {
                            if (data.status == 'Online') {
                                online_status_icon[count].classList.add('text-success');
                                online_status_icon[count].classList.remove('text-danger');

                                document.getElementById('last_seen_' + data.id + '').innerHTML = 'Online';
                            } else {
                                online_status_icon[count].classList.add('text-danger');
                                online_status_icon[count].classList.remove('text-success');

                                document.getElementById('last_seen_' + data.id + '').innerHTML = data.last_seen;
                            }
                        }
                    }
                }

                // jika load_user_unconnect || user yg diinputkan == true
                if (data.response_load_unconnected_user || data.response_search_user) {
                    var html = '';

                    if (data.data.length > 0) {
                        html += '<ul class="list-group">';

                        for (var count = 0; count < data.data.length; count++) {
                            var user_image = '';

                            if (data.data[count].user_image != '') {
                                user_image = `<img src="{{ asset('images/') }}/` + data.data[count].user_image +
                                    `" width="40" class="rounded-circle" />`;
                            } else {
                                user_image =
                                    `<img src="{{ asset('images/no-image.jpg') }}" width="40" class="rounded-circle" />`
                            }

                            html += `
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col col-9">` + user_image + `&nbsp;` + data.data[count].name +
                                `</div>
                                <div class="col col-3">
                                    <button type="button" name="send_request" class="btn btn-primary btn-sm float-end" onclick="send_request(this, ` +
                                from_user_id + `, ` + data.data[count].id + `)"><i class="fas fa-paper-plane"></i></button>
                                </div>
                            </div>
                        </li>
                        `; // ketika button diklik, maka akan call method send request dan set type == request_chat_user
                            // jadi data from_user_id dan to_user_id akan masuk ke tabel chat_request
                        }

                        html += '</ul>';
                    } else {
                        html = 'No User Found';
                    }

                    document.getElementById('search_people_area').innerHTML = html;
                }

                // setelah button send diklik, key response_from_user di set jadi true
                // blok ini untuk menampilkan list user yg belum dikirim chat_request
                if (data.response_from_user_chat_request) {
                    // kirim auth()->user_id dan value query search
                    search_user(from_user_id, document.getElementById('search_people').value);

                    load_unread_notification(from_user_id); // akan menampilkan list notification
                }

                if (data.response_to_user_chat_request) {
                    load_unread_notification(data.user_id); // akan menampilkan list notification
                }

                // dan ini jadi true kalo button send diklik
                if (data.response_load_notification) {
                    var html = '';

                    for (var count = 0; count < data.data.length; count++) {
                        var user_image = '';

                        if (data.data[count].user_image != '') {
                            user_image = `<img src="{{ asset('images/') }}/` + data.data[count].user_image +
                                `" width="40" class="rounded-circle" />`;
                        } else {
                            user_image =
                                `<img src="{{ asset('images/no-image.jpg') }}" width="40" class="rounded-circle" />`;
                        }

                        html += `
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col col-8">` + user_image + `&nbsp;` + data.data[count].name + `</div>
                            <div class="col col-4">
                    `;
                        // ditampilkan di user yg send request
                        if (data.data[count].notification_type == 'Send Request') {
                            if (data.data[count].status == 'Pending') {
                                html +=
                                    '<button type="button" name="send_request" class="btn btn-warning btn-sm float-end">Request Send</button>';
                            } else {
                                html +=
                                    '<button type="button" name="send_request" class="btn btn-danger btn-sm float-end">Request Rejected</button>';
                            }
                        } else {
                            // ditampilkan di user penerima request
                            if (data.data[count].status == 'Pending') {
                                // call function process_chat_request() sekaligus kirim parameternya untuk me-REJECT
                                html +=
                                    '<button type="button" class="btn btn-danger btn-sm float-end" onclick="process_chat_request(' +
                                    data.data[count].id + ', ' + data.data[count].from_user_id + ', ' + data.data[count]
                                    .to_user_id + ', `Reject`)"><i class="fas fa-times"></i></button>&nbsp;';
                                // call function process_chat_request() sekaligus kirim parameternya untuk me-APPROVE
                                html +=
                                    '<button type="button" class="btn btn-success btn-sm float-end" onclick="process_chat_request(' +
                                    data.data[count].id + ', ' + data.data[count].from_user_id + ', ' + data.data[count]
                                    .to_user_id +
                                    ', `Approve`)"><i class="fas fa-check"></i></button>'; // pas diklik bakal hilang di list notification di client user pengirim dan penerima
                            } else {
                                html +=
                                    '<button type="button" name="send_request" class="btn btn-danger btn-sm float-end">Request Rejected</button>';
                            }
                        }

                        html += `
                            </div>
                        </div>
                    </li>
                    `;
                    }

                    // tampilkan html di list notification
                    document.getElementById('notification_area').innerHTML = html;
                }

                if (data.response_process_chat_request) {
                    load_unread_notification(data.user_id); // akan menampilkan list notification
                    load_connected_chat_user(data.user_id); // akan menampilkan list user yg terkoneksi (abis di approve)
                }

                if (data.response_connected_chat_user) {
                    // menampilkan list user yg approve chat_request
                    var html = '<div class="list-group">';

                    if (data.data.length > 0) {
                        for (var count = 0; count < data.data.length; count++) {
                            html += `
                        <a href="#" class="list-group-item d-flex justify-content-between align-items-start" onclick="make_chat_area(` +
                                data.data[count].id + `, '` + data.data[count].name + `'); load_chat_data(` + from_user_id +
                                `, ` + data.data[count].id + `); ">
                            <div class="ms-2 me-auto">
                        `;

                            var last_seen = '';

                            if (data.data[count].user_status == 'Online') {
                                // menampilkan tanda online
                                html += '<span class="text-success online_status_icon" id="status_' + data.data[count].id +
                                    '"><i class="fas fa-circle"></i></span>';

                                last_seen = 'Online';
                            } else {
                                // tanda offline
                                html += '<span class="text-danger online_status_icon" id="status_' + data.data[count].id +
                                    '"><i class="fas fa-circle"></i></span>';

                                last_seen = data.data[count].last_seen;
                            }

                            var user_image = '';

                            if (data.data[count].user_image != '') {
                                user_image = `<img src="{{ asset('images/') }}/` + data.data[count].user_image +
                                    `" width="35" class="rounded-circle" />`;
                            } else {
                                user_image =
                                    `<img src="{{ asset('images/no-image.jpg') }}" width="35" class="rounded-circle" />`;
                            }


                            html += `
                                &nbsp; ` + user_image + `&nbsp;<b>` + data.data[count].name + `</b>
                                <div class="text-right"><small class="text-muted last_seen" id="last_seen_` + data.data[count].id + `">` +
                                last_seen + `</small></div>
                            </div>
                            <span class="user_unread_message" data-id="` + data.data[count].id + `" id="user_unread_message_` + data.data[
                                    count].id + `"></span>
                        </a>
                        `;
                        }
                    } else {
                        html += 'No User Found';
                    }

                    html += '</div>';
                    document.getElementById('user_list').innerHTML = html;

                    check_unread_message();
                }

                if (data.message) {
                    var html = '';

                    // data yg diterima pengirim chat
                    if (data.from_user_id == from_user_id) {

                        var icon_style = '';

                        if (data.message_status == 'Not Send') {
                            icon_style = '<span id="chat_status_' + data.chat_message_id +
                                '" class="float-end"><i class="fas fa-check text-muted"></i></span>';
                        }
                        // kalo penerima udah login, tampilkan centang 2
                        if (data.message_status == 'Send') {
                            icon_style = '<span id="chat_status_' + data.chat_message_id +
                                '" class="float-end"><i class="fas fa-check-double text-muted"></i></span>';
                        }

                        // kalo udah dibaca tampilkan centang 2 biru
                        if (data.message_status == 'Read') {
                            icon_style = '<span class="text-primary float-end" id="chat_status_' + data.chat_message_id +
                                '"><i class="fas fa-check-double"></i></span>';
                        }

                        html += `
                    <div class="row">
                        <div class="col col-3">&nbsp;</div>
                        <div class="col col-9 alert alert-success text-dark shadow-sm">
                            ` + data.message + icon_style + `
                        </div>
                    </div>
                    `;
                    } else
                    // yg diterima penerima chat
                    {
                        if (to_user_id != '') {
                            html += `
                        <div class="row">
                            <div class="col col-9 alert alert-light text-dark shadow-sm">
                            ` + data.message + `
                            </div>
                        </div>
                        `;

                            // chat_message_id didapat dari id di tabel chatnya
                            update_message_status(data.chat_message_id, from_user_id, to_user_id, 'Read');
                        } else {
                            var count_unread_message_element = document.getElementById('user_unread_message_' + data
                                .from_user_id + '');
                            if (count_unread_message_element) {
                                var count_unread_message = count_unread_message_element.textContent;
                                if (count_unread_message == '') {
                                    count_unread_message = parseInt(0) + 1;
                                } else {
                                    count_unread_message = parseInt(count_unread_message) + 1;
                                }
                                count_unread_message_element.innerHTML = '<span class="badge bg-primary rounded-pill">' +
                                    count_unread_message + '</span>';

                                update_message_status(data.chat_message_id, data.from_user_id, data.to_user_id, 'Send');
                            }
                        }

                    }

                    if (html != '') {
                        var previous_chat_element = document.querySelector('#chat_history');
                        var chat_history_element = document.querySelector('#chat_history');

                        chat_history_element.innerHTML = previous_chat_element.innerHTML + html;
                        scroll_top();
                    }

                }

                if (data.chat_history) {
                    var html = '';

                    for (var count = 0; count < data.chat_history.length; count++) {

                        // kalo yg login user pengirim chat
                        if (data.chat_history[count].from_user_id == from_user_id) {
                            var icon_style = '';

                            // kalo penerima belum login, tampilin icon ceklis 1
                            if (data.chat_history[count].message_status == 'Not Send') {
                                icon_style = '<span id="chat_status_' + data.chat_history[count].id +
                                    '" class="float-end"><i class="fas fa-check text-muted"></i></span>';
                            }

                            // kalo penerima udah login, tampilkan icon ceklis 2
                            if (data.chat_history[count].message_status == 'Send') {
                                icon_style = '<span id="chat_status_' + data.chat_history[count].id +
                                    '" class="float-end"><i class="fas fa-check-double text-muted"></i></span>';
                            }

                            // kalo udah dibaca, tampilkan icon ceklis 2 biru
                            if (data.chat_history[count].message_status == 'Read') {
                                icon_style = '<span class="text-primary float-end" id="chat_status_' + data.chat_history[
                                    count].id + '"><i class="fas fa-check-double"></i></span>';
                            }

                            html += `
                        <div class="row">
                            <div class="col col-3">&nbsp;</div>
                            <div class="col col-9 alert alert-success text-dark shadow-sm">
                            ` + data.chat_history[count].chat_message + icon_style + `
                            </div>
                        </div>
                        `;


                        }
                        // kalo yg login user penerima chat
                        else {
                            if (data.chat_history[count].message_status != 'Read') {
                                update_message_status(data.chat_history[count].id, data.chat_history[count].from_user_id,
                                    data.chat_history[count].to_user_id, 'Read');
                            }

                            html += `
                        <div class="row">
                            <div class="col col-9 alert alert-light text-dark shadow-sm">
                            ` + data.chat_history[count].chat_message + `
                            </div>
                        </div>
                        `;

                            var count_unread_message_element = document.getElementById('user_unread_message_' + data
                                .chat_history[count].from_user_id + '');

                            if (count_unread_message_element) {
                                count_unread_message_element.innerHTML = '';
                            }
                        }
                    }

                    document.querySelector('#chat_history').innerHTML = html;

                    scroll_top();
                }

                if (data.update_message_status) {
                    var chat_status_element = document.querySelector('#chat_status_' + data.chat_message_id + '');

                    // update icon chat status
                    if (chat_status_element) {
                        if (data.update_message_status == 'Read') {
                            chat_status_element.innerHTML = '<i class="fas fa-check-double text-primary"></i>';
                        }
                        if (data.update_message_status == 'Send') {
                            chat_status_element.innerHTML = '<i class="fas fa-check-double text-muted"></i>';
                        }
                    }

                    // menampilkan notif icon angka sesuai chat yg unread
                    if (data.unread_msg) {
                        var count_unread_message_element = document.getElementById('user_unread_message_' + data
                            .from_user_id + '');

                        if (count_unread_message_element) {
                            var count_unread_message = count_unread_message_element.textContent;

                            // kalo notifnya masih 0, iconnya muncul jumlah 1
                            if (count_unread_message == '') {
                                count_unread_message = parseInt(0) + 1;
                            }
                            // kalo udah ada notif sebelumnya, maka tambahin 1s
                            else {
                                count_unread_message = parseInt(count_unread_message) + 1;
                            }

                            count_unread_message_element.innerHTML = '<span class="badge bg-danger rounded-pill">' +
                                count_unread_message + '</span>';
                        }
                    }
                }
            };

            function scroll_top() {
                document.querySelector('#chat_history').scrollTop = document.querySelector('#chat_history').scrollHeight;
            }

            // video 7
            function load_unconnected_user(from_user_id) {
                var data = {
                    from_user_id: from_user_id,
                    type: 'request_load_unconnected_user'
                };

                conn.send(JSON.stringify(data));
            }

            // video 8
            function search_user(from_user_id, search_query) {
                if (search_query.length > 0) {
                    var data = {
                        from_user_id: from_user_id,
                        search_query: search_query,
                        type: 'request_search_user'
                    };

                    conn.send(JSON.stringify(data));
                } else {
                    load_unconnected_user(from_user_id);
                }
            }

            // video 9
            function send_request(element, from_user_id, to_user_id) {
                var data = {
                    from_user_id: from_user_id,
                    to_user_id: to_user_id,
                    type: 'request_chat_user'
                };

                element.disabled = true;

                conn.send(JSON.stringify(data));
            }

            // video 10
            function load_unread_notification(user_id) {
                var data = {
                    user_id: user_id,
                    type: 'request_load_unread_notification'
                };

                conn.send(JSON.stringify(data)); // data yg dikirimkan ke parameter $msg

            }

            // video 11
            function process_chat_request(chat_request_id, from_user_id, to_user_id, action) {
                var data = {
                    chat_request_id: chat_request_id,
                    from_user_id: from_user_id,
                    to_user_id: to_user_id,
                    action: action,
                    type: 'request_process_chat_request'
                };

                conn.send(JSON.stringify(data)); // data yg dikirimkan ke parameter $msg
            }

            // video 12
            function load_connected_chat_user(from_user_id) {
                var data = {
                    from_user_id: from_user_id,
                    type: 'request_connected_chat_user'
                };

                conn.send(JSON.stringify(data)); // data yg dikirimkan ke parameter $msg
            }

            function make_chat_area(user_id, to_user_name) {
                var html = `
            <div id="chat_history"></div>
            <div class="input-group mb-3">
                <div id="message_area" class="form-control" contenteditable style="min-height:125px; border:1px solid #ccc; border-radius:5px;"></div>
                <label class="btn btn-warning" style="line-height:125px;">
                    <i class="fas fa-upload"></i> <input type="file" id="browse_image" onchange="upload_image()" hidden />
                </label>
                <button type="button" class="btn btn-success" id="send_button" onclick="send_chat_message()"><i class="fas fa-paper-plane"></i></button>
            </div>
            `; // ketika tombol send diklik

                document.getElementById('chat_area').innerHTML = html;
                document.getElementById('chat_header').innerHTML = 'Chat with <b>' + to_user_name + '</b>';
                document.getElementById('close_chat_area').innerHTML =
                    '<button type="button" id="close_chat" class="btn btn-danger btn-sm float-end" onclick="close_chat();"><i class="fas fa-times"></i></button>';

                to_user_id = user_id;
            }

            function close_chat() {
                document.getElementById('chat_header').innerHTML = 'Chat Area'; // nampilin string di header

                document.getElementById('close_chat_area').innerHTML = ''; // menghilangkan tombol close
                document.getElementById('chat_area').innerHTML = ''; // menghapus area chattingan dari halaman browser

                to_user_id = '';
            }

            // video 15
            function send_chat_message() {
                document.querySelector('#send_button').disabled = true;

                var message = document.getElementById('message_area').innerHTML.trim();

                var data = {
                    message: message,
                    from_user_id: from_user_id,
                    to_user_id: to_user_id,
                    type: 'request_send_message'
                };

                conn.send(JSON.stringify(data)); // kirim data ke server websocket (ke param $msg)

                document.querySelector('#message_area').innerHTML = '';
                document.querySelector('#send_button').disabled = false; // enable tombol kirim
            }

            // video
            // di call ketika klik user yg di list connected (jadi akan nampilkan data dari db)
            function load_chat_data(from_user_id, to_user_id) {
                var data = {
                    from_user_id: from_user_id,
                    to_user_id: to_user_id,
                    type: 'request_chat_history'
                };

                conn.send(JSON.stringify(data));
            }

            // video 17
            function update_message_status(chat_message_id, from_user_id, to_user_id, chat_message_status) {
                var data = {
                    chat_message_id: chat_message_id,
                    from_user_id: from_user_id,
                    to_user_id: to_user_id,
                    chat_message_status: chat_message_status,
                    type: 'update_chat_status'
                };

                conn.send(JSON.stringify(data));
            }

            // video 18
            function check_unread_message() {
                var unread_element = document.getElementsByClassName('user_unread_message');

                for (var count = 0; count < unread_element.length; count++) {
                    var temp_user_id = unread_element[count].dataset.id;

                    var data = {
                        from_user_id: from_user_id,
                        to_user_id: to_user_id,
                        type: 'check_unread_message'
                    };

                    conn.send(JSON.stringify(data));
                }
            }

            function upload_image() {
                var file_element = document.getElementById('browse_image').files[0];
                var file_name = file_element.name;
                var file_extension = file_name.split('.').pop().toLowerCase();
                var allowed_extension = ['png', 'jpg'];

                if (allowed_extension.indexOf(file_extension) == -1) {
                    alert("Invalid Image File");

                    return false;
                }

                var file_reader = new FileReader();
                var file_raw_data = new ArrayBuffer();

                file_reader.loadend = function() {

                }

                file_reader.onload = function(event) {

                    file_raw_data = event.target.result;
                    conn.send(file_raw_data);
                }

                file_reader.readAsArrayBuffer(file_element);
            }
    </script>
@endsection
