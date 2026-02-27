<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style2.css') }}">
    <title>Perpustakaan</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-edu-meeting.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
    <!--


TemplateMo 569 Edu Meeting

https://templatemo.com/tm-569-edu-meeting-->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-J2G4XHSNR4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-J2G4XHSNR4');
    </script>
</head>

<body>

    <style>
        .alert-success-auto {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.9);

            width: 500px;
            max-width: 90%;
            padding: 35px 30px;

            background: linear-gradient(135deg, #16a34a, #22c55e);
            color: white;
            font-size: 20px;
            font-weight: 500;
            text-align: center;

            border-radius: 20px;
            backdrop-filter: blur(15px);
            box-shadow:
                0 20px 50px rgba(0, 0, 0, 0.35),
                0 0 25px rgba(34, 197, 94, 0.6);

            z-index: 9999;
            opacity: 0;
            animation: smoothPop 0.4s ease forwards;
        }

        /* Icon Style */
        .alert-success-auto::before {
            content: "✔";
            display: block;
            font-size: 45px;
            margin-bottom: 15px;
            font-weight: bold;
        }

        /* Progress Bar */
        .alert-success-auto::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            height: 5px;
            width: 100%;
            background: rgba(255, 255, 255, 0.7);
            animation: progress 3s linear forwards;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
        }

        @keyframes smoothPop {
            to {
                opacity: 1;
                transform: translate(-50%, -50%) scale(1);
            }
        }

        @keyframes progress {
            from {
                width: 100%;
            }

            to {
                width: 0%;
            }
        }
    </style>

    <!-- ***** Header Area Start ***** -->
    @include('user.header')
    <!-- ***** Header Area End ***** -->

    <!-- aler -->
    @if(session('success'))
    <div class="alert-success-auto">
        <strong>Berhasil!</strong><br>
        {{ session('success') }}
    </div>
    @endif
    <!-- end alert -->

    <!-- ***** Main Banner Area Start ***** -->
    <section class="section main-banner" id="top" data-section="section1">
        <video autoplay muted loop id="bg-video">
            <source src="assets/images/course-video.mp4" type="video/mp4" />
        </video>
        @forelse ($heroinfo as $item)
        <div class="video-overlay header-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="caption">
                            <h6>{{ $item->pre_title }}</h6>
                            <h2>{{$item->judul}}</h2>
                            <p style="text-align: justify;">
                                {{$item->deskripsi}}
                            </p>

                            <div class="main-button-red">
                                <div class="submit">
                                    @guest
                                    <a href="{{ route('register') }}">
                                        Join Us Now!
                                    </a>
                                    @endguest
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class=" container">
            <p>No hero banner found.</p>
        </div>
        @endforelse

    </section>
    <!-- ***** Main Banner Area End ***** -->

    <section class="services">
        <div class="container">
            <div class="row">
                @if($card1->count() > 0)
                <div class="col-lg-12">
                    <div class="owl-service-item owl-carousel">

                        @foreach($card1 as $card)
                        <div class="item">
                            <div class="icon">
                                <img src="{{ asset('images/service/'.$card->gambar) }}" alt="">
                            </div>
                            <div class="down-content">
                                <h4>{{ $card->judul }}</h4>
                                <p>{{ $card->deskripsi }}</p>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>


    <section class="upcoming-meetings" id="meetings">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Books Title</h2>
                    </div>
                </div>

                <!-- card-database -->
                <div class="col-lg-12">
                    <div class="row g-4">
                        @isset($gambar)
                        @foreach($gambar as $g)
                        <div class="col-lg-4 col-md-6 col-sm-12 d-flex">
                            <div class="meeting-item w-100">
                                <div class="thumb">
                                    <a href="meeting-details.html">
                                        <img src="{{ asset('data_file/' . $g->foto) }}"

                                            class="card-img-top object-fit-cover"
                                            style="height:230px"
                                            alt="img">
                                    </a>
                                </div>

                                <div class="down-content">
                                    <a href="meeting-details.html">
                                        <h4>{{ $g->judul }}</h4>
                                    </a>
                                    <p>{{ $g->penulis }}</p>
                                    <!-- <a href="{{url('/tambah/add')}}">
                                        <button class="btn btn-primary">Tambah Buku</button></a> -->

                                    @auth
                                    <a href="{{ route('peminjaman.create', $g->id) }}">
                                        <button class="btn btn-success">
                                            Pinjam Buku
                                        </button>
                                    </a>
                                    @else
                                    <a href="{{ route('login') }}">
                                        <button class="btn btn-secondary">
                                            Anda Belum Login
                                        </button>
                                    </a>
                                    @endauth

                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="our-courses" id="courses">
        <div class="container">
            <div class="row">

                {{-- BERITA PERPUSTAKAAN --}}
                <section class="section">
                    <div class="container">
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="section-heading">
                                    <h2>Berita Perpustakaan</h2>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                @if($berita->count())
                                <div class="owl-courses-item owl-carousel">
                                    @foreach ($berita as $item)
                                    <div class="item">
                                        <img src="{{ $item->gambar
                                    ? asset('data_file/'.$item->gambar)
                                    : asset('images/no-image.png') }}"
                                            alt="{{ $item->judul }}">

                                        <div class="down-content">
                                            <h4>{{ $item->judul }}</h4>

                                            <div class="info">
                                                <div class="row">

                                                    <div class="col-4">
                                                        <span>{{ ucfirst($item->kategori) }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @else
                                <p class="text-center">Belum ada berita.</p>
                                @endif
                            </div>

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>

    {{-- JADWAL --}}

    <section class="section" style="background-color: #1f2937; color: #f9fafb;">
        <div class="container">
            <h2 class="text-center mb-4" style="color:#f9fafb;">Jadwal Operasional</h2>

            <div class="row justify-content-center">
                @forelse ($jadwal as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card h-100 text-center" style="background-color: yellow; color:black; border:none; border-radius:8px; box-shadow:0 4px 6px rgba(0,0,0,0.3);">
                        <div class="card-body">
                            <h5 class="card-title text-capitalize">{{ $item->hari }}</h5>
                            <p class="card-text"><strong>Jam Buka:</strong> {{ $item->jam }}</p>
                            <!-- <p class="card-text"><strong>Kegiatan:</strong> {{ $item->keterangan }}</p> -->
                            <p class="card-text"><strong>Jam Tutup:</strong>{{$item->tutup}}</p>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        Belum ada jadwal
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="contact-us" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 align-self-center">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2>Let's get in touch</h2>
                                </div>

                                <form action="{{route('form-store')}}" id="contact" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <fieldset>
                                                <input name="nama" type="text" id="name" placeholder="YOURNAME...*" required="">
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-4">
                                            <fieldset>
                                                <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="YOUR EMAIL..." required="">
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-4">
                                            <fieldset>
                                                <input name="subject" type="text" id="subject" placeholder="SUBJECT...*" required="">
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-12">
                                            <fieldset>
                                                <textarea name="message" type="text" class="form-control" id="message" placeholder="YOUR MESSAGE..." required=""></textarea>
                                            </fieldset>
                                        </div>

                                        <div class="captcha mb-2">
                                            <span id="captcha-img"><img src="{{ route('captcha', ['config' => 'flat']) }}" id="captchaImage"></span>

                                            <style>
                                                img {
                                                    width: 200px;
                                                    /* lebar baru */
                                                    height: 36px;
                                                    /* tinggi baru */
                                                    object-fit: contain;
                                                    /* supaya proporsional */
                                                }
                                            </style>

                                        </div>

                                        <input type="text" name="captcha" class="form-control mt-2" placeholder="Masukkan captcha" required>

                                        @error('captcha')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror

                                        <div class="col-lg-12">
                                            <fieldset>
                                                <button type="submit" id="form-submit" class="button">SEND MESSAGE NOW</button>
                                            </fieldset>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('user.contact-user.create-contact')

        @include('user.footer')
    </section>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->

    <script>
        function refreshCaptcha() {
            fetch('/refresh-captcha')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('captcha-img').innerHTML = data.captcha;
                });
        }

        setInterval(refreshCaptcha, 120000); // 60 detik
    </script>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/video.js"></script>
    <script src="assets/js/slick-slider.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
            var
                direction = section.replace(/#/, ''),
                reqSection = $('.section').filter('[data-section="' + direction + '"]'),
                reqSectionPos = reqSection.offset().top - 0;

            if (isAnimate) {
                $('body, html').animate({
                        scrollTop: reqSectionPos
                    },
                    800);
            } else {
                $('body, html').scrollTop(reqSectionPos);
            }

        };

        var checkSection = function checkSection() {
            $('.section').each(function() {
                var
                    $this = $(this),
                    topEdge = $this.offset().top - 80,
                    bottomEdge = topEdge + $this.height(),
                    wScroll = $(window).scrollTop();
                if (topEdge < wScroll && bottomEdge > wScroll) {
                    var
                        currentId = $this.data('section'),
                        reqLink = $('a').filter('[href*=\\#' + currentId + ']');
                    reqLink.closest('li').addClass('active').
                    siblings().removeClass('active');
                }
            });
        };

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function(e) {
            e.preventDefault();
            showSection($(this).attr('href'), true);
        });

        $(window).scroll(function() {
            checkSection();
        });


        setTimeout(function() {
            let alert = document.querySelector('.alert-success-auto');
            if (alert) {
                alert.style.display = 'none';
            }
        }, 2000);
    </script>


</body>

</body>

</html>