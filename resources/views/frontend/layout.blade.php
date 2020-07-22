<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>Educenter</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{asset('home/plugins/bootstrap/bootstrap.min.css')}}">
  <!-- slick slider -->
  <link rel="stylesheet" href="{{asset('home/plugins/slick/slick.css')}}">
  <!-- themefy-icon -->
  <link rel="stylesheet" href="{{asset('home/plugins/themify-icons/themify-icons.css')}}">
  <!-- animation css -->
  <link rel="stylesheet" href="{{asset('home/plugins/animate/animate.css')}}">
  <!-- aos -->
  <link rel="stylesheet" href="{{asset('home/plugins/aos/aos.css')}}">
  <!-- venobox popup -->
  <link rel="stylesheet" href="{{asset('home/plugins/venobox/venobox.css')}}">

  <!-- Main Stylesheet -->
  <link href="{{asset('home/css/style.css')}}" rel="stylesheet">

  <!--Favicon-->
  <link rel="shortcut icon" href="{{asset('home/images/favicon.png')}}" type="image/x-icon">
  <link rel="icon" href="{{asset('home/images/favicon.png')}}" type="image/x-icon">

</head>

<body>
  <!-- preloader start -->
  <div class="preloader">
    <img src="{{asset('home/images/preloader.gif')}}" alt="preloader">
  </div>
  <!-- preloader end -->

<!-- header -->
<header class="fixed-top header">
  <!-- top header -->
  <div class="top-header py-2 bg-white">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-lg-4 text-center text-lg-left">
          <a class="text-color mr-3" href="callto:+443003030266"><strong>CALL</strong> +880 1788-670149</a>
          <ul class="list-inline d-inline">
            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="https://www.facebook.com/CDIP.info/"><i class="ti-facebook"></i></a></li>
            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="https://www.linkedin.com/company/center-for-development-of-it-professionals-cdip-uiu/"><i class="ti-linkedin"></i></a></li>
          </ul>
        </div>
        <div class="col-lg-8 text-center text-lg-right">
          <ul class="list-inline">
            {{-- <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="notice.html">notice</a></li>
            <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="research.html">research</a></li>
            <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="scholarship.html">SCHOLARSHIP</a></li> --}}
            <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="{{route('student.login')}}">login</a></li>
            {{-- data-toggle="modal" data-target="#loginModal" --}}
            <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="{{route('student.register')}}">register</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- navbar -->
  <div class="navigation w-100">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark p-0">
        <a class="navbar-brand" href="index.html"><img src="{{asset('home/images/logo.png')}}" alt="logo"></a>
        <button class="navbar-toggler rounded-0" type="button" data-toggle="collapse" data-target="#navigation"
          aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navigation">
          <ul class="navbar-nav ml-auto text-center">
            <li class="nav-item {{(Request::url() === 'http://localhost:8000') ? ' active':''}}">
              <a class="nav-link" href="{{route('landing-page')}}">Home</a>
            </li>
            <li class="nav-item {{(Request::url() === 'http://localhost:8000/about') ? ' active':''}}">
              <a class="nav-link" href="{{route('about')}}">About</a>
            </li>
            <li class="nav-item {{(Request::url() === 'http://localhost:8000/courses') ? ' active':''}}">
              <a class="nav-link" href="{{route('showAllCourse')}}">COURSES</a>
            </li>
            {{-- <li class="nav-item {{(Request::url() === 'http://localhost:8000/events') ? ' active':''}}"">
              <a class="nav-link" href="{{route('events')}}">EVENTS</a>
            </li> --}}
            <li class="nav-item {{(Request::url() === 'http://localhost:8000/blog') ? ' active':''}}"">
              <a class="nav-link" href="{{route('blog')}}">BLOG</a>
            </li>
            <li class="nav-item {{(Request::url() === 'http://localhost:8000/workshops') ? ' active':''}}"">
              <a class="nav-link" href="{{route('workshops')}}">Workshop</a>
            </li>
            {{-- <li class="nav-item dropdown view">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Pages
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="teacher.ahtmls">Teacher</a>
                <a class="dropdown-item" href="teacher-single.ahtmls">Teacher Single</a>
                <a class="dropdown-item" href="notice.ahtmls">Notice</a>
                <a class="dropdown-item" href="notice-single.ahtmls">Notice Details</a>
                <a class="dropdown-item" href="research.ahtmls">Research</a>
                <a class="dropdown-item" href="scholarship.ahtmls">Scholarship</a>
                <a class="dropdown-item" href="course-single.ahtmls">Course Details</a>
                <a class="dropdown-item" href="event-single.ahtmls">Event Details</a>
                <a class="dropdown-item" href="blog-single.ahtmls">Blog Details</a>
              </div>
            </li> --}}
            <li class="nav-item {{(Request::url() === 'http://localhost:8000/contact') ? ' active':''}}">
              <a class="nav-link" href="{{route('contact')}}">CONTACT</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
</header>
<!-- /header -->


@yield('title-section')

@yield('content')

  <!-- /courses -->
  
  <!-- footer -->
  <footer>
    <!-- newsletter -->
    <div class="newsletter">
      <div class="container">
        <div class="row">
          <div class="col-md-9 ml-auto bg-primary py-5 newsletter-block">
            <h3 class="text-white">Subscribe Now</h3>
            <form action="#">
              <div class="input-wrapper">
                <input type="email" class="form-control border-0" id="newsletter" name="newsletter" placeholder="Enter Your Email...">
                <button type="submit" value="send" class="btn btn-primary">Join</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- footer content -->
    <div class="footer bg-footer section border-bottom">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-sm-8 mb-5 mb-lg-0">
            <!-- logo -->
            <a class="logo-footer" href="index.html"><img class="img-fluid mb-4" src="{{asset('home/images/logo.png')}}" alt="logo"></a>
            <ul class="list-unstyled">
              <li class="mb-2">23621 15 Mile Rd #C104, Clinton MI, 48035, New York, USA</li>
              <li class="mb-2">+1 (2) 345 6789</li>
              <li class="mb-2">+1 (2) 345 6789</li>
              <li class="mb-2">contact@yourdomain.com</li>
            </ul>
          </div>
          <!-- company -->
          <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-5 mb-md-0">
            <h4 class="text-white mb-5">COMPANY</h4>
            <ul class="list-unstyled">
              <li class="mb-3"><a class="text-color" href="{{route('about')}}">About Us</a></li>
              <li class="mb-3"><a class="text-color" href="{{route('teachers')}}">Our Teacher</a></li>
              <li class="mb-3"><a class="text-color" href="{{route('contact')}}">Contact</a></li>
              <li class="mb-3"><a class="text-color" href="{{route('blog')}}">Blog</a></li>
            </ul>
          </div>
          <!-- links -->
          <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-5 mb-md-0">
            <h4 class="text-white mb-5">LINKS</h4>
            <ul class="list-unstyled">
              <li class="mb-3"><a class="text-color" href="{{route('contact')}}">Courses</a></li>
              <li class="mb-3"><a class="text-color" href="{{route('contact')}}">Workshops</a></li>
              <li class="mb-3"><a class="text-color" href="#">Gallary</a></li>
              <li class="mb-3"><a class="text-color" href="#">FAQs</a></li>
            </ul>
          </div>
          <!-- support -->
          <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-5 mb-md-0">
            <h4 class="text-white mb-5">SUPPORT</h4>
            <ul class="list-unstyled">
              <li class="mb-3"><a class="text-color" href="#">Forums</a></li>
              <li class="mb-3"><a class="text-color" href="#">Documentation</a></li>
              <li class="mb-3"><a class="text-color" href="#">Language</a></li>
              <li class="mb-3"><a class="text-color" href="#">Release Status</a></li>
            </ul>
          </div>
          <!-- support -->
          <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-5 mb-md-0">
            <h4 class="text-white mb-5">Thankful To</h4>
            <ul class="list-unstyled">
              <li class="mb-3"><a class="text-color" href="https://www.php.net/">PHP</a></li>
              <li class="mb-3"><a class="text-color" href="https://laravel.comphp">Laravel</a></li>
              <li class="mb-3"><a class="text-color" href="https://www.mysql.com/">MySQL</a></li>
              <li class="mb-3"><a class="text-color" href="https://www.github.com/">Github</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- copyright -->
    <div class="copyright py-4 bg-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-7 text-sm-left text-center">
            <p class="mb-0">Copyright
              <script>
                var CurrentYear = new Date().getFullYear()
                document.write(CurrentYear)
              </script> 
              © themefisher</p>
          </div>
          <div class="col-sm-5 text-sm-right text-center">
            <ul class="list-inline">
              <li class="list-inline-item"><a class="d-inline-block p-2" href="#"><i class="ti-facebook text-primary"></i></a></li>
              <li class="list-inline-item"><a class="d-inline-block p-2" href="#"><i class="ti-twitter-alt text-primary"></i></a></li>
              <li class="list-inline-item"><a class="d-inline-block p-2" href="#"><i class="ti-linkedin text-primary"></i></a></li>
              <li class="list-inline-item"><a class="d-inline-block p-2" href="#"><i class="ti-instagram text-primary"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- /footer -->

<!-- jQuery -->
<script src="{{asset('home/plugins/jQuery/jquery.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{asset('home/plugins/bootstrap/bootstrap.min.js')}}"></script>
<!-- slick slider -->
<script src="{{asset('home/plugins/slick/slick.min.js')}}"></script>
<!-- aos -->
<script src="{{asset('home/plugins/aos/aos.js')}}"></script>
<!-- venobox popup -->
<script src="{{asset('home/plugins/venobox/venobox.min.js')}}"></script>
<!-- filter -->
<script src="{{asset('home/plugins/filterizr/jquery.filterizr.min.js')}}"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
<script src="{{asset('home/plugins/google-map/gmap.js')}}"></script>

<!-- Main Script -->
<script src="{{asset('home/js/script.js')}}"></script>

</body>
</html>