@extends('layouts.frontend')
@section('content')
    <!-- Donation projects -->
    <section class="project-item  payment-2 py">
        <div class="container">
            <div class="col-12">
                @if(null !== Session::get('done'))
                <div class="row">
                    <div class="col-lg-7 col-12 order-1">
                        <div class="donor-message">
                            <h3 class="title">
                                <span>
                                    متبرعنا الكريم
                                </span>
                                <br>
                                <br>
                                تمت عملية إدخال البيانات بشكل كامل<br> سوف نقوم بالتواصل معك في اقرب وقت
                            </h3>
                            <p>

                            </p>
                        </div>
                    </div>
                </div>
                @else
                <div class="row">
                    <div class="col-lg-7 col-12 order-1">
                        <div class="donor-message">
                            <h3 class="title">
                                <span>
                                    متبرعنا الكريم
                                </span>
                                شكرا لمشاركتم
                            </h3>
                            <p>
                                من فضلك اختار طريقة التبرع :
                            </p>
                        </div>

                        <div class="project-item-details">
                            <div class="project-item-details-nav">
                                <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">

                                    <button class="nav-link active" id="m-2-tab" data-bs-toggle="tab" data-bs-target="#m-2"
                                        type="button" role="tab" aria-controls="m-2" aria-selected="false"> بطاقة
                                        الإئتمان </button>

                                    <button class="nav-link" id="m-3-tab" data-bs-toggle="tab" data-bs-target="#m-3"
                                        type="button" role="tab" aria-controls="m-3" aria-selected="false"> التبرع من
                                        المنزل </button>

                                    <button class="nav-link " id="m-1-tab" data-bs-toggle="tab" data-bs-target="#m-1"
                                        type="button" role="tab" aria-controls="m-1" aria-selected="true"> حوالة
                                        بنكية</button>

                                </div>
                            </div>

                            <div class="tab-content" id="nav-tabContent">
                                <!--  حوالة بنكية -->
                                <div class="tab-pane fade " id="m-1" role="tabpanel" aria-labelledby="m-1">
                                    <div class="project-item-details-content">
                                        <div class="project-item-details-content-item">
                                            <!-- <div class="title">تفاصيل أساسية </div> -->
                                            @foreach ($banks as $bank)
                                                <div class="body">
                                                    <div class="item">
                                                        <div class="category">
                                                            إسم البنك :
                                                        </div>
                                                        <div class="category-information">
                                                            {{ $bank->name }}
                                                        </div>
                                                    </div>
                                                    <div class="item">
                                                        <div class="category">
                                                            إسم فرع البنك :
                                                        </div>
                                                        <div class="category-information">
                                                            {{ $bank->branch }}
                                                        </div>
                                                    </div>
                                                    <div class="item">
                                                        <div class="category">
                                                            رقم الحساب الحالى :
                                                        </div>
                                                        <div class="category-information">
                                                            {{ $bank->account_number }}
                                                        </div>
                                                    </div>
                                                    <div class="item">
                                                        <div class="category">
                                                            رقم IBAN :
                                                        </div>
                                                        <div class="category-information">
                                                            {{ $bank->iban }}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>


                                    </div>
                                </div>
                                <!-- بطاقة الإئتمان -->
                                <div class="tab-pane fade show active " id="m-2" role="tabpanel" aria-labelledby="m-2">
                                    <div class="credit-card-method">
                                        <form action="" method="post" name="credit-card-method" method="POST"
                                            action="{{ route('frontend.payments.store') }}" enctype="multipart/form-data">
                                            @method('POST')
                                            @csrf
                                            <input type="hidden" name="amount" id="amount" value="{{ $amount ?? '00' }}">
                                            <input type="hidden" name="category_id" id="category_id" value="{{ $category->id ?? '00' }}">
                                            <input type="hidden" name="project_id" id="project_id"
                                                value="{{ $project?->id }}">
                                            <input type="hidden" name="" id="" value="">
                                            <div class="item user">
                                                <input type="text" class="form-control" placeholder="الإسم" name="donor"
                                                    id="donor" value="{{ old('donor', '') }}" required>
                                            </div>
                                            <div class="item phone">
                                                <input type="tel" class="form-control" placeholder="رقم التليفون"
                                                    name="phone_number" id="phone_number"
                                                    value="{{ old('phone_number', '') }}" required>
                                            </div>
                                            <div class="item email">
                                                <input type="text" class="form-control" placeholder="البريد الإلكترونى"
                                                    name="email" id="email" value="{{ old('email', '') }}" required>
                                            </div>
                                            <div class="credit-card-method-option">
                                                @foreach (App\Models\Payment::PAYMENT_METHOD_RADIO as $key => $label)
                                                    <div class="item">
                                                        <input type="radio" id="payment_method_{{ $key }}"
                                                            name="payment_method" value="{{ $key }}"
                                                            {{ old('payment_method', '') === (string) $key ? 'checked' : '' }} required>
                                                        <label
                                                            for="payment_method_{{ $key }}">{{ $label }}</label>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <div class="form-footer">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        إظهار التبرع

                                                    </label>
                                                </div>
                                                <button class="submit btn custom-btn">تبرع الأن</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- التبرع من المنزل -->
                                <div class="tab-pane fade " id="m-3" role="tabpanel" aria-labelledby="m-3">
                                    <div class="credit-card-method">
                                        <form action="" method="post" name="credit-card-method" method="POST"
                                            action="{{ route('frontend.payments.store') }}"
                                            enctype="multipart/form-data">
                                            @method('POST')
                                            @csrf
                                            <div class="item user">
                                                <input type="text" class="form-control" placeholder="الإسم" name="donor"
                                                    id="donor" value="{{ old('donor', '') }}">
                                            </div>
                                            <div class="item phone">
                                                <input type="tel" class="form-control" placeholder="رقم التليفون"
                                                    name="phone_number" id="phone_number"
                                                    value="{{ old('phone_number', '') }}" required>
                                            </div>
                                            <div class="item email">
                                                <input type="text" class="form-control" placeholder="البريد الإلكترونى"
                                                    name="email" id="email" value="{{ old('email', '') }}" required>
                                            </div>
                                            <div class="item address">
                                                <input type="text" class="form-control" placeholder="العنوان"
                                                    name="address" id="address" value="{{ old('address', '') }}" required>
                                            </div>

                                            <div class="form-footer">

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="show_my_name"
                                                        id="show_my_name" value="1"
                                                        {{ old('show_my_name', 0) == 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        إظهار التبرع

                                                    </label>
                                                </div>
                                                <button class="submit btn custom-btn">تبرع الأن</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12 offset-lg-1 order-0 order-lg-2 mb-5 mb-lg-0">
                        <div class="donations-summary">
                            <h4 class="title">
                                ملخص التبرع
                            </h4>
                            <div class="list">
                                @if (isset($project))
                                    <div class="item">
                                        <span class="add">إسم المشروع </span>
                                        <span class="result"> {{ $project->name }} </span>
                                    </div>
                                    <div class="item">
                                        <span class="add"> قيمة التبرع </span>
                                        <span class="result"> {{ $amount ?? '0' }} د.ع</span>
                                    </div>
                                @endif
                                @if (isset($category))
                                    <div class="item">
                                        <span class="add">الصنف </span>
                                        <span class="result"> {{ $category->name }} </span>
                                    </div>
                                    <div class="item">
                                        <span class="add"> قيمة التبرع </span>
                                        <span class="result"> {{ $amount ?? '0' }} د.ع</span>
                                    </div>
                                @endif
                                @if (isset($amount))
                                    <div class="item active">
                                        <span class="add"> الإجمالى </span>
                                        <span class="result"> {{ $amount ?? '0' }} د.ع</span>
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
    <!-- End Donation projects -->
@endsection
