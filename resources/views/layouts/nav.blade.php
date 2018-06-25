<style>
    /*start carousel and navigation*/

      @font-face {
        font-family: 'nicon';
        src: url('{{ asset("fonts/googlefonts/Niconne-Regular.ttf") }}');
      }

      @font-face {
        font-family: 'ale';
        src: url('{{ asset("fonts/googlefonts/AlegreyaSans-MediumItalic.ttf") }}');
      }

      @font-face {
        font-family: 'nunito';
        src: url('{{ asset("fonts/googlefonts/Nunito-Bold.ttf") }}');
      }

      @font-face {
        font-family: 'nunito-ex';
        src: url('{{ asset("fonts/googlefonts/Nunito-ExtraLight.ttf") }}');
      }

      @media screen and (max-width: 992px) {
        .text {
          text-align: center;
          padding-left: 100px;
        }
        .text .slide-htext {
          font-size: 25px;
        }
        .text .slide-ptext {
          font-size: 18px;
        }
        .carousel-text {
          margin-top: 20px;
        }
      }

      @media screen and (max-width: 421px) {
        .greet-text{
          padding-left: 100px; 
        }
        #headerid ul {
          padding-left: 79px;
        }
      }



      @media screen and (min-width: 400px) and (max-width: 421px) {
        .greet-text{
          padding-left: 85px; 
        }
        #headerid ul {
          padding-left: 70px;
        }
      }

      @media screen and (max-width: 334px) {
        .greet-text{
          padding-left: 60px;
        }
        #headerid ul {
          padding-left: 30px;
        }
      }

      .nav-brand {
        font-size: 50px;
        font-family: 'nicon';
      }

      #headerid {
        background-color: #424562;
      }

      #headerid a {
        color: white;
        font-family: 'ale';
        font-size: 20px;
      }

      .greet-text {
        font-family: 'ale';
        font-size: 20px;
      }


      #navid {
        background-color: #9096AB;
      }

      .navbar-brand {
        color: white;
        height: 80px;
        line-height: 60px;
      }

      #navid li>a {
        font-size: 23px;
        color: white;
        font-family: 'ale';
      }

      #navid li {
        margin-left: 25px;
        color: white;
        height: 50px;
        line-height: 30px;
      }

      #navid li:hover{
        background-color: #666880;
        border-radius: 25px;
      }


      .carouselslide {
        height: 500px;
      }

      .carouselslide:nth-child(1) {
        background: url("{{ asset('image/bgimage_1.jpg') }}");
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
      }

      .carouselslide:nth-child(2) {
        background: url("{{ asset('image/bgimage_2.jpg') }}");
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
      }

      .carouselslide:nth-child(3) {
        background: url("{{ asset('image/bgimage_3.jpg') }}");
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
      }

      .carousel-fade .carousel-inner .carousel-item {
        opacity: 0.8;
        transition-property: opacity;
        /*transition-duration: 5s;*/
        transition-delay: 0s;
      }

      .carousel-fade .carousel-inner .active {
        opacity: 1;
      }


      .carousel-text {
        margin-top: 60px;
        color: white;
      }
      
      .text {
        margin-top: 80px;
      }

      .slide-htext {
        font-size: 45px;
        font-family: 'nunito';
      }

      .slide-ptext {
        font-size: 20px;
        padding-left: 5px;
        font-family: 'nunito-ex';
      }

      .shopnow-btn {
        border-radius: 20px; 
      }

      .dropdown-menu a {
        color: white;
      }


      .dropdown-menu {
        margin-top: 23px;
        background-color: #3E4A64;
        display: none;
        transition: display 5s linear;
      }
      
      .dropdown:hover .dropdown-menu {
        /*max-height: 400px;*/
        display: block;
        /*transform: scaleY(1);*/
      }

    /*end carousel and navigation*/
</style>

  <!--START HEADER -->
  <div class="container-fluid" id="headerid">
        
        <div class="container">

          <nav class="row justify-content-between">

              <span class="greet-text nav-link text-white text-center" href="#" 
              class="mr-auto">Welcome To My Shop</span>  

              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="#"><i class="fa fa-search"></i></a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Member</a>
                  @if(!Auth::check())
                    <ul class="dropdown-menu" id="dm">
                      <li class="dropdown-item">
                        <a href="register">Register</a>
                      </li>
                      <li class="dropdown-item">
                        <a href="login">Login</a>
                      </li>
                    </ul> 
                  @else
                    <ul class="dropdown-menu" id="dm">
                      <li class="dropdown-item">
                        <a href="/logout">Logout</a></li>
                    </ul> 
                  @endif
                </li>
                @if(\Auth::check())
                <li class="nav-item">
                  <?php $user_id = \Auth::user()->id; ?>
                  <a class="nav-link" href="{{ route('cart.index') }}"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;&nbsp;
                  <span class="badge-danger badge-pill">
                    {{ Cart::count() }}
                  </span>
                  </a>
                </li>
                <li class="nav-item pt-2">
                  <?php $name = \Auth::user()->name; ?>
                  <a href="">{{ $name }}</a>
                </li>
                @endif
              </ul>

          </nav>

        </div>

      </div>
  <!-- END HEADER -->


  <!-- START NAVIGATION -->

  <div class="container-fluid" id="navid">
    <div class="container">
      <nav class="row navbar navbar-inverse navbar-toggleable-sm">
        <button class="mt-3 navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#myNav">
          <span class="navbar-toggler-icon"></span>
        </button>

        <a href="#" class="navbar-brand nav-brand">Brand</a>

        <div class="collapse row justify-content-between navbar-collapse navigation" id="myNav">
          <!-- <a href="#">Libran</a> -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="/home" class="nav-link">Home</a>
            </li>
            <?php
              $category_types = \DB::table('category_types')->pluck('name');
            ?>
            @foreach($category_types as $c)
              <li class="nav-item">
                <a href='{{ "/show/".$c }}' class="nav-link">{{ $c }}</a>
              </li>
            @endforeach
            <li class="nav-item">
                <a href="{{ url('about') }}" class="nav-link">About Us</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('contact') }}" class="nav-link">Contact Us</a>
            </li>
          </ul>

        </div>

      </nav>

    </div>
  </div>

  <!-- END NAVIGATION -->