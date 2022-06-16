@extends('layouts.frontend')

@section('content')
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-12 p-0 order-2 order-lg-1">
                    <div class="header-desc">
                        <div class="container" style="--bs-gutter-x:.75rem">
                            <h2 class="header-head">
                                ساهم معنا فى
                                <span>عمل الخير </span>
                            </h2>
                            <p class="header-p">
                                من الجميل دخول السرور علي قلوب الغير فهو <br />
                                عمل انساني يجازي عليه
                            </p>
                            <a href="#quick-donation">
                                <button class="custom-btn btn">
                                    للمساهمة إضغط هنا
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12 p-0 order-1 order-lg-2">
                    <div class="header-image">
                        <img src="./images/header-img.png" class="w-100" alt="ساهم معنا في عمل الخير">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End Header -->
    <!-- Donation -->
    <section class="donation py" id="quick-donation">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 text-center">
                    <h3 class="custom-head">
                        التبرع
                        <span>السريع</span>
                    </h3>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="donation-img">
                        <img src="./images/3.jpg" alt="الزكاة والصدقات والكفارات" class="w-100">
                    </div>
                </div>
                <div class="col-lg-5 col-12">
                    <div class="donation-details">
                        <div class="custom-title">
                            الزكاة والصدقات والكفارات
                        </div>
                        <div class="custom-info-title">
                            الغرض من التبرع

                        </div>
                        <div class="donation-option">
                            <form action="" method="post" name="donation-options">
                                <div class="row">
                                    @foreach ($categories as $category)
                                        <div class="col-6">
                                            <div class="donation-options-item">
                                                <input type="radio" name="donation-options-item"
                                                    value="{{ $category->id }}" id="category_id">
                                                <label for="donation1">{{ $category->name }}</label>
                                            </div>

                                        </div>
                                    @endforeach

                                </div>
                                <div class="col-12">
                                    <div class="donation-number">
                                        <div class="row align-items-center justify-content-between">
                                            <div class="col-sm-6 col-12">
                                                <label for="donation-number-p" class="donation-number-p">قم بإدخال
                                                    التبرع</label>
                                            </div>
                                            <div class="col-sm-6 col-12 ">
                                                <div class="d-flex custom-g-form justify-content-end">
                                                    <form method="post" class="d-flex custom-g-form">
                                                        <input class="form-control me-2 " name="number-of-donation"
                                                            type="number" placeholder="0 " id="donation55">
                                                        <button class="btn btn-outline-success" type="submit">
                                                            د.ع
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">

                                    <button class="btn custom-btn w-100 mt-2">التبرع السريع</button>

                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- End Donation -->
    <!-- Donation projects -->
    <section class="donation-projects py">
        <div class="container">
            <div class="row text-center">

                <div class="col-lg-auto col-12">
                    <h3 class="custom-head">

                        مشاريع

                        <span> التبرع </span>
                    </h3>
                </div>



                <div class="col-12">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="item1" role="tabpanel" aria-labelledby="item1-tab">
                            <div class="row">
                                @forelse ($projects as $key => $project)
                                    @php
                                        $prec = ($project->paid / $project->value) * 100;
                                    @endphp
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="card custom-card">
                                            <img src="{{ $project->images->first()->getUrl() }}" class="card-img-top"
                                                alt="{{ $project->name }}">
                                            <div class="card-body">
                                                <a href="{{ route('frontend.projects.show', $project->id) }}">
                                                    <h5 class="card-title">
                                                        {{ $project->name }}
                                                    </h5>
                                                </a>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar"
                                                        style="width: {{ $prec }}%;" aria-valuemin="0"
                                                        aria-valuemax="100">
                                                        <span
                                                            style="right: calc({{ $prec }}% - 23px);">{{ $prec }}%</span>
                                                    </div>
                                                </div>

                                                <div class="card-details">
                                                    <div class="card-details-item">
                                                        <span>قيمة المشروع </span>
                                                        <span>{{ $project->value }}</span>
                                                    </div>
                                                    <div class="card-details-item">
                                                        <span> المدفوع </span>
                                                        <span>{{ $project->paid }}</span>
                                                    </div>
                                                    <div class="card-details-item">
                                                        <span> المتبقى </span>
                                                        <span>{{ $project->remain }}</span>
                                                    </div>
                                                </div>
                                                <div class="custom-card-donation">
                                                    <label for="donation55">قم بإدخال التبرع </label>
                                                    <form method="post" class="d-flex custom-g-form">
                                                        <input class="form-control me-2 " name="number-of-donation"
                                                            type="number" placeholder="0 " id="donation55">
                                                        <button class="btn btn-outline-success" type="submit">
                                                            د.ع
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary qu-btn">التبرع السريع
                                            </button>


                                        </div>
                                    </div>
                                @empty
                                    <p>لا توجد مشاريع </p>
                                @endforelse
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12">
                    <a href="{{ route('frontend.projects.index') }}" class="btn more-items  text-center">
                        المزيد
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>

            </div>
        </div>
    </section>
    <!-- End Donation projects -->
@endsection
