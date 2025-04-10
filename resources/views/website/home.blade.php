@php
    $pageTitle = 'Home';
    $activePage = 'home';
@endphp

@extends('website.layout.main')

@section('main-body')
    <main>
      <section class="hero section" id="hero" style="margin-bottom: 150px">
        <div class="hero_container container grid">
          <div class="hero_content" data-aos="fade-right" data-aos-duration="1200"
          data-aos-anchor-placement="top-bottom">
            <h4>Hi, I'm Yudi</h4>
            <h1>
              A
              <span
                class="typed"
                data-typed-items="Web Developer, UI/UX Designer"
              ></span>
            </h1>
            <p>
              I craft digital experiences that are functional, beautiful, and tailored to your needs.
            </p>
            <div class="hero_social">
              <a href="https://www.linkedin.com/in/tri-wahyudi-834a92257"><i class="fa-brands fa-linkedin"></i></a>
              <a href="https://www.instagram.com/trwhyudii_"><i class="fa-brands fa-instagram"></i></a>
              <a href="https://github.com/trWhyudi"><i class="fa-brands fa-github"></i></a>
            </div>
            <a href="{{ asset('website/assets/pdf/CV_Tri Wahyudi.pdf') }}" class="btn">
              Download CV
              <i class="fa-solid fa-download"></i>
            </a>
          </div>
          <div class="hero_img" data-aos="zoom-in-up" data-aos-duration="1000">
            @if(Auth::check() && Auth::user()->image)
              <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="Profile" width="400" height="400">
            @else
              <img src="{{ asset('website/assets/images/about.jpg') }}" alt="Profile" width="400" height="400">
            @endif
          </div>
        </div>
      </section>
    </main>
@endsection

