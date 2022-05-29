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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Certificados</title>
</head>

<body class="bg-gray-100 p-5">

    <div id="primero">
        <div class="columnac d-flex align-items-center justify-content-center  ht-100v sm-ht-30v">
            <H3>Somos una escuela de formación de guardas de seguridad. </H3>

        </div>
        <div class="d-flex align-items-center justify-content-center  ht-100v bg-gray-100">
            <div class="cold-flex ">
                <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">

                    <div class="alert alert-danger alert-block mt-20" id="mensaje"
                        style="margin-top: 20px; display: none">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong> Usted no posee certificados </strong>
                    </div>

                    <div class="tx-center mg-b-30">
                        <h3>Descargue sus Certificados</h3>
                    </div>

                    <div style=" display:flex; " class="form-group col">
                        <input type="number" id="usu_dni" name="usu_dni" class="form-control"
                            placeholder="Ingrese su C.I.">
                    </div>

                    <div style=" display:flex; " class="form-group col">
                        <button type="button" onclick="consultarDNI()" class="btn btn-info btn-block">Consultar
                            Certificado</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="segundo" style="display: none">
        <button class="btn btn-success pull-right" onclick="regresar()">Regresar</button>
        <address>
            <strong id="nombre">Full Name</strong><br>
            <p id="dni"></p>
            <p id="total"></p>

            <br><br><br>

            <table id="datatable1" style="width: 100%" class="table table-striped display responsive nowrap">
                <thead>
                    <tr width="100%">
                        <th width="">Certificado</th>
                        <th width=""></th>
                    </tr>
                </thead>
                <tbody id="html">

                </tbody>
            </table>
        </address>
    </div>

    <div id="tercero" style="display: none">
        <div class="ht-20v d-flex align-items-center justify-content-center">
            <div class="wd-lg-70p wd-xl-50p tx-center pd-x-40">
                <h1 class="tx-100 tx-xs-140 tx-normal tx-inverse tx-roboto mg-b-0">

                    <canvas id="canvas" height="650px" width="900px" class="img-fluid"
                        alt="Responsive image"></canvas>

                </h1>
                <br>
                <p class="tx-16 mg-b-30 text-justify" id="cur_descrip">

                </p>

                <div id="qrcode"></div>

                <div class="form-layout-footer">
                    <button class="btn btn-outline-info" id="btnpng"><i class="fa fa-send mg-r-10"></i> PNG</button>
                    <button class="btn btn-outline-success" id="btnpdf"><i class="fa fa-send mg-r-10"></i> PDF</button>
                    <button class="btn btn-outline-warning" onclick="regresar2()"><i class="fa fa-send mg-r-10"></i> Regresar</button>
                    <input type="hidden" id="idCertificado">
                </div>

            </div>
        </div>
    </div>
    <script src="public/lib/jquery/jquery.js"></script>
    <script src="public/lib/popper.js/popper.js"></script>
    <script src="public/lib/bootstrap/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script type="text/javascript" src="certificado.js"></script>

    <script>
        function consultarDNI() {
            dni = $("#usu_dni").val()

            axios.get('/api/getCertificados/' + dni).then((result) => {
                if (result.data.total > 0) {
                    $("#primero").hide()
                    $("#segundo").show()
                    $("#nombre").html('Nombre: ' + result.data.usuario.nombre)
                    $("#dni").html('Dni: ' + result.data.usuario.dni)
                    $("#html").html(result.data.html)
                    $("#total").html("Cantidad de Cursos: " + result.data.total)

                } else {
                    $("#mensaje").show()
                }
            })
        }

        function verCertificado(idCertificado) {
            $("#idCertificado").val(idCertificado)
            $("#segundo").hide()
            $("#tercero").show()

            $.get("/api/getCertificado/" + $("#idCertificado").val(), function(data) {
                const canvas = document.getElementById('canvas');
                const ctx = canvas.getContext('2d');

                /* Inicializamos la imagen */
                const image = new Image();
                // const imageqr = new Image();

                console.log(data)
                //data = JSON.parse(data);
                console.log(data.certificado.curso.imagen)
                /* Ruta de la Imagen */
                image.src = 'http://localhost:8000/uploads/imagenes_cursos/' + data.certificado.curso.imagen;
                /* Dimensionamos y seleccionamos imagen */

                image.onload = function() {
                    ctx.drawImage(image, 0, 0, canvas.width, canvas.height);

                    /* Definimos tamaño de la fuente */
                    ctx.font = 'bold 40px Arial';
                    ctx.textAlign = "center";
                    ctx.textBaseline = 'middle';
                    var x = canvas.width / 2;
                    ctx.fillText('A: '+data.certificado.usuario.nombre, x, 230);
                    ctx.font = 'bold 25px Arial';
                    ctx.fillText('Cedula: '+data.certificado.usuario.dni, x, 260);
                    ctx.font = 'bold 40px Arial';
                    ctx.fillStyle = "red";
                    ctx.fillText(data.certificado.curso.curso, x, 340);
                }




                /* Ruta de la Imagen */
                // imageqr.src = "../../public/qr/" + curd_id + ".png";
                // /* Dimensionamos y seleccionamos imagen */
                // ctx.drawImage(imageqr, 400, 500, 100, 100);
            });
        }

        function regresar() {
            $("#primero").show()
            $("#segundo").hide()
            $("#nombre").html()
            $("#dni").html()
            $("#html").html()
            $("#usu_dni").val("")
        }

        function regresar2()
        {
            $("#segundo").show()
            $("#tercero").hide()
        }
    </script>
</body>

</html>
