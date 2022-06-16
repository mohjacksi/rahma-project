@extends('layouts.frontend')
@section('content')
    <!-- Header -->
    <section class="top-banner">
        <div class="overlay">
            <ol class="breadcrumb custom-breadcrumb">
                <li class="breadcrumb-item"><a href="/"> الرئيسية </a></li>

                <li class="breadcrumb-item"><a href="/contact-us"> اتصل بنا </a></li>
            </ol>
        </div>
    </section>
    <!-- End Header -->

    <!-- contact-us-section  -->
    <section class="project-item contact-us-section py">
        <div class="container">

            <div class="contact-area">

                <div class="donation-projects text-center">

                    <h3 class="custom-head">

                        أتصل

                        <span> بنا </span>
                    </h3>

                </div>
                <div class="row justify-content-between">

                    <div class="col-12 col-lg-8 mb-5 mb-lg-0">

                        <div class="contact-form-area">

                            <h4>يسعدنا تواصلك معنا . </h4>
                            @if (Session::has('done'))
                            <p>
                            تم إرسال رسالتك بنجاح
                            </p>
                            @endif
                            <form class="contact-form" method="POST" action="{{ route('frontend.contact-us.store') }}"
                                enctype="multipart/form-data">
                                @method('POST')
                                @csrf
                                <div class="item user">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="الإسم">
                                    @if ($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="item phone">
                                    <input type="tel" class="form-control" placeholder="رقم التليفون" name="phone"
                                        id="phone" value="{{ old('phone', '') }}" required>
                                    @if ($errors->has('phone'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('phone') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="item email">
                                    <input class="form-control" type="text" name="email" id="email" class="form-control"
                                        placeholder="البريد الإلكترونى" value="{{ old('email', '') }}" required>

                                    @if ($errors->has('email'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="item massage">
                                    <textarea class="form-control" name="details" id="details" placeholder="الرسالة.."
                                        required>{{ old('details') }}</textarea>
                                    @if ($errors->has('details'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('details') }}
                                        </div>
                                    @endif
                                </div>

                                <button class="submit btn custom-btn" type="submit">تواصل الان</button>

                            </form>

                        </div>

                    </div>
                    <div class="col-12 col-lg-3">


                        <div class="contact-info-area">

                            <div class="info-items">

                                <div class="info-item">

                                    <h4 class="item-title">تواصل معنا</h4>
                                    <p class="bold tel">⁦+964 750 212 0570</p>
                                    <h6><a href="mailto:info@rahma.com">info@rahma.com</a></h6>

                                </div>
                                <div class="info-item">

                                    <h4 class="item-title">العنوان</h4>
                                    <p>بغداد، حي الجامعة</p>

                                </div>
                                <div class="info-item">

                                    <h4 class="item-title">أيام العمل</h4>
                                    <p> السبت - الخميس : 6AM - 6PM <br>مغلق في عطلات الرسمية</p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- End contact-us-section -->
@endsection
