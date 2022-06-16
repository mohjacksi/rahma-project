<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ساهم معنا فى عمل الخير">
    <meta name="keywords" content="عمل الخير , خير ,  رحمة ,  الزكاة  , الصدقات">
    <title>رحمة | الرئيسية</title>

    <!-- Css Filse -->
    <link rel="icon" href="/images/logo.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar custom-navbar navbar-expand-lg">
        <div class="container">
            <!-- Rahma Logo -->
            <a class="navbar-brand" href="{{ route('frontend.home') }}">
                <img src="/images/logo.png" alt="rahma logo">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">

                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse m-auto navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/projects">المشاريع</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about-us">من نحن</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link contact-link" href="/contact-us"> اتصل بنا</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    @yield('content')
    <!-- Footer -->
    <footer class="footer py">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-12">
                    <div class="footer-item">
                        <div class="custom-title">السياسات</div>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <a href="#">
                                    <div class="custom-footer-link-item">
                                        سياسة الخصوصية
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-6 col-12">
                                <a href="#">
                                    <div class="custom-footer-link-item">
                                        سياسة وضوابط التبرع
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="footer-item">
                        <div class="custom-title">تواصل معنا</div>
                        <div class="row">
                            <div class="col-12">
                                <div class="social-parent">
                                    <a href="#">
                                        <div class="social-item">
                                            <i class="fab fa-facebook"></i>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="social-item">
                                            <i class="fab fa-instagram"></i>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="social-item">
                                            <i class="fab fa-youtube"></i>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="social-item">
                                            <i class="fab fa-twitter"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="footer-item">
                        <div class="custom-title"> وسائل الدفع</div>
                        <div class="row">
                            <div class="col-12">
                                <div class="payment-parent">
                                    <a href="#">
                                        <div class="payment-item">
                                            <img src="/images/method-1.png" alt="payment" class="w-100">
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="payment-item">
                                            <img src="/images/method-2.png" alt="payment" class="w-100">
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="payment-item">
                                            <img src="/images/method-3.png" alt="payment" class="w-100">
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="payment-item">
                                            <img src="/images/method-4.png" alt="payment" class="w-100">
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="payment-item">
                                            <img src="/images/method-5.png" alt="payment" class="w-100">
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="payment-item">
                                            <img src="/images/method-6.png" alt="payment" class="w-100">
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!-- Copyright -->
        <div class="copyright text-center m-0">
            كل الحقوق محفوظة <a href="#"><span>رحمة</span> </a> &copy;
        </div>
    </footer>
    <!-- End Footer -->

    <!-- Js Files -->

    <script src="/js/jquery.3.6.0.min.js"></script>
    <script src="/js/all.min.js"></script>

    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/Lightbox.js"></script>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


    <script src="/js/main.js"></script>
    @yield('scripts')
</body>

</html>
