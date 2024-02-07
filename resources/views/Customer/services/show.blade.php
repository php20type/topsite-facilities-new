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
                                <h4>Topside Facilities Management</h4>
                                <h6>Last online 5 hours ago</h6>
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
                </div>
                <div class="body-chat-message-user">
                    <div class="chat-active">
                        <h4>08/11/2023 11:00 AM</h4>
                    </div>
                    <div class="message-user-left">
                        <div class="message-user-profile">
                            <img src="{{ URL::asset('img/logo/logo.svg') }}">
                        </div>
                        <div class="message-user-left-text">
                            <img src="{{ URL::asset('img/home/Group.png') }}" />
                            <p>Lorem ipsum dolor?</p>
                            <span class="time">4 days ago</span>
                        </div>
                    </div>
                    <div class="message-user-right">
                        <div class="message-user-profile">
                            <img src="{{ URL::asset('img/logo/logo.svg') }}">
                        </div>
                        <div class="message-user-right-text">
                            <p>Hey! Okay.</p>
                            <span class="time">4 days ago</span>
                        </div>
                    </div>
                    <div class="chat-status">
                        <h4><strong>Company</strong> Changed Status <strong>Done</strong></h4>
                    </div>
                </div>
                <div class="footer-chat-message-user">
                    <div class="message-user-send">
                        <div class="action-left-button">
                            <a href="#">
                                <i class="fa-light fa-image"></i>
                            </a>
                            <a href="#">
                                <i class="fa-light fa-plus"></i>
                            </a>
                        </div>
                        <input type="text" placeholder="Type a message here..." class="form-control">
                        <div class="action-right-button">
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <circle cx="12" cy="12" r="10.75" stroke="#707C97"
                                        stroke-opacity="0.5" stroke-width="2.5" />
                                    <path
                                        d="M7.63623 13.6367C8.45635 15.2574 10.1026 16.364 11.9999 16.364C13.8971 16.364 15.5434 15.2574 16.3635 13.6367"
                                        stroke="#707C97" stroke-opacity="0.5" stroke-width="2.5"
                                        stroke-linecap="round" />
                                    <circle cx="8.72714" cy="8.72763" r="1.09091" fill="#707C97"
                                        fill-opacity="0.5" />
                                    <circle cx="15.2725" cy="8.72763" r="1.09091" fill="#707C97"
                                        fill-opacity="0.5" />
                                </svg>
                            </a>
                            <a href="#">
                                <i class="fa-solid fa-paper-plane"></i>
                            </a>

                        </div>
                    </div>
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

        });
    </script>
@endsection
