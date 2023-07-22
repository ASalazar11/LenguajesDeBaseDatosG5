<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Preguntas frecuentes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="css/Estilo4.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>


</head>

<body>

    <?php

    
    include 'components/navbar/navbar.php';
    ?>

    <div>
        <div class="titulo" href="">SHOP</div>
    </div>





    <main class="vh-100 bg-light d-flex align-items-center">

        <!-- El contenedor de la categorias -->
        <section id="principal" class="h-75 container-sm mx-auto bg-light" style="max-width: 800px;">

            <h1 class="fs-5 text-primary text-center py-3">¿En qué le podemos ayudar?</h1>


            <!-- La primera categoria -->
            <div class="accordion" id="accordionExample">


                <div class="accordion-item my-4">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <i class="bi bi-truck-flatbed"></i>
                            <span class="px-3 text-info">Envios</span>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <h2 class="fs-6 fw-semibold">1. ¿Dónde está mi pedido?</h2>
                            <div class="my-2">Para informacion de tu pedido comunicate al 8555 5555.
                            </div>
                            <h2 class="fs-6 fw-semibold">2. ¿Cúando llegará mi pedido?</h2>
                            <div class="my-2">Los pedidos tienen una duracion de 3 dias en entregas normales dentro del GAM, fuera del GAM la duracion es de 5 dias.
                            </div>
                            <h2 class="fs-6 fw-semibold">3. ¿Qué hacer si no llega mi pedido?</h2>
                            <div class="my-2">Por favor comunicate al 8555 5555.
                            </div>
                            <h2 class="fs-6 fw-semibold">4. ¿Cómo sigo el envio?</h2>
                            <div class="my-2">Al realizar la compra recibiras un numero de rastreo.
                            </div>
                            <h2 class="fs-6 fw-semibold">5. ¿Cúanto tiempo se demora el envio?</h2>
                            <div class="my-2">3 dias en entregas normales dentro del GAM, fuera del GAM la duracion es de 5 dias..
                            </div>
                        </div>
                    </div>
                </div>

                <!-- La segunda Categoria  -->

                <div class="accordion-item my-4">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <i class="bi bi-credit-card"></i>
                            <span class="px-3 text-info">Pagos</span>
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <h2 class="fs-6 fw-semibold">1. ¿Realizan reembolsos?</h2>
                            <div class="my-2">No, la compra es final.
                            </div>
                            <h2 class="fs-6 fw-semibold">2. ¿Realizan cambios?</h2>
                            <div class="my-2">Si, en caso de que el producto este defectuoso.
                            </div>
                            <h2 class="fs-6 fw-semibold">3. ¿Cuales son los metodos de pago aceptados?</h2>
                            <div class="my-2">Los metodos que aceptamos son por sinpe y tarjeta.
                            </div>
                            <h2 class="fs-6 fw-semibold">4. ¿Hay descuentos disponibles para grandes cantidades?</h2>
                            <div class="my-2">Si, esta sujeto a terminos y condiciones, consultar directamente al numero 8555 5555.
                            </div>
                            <h2 class="fs-6 fw-semibold">5. ¿Existe el metodo de pagos a plazos?</h2>
                            <div class="my-2">No, no ofrecemos esa opcion.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- La tercera categoria  -->

                <div class="accordion-item my-4">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">

                            <i class="bi bi-arrow-return-left"></i>
                            <span class="px-3 text-info">Devoluciones</span>
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <h2 class="fs-6 fw-semibold">1. ¿Cual es el proceso para una devolucion?</h2>
                            <div class="my-2">Contactarnos por medio del 8555 5555 en donde se iniciara un proceso para verificar si aplica la devolucion.
                            <h2 class="fs-6 fw-semibold">2. ¿Cúanto tiempo se demora una devolucion?</h2>
                            <div class="my-2">La duracion es de 7 a 15 dias aproximadamente.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- La cuarta categoria  -->

                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading4">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                            <i class="bi bi-percent"></i>
                            <span class="px-3 text-info">Promociones</span>
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="heading4"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <h2 class="fs-6 fw-semibold">1. ¿Tienen promociones?</h2>
                            <div class="my-2">Si, normalmente realizamos promociones, que son publicadas en redes sociales y en nuestra pagina.
                            </div>
                        </div>
                    </div>
                </div>


            </div>




        </section>

    </main>

    

    <?php
    include 'components/footer/footer.php';
    ?>
    
</body>

</html>