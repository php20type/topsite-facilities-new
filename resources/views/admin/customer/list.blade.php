@extends('layouts.app', [
    'title' => 'Topside Facilities Management - customer',
])

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
                    <h2>Customer List</h2>
                </div>
            </div>
            <div class="right-content">
                {{-- <form class="search-property position-relative me-3" action="" id="">
                    <input type="text" id="search-property-input" placeholder="Search Property..."
                        class="form-control" />
                    <span class="search-svg"><img src="{{ URL::asset('img/home/search.svg') }}"></span>
                </form> --}}
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

        <!-- Property section start  -->
        <section class="ts-property-section">
            <div class="container-fluid">
                <div class="table-responsive">
                    {{-- <div class="row mb-lg-4 mb-3">
                        <div class="col-lg-6">
                            <!-- <div class="search-client-sec">                                                                                                                                                                                                                                          <a href="#" class="btn outline-btn"><i class="fa-regular fa-arrows-rotate"></i></a>
                                                                                                                                                                                                                                                                     </div> -->
                        </div>
                        <div class="col-lg-6">
                            <div class="action-btn">
                                <a href="#" class="btn me-2 border-0">
                                    Customers <svg class="ms-2" xmlns="http://www.w3.org/2000/svg" width="14"
                                        height="14" viewBox="0 0 14 14" fill="none">
                                        <g clip-path="url(#clip0_189_143)">
                                            <path
                                                d="M8.36816 2.96224C8.49905 3.08911 8.67647 3.16037 8.86146 3.16037C9.04645 3.16037 9.22387 3.08911 9.35476 2.96224L10.0249 2.31186V11.5165C10.0249 11.6962 10.0984 11.8685 10.2294 11.9956C10.3603 12.1226 10.5378 12.194 10.723 12.194C10.9081 12.194 11.0857 12.1226 11.2166 11.9956C11.3475 11.8685 11.421 11.6962 11.421 11.5165V2.31186L12.0912 2.96224C12.1551 3.0288 12.2321 3.08219 12.3178 3.11921C12.4034 3.15624 12.4958 3.17615 12.5896 3.17776C12.6833 3.17936 12.7764 3.16263 12.8633 3.12856C12.9502 3.09448 13.0292 3.04377 13.0955 2.97943C13.1618 2.9151 13.214 2.83847 13.2491 2.75411C13.2843 2.66976 13.3015 2.5794 13.2998 2.48843C13.2982 2.39747 13.2777 2.30776 13.2395 2.22466C13.2014 2.14155 13.1464 2.06676 13.0778 2.00474L11.2163 0.19813C11.0854 0.071261 10.908 0 10.723 0C10.538 0 10.3606 0.071261 10.2297 0.19813L8.36816 2.00474C8.23744 2.13176 8.16401 2.30395 8.16401 2.48349C8.16401 2.66302 8.23744 2.83521 8.36816 2.96224ZM3.975 11.6881L4.64515 11.0378C4.70905 10.9712 4.78612 10.9178 4.87175 10.8808C4.95738 10.8438 5.04981 10.8238 5.14354 10.8222C5.23727 10.8206 5.33037 10.8374 5.4173 10.8714C5.50422 10.9055 5.58318 10.9562 5.64946 11.0206C5.71575 11.0849 5.76801 11.1615 5.80312 11.2459C5.83823 11.3302 5.85547 11.4206 5.85381 11.5116C5.85216 11.6025 5.83164 11.6922 5.79349 11.7753C5.75534 11.8584 5.70033 11.9332 5.63174 11.9953L3.77024 13.8019C3.63935 13.9287 3.46192 14 3.27694 14C3.09195 14 2.91452 13.9287 2.78364 13.8019L0.922129 11.9953C0.853545 11.9332 0.798536 11.8584 0.760382 11.7753C0.722229 11.6922 0.701714 11.6025 0.70006 11.5116C0.698406 11.4206 0.715648 11.3302 0.750757 11.2459C0.785866 11.1615 0.838122 11.0849 0.90441 11.0206C0.970697 10.9562 1.04966 10.9055 1.13658 10.8714C1.2235 10.8374 1.3166 10.8206 1.41033 10.8222C1.50406 10.8238 1.5965 10.8438 1.68213 10.8808C1.76775 10.9178 1.84482 10.9712 1.90873 11.0378L2.57887 11.6881V2.48349C2.57887 2.30381 2.65242 2.13149 2.78333 2.00444C2.91424 1.87739 3.0918 1.80601 3.27694 1.80601C3.46208 1.80601 3.63963 1.87739 3.77054 2.00444C3.90146 2.13149 3.975 2.30381 3.975 2.48349V11.6881Z"
                                                fill="black" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_189_143">
                                                <rect width="14" height="14" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                                <a href="#" class="btn border-0">
                                    Properties <svg class="ms-2" xmlns="http://www.w3.org/2000/svg" width="14"
                                        height="14" viewBox="0 0 14 14" fill="none">
                                        <g clip-path="url(#clip0_189_147)">
                                            <path
                                                d="M2.96224 5.63178C3.08911 5.50089 3.16037 5.32347 3.16037 5.13848C3.16037 4.95349 3.08911 4.77607 2.96224 4.64518L2.31186 3.97504L11.5165 3.97504C11.6962 3.97504 11.8685 3.90149 11.9956 3.77058C12.1226 3.63967 12.194 3.46211 12.194 3.27697C12.194 3.09183 12.1226 2.91428 11.9956 2.78336C11.8685 2.65245 11.6962 2.57891 11.5165 2.57891L2.31186 2.57891L2.96224 1.90876C3.0288 1.84486 3.08219 1.76779 3.11921 1.68216C3.15624 1.59653 3.17615 1.50409 3.17776 1.41037C3.17936 1.31664 3.16263 1.22353 3.12856 1.13661C3.09448 1.04969 3.04377 0.970733 2.97943 0.904446C2.9151 0.838158 2.83847 0.785901 2.75411 0.750792C2.66976 0.715683 2.5794 0.698441 2.48843 0.700095C2.39747 0.70175 2.30776 0.722264 2.22466 0.760418C2.14155 0.798571 2.06676 0.85358 2.00474 0.922164L0.19813 2.78367C0.0712605 2.91456 -4.46206e-07 3.09198 -4.3812e-07 3.27697C-4.30034e-07 3.46196 0.0712606 3.63938 0.19813 3.77027L2.00474 5.63178C2.13176 5.7625 2.30395 5.83593 2.48349 5.83593C2.66302 5.83593 2.83521 5.7625 2.96224 5.63178ZM11.6881 10.0249L11.0378 9.35479C10.9712 9.29089 10.9178 9.21382 10.8808 9.12819C10.8438 9.04256 10.8238 8.95013 10.8222 8.8564C10.8206 8.76267 10.8374 8.66956 10.8714 8.58264C10.9055 8.49572 10.9562 8.41676 11.0206 8.35047C11.0849 8.28419 11.1615 8.23193 11.2459 8.19682C11.3302 8.16171 11.4206 8.14447 11.5116 8.14612C11.6025 8.14778 11.6922 8.16829 11.7753 8.20645C11.8584 8.2446 11.9332 8.29961 11.9953 8.3682L13.8019 10.2297C13.9287 10.3606 14 10.538 14 10.723C14 10.908 13.9287 11.0854 13.8019 11.2163L11.9953 13.0778C11.9332 13.1464 11.8584 13.2014 11.7753 13.2396C11.6922 13.2777 11.6025 13.2982 11.5116 13.2999C11.4206 13.3015 11.3302 13.2843 11.2459 13.2492C11.1615 13.2141 11.0849 13.1618 11.0206 13.0955C10.9562 13.0292 10.9055 12.9503 10.8714 12.8634C10.8374 12.7764 10.8206 12.6833 10.8222 12.5896C10.8238 12.4959 10.8438 12.4034 10.8808 12.3178C10.9178 12.2322 10.9712 12.1551 11.0378 12.0912L11.6881 11.4211L2.48349 11.4211C2.30381 11.4211 2.13149 11.3475 2.00444 11.2166C1.87739 11.0857 1.80601 10.9081 1.80601 10.723C1.80601 10.5379 1.87739 10.3603 2.00444 10.2294C2.13149 10.0985 2.30381 10.0249 2.48349 10.0249L11.6881 10.0249Z"
                                                fill="black" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_189_147">
                                                <rect width="14" height="14" fill="white"
                                                    transform="translate(0 14) rotate(-90)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div> --}}
                    <table id="clients-management" class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Property(1)</th>
                                <th>Property(2)</th>
                                <th>Property(3)</th>
                                <th>Property(4)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <div class="profile-box">

                                            <div class="user-name">
                                                <a href="{{ route('admin.customer.show', ['customer' => $user->id]) }}">
                                                    {{ $user->name }}
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    @foreach (range(1, 4) as $propertyIndex)
                                        @php
                                            $property = $user->properties->get($propertyIndex - 1);
                                        @endphp

                                        @if ($property)
                                            <td>
                                                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="14"
                                                    height="14" viewBox="0 0 14 14" fill="none">
                                                    <circle cx="7" cy="7" r="7" fill="#38D06B" />
                                                </svg>
                                                {{ $property->name }}
                                            </td>
                                        @else
                                            <td>
                                                -
                                            </td>
                                        @endif
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- Property section end  -->

    </div>

    <!-- dashboard screen end -->
@endsection
@section('page_scripts')
    @parent
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            var dataTable = $('#clients-management').DataTable({
                select: false,
                columnDefs: [{
                    className: 'Name',
                    visible: false,
                    searchable: false
                }]
            });

            // Add keyup event listener to the search input
            document.getElementById('search-property-input').addEventListener('keyup', function() {
                dataTable.search($(this).val()).draw();
            });

        });
    </script>
@endsection
