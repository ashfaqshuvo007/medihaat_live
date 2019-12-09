<div class="header bg-white sticky-top">
    <!-- Top Bar -->

    <div class="position-relative logo-bar-area" style="padding-bottom: 20px">
        <div class="">
            <div class="container">
                <div class="row no-gutters align-items-center">
                    <div class="col-lg-3 col-8">
                        <div class="d-flex">

                            <!-- Brand/Logo -->
                            <a class="navbar-brand w-100" href="{{ route('home') }}">
                                @php
                                    $generalsetting = \App\GeneralSetting::first();
                                @endphp
                                @if($generalsetting->logo != null)
                                    <img src="{{ asset($generalsetting->logo) }}" class="" alt="active shop">
                                @else
                                    <img src="{{ asset('frontend/images/logo/logo.png') }}" class="" alt="active shop">
                                @endif
                            </a>

                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar -->

</div>
