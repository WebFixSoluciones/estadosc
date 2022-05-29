<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Document</title>
    <script language="javascript" type="text/javascript" src="{{ asset('jquery-1.7.2.min.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('libreria.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#background').smartBackgroundResize({
                image: {{$imagen}}
            });
        });
    </script>


    <style>
        @font-face {
      font-family: 'Roboto';
      font-style: normal;
      font-weight: 300;
      src: url(https://fonts.gstatic.com/s/roboto/v20/KFOlCnqEu92Fr1MmSU5vAw.ttf) format('truetype');
    }
    @font-face {
      font-family: 'Roboto';
      font-style: normal;
      font-weight: 400;
      src: url(https://fonts.gstatic.com/s/roboto/v20/KFOmCnqEu92Fr1Me5Q.ttf) format('truetype');
    }
    @font-face {
      font-family: 'Roboto';
      font-style: normal;
      font-weight: 700;
      src: url(https://fonts.gstatic.com/s/roboto/v20/KFOlCnqEu92Fr1MmWUlvAw.ttf) format('truetype');
    }


        html {
            background: url({{$imagen}});
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center center;
            background-size: 70%;
            margin: 0px;
        }

        @page {
            margin: 0px;
        }

        body {
            text-align: center;

        }

        .nombre {
            margin-top: 15%;
            font-size: 40px;
            font-weight: 700;
            font-family: 'Roboto', serif;
        }

        .curso {
            color: red;
            font-size: 40px;
            font-weight: 700;
            /* margin-top: 30px; */
            font-family: 'Roboto', serif;
        }

        .documento {
            font-size: 20px;
            font-weight: 400;
            margin-top: -5px;
            font-family: 'Roboto', serif;
        }

        .convocatoria {
            text-align: right;
            margin-right: 10%;
            margin-top: 5%
        }

        .qr {
            position: fixed;
            margin-top: 37%;
            margin-left: 17%;
        }

        .imagen
        {
            position: fixed;
            width: 100%;
        }

    </style>
</head>

<body style="background-image:url({{$imagen}}); background-size: 100%">


    <div class="convocatoria">
        {{ $certificado->curso->convocatoria }}
    </div>
    <div class="contenedor">
        <div class="nombre">{{ $certificado->usuario->nombre }}</div>
        <div class="documento">Cedula: {{ $certificado->usuario->dni }}</div> <br><br>
        <div class="curso">{{ $certificado->curso->curso }}</div>
    </div>

</body>

</html>
