@extends('layout')
@section('content')
<!-- ======= Hero Section ======= -->
@include('components/hero-slider')
<main id="main">
<!-- ======= My & Family Section ======= -->
@include('components/my-family')
<!-- ======= Features Section ======= -->
@include('components/features')
<!-- ======= Recent Photos Section ======= -->
@include('components/recent-photos')
</main><!-- End #main -->
@endsection