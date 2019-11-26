@extends('layouts.app')
@section('content')
<div class="container-fluid">
    
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="img/banner1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="img/banner2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="img/banner3.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="img/banner4.jpg" class="d-block w-100" alt="...">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
          </a>
        </div>
      <hr>
      
      <main>
        <h2 class="__peliculasdeldia">Películas en estreno</h2>

        <div class="__peliculas row">
          <div class="d-flex card col-12 col-md-4 col-lg-3 __itempelicula" style="width: 18rem;">

            <img src="img/pelicula1.jpg" class="card-img-top __imgpelicula" alt="...">
            <div class="card-body">
              <p class="card-text __textopelicula">Hombres de negro</p>
              <a href="#" class="d-flex btn btn-primary __detalle">Ver Más</a>
              <a href="#" class="d-flex btn btn_success __comprar">Favoritas</a>
            </div>
          </div>
            <div class="card col-12 col-md-4 col-lg-3 __itempelicula" style="width: 18rem;">
              <img src="img/pelicula10.jpg" class="card-img-top __imgpelicula" alt="...">
              <div class="card-body">
                <p class="card-text __textopelicula">El rey león</p>
                <a href="#" class="d-flex btn btn-primary __detalle">Ver Más</a>
                <a href="#" class="d-flex btn btn_success __comprar">Favoritas</a>
              </div>
            </div>
            <div class="card col-12 col-md-4 col-lg-3 __itempelicula" style="width: 18rem;">
              <img src="img/pelicula3.jpg" class="card-img-top __imgpelicula" alt="...">
              <div class="card-body">
              <p class="card-text __textopelicula">Toy story 4</p>
              <a href="#" class="d-flex btn btn-primary __comprar" >Ver detalle</a>
              </div>
            </div>
            <div class="d-flex card col-12 col-md-4 col-lg-3 __itempelicula" style="width: 18rem;">
              <img src="img/pelicula4.jpg" class="card-img-top __imgpelicula" alt="...">
              <div class="card-body">
              <p class="card-text __textopelicula">Mia y el león blanco</p>
              <a href="#" class="d-flex btn btn-primary __detalle">Ver Más</a>
              <a href="#" class="d-flex btn btn_success __comprar">Favoritas</a>
              </div>
            </div>
              <div class="card col-12 col-md-4 col-lg-3 __itempelicula" style="width: 18rem;">
                <img src="img/pelicula8.jpg" class="card-img-top __imgpelicula" alt="...">
                <div class="card-body">
                  <p class="card-text __textopelicula">Mascotas 2</p>
                  <a href="#" class="d-flex btn btn-primary __detalle">Ver Más</a>
                  <a href="#" class="d-flex btn btn_success __comprar">Favoritas</a>
                </div>
              </div>
              <div class="card col-12 col-md-4 col-lg-3 __itempelicula" style="width: 18rem;">
                <img src="img/pelicula7.jpg" class="card-img-top __imgpelicula" alt="...">
                <div class="card-body">
                  <p class="card-text __textopelicula">Spider-Man</p>
                  <a href="#" class="d-flex btn btn-primary __detalle">Ver Más</a>
                  <a href="#" class="d-flex btn btn_success __comprar">Favoritas</a>
                </div>
              </div>
        </div>
      </main>
      <div class="d-flex">
        <footer class="piedepag row">
          <article class="sucursales col-12 col-md-4 __artpie">
            <h4>Cines</h4>
            <p>Centro</p>
            <p>Av. Lima 4867</p>
            <br>
            <p>Monroe</p>
            <p>Monroe 867</p>

          </article>
          <article class="sucursales col-12 col-md-4 __artpie">
            <h4>Contacto</h4>
            <p>E-Mail</p>
            <p>dhconsulting@ventas.com.ar</p>
            <br>
            <p>Teléfono</p>
            <p>0800-1603-1991</p>
          </article>
          <article class="sucursales col-12 col-md-4 __artpie">
            <h4>Opciones</h4>
            <a href="#">Proximos estrenos</a>
            <br>
            <a href="#">Publicidad</a>
            <br>
            <a href="#">Contacto</a>
            <br>
            <a href="#">Administrador</a>

          </article>
        </footer>
      </div>
    </div>
    
@endsection

