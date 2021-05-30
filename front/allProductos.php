<!DOCTYPE html>
<html>

<head>
    <title>Filtrar Producto</title>
    <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-2"></div>

            <div class="col-md-10">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a style="text-decoration: none; color: black; " href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All</li>
                    </ol>
                </nav>

            </div>

        </div>
    </div>

    <div class="container-fluid mt-2 mb-3">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-10">
                <h2 class="mt-3"> <strong> TODOS LOS PRODUCTOS</strong></h2>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-2">

                <div class="row">
                    <div class="col-12" style="display: flex; justify-content: center;">
                        <p>Filtros</p>
                    </div>
                </div>


                <div class="list-group">
                    <h5>Price</h5>
                    <input type="hidden" id="hidden_minimum_price" value="10" />
                    <input type="hidden" id="hidden_maximum_price" value="50" />
                    <p id="price_show">10$ - 50$</p>
                    <div id="price_range"></div>
                    <h3 class="mt-1"> Mas valorados </h3>
                </div>
            </div>

            <div class="col-md-10" style="background-color: #f3f2f7;">
                <br />
                <div class="row filter_data">
                </div>
            </div>
        </div>


    </div>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <style>
        #loading {
            text-align: center;
            background: url('images/loading.gif') no-repeat center;
            height: 150px;
        }
    </style>
    <script>
        $(document).ready(function() {
            filter_data();

            function filter_data() {
                $('.filter_data').html('<div id="loading" style="" ></div>');
                var action = 'fetch_data';
                var minimum_price = $('#hidden_minimum_price').val();
                var maximum_price = $('#hidden_maximum_price').val();
                $.ajax({
                    url: "../back/filtroPrecio.php",
                    method: "POST",
                    data: {
                        action: action,
                        minimum_price: minimum_price,
                        maximum_price: maximum_price
                    },
                    success: function(data) {
                        $('.filter_data').html(data);
                    }
                });
            }
            $('#price_range').slider({
                range: true,
                min: 10,
                max: 50,
                values: [5, 50],
                step: 5,
                stop: function(event, ui) {
                    $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                    $('#hidden_minimum_price').val(ui.values[0]);
                    $('#hidden_maximum_price').val(ui.values[1]);
                    filter_data();
                }
            });
        });
    </script>
</body>

</html>