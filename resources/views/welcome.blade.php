<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>KostRush - Nganjuk</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />


    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('/asset/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/asset/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('/asset/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('/asset/css/style.css') }}" rel="stylesheet">
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="51">
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>x
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0" id="beranda">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="m-0">KostRush</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto py-0">
                        <a href="#beranda" class="nav-item nav-link active">Beranda</a>
                        <a href="#tentang" class="nav-item nav-link">Tentang</a>
                        <a href="#fitur" class="nav-item nav-link">Fitur</a>
                        {{-- <a href="#pricing" class="nav-item nav-link">Pricing</a>
                        <a href="#review" class="nav-item nav-link">Review</a> --}}
                        <a href="#tim" class="nav-item nav-link">Tim Pengembang</a>
                    </div>
                    <a href="{{ route('login') }}" class="btn btn-primary rounded-pill py-2 px-4 ms-3 d-none d-lg-block" id="loginButton">Masuk</a>
                </div>
            </nav>

            <div class="container-xxl bg-primary hero-header">
                <div class="container px-lg-5">
                    <div class="row g-5">
                        <div class="col-lg-8 text-center text-lg-start">
                            <h1 class="text-white mb-4 animated slideInDown">Solusi Kost Praktis dan Cepat</h1>
                            <h3 class="text-white mb-4 animated slideInDown">Temukan dan promosikan kost dengan mudah
                                dan cepat!</h3>
                            <p class="text-white pb-3 animated slideInDown">Platform kami membantu Anda mencari
                                kost,
                                mempromosikan kost, dan terhubung dengan calon penyewa.</p>
                        </div>
                        <div class="col-lg-4 d-flex justify-content-center justify-content-lg-end wow fadeInUp"
                            data-wow-delay="0.3s">
                            <div class="owl-carousel screenshot-carousel">
                                <img class="img-fluid" src="{{ asset('/asset/imgs/hero 1.jpg') }}" alt="">
                                <img class="img-fluid" src="{{ asset('/asset/imgs/hero 2.jpg') }}" alt="">
                                <img class="img-fluid" src="{{ asset('/asset/imgs/hero 3.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- About Start -->
        <div class="container-xxl py-5" id="tentang">
            <div class="container py-5 px-lg-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <h5 class="text-primary-gradient fw-medium">KostRush</h5>
                        <h2 class="mb-4">Solusi Tepat untuk Kebutuhan Kost di Kabupaten Nganjuk!</h2>
                        <p class="mb-3">Kostrush hadir sebagai aplikasi terintegrasi web dan mobile yang
                            menghubungkan calon penyewa kost dengan pemilik kost secara langsung di Kabupaten Nganjuk.
                        </p>
                        <p class="mb-3">Calon penyewa dapat dengan mudah mencari kost impian mereka dengan filter
                            lengkap berdasarkan lokasi dan harga. Kostrush juga menyediakan data yang akurat seperti
                            dokumentasi kost, informasi kost, dan informasi kontak pemilik kost.
                        </p>
                        <p class="mb-3">Pemilik kost dapat mempromosikan kost mereka dengan mudah dan gratis di
                            website Kostrush, menjangkau lebih banyak calon penyewa, dan mengelola pemesanan kost.
                        </p>
                        <p class="mb-2">Unduh Kostrush sekarang dan temukan kost impianmu di Kabupaten Nganjuk!
                        </p>
                        <a href=""
                            class="btn btn-unduh py-sm-2 px-3 px-sm-4 rounded-pill mt-3">Unduh Mobile App</a>
                    </div>
                    <div class="col-lg-6">
                        <img class="img-fluid wow fadeInUp" data-wow-delay="0.1s" style="margin-left: 180px; height: 500px"
                            src="{{ asset('/asset/imgs/hero 1.jpg') }}">
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Features Start -->
        <div class="container-xxl py-5" id="fitur">
            <div class="container py-5 px-lg-5">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    {{-- <h5 class="text-primary-gradient fw-medium">App Features</h5> --}}
                    <h2 class="mb-5">Fitur Mobile App</h2>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="feature-item  rounded p-4">
                            {{-- <div class="d-inline-flex align-items-center justify-content-center bg-primary-gradient rounded-circle mb-4"
                                style="width: 60px; height: 60px;">
                                <i class="fa fa-eye text-white fs-4"></i>
                            </div> --}}
                            <h5 class="mb-3 title">Filter Lokasi</h5>
                            <p class="m-0 text">Pencarian kost berdasarkan kecamatan di Kabupaten Nganjuk.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="feature-item  rounded p-4">
                            {{-- <div class="d-inline-flex align-items-center justify-content-center bg-secondary-gradient rounded-circle mb-4"
                                style="width: 60px; height: 60px;">
                                <i class="fa fa-layer-group text-white fs-4"></i>
                            </div> --}}
                            <h5 class="mb-3 title">Filter Harga</h5>
                            <p class="m-0 text">Pencarian kost berdasarkan harga termurah di Kabupaten Nganjuk.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="feature-item  rounded p-4">
                            {{-- <div class="d-inline-flex align-items-center justify-content-center bg-secondary-gradient rounded-circle mb-4"
                                style="width: 60px; height: 60px;">
                                <i class="fa fa-layer-group text-white fs-4"></i>
                            </div> --}}
                            <h5 class="mb-3 title">Kontak Pemilik</h5>
                            <p class="m-0 text">Kontak langsung dengan pemilik sehingga ada kemudahan komunikasi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Features End -->

        <!-- Features Start -->
        <div class="container-xxl py-5" id="">
            <div class="container py-5 px-lg-5">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    {{-- <h5 class="text-primary-gradient fw-medium">App Features</h5> --}}
                    <h2 class="mb-5">Fitur Web App</h2>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="feature-item rounded p-4">
                            {{-- <div class="d-inline-flex align-items-center justify-content-center bg-primary-gradient rounded-circle mb-4"
                                style="width: 60px; height: 60px;">
                                <i class="fa fa-eye text-white fs-4"></i>
                            </div> --}}
                            <h5 class="mb-3 title">Data Kost</h5>
                            <p class="m-0 text">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                                stet diam sed stet lorem.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="feature-item rounded p-4">
                            {{-- <div class="d-inline-flex align-items-center justify-content-center bg-secondary-gradient rounded-circle mb-4"
                                style="width: 60px; height: 60px;">
                                <i class="fa fa-layer-group text-white fs-4"></i>
                            </div> --}}
                            <h5 class="mb-3 title">Data Kamar</h5>
                            <p class="m-0 text">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                                stet diam sed stet lorem.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="feature-item rounded p-4">
                            {{-- <div class="d-inline-flex align-items-center justify-content-center bg-primary-gradient rounded-circle mb-4"
                                style="width: 60px; height: 60px;">
                                <i class="fa fa-eye text-white fs-4"></i>
                            </div> --}}
                            <h5 class="mb-3 title">Data Penghuni</h5>
                            <p class="m-0 text">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                                stet diam sed stet lorem.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="feature-item rounded p-4">
                            {{-- <div class="d-inline-flex align-items-center justify-content-center bg-primary-gradient rounded-circle mb-4"
                                style="width: 60px; height: 60px;">
                                <i class="fa fa-eye text-white fs-4"></i>
                            </div> --}}
                            <h5 class="mb-3 title">Data dan Riwayat Transaksi</h5>
                            <p class="m-0 text">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                                stet diam sed stet lorem.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="feature-item rounded p-4">
                            {{-- <div class="d-inline-flex align-items-center justify-content-center bg-primary-gradient rounded-circle mb-4"
                                style="width: 60px; height: 60px;">
                                <i class="fa fa-eye text-white fs-4"></i>
                            </div> --}}
                            <h5 class="mb-3 title">Notifikasi Pesanan Terbaru</h5>
                            <p class="m-0 text ">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                                stet diam sed stet lorem.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="feature-item rounded p-4">
                            {{-- <div class="d-inline-flex align-items-center justify-content-center bg-primary-gradient rounded-circle mb-4"
                                style="width: 60px; height: 60px;">
                                <i class="fa fa-eye text-white fs-4"></i>
                            </div> --}}
                            <h5 class="mb-3 title">Statistik dan Laporan</h5>
                            <p class="m-0 text">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                                stet diam sed stet lorem.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Features End -->

        <!-- Download Start -->
        {{-- <div class="container-xxl py-5">
            <div class="container py-5 px-lg-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <img class="img-fluid wow fadeInUp" data-wow-delay="0.1s" src="img/about.png">
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                        <h5 class="text-primary-gradient fw-medium">Download</h5>
                        <h1 class="mb-4">Download The Latest Version Of Our App</h1>
                        <p class="mb-4">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.
                            Clita erat ipsum et lorem et sit, sed stet no labore lorem sit clita duo justo eirmod magna
                            dolore erat amet</p>
                        <div class="row g-4">
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.5s">
                                <a href="" class="d-flex bg-primary-gradient rounded py-3 px-4">
                                    <i class="fab fa-apple fa-3x text-white flex-shrink-0"></i>
                                    <div class="ms-3">
                                        <p class="text-white mb-0">Available On</p>
                                        <h5 class="text-white mb-0">App Store</h5>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.7s">
                                <a href="" class="d-flex bg-secondary-gradient rounded py-3 px-4">
                                    <i class="fab fa-android fa-3x text-white flex-shrink-0"></i>
                                    <div class="ms-3">
                                        <p class="text-white mb-0">Available On</p>
                                        <h5 class="text-white mb-0">Play Store</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Download End -->

        <!-- Testimonial Start -->
        <div class="container-xxl py-5" id="tim">
            <div class="container py-5 px-lg-5">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    {{-- <h5 class="text-primary-gradient fw-medium">Testimonial</h5> --}}
                    <h2 class="mb-5">Tim Pengembang</h2>
                </div>
                <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                    <div class="testimonial-item rounded p-4">
                        <div class="d-flex align-items-center mb-4">
                            <img class="img-fluid bg-white rounded flex-shrink-0 p-1" src="img/testimonial-1.jpg"
                                style="width: 85px; height: 85px;">
                            <div class="ms-4">
                                <h5 class="mb-1">Wahyu Bagas Prasetyo</h5>
                                <p class="mb-1">E41220410</p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item rounded p-4">
                        <div class="d-flex align-items-center mb-4">
                            <img class="img-fluid bg-white rounded flex-shrink-0 p-1" src="img/testimonial-1.jpg"
                                style="width: 85px; height: 85px;">
                            <div class="ms-4">
                                <h5 class="mb-1">Laila Wulandari</h5>
                                <p class="mb-1">E41220418</p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item rounded p-4">
                        <div class="d-flex align-items-center mb-4">
                            <img class="img-fluid bg-white rounded flex-shrink-0 p-1" src="img/testimonial-1.jpg"
                                style="width: 85px; height: 85px;">
                            <div class="ms-4">
                                <h5 class="mb-1">Diva Nur Rohmawati</h5>
                                <p class="mb-1">E41220461</p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item rounded p-4">
                        <div class="d-flex align-items-center mb-4">
                            <img class="img-fluid bg-white rounded flex-shrink-0 p-1" src="img/testimonial-1.jpg"
                                style="width: 85px; height: 85px;">
                            <div class="ms-4">
                                <h5 class="mb-1">Zhada Mei Arsita</h5>
                                <p class="mb-1">E41220539</p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item rounded p-4">
                        <div class="d-flex align-items-center mb-4">
                            <img class="img-fluid bg-white rounded flex-shrink-0 p-1" src="img/testimonial-1.jpg"
                                style="width: 85px; height: 85px;">
                            <div class="ms-4">
                                <h5 class="mb-1">Amjad Nuril Azizatul R</h5>
                                <p class="mb-1">E41220571</p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item rounded p-4">
                        <div class="d-flex align-items-center mb-4">
                            <img class="img-fluid bg-white rounded flex-shrink-0 p-1" src="img/testimonial-1.jpg"
                                style="width: 85px; height: 85px;">
                            <div class="ms-4">
                                <h5 class="mb-1">Silvi Rahmawati</h5>
                                <p class="mb-1">E41220737</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->


        <!-- Contact Start -->
        {{-- <div class="container-xxl py-5" id="contact">
            <div class="container py-5 px-lg-5">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="text-primary-gradient fw-medium">Contact Us</h5>
                    <h1 class="mb-5">Get In Touch!</h1>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="wow fadeInUp" data-wow-delay="0.3s">
                            <p class="text-center mb-4">The contact form is currently inactive. Get a functional and
                                working contact form with Ajax & PHP in a few minutes. Just copy and paste the files,
                                add a little code and you're done. <a
                                    href="https://htmlcodex.com/contact-form">Download Now</a>.</p>
                            <form>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name"
                                                placeholder="Your Name">
                                            <label for="name">Your Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email"
                                                placeholder="Your Email">
                                            <label for="email">Your Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="subject"
                                                placeholder="Subject">
                                            <label for="subject">Subject</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                            <label for="message">Message</label>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button class="btn btn-primary-gradient rounded-pill py-3 px-5"
                                            type="submit">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Contact End -->


        <!-- Footer Start -->
        <div class="container-fluid bg-primary text-light footer wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5 px-lg-5">
            </div>
            <div class="container px-lg-5">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; 2024 Kelompok 4. All Rights Reserved.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/asset/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('/asset/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('/asset/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('/asset/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('/asset/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/asset/js/mainlp.js') }}"></script>
    <script>window.addEventListener('scroll', function() {
        var loginButton = document.getElementById('loginButton');
        var navbar = document.querySelector('.navbar');
        var scrollTop = window.scrollY;
    
        if (scrollTop > 50) { // Ubah 50 menjadi nilai scroll yang Anda inginkan
            navbar.classList.add('navbar-scrolled');
            loginButton.classList.add('btn-scrolled');
        } else {
            navbar.classList.remove('navbar-scrolled');
            loginButton.classList.remove('btn-scrolled');
        }
    });
</script>    
</body>

</html>
