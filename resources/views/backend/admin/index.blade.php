@extends('backend.admin.layouts.app')
<style>
    .main-box {
        height: 120px;
        margin-left: 25px;
        margin-bottom: 50px !important;
    }
</style>
@section('content')
    <div class="container mt-3">
        <div class="row ms-3">

            {{-- blog --}}
            <div class="col-md-3 shadow p-4 main-box">
                <div class="row">
                    <div class="col-md-4 pb-3">
                        <img src="{{ asset('adminicon/blog.png') }}" alt="Hello" width="50px" height="50">
                    </div>
                    <div class="col-md-7 ms-3">
                        <div class="pt-2">
                            <h6 class="fw-bold fs-5" style="">Total Blog</h6>
                        </div>
                        <div>
                            <span>{{ $blogs ?? '0' }}</span>
                            <a href="{{ url('admin/all-blogs') }}" class="btn btn-success ms-2 py-0 ">View</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- FAQS --}}
            <div class="col-md-3 shadow p-4 main-box">
                <div class="row">
                    <div class="col-md-4 pb-3">
                        <img src="{{ asset('adminicon/faqs.png') }}" alt="Hello" width="70px" height="70">
                    </div>
                    <div class="col-md-7 ms-3">
                        <div class="pt-2">
                            <h6 class="fw-bold fs-5">FAQS Total</h6>
                        </div>
                        <div>
                            <span>{{ $faqs ?? '' }}</span>
                            <a href="{{ url('admin/showfaqs') }}" class="btn btn-success ms-2 py-0 ">View</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Plans --}}
            <div class="col-md-3 shadow p-4 main-box">
                <div class="row">
                    <div class="col-md-4 pb-3">
                        <img src="{{ asset('adminicon/Pricing.png') }}" alt="Hello" width="70px" height="70">
                    </div>
                    <div class="col-md-7 ms-2">
                        <div class="pt-2">
                            <h6 class="fw-bold fs-5">Total Plans</h6>
                        </div>
                        <div>
                            <span>{{ $subs ?? '0' }}</span>
                            <a href="{{ url('admin/showpricing') }}" class="btn btn-success ms-2 py-0 ">View</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Edit Privacy --}}
            <div class="col-md-3 shadow-lg p-4 main-box">
                <div class="row">
                    <div class="col-md-4 pb-3">
                        <img src="{{ asset('adminicon/privacy.png') }}" alt="Hello" width="70px" height="70">
                    </div>
                    <div class="col-md-7 ms-3">
                        <div class="pt-2">
                            <h6 class="fw-bold fs-5">Edit Privacy</h6>
                        </div>
                        <div>
                            <a href="{{ url('admin/privacy') }}" class="btn btn-success ms-3 py-0 ">View</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Help Query --}}
            <div class="col-md-3 shadow p-4 main-box">
                <div class="row">
                    <div class="col-md-4 pb-3">
                        <img src="{{ asset('adminicon/help.png') }}" alt="Hello" width="70px" height="70">
                    </div>
                    <div class="col-md-7 ms-3">
                        <div class="pt-2">
                            <h6 class="fw-bold fs-5">Help Query</h6>
                        </div>
                        <div>
                            <span>{{ $help ?? '0' }}</span>
                            <a href="{{ url('admin/helpquestion') }}" class="btn btn-success ms-2 py-0 ">View</a>
                        </div>
                    </div>
                </div>
            </div>


            {{-- Edit About --}}
            <div class="col-md-3 shadow p-4 main-box">
                <div class="row">
                    <div class="col-md-4 pb-3">
                        <img src="{{ asset('adminicon/about.png') }}" alt="Hello" width="70px" height="70">
                    </div>
                    <div class="col-md-7 ms-3">
                        <div class="pt-2">
                            <h6 class="fw-bold fs-5">Edit About</h6>
                        </div>
                        <div>
                            <a href="{{ url('admin/aboutus') }}" class="btn btn-success ms-3 py-0 ">View</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Market Post --}}
            <div class="col-md-3 shadow p-4 main-box">
                <div class="row">
                    <div class="col-md-4 pb-3">
                        <img src="{{ asset('adminicon/feature.png') }}" alt="Hello" width="70px" height="70">
                    </div>
                    <div class="col-md-7 ms-3">
                        <div class="pt-2">
                            <h6 class="fw-bold fs-5">Market Post</h6>
                        </div>
                        <div>
                            <a href="{{ url('admin/feature') }}" class="btn btn-success ms-3 py-0 ">View</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Report Post --}}
            <div class="col-md-3 shadow p-4 main-box">
                <div class="row">
                    <div class="col-md-4 pb-3">
                        <img src="{{ asset('adminicon/reports.png') }}" alt="Hello" width="70px" height="70">
                    </div>
                    <div class="col-md-7 ms-3">
                        <div class="pt-2">
                            <h6 class="fw-bold fs-5">Edit Report</h6>
                        </div>
                        <div>
                            <a href="{{ url('admin/conditions') }}" class="btn btn-success ms-3 py-0 ">View</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- veirification Post --}}
            <div class="col-md-3 shadow p-4 main-box">
                <div class="row">
                    <div class="col-md-4 pb-3">
                        <img src="{{ asset('adminicon/verification.png') }}" alt="Hello" width="70px"
                            height="70">
                    </div>
                    <div class="col-md-7 ">
                        <div class="pt-2">
                            <h6 class="fw-bold fs-5">Verification</h6>
                        </div>
                        <div>
                            <a href="{{ url('admin/underage') }}" class="btn btn-success ms-3 py-0 ">View</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Setting  --}}
            <div class="col-md-3 shadow p-4 main-box">
                <div class="row">
                    <div class="col-md-4 pb-3">
                        <img src="{{ asset('adminicon/setting.png') }}" alt="Hello" width="70px" height="70">
                    </div>
                    <div class="col-md-7 ">
                        <div class="pt-2">
                            <h6 class="fw-bold fs-5">Setting</h6>
                        </div>
                        <div>
                            <a href="{{ url('admin/adminsetting') }}" class="btn btn-success ms-2 py-0 px-2 ">View</a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
