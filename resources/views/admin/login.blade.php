<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Bracket">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:url" content="http://themepixels.me/bracket">
    <meta property="og:title" content="Bracket">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta property="og:image" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">
    <link href="public/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="public/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/bracket.css">
    <title>EMPRESA::Acceso</title>
</head>

<body>

    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">
        <form action="{{ route('login_post') }}" method="post">
            @csrf
            <div class="login-wrapper wd-400 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
                <!-- Capturando mensaje de error -->
                <img src="https://aspah.org/wp-content/uploads/2024/01/logo-aspah.jpg" width="250">
                @if ($message = Session::get('danger'))
                    <div class="alert alert-danger alert-block mt-20" style="margin-top: 20px">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong> {{ $message }} </strong>
                    </div>
                @endif
            </div>

            <div class="tx-center mg-b-30"></div>

            <div class="form-group">
                <input type="text" id="usu_correo" name="usu_correo" class="form-control"
                    placeholder="Ingresar Usuario">
            </div>
            <div class="form-group">
                <input type="password" id="usu_pass" name="usu_pass" class="form-control"
                    placeholder="Ingrese Contraseña">
            </div>
            <input type="hidden" name="enviar" class="form-control" value="si">
            <button type="submit" class="btn btn-info btn-block">Acceder</button>
    </div>
    </form>
    </div>
    <script src="public/lib/jquery/jquery.js"></script>
    <script src="public/lib/popper.js/popper.js"></script>
    <script src="public/lib/bootstrap/bootstrap.js"></script>

</body>

</html>
