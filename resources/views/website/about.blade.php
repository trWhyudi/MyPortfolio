@php
    $pageTitle = 'About';
    $activePage = 'about';
@endphp
@extends('website.layout.main')

@section('main-body')
  <section class="about section" id="about" style="margin-bottom: 150px">
    <h2 class="section_title" data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="800">About <span>Me</span></h2>
    <div class="about_container container grid">
      <div class="about_img" data-aos="fade-right"
      data-aos-anchor-placement="top-center"
      data-aos-duration="800">
        @if(Auth::check() && Auth::user()->image)
          <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="Profile" width="400" height="400">
        @else
          <img src="{{ asset('website/assets/images/about.jpg') }}" alt="Profile" width="400" height="400">
        @endif
      </div>
      <div class="about_content" data-aos="fade-left"
      data-aos-duration="800">
        <h1>I make professional and creative designs</h1>
        <p>
          Hello, I am Tri Wahyudi, a student majoring in Information Systems at Gunadarma University,currently in semester 4. I have a strong interest in technology and software development, particularly web development. I have developed many web programming skills through various projects and training.
        </p>
      </div>
    </div>
  </section>
@endsection