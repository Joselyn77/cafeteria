@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h2>Bienvenido a la cafeteria coffe shopp. Disfruta de lo mejor!!.</h2>

<!-- Carrusel de imágenes -->
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner mt-5">
    <div class="carousel-item active">
      <div class="d-flex justify-content-center">
        <img src="{{ asset('images/carrusel/carrusel5.jpg') }}" class="d-block w-50" alt="Limonada">
      </div>
    </div>
    <div class="carousel-item">
      <div class="d-flex justify-content-center">
        <img src="{{ asset('images/carrusel/carrusel2.jpg') }}" class="d-block w-50" alt="Otra Imagen">
      </div>
    </div>
    <div class="carousel-item">
      <div class="d-flex justify-content-center">
        <img src="{{ asset('images/carrusel/carrusel3.jpg') }}" class="d-block w-50" alt="Otra Imagen 2">
      </div>
    </div>
    <div class="carousel-item">
      <div class="d-flex justify-content-center">
        <img src="{{ asset('images/carrusel/carrusel4.jpg') }}" class="d-block w-50" alt="Otra Imagen 2">
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- dashboard.blade.php -->
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif


@endsection
