<!doctype html>
<html
{{-- style="background-color: rgb(1, 1, 19);color:aliceblue" --}}
id="html">
<head>
    <title>courses</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    <script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- CSS only -->
    <!-- CSS only -->
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body style="font-family: Open Sans, sans-serif"
{{-- style="background-color: rgb(3, 3, 15);color:aliceblue" --}}
>
    <section
    class="px-6 py-8"
    >
    <nav class="md:flex md:justify-between md:items-center " id="nav_header"
    {{-- style="background-color:rgb(15, 3, 3);color:aliceblue" --}}
    >
        <div>
            <a href="/Courses/public">
{{--                <img src="/images/logo.png" alt="Laracasts Logo" width="165" height="16">--}}
                <img src="images/clothes/stories.jpg" alt="Laracasts Logo" width="165" height="16" style="border-radius: 15%">
            </a>
        </div>
        @auth
                <?php
                    try{
                        if (auth()->user()->username==="admin" ){
                            ?>
                            <a href="http://localhost/Courses/public/register" class="btn btn-warning">اضافة مستخدم جديد</a>
                            <a href="admin/products/create" class="btn btn-secondary">اضافة درس </a>
                            <a href="categories" class="btn btn-success">اضافة فئة</a>
                            <?php
                        }
                    }catch(Exception $exc){}
                ?>
        @endauth
        <button type="button" id="dark_btn" class="btn btn-dark text-white">خلفية سوداء</button>
        <button type="button" id="white_btn" class="btn btn-light text-blue">خلفية بيضاء</button>

        <div class="mt-8 md:mt-0 flex items-center">

    @auth


    <div class="row mr-2">
        <div class="col-lg-12 col-sm-12 col-12">
          <nav class="navbar navbar-expand-lg bg-info rounded">

            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="display: unset !important;">
              <ul class="nav nav-pills mr-auto justify-content-end">
                <li class="nav-item dropdown">
                  <a class="nav-link text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bell"> notifications</i>
                  </a>
                    <ul class="dropdown-menu">
                      <li class="head text-light bg-dark">
                        <div class="row">
                          <div class="col-lg-12 col-sm-12 col-12">

                            <span>Notifications ({{Auth::User()->unreadNotifications->count()}})</span>
                            <a href="" class="float-right text-light">Mark all as read</a>
                          </div>
                      </li>
                      {{-- {{dd(Auth::User()->unreadNotifications->data['user_create'])}} --}}
                    @foreach (Auth::User()->unreadNotifications as $notification)

                      <li class="notification-box" style="width: 400px">
                        <div class="row">
                          <div class="col-lg-3 col-sm-3 col-3 text-center">
                            <img src="/demo/man-profile.jpg" class="w-50 rounded-circle">
                          </div>
                          <div class="col-lg-8 col-sm-8 col-8">
                            <strong class="text-info">{{$notification->data['user_create']}}</strong>
                            <div>
                              <a href="/products/{{ $notification->data['product_slug'] }}">{{$notification->data['title']}}</a>
                            </div>
                            <small class="text-warning">{{$notification->created_at}}</small>
                          </div>
                        </div>
                      </li>
                    @endforeach

                      <li class="footer bg-dark text-center">
                        <a href="" class="text-light">View All</a>
                      </li>
                    </ul>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    @endauth
            @unless(auth()->check())
                    <a href="login" class=" btn btn-primary ">تسجيل الدخول</a>

            @else
                    <span class="text-xs font-bold uppercase">اهلا وسهلا ب , {{ auth()->user()->username }}!</span>

                    <form method="POST" action="http://localhost/Courses/public/logout" class="text-xs font-semibold text-blue-500 ml-6">
                        @csrf

                        <button type="submit" class="btn btn-danger">تسجيل خروج</button>
                    </form>
            @endunless



        </div>
    </nav>
    {{-- <img src="../../../public/images/clothes/1.jpg" alt="aaaa" > --}}
    {{ $slot }}

<script>
    // alert('hi');
dark_btn=document.getElementById('dark_btn');
white_btn=document.getElementById('white_btn');
html=document.getElementById('html');
nav_header=document.getElementById('nav_header');
footer=document.getElementById('footer');
category_header=document.getElementById('category_header');
main=document.getElementById('main');
dark_btn.onclick=function(){
    dark_btn.style.background='rgb(1, 1, 19)';
    dark_btn.style.color='white';
    document.body.style.background='rgb(1, 1, 19)';
    document.body.style.transition='0.7s';
    html.style.background='rgb(1, 1, 19)e';
    html.style.color='white';
    nav_header.style.background='rgb(1, 1, 19)';
    nav_header.style.color='white';
    footer.style.background='rgb(1, 1, 19)';
    footer.style.color='white';
    category_header.style.background='rgb(1, 1, 19)';
    // category_header.style.color='white';
    main.style.background='rgb(1, 1, 19)';
    main.style.color='white';
}

white_btn.onclick=function(){
    white_btn.style.background='black';
    white_btn.style.color='white';
    document.body.style.background='white';
    document.body.style.transition='0.7s';
    html.style.background='white';
    html.style.color='black';
    nav_header.style.background='white';
    nav_header.style.color='black';
    footer.style.background='white';
    footer.style.color='black';
    category_header.style.background='white';
    category_header.style.color='black';
    main.style.background='white';
    main.style.color='black';
}
</script>
</section>

@if(session()->has('success'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
        class="fixed bg-green-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
{{--        <p>{{ session()->get('success') }}</p>--}}
        <p>{{ session('success') }}</p>
    </div>
@endif
</body>
</html>
