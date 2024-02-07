@extends('layouts.app', [
    'title' => 'Topside Facilities Management - customer',
])

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
                        <div class="user-box-right-fix col-4">
                            <div class="edit-dots">
                                <a href="#" class="me-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19"
                                        viewBox="0 0 18 19" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M6.29354 19C4.63754 19 3.06354 18.334 1.86154 17.125C-0.526457 14.722 -0.624457 10.912 1.64254 8.631L9.02854 1.201C9.79754 0.427 10.8355 0 11.9505 0C13.1435 0 14.2775 0.479 15.1425 1.349C16.8635 3.08 16.9295 5.831 15.2885 7.481L7.89354 14.91C7.41454 15.393 6.76954 15.658 6.07754 15.658C5.34654 15.658 4.65354 15.366 4.12754 14.837C3.07454 13.776 3.04154 12.085 4.05454 11.065L10.8795 4.21C11.2695 3.818 11.9015 3.816 12.2935 4.206C12.6845 4.596 12.6865 5.229 12.2965 5.62L5.47254 12.476C5.23254 12.718 5.26554 13.145 5.54654 13.427C5.69254 13.574 5.88654 13.658 6.07754 13.658C6.18754 13.658 6.34554 13.631 6.47554 13.5L13.8705 6.071C14.7375 5.198 14.6725 3.713 13.7245 2.759C12.8175 1.847 11.2785 1.775 10.4465 2.611L3.06054 10.041C1.56654 11.544 1.66454 14.09 3.28054 15.715C4.10354 16.544 5.17354 17 6.29354 17C7.29454 17 8.22254 16.622 8.90454 15.936L16.2915 8.506C16.6805 8.115 17.3135 8.112 17.7055 8.502C18.0965 8.892 18.0985 9.524 17.7095 9.916L10.3225 17.346C9.26254 18.412 7.83154 19 6.29354 19Z"
                                            fill="#000723" />
                                    </svg>
                                </a>
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="4" height="18"
                                        viewBox="0 0 4 18" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M2 4C3.104 4 4 3.104 4 2C4 0.896 3.104 0 2 0C0.896 0 0 0.896 0 2C0 3.104 0.896 4 2 4ZM2 7C0.896 7 0 7.896 0 9C0 10.104 0.896 11 2 11C3.104 11 4 10.104 4 9C4 7.896 3.104 7 2 7ZM0 16C0 14.896 0.896 14 2 14C3.104 14 4 14.896 4 16C4 17.104 3.104 18 2 18C0.896 18 0 17.104 0 16Z"
                                            fill="#000723" />
                                    </svg>
                                </a>
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
    </script>
@endsection
