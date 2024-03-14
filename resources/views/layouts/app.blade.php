<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Bracket">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/bracket/img/bracket-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/bracket">
    <meta property="og:title" content="Bracket">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>ADMINISTRADOR</title>

    <!-- vendor css -->
    <link href="{{asset('lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">
    <link href="{{asset('lib/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
    <link href="{{asset('lib/jquery-switchbutton/jquery.switchButton.css')}}" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{asset('css/bracket.css')}}">
    <link href="{{asset('lib/datatables/jquery.dataTables.css')}}" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    

    <!-- ########## START: LOGO DE ADMIN ########## -->
    <div class="br-logo"><a href="https://aspah.org/"><img src="https://aspah.org/wp-content/uploads/2024/01/logo-aspah.jpg" width="175"></a></div>



    @include('layouts.menu')

   <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="br-header">
      <div class="br-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="input-group hidden-xs-down wd-170 transition">

        </div><!-- input-group -->
      </div>
      <div class="br-header-right">
        <nav class="nav">


          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name hidden-md-down">{{Auth::user()->nombre}}</span>
              <img src="http://via.placeholder.com/64x64" class="wd-32 rounded-circle" alt="">
              <span class="square-10 bg-success"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                <li><a href=""><i class="icon ion-ios-person"></i> Editar Perfil</a></li>
                <li><a href="{{route('logout')}}"><i class="icon ion-power"></i> Cerrar Sesion</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>

      </div><!-- br-header-right -->
    </div><!-- br-header -->
    <!-- ########## END: HEAD PANEL ########## -->


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">

      <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        @yield('contenido')
      </div>

      <div class="br-pagebody">

        <!-- start you own content here -->

      </div><!-- br-pagebody -->

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <script src="{{asset('lib/jquery/jquery.js')}}"></script>
    <script src="{{asset('lib/popper.js/popper.js')}}"></script>
    <script src="{{asset('lib/bootstrap/bootstrap.js')}}"></script>
    <script src="{{asset('lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>
    <script src="{{asset('lib/moment/moment.js')}}"></script>
    <script src="{{asset('lib/jquery-ui/jquery-ui.js')}}"></script>
    <script src="{{asset('lib/jquery-switchbutton/jquery.switchButton.js')}}"></script>
    <script src="{{asset('lib/peity/jquery.peity.js')}}"></script>

    <script src="{{asset('js/bracket.js')}}"></script>
    <script src="{{asset('lib/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('lib/datatables-responsive/dataTables.responsive.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    @yield('scripts')
  </body>
</html>
