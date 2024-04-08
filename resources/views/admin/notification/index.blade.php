@extends('layouts.app', [
    'title' => 'Topside Facilities Management - customer',
])
@section('page_style')
<style>
.card.unread {
    border-left: 3px solid red; /* Red border for unread notifications */
    position: relative;
}

.card.unread::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 10px;
    height: 10px;
    background-color: red; /* Red bullet */
    border-radius: 50%; /* Shape it into a circle */
    transform: translate(-50%, -50%);
}
.open-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    color: #007bff; /* Button color */
}

.open-btn:hover {
    color: #0056b3; /* Hover color */
}

.notification-time {
        color: #2dadfe; /* You can change the color to your preference */
        font-weight: bold; /* Optional: You can adjust the font weight */
    }


     .open-btn {
        display: flex;
        align-items: center; /* Center vertically */
        justify-content: center; /* Center horizontally */
        height: 100%; /* Ensure button takes full height of parent */
    }
</style>
@endsection
@section('content')
    <!-- dashboard screen start -->
    @include('admin.aside_menu')

    <div class="main-content app-content">

        <!-- Header section start -->
        <div class="top-header">
            <div class="left-content">
                <div class="sidemenu-toggle">
                    <a href="javascript:void(0)" id="menu-toggle">
                        <svg width="46" height="46" viewBox="0 0 46 46" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect x="1" y="1" width="44" height="44" rx="9" fill="#4DA6FF"
                                fill-opacity="0.15" stroke="#4DA6FF" stroke-width="2"></rect>
                            <rect x="13" y="14" width="10" height="3" rx="1.5" fill="#4DA6FF"></rect>
                            <rect x="13" y="21" width="20" height="3" rx="1.5" fill="#4DA6FF"></rect>
                            <rect x="23" y="28" width="10" height="3" rx="1.5" fill="#4DA6FF"></rect>
                        </svg>
                    </a>
                </div>
                <div class="title-header ms-4">
                    <h2>Notifications List</h2>
                </div>
            </div>
            <div class="right-content">
                {{-- <form class="search-property position-relative me-3" action="" id="">
                    <input type="text" id="search-property-input" placeholder="Search Property..."
                        class="form-control" />
                    <span class="search-svg"><img src="{{ URL::asset('img/home/search.svg') }}"></span>
                </form> --}}
                <div class="action-button">
                    <a href="{{ route('admin.notifications.index') }}" class="me-2 position-relative">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
                            <rect width="48" height="48" rx="10" fill="#389BFE" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M24.5 29.8476C30.1392 29.8476 32.7481 29.1242 33 26.2205C33 23.3188 31.1812 23.5054 31.1812 19.9451C31.1812 17.1641 28.5452 14 24.5 14C20.4548 14 17.8188 17.1641 17.8188 19.9451C17.8188 23.5054 16 23.3188 16 26.2205C16.253 29.1352 18.8618 29.8476 24.5 29.8476Z"
                                stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path opacity="0.4" d="M26.8889 32.8574C25.5247 34.3721 23.3967 34.3901 22.0195 32.8574"
                                stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="badge bg-danger rounded-circle position-absolute top-0 start-100 translate-middle">{{ $notificationCount }}</span>
                    </a>
                    <a href="{{ route('admin.profile.index') }}">
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
       <!-- Add notification section start  -->
        <div class="nottification-section py-lg-5 py-3">
            <div class="container px-0">
                <div class="row">
                    @foreach ($notifications as $notification)
                        <div class="col-lg-12">
                            <div class="card mb-3 {{ is_null($notification->read_at) ? 'unread' : '' }}">
                                <div class="card-body">
                                    <!-- Display notification content here -->
                                    {{-- <h5 class="card-title">{{ $notification->data['sender_id'] }}</h5> --}}
                                    <p class="card-text">{{ $notification->data['message'] }}</p>
                                    <!-- Open button -->
                                     <p class="notification-time">
                                        @if($notification->created_at->diffInDays() > 1)
                                            {{ $notification->created_at->format('jS F') }} <!-- Display date -->
                                        @else
                                            {{ $notification->created_at->diffForHumans() }} <!-- Display relative time -->
                                        @endif
                                    </p>
                                    <a href="#" class="open-btn" data-notification-id="{{ $notification->id }}"><i class="fas fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Add notification section end  -->
        </div>
    <!-- dashboard screen end -->
@endsection
@section('page_scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.open-btn').on('click', function(e) {
                e.preventDefault();
                var notificationId = $(this).data('notification-id');
                // Send AJAX request to mark notification as read
                $.ajax({
                    url: '{{ route('admin.mark.notification') }}',
                    method: 'POST',
                    data: {
                        notification_id: notificationId,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        console.log(response.redirect_to);
                        // Redirect to the desired page
                        window.location.href = response.redirect_to;
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
</script>
@endsection