<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="{{ asset('styles.css') }}" rel="stylesheet">
    <title>Home</title>
</head>

<body>
    @include('components/nav')
    <!-- @include('components/header') -->
 <!-- BIENVENIDA -->
 <div class="welcome">
        <div class="card-container">
            <div class="elementosderecha">
                <div class="textos">
                    <h2>Conseguí un asesor legal de manera inmediata</h2>
                    <h3>Algunos de nuestros beneficios</h3>
                </div>
                <div class="cards">
                    <div class="card">
                        <h4>Beneficio 1</h4>
                        <p>Texto de ejemplo en la tarjeta. Puedes agregar más contenido aquí según tus necesidades.</p>
                    </div>
                    <div class="card">
                        <h4>Beneficio 2</h4>
                        <p>Texto de ejemplo en la tarjeta. Puedes agregar más contenido aquí según tus necesidades.</p>
                    </div>
                    <div class="card">
                        <h4>Beneficio 3</h4>
                        <p>Texto de ejemplo en la tarjeta. Puedes agregar más contenido aquí según tus necesidades.</p>
                    </div>
                </div>
                <div class="buttons-container">
                    <button type="button" class="btn"><a href="/#">Contáctanos</a></button>
                    <button type="button" class="btn"><a href="/register">Regístrate</a></button>
                </div>
            </div>
        </div>
    </div>

    <!-- ABOUTUS -->
    <div class="aboutus-container">
        <h2 class="aboutush2" id="aboutus">¿Por qué Legal Mate?</h2>
        <div class="aboutus row" id="aboutus">
            <div class="col-md-6">
                <img class="img-fluid h-100"
                    src="assets/hombre-negocios-exitoso-firmando-documentos-oficina-moderna.jpg" alt="">
            </div>
            <div class="col-md-6">
                <h3>About us</h3>
                <!-- Agrega contenido adicional aquí si es necesario -->
            </div>
        </div>
    </div>
    @include('components/footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>