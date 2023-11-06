<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    </script>
    <title>Landing</title>
</head>

<body>
    @include('components/nav')
    @include('components/header')

    <article class="container">
        <h2 class="display-2 text-center" id="ofertas">Estos son nuestros mejores abogados</h2>
        <div class="row gap-3 cardsAbogados justify-content-center ">
            @foreach($posts as $post)
            <div class="card mb-3" style="width: 18rem;">
                <img src="{{$post->image}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{{$post->descripcion}}</p>
                    <div class="d-grid">
                        <a href="#" class="btn btn-primary">Contratar</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </article>

    <div class="container mt-5">
        <div class="row">
            <h2 class="col-12 text-center display-2" id="aboutus">Quiénes Somos</h2>
            <div class="col-md-6">

                <p>En nuestra empresa, nos apasiona brindar soluciones creativas y efectivas para satisfacer las
                    necesidades de nuestros clientes. Desde nuestros humildes comienzos, hemos crecido hasta
                    convertirnos en un equipo comprometido y dedicado.
                    Con un enfoque en la innovación y la calidad, trabajamos incansablemente para ofrecer productos y

            </div>
            <div class="col-md-6">
                <p> servicios que superen las expectativas. Nuestro compromiso con la excelencia nos impulsa a seguir
                    creciendo y mejorando. Valoramos la confianza de nuestros clientes y nos enorgullece ser parte de su
                    éxito. Esperamos seguir
                    siendo su socio confiable en el futuro y continuar creciendo juntos.</p>
            </div>
        </div>
    </div>



    @include('components/footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>