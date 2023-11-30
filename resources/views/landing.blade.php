<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="{{ asset('styles.css') }}" rel="stylesheet">
    <title>Legal Mate</title>
</head>

<body>
    @include('components/nav')
    <!-- @include('components/header') -->
 <!-- BIENVENIDA -->
 <div class="welcome">
        <div class="card-container">
            <div class="elementosderecha">
                <div class="textos">
                    <h1>Conseguí un asesor legal de manera inmediata</h1>
                    <h2>Algunos de nuestros beneficios</h2>
                </div>
                <div class="cards">
                    <div class="card">
                        <h4><b>Mensajeria</b></h4>
                        <p>Legal Mate tiene su propio servicio de mensajeria, garantizando la seguridad de nuestros clientes.</p>
                    </div>
                    <div class="card">
                        <h4><b>Optimización</b></h4>
                        <p>Legal Mate se compromete 100% en cada caso, por lo que los tiempos de resolución son menores satisfaciendo aún más a nuestros clientes.</p>
                    </div>
                    <div class="card">
                        <h4><b>Compañero</b></h4>
                        <p>Legal Mate se preocupa en ser tan profesionales como buenos compañeros, haciendo que el proceso judicial sea lo mas llevadero posible</p>
                    </div>
                </div>
                <div class="buttons-container">
                    <button type="button" class="btn"><a href="/#">Descargar</a></button>
                    <button type="button" class="btn"><a href="/register">Registrarse</a></button>
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
                <div class="col-md-8 textabout">
                    <h3>Sobre nosotros</h3>
                    <p>Legal Mate es una aplicación sobre procedimientos judiciales como por ejemplo:   divorcios, alimentos, laborales, desalojos, sucesiones, testamentos, etc. Este    proyecto nace ante la tardanza o la poca comunicación que suelen tener estas   situaciones. La aplicación está pensada para que la utilicen ambas partes, el     abogado y el cliente. El abogado cargará el estado del procedimiento y los avances  constantemente, y el cliente podrá verlos y realizar preguntas, agilizando así la     comunicación entre ambas partes. El abogado puede tener más de un caso cargado en la app, y el usuario     lo mismo. También, se podría utilizar la app como un recurso para encontrar     clientes o abogados. Los clientes cargarán sus casos a la espera de que un abogado  los seleccione o se comuniquen con ellos, Y los abogados    utilizarian la app de modo que les aparecerán los casos de los clientes, y ellos  seleccionan en cual desean trabajar.
                    </p>
                </div>
            </div>
        </div>
    @include('components/footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>