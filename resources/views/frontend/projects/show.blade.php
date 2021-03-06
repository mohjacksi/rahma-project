@extends('layouts.frontend')
@section('content')
    <!-- Header -->
    <section class="top-banner">
        <div class="overlay">
            <ol class="breadcrumb custom-breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}"> الرئيسية </a></li>

                <li class="breadcrumb-item"><a href="{{ route('frontend.projects.index') }}"> المشاريع</a></li>
                <li class="breadcrumb-item"><a href="#">{{ $project->name }}</a></li>
            </ol>
        </div>
    </section>
    <!-- End Header -->
    <!-- Donation projects -->
    <section class="project-item project py">
        <div class="container">

            <div class="col-12 ">
                <div class="row  gx-5 mb-5">
                    <div class="col-lg-6 col-12 mb-4 mb-lg-0 ">

                        <div class="project-slider-container">

                            <div class="swiper project-slider">
                                <div class="swiper-wrapper">

                                    @if (isset($project->youtube))
                                        <div class="swiper-slide">
                                            <a class="slide-item">

                                                {{-- <iframe class="d-none" src="{{$project->youtube}}"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe> --}}
                                                <iframe width="420" height="315" src="{{ $project->youtube }}"
                                                    frameborder="0" allowfullscreen></iframe>

                                                {{-- <video controls id="welcomeVideo">
                                                <source src="/images/video/header.mp4" type="video/mp4">
                                            </video> --}}


                                            </a>
                                        </div>
                                    @endif
                                    @foreach ($project->images as $key => $media)
                                        <div class="swiper-slide">

                                            <a class="slide-item" href="{{ $media->getUrl() }}" data-toggle="lightbox"
                                                data-gallery="example-gallery">
                                                <img src="{{ $media->getUrl() }}" class="img-fluid w-100 d-block">
                                            </a>

                                        </div>
                                    @endforeach

                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-pagination"></div>
                            </div>

                        </div>

                    </div>
                    <div class="col-lg-5 col-12 ">
                        <div class="project-item-info">
                            <h3 class="custom-head">
                                {{ $project->name }}
                            </h3>
                            @php
                                $prec = ($project->paid / $project->value) * 100;

                            @endphp
                            <div class="relative position-relative" style="height: 40px">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: {{ $prec }}%;"
                                        aria-valuemin="0" aria-valuemax="100">
                                        <span style="right: calc({{ $prec }}% - 23px);">{{ $prec }}%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="project-item-info-sallery">
                                <div class="project-item-info-sallery-item">
                                    <span>قيمة المشروع</span>
                                    <span class="sa">{{ $project->value }} د.ع</span>
                                </div>
                                <div class="project-item-info-sallery-item">
                                    <span> المدفوع</span>
                                    <span class="sa">{{ $project->paid }} د.ع</span>
                                </div>
                                <div class="project-item-info-sallery-item">
                                    <span> المتبقى</span>
                                    <span class="sa">{{ $project->remain }} د.ع</span>
                                </div>
                            </div>
                            <form action="{{route('frontend.payments.index')}}" method="get">
                                <div class="custom-card-donation mb-0">
                                    <label for="donation55">قم بإدخال التبرع </label>

                                    <div class="d-flex custom-g-form justify-content-end">
                                        <div method="post" class="d-flex">
                                            <input class="form-control me-2 " name="amount" type="number"
                                                placeholder="0 " id="amount">
                                            <button class="btn btn-outline-success" type="submit">
                                                د.ع
                                            </button>
                                            <input type="hidden" name="project" id="project" value="{{$project?->id}}">
                                        </div>


                                    </div>
                                </div>
                                <button type="submit" class="btn custom-btn w-100 mt-4">تبرع الآن</a>
                            </form>
                        </div>

                    </div>

                </div>
                <div class="row">

                    <div class="col-12">
                        <div class="project-item-details">
                            <div class="project-item-details-nav">
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                        aria-selected="true">تفاصيل المشروع</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-profile" type="button" role="tab"
                                        aria-controls="nav-profile" aria-selected="false">أهمية المشروع</button>
                                </div>
                            </div>

                            <div class="tab-content" id="nav-tabContent">
                                <!-- تفاصيل المشروع -->
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                    aria-labelledby="nav-home-tab">
                                    <div class="project-item-details-content">
                                        <div class="project-item-details-content-item">
                                            <div class="title">تفاصيل المشروع </div>
                                            <div class="body">
                                                <div class="item">
                                                    <div class="category">
                                                        {{ trans('cruds.project.fields.category') }}
                                                    </div>
                                                    <div class="category-information">
                                                        {{ $project->category->name ?? '' }}
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="category">
                                                        {{ trans('cruds.project.fields.reference') }}
                                                    </div>
                                                    <div class="category-information">
                                                        {{ $project->reference }}
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="category">
                                                        {{ trans('cruds.project.fields.beneficiary') }}
                                                    </div>
                                                    <div class="category-information">
                                                        {{ $project->beneficiary }}
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="category">
                                                        {{ trans('cruds.project.fields.donors') }}
                                                    </div>
                                                    <div class="category-information">
                                                        <span>{{ $project->donors }}</span>
                                                        <div class="item-alert">
                                                            التفاصيل
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- أهمية المشروع -->
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                    aria-labelledby="nav-profile-tab">
                                    <div class="project-item-details-content-text">
                                        <div class="list">
                                            <div class="item">
                                                <span>
                                                    {!! $project->description !!}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="quote">
                                            <q>
                                                {{ $project->short_description }}
                                            </q>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <!-- End Donation projects -->
@endsection

@section('scripts')
    <script src="./js/jquery.3.6.0.min.js"></script>
    <script src="./js/all.min.js"></script>

    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/Lightbox.js"></script>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


    <script src="./js/main.js"></script>


    <script>
        var swiper = new Swiper(".project-slider", {

            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
            navigation: {
                nextEl: ".project-slider .swiper-button-next",
                prevEl: ".project-slider .swiper-button-prev",
            },


        });
    </script>
@endsection
