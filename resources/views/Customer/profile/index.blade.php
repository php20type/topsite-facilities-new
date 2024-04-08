@extends('layouts.app', [
    'title' => 'Topside Facilities Management - property',
])
@section('content')
    <!-- dashboard screen start -->
    <aside class="app-sidebar">

        <div id="close"><a href="javascript:void(0)"><i class="fa-regular fa-xmark"></i></a></div>
        <div class="profile-header">
            <a href="{{ route('user.property.index') }}"><img src="{{ URL::asset('img/logo/logo.svg') }}" alt="user" /></a>
        </div>
        <nav class="sidebar-nav">
            <ul class="list-inline">
                <li class="">
                    <a href="{{ route('user.property.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <g clip-path="url(#clip0_103_1106)">
                                <path
                                    d="M10.0083 20.0004C6.93866 20.0004 3.87455 20.0004 0.804885 20.0004C0.249792 20.0004 0.00555093 19.7556 0.00555093 19.2049C0.00555093 15.5109 0.00555093 11.8224 0 8.12839C0 7.81684 0.111019 7.58875 0.35526 7.3996C3.38052 5.02408 6.40022 2.64856 9.41993 0.278597C9.88621 -0.0885794 10.1082 -0.0885794 10.5801 0.28416C13.5831 2.64856 16.5862 5.01295 19.6003 7.36622C19.8779 7.58319 20 7.82797 20 8.17846C19.9944 11.8502 19.9944 15.522 19.9944 19.1938C19.9944 19.7612 19.7558 20.006 19.1896 20.006C16.1255 20.0004 13.0669 20.0004 10.0083 20.0004ZM18.6622 18.6597C18.6622 18.5707 18.6622 18.4928 18.6622 18.4205C18.6622 15.1326 18.6622 11.8391 18.6678 8.5512C18.6678 8.3843 18.6123 8.28972 18.4846 8.18958C15.7036 6.00878 12.9281 3.82241 10.1582 1.63604C10.0361 1.5359 9.95837 1.54703 9.8418 1.6416C7.06078 3.83353 4.27977 6.0199 1.4932 8.20071C1.37663 8.28972 1.33222 8.37874 1.33222 8.52894C1.33777 11.8335 1.33777 15.1381 1.33777 18.4427C1.33777 18.515 1.33777 18.5874 1.33777 18.6597C2.90869 18.6597 4.44629 18.6597 6.00056 18.6597C6.00056 18.5651 6.00056 18.4872 6.00056 18.4038C6.00056 16.1061 6.00056 13.8085 6.00056 11.5109C6.00056 10.2369 6.89981 9.34118 8.17652 9.34118C9.39772 9.34118 10.6189 9.33562 11.8401 9.34118C12.0344 9.34118 12.2287 9.36344 12.4174 9.40794C13.3722 9.64716 13.9939 10.4594 13.9939 11.4719C13.9994 13.7807 13.9939 16.095 13.9939 18.4038C13.9939 18.4872 13.9939 18.5651 13.9939 18.6597C15.5537 18.6597 17.0969 18.6597 18.6622 18.6597ZM12.6672 18.6597C12.6672 18.5762 12.6672 18.515 12.6672 18.4538C12.6672 16.1451 12.6672 13.8308 12.6672 11.522C12.6672 10.9712 12.3675 10.6708 11.8179 10.6708C10.6134 10.6708 9.40328 10.6708 8.19872 10.6708C7.63253 10.6708 7.33833 10.9657 7.33833 11.5276C7.33833 13.8308 7.33833 16.1339 7.33833 18.4371C7.33833 18.5095 7.33833 18.5818 7.33833 18.6597C9.12018 18.6597 10.8798 18.6597 12.6672 18.6597Z"
                                    fill="#636363" />
                                <path
                                    d="M9.99726 6.00391C10.8577 6.00391 11.718 6.00391 12.5784 6.00391C13.0225 6.00391 13.3278 6.27094 13.3278 6.66594C13.3334 7.06093 13.0281 7.33909 12.5895 7.33909C10.8632 7.33909 9.13131 7.33909 7.40497 7.33909C6.96645 7.33909 6.66115 7.06093 6.6667 6.66594C6.67225 6.27094 6.972 6.00391 7.41608 6.00391C8.27647 6.00391 9.13686 6.00391 9.99726 6.00391Z"
                                    fill="#636363" />
                            </g>
                            <defs>
                                <clipPath id="clip0_103_1106">
                                    <rect width="20" height="20" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        My Properties
                    </a>
                </li>
                <li class="">
                   <a href="{{ route('user.property.create') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M12 5C12.5523 5 13 5.44772 13 6V11H18C18.5523 11 19 11.4477 19 12C19 12.5523 18.5523 13 18 13H13V18C13 18.5523 12.5523 19 12 19C11.4477 19 11 18.5523 11 18V13H6C5.44772 13 5 12.5523 5 12C5 11.4477 5.44772 11 6 11H11V6C11 5.44772 11.4477 5 12 5Z" fill="#636363"/>
                        </svg>
                        Add Property
                    </a>
                </li>
                <li class="">
                    <a href="javascript:void(0)"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <g clip-path="url(#clip0_103_1080)">
                                <path
                                    d="M20 1.409C19.9726 1.33072 19.9491 1.25245 19.9218 1.17417C19.7066 0.481409 19.0612 0 18.3376 0C15.2278 0 12.1181 0 9.01231 0C7.68628 0 6.68882 0.994129 6.681 2.31703C6.67317 3.55382 6.67709 4.79061 6.681 6.0274C6.681 6.33268 6.86093 6.56751 7.12692 6.64188C7.39291 6.71624 7.68628 6.61839 7.81927 6.37573C7.88968 6.24657 7.92097 6.07828 7.92488 5.92955C7.93271 4.7593 7.94836 3.58513 7.92097 2.41487C7.90533 1.67906 8.45295 1.23679 9.08272 1.24462C10.7295 1.26419 12.3763 1.25245 14.0192 1.25245C14.0778 1.25245 14.1365 1.25245 14.1952 1.25245C14.1991 1.26419 14.1991 1.27202 14.203 1.28376C13.7453 1.4364 13.2877 1.58513 12.83 1.7456C12.2159 1.96086 11.8365 2.39139 11.7035 3.02935C11.6722 3.182 11.6761 3.33855 11.6761 3.49511C11.6761 7.65558 11.6761 11.8121 11.6761 15.9726C11.6761 16.0548 11.6761 16.1409 11.6761 16.2427C11.6018 16.2466 11.5392 16.2544 11.4766 16.2544C10.663 16.2544 9.84939 16.2544 9.03578 16.2544C8.35907 16.2544 7.9288 15.8239 7.9288 15.1429C7.92489 13.9374 7.9288 12.7358 7.9288 11.5303C7.9288 11.0528 7.56502 10.7515 7.14257 10.8611C6.89222 10.9276 6.70447 11.1468 6.68491 11.4051C6.681 11.456 6.681 11.5108 6.681 11.5616C6.681 12.7593 6.67709 13.9569 6.681 15.1546C6.68491 16.5127 7.67845 17.499 9.03969 17.5029C9.84157 17.5029 10.6395 17.5029 11.4414 17.5029C11.5118 17.5029 11.5822 17.5029 11.68 17.5029C11.68 17.7378 11.68 17.9569 11.68 18.1761C11.68 19.1624 12.1142 19.7221 13.0647 19.9804C13.0765 19.9843 13.0843 19.9961 13.096 20.0039C13.2642 20.0039 13.4324 20.0039 13.6045 20.0039C13.7219 19.9687 13.8392 19.9335 13.9527 19.8943C15.5721 19.3581 17.1876 18.8219 18.807 18.2779C19.4328 18.0665 19.8318 17.6399 19.9765 16.9863C19.9804 16.9628 19.9961 16.9393 20.0078 16.9159C20 11.7456 20 6.57534 20 1.409ZM12.9239 10.8415C12.9239 8.37965 12.9239 5.92172 12.9239 3.45988C12.9239 3.10372 12.9982 3.00196 13.3307 2.88845C14.9149 2.36399 16.4991 1.83562 18.0794 1.30724C18.5097 1.16243 18.7483 1.33464 18.7483 1.78865C18.7483 6.70841 18.7483 11.6282 18.7483 16.5479C18.7483 16.8845 18.6661 16.998 18.3493 17.1037C17.7782 17.2955 17.2032 17.4873 16.6321 17.6751C15.5955 18.0196 14.5629 18.3679 13.5263 18.7084C13.1782 18.8219 12.9317 18.6419 12.9239 18.2779C12.9239 18.2192 12.9239 18.1605 12.9239 18.1018C12.9239 15.683 12.9239 13.2642 12.9239 10.8415Z"
                                    fill="#636363" />
                                <path
                                    d="M2.15131 9.37684C2.6872 9.37684 3.17615 9.37684 3.66119 9.37684C5.27277 9.37684 6.88826 9.37684 8.49984 9.37684C8.96141 9.37684 9.26651 8.98937 9.14134 8.57058C9.05919 8.29661 8.82059 8.12831 8.49984 8.12831C7.40068 8.12831 6.30152 8.12831 5.20236 8.12831C4.20099 8.12831 3.19962 8.12831 2.15131 8.12831C2.21781 8.05395 2.26084 8.00698 2.30778 7.96001C2.93363 7.33379 3.55949 6.70757 4.18143 6.08134C4.38875 5.87391 4.43177 5.60776 4.31834 5.3651C4.20881 5.13027 3.95847 4.9698 3.70031 5.01285C3.5634 5.03633 3.40694 5.10287 3.30915 5.20072C2.26084 6.23399 1.22035 7.27117 0.183779 8.31618C-0.0665636 8.56667 -0.0665636 8.9424 0.179867 9.19289C1.22035 10.2379 2.26866 11.2829 3.31697 12.324C3.57122 12.5745 3.95065 12.5667 4.19317 12.324C4.44351 12.0735 4.44351 11.6939 4.18534 11.4316C3.56731 10.8054 2.94537 10.187 2.32342 9.56471C2.2804 9.50991 2.23346 9.45903 2.15131 9.37684Z"
                                    fill="#636363" />
                            </g>
                            <defs>
                                <clipPath id="clip0_103_1080">
                                    <rect width="20" height="20" fill="white" transform="matrix(-1 0 0 1 20 0)" />
                                </clipPath>
                            </defs>
                        </svg>
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </nav>
    </aside>

    <div class="main-content app-content">
        <!-- Header section start -->
        <div class="top-header">
            <div class="left-content">
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
                <h2>Profile</h2>
            </div>
</div>
            <div class="right-content">
                {{-- <form class="search-property position-relative me-3" action="" id="">
                    <input type="text" placeholder="Search Property..." class="form-control" />
                    <span class="search-svg"><img src="{{ URL::asset('img/home/search.svg') }}"></span>
                </form> --}}
                <div class="action-button">
                    <a href="{{ route('customer.notifications.index') }}" class="me-3 position-relative">
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
                    <a href="{{ route('user.profile.index') }}">
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

              

        <!-- Add Profile section start  -->
        <section class="add-property-section">

            @if(session('success'))
                <div class="alert alert-primary alert-dismissible fade show mb-4" role="alert">
                    <strong>Success!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        
            {{ Form::open(['url' => route('user.profile.update'), 'method' => 'POST', 'files' => true, 'class' => 'PropertyForm']) }}
            @method('PUT')
                <div class="row">
                    @include('customer.profile.form')
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </div>
                </div>
            {{ Form::close() }}
        </section>
        <!-- Add Profile section end  -->

    </div>
@endsection
@section('page_scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.form-select').selectpicker();

            // Close all dropdowns with the 'form-select' class
            $('.form-select').selectpicker('toggle');

            $('#profile_picture').change(function(event) {
                var input = event.target;
                var reader = new FileReader();
                reader.onload = function() {
                    var dataURL = reader.result;
                    $('#profile_picture_preview').html('<img src="' + dataURL + '" alt="Profile Picture Preview" style="max-width: 100px; max-height: 100px;">');
                };
                reader.readAsDataURL(input.files[0]);
            });
        });
@endsection
