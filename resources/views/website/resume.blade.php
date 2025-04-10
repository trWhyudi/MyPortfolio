@php
    $pageTitle = 'Resume';
    $activePage = 'resume';
@endphp

@extends('website.layout.main')

@section('main-body')
  <section class="resume section" id="resume" style="margin-bottom: 100px">
    <h2 class="section_title" data-aos="fade-up"  data-aos-duration="800">My <span>Resume</span></h2>
    <div class="resume_container container grid">
      <div class="resume_tabs" data-aos="fade-right"
      data-aos-offset="300"
      data-aos-easing="ease-in-sine">
        <ul>
          <li>
            <a href="#page-1" class="current">Education</a>
          </li>
          <li>
            <a href="#page-2">Skills</a>
          </li>
          <li>
            <a href="#page-3">Certificate</a>
          </li>
        </ul>
      </div>
      <div class="resume_content">
        <!-- Page 1: Education -->
        <div class="page one" id="page-1" data-aos="fade-right" data-aos-duration="800">
          <div class="page_heading">Education</div>
          <!-- 1 -->
          <div class="resume_wrap">
            <div class="resume_wrap-icon">
              <i class="fa-solid fa-graduation-cap"></i>
            </div>
            <div class="resume_wrap-content">
              <span class="date">2020-2023</span>
              <h4>High School graduate majoring in science</h4>
              <span class="position">SMA Negeri 1 Cibitung</span>
              <p>
                Graduated from SMA Negeri 1 Cibitung with a focus in science. During this time, I developed strong analytical and problem-solving skills, along with the ability to work well in a team. I was also actively involved in extracurricular activities that helped build my discipline and sense of responsibility.
              </p>
            </div>
          </div>
          <!-- 2 -->
          <div class="resume_wrap">
            <div class="resume_wrap-icon">
              <i class="fa-solid fa-graduation-cap"></i>
            </div>
            <div class="resume_wrap-content">
              <span class="date">2023-Current</span>
              <h4>Bachelor's Degree in Information Systems</h4>
              <span class="position">Universitas Gunadarma</span>
              <p>
                Currently in my fourth semester, majoring in Information Systems. Through this program, I've gained a strong foundation in programming, databases, and systems analysis. I'm also learning how to bridge technology and business needs to create efficient digital solutions. Actively participating in group projects and always looking to grow both technically and professionally.
              </p>
            </div>
          </div>
        </div>

        <!-- Page 2: Skills -->
        <div class="page two" id="page-2" data-aos="fade-right" data-aos-duration="800">
          <div class="page_heading">Skills</div>
          <div class="skills_container">
            <!-- Skill 1 -->
            <div class="resume_wrap skill_wrap">
              <div class="resume_wrap-icon">
                <i class="fa-brands fa-html5"></i>
              </div>
              <div class="resume_wrap-content">
                <h4>HTML</h4>
                <p>
                  Proficient in writing clean, semantic HTML to structure web content effectively. Skilled in creating accessible and SEO-friendly layouts.
                </p>                  
              </div>
            </div>
            <!-- Skill 2 -->
            <div class="resume_wrap skill_wrap">
              <div class="resume_wrap-icon">
                <i class="fa-brands fa-css3-alt"></i>
              </div>
              <div class="resume_wrap-content">
                <h4>CSS</h4>
                <p>
                  Experienced in styling websites using modern CSS, including Flexbox, Grid, and responsive design techniques. Familiar with animations and custom designs.
                </p>                  
              </div>
            </div>
            <!-- Skill 3 -->
            <div class="resume_wrap skill_wrap">
              <div class="resume_wrap-icon">
                <i class="fa-brands fa-square-js"></i>
              </div>
              <div class="resume_wrap-content">
                <h4>JavaScript</h4>
                <p>
                  Able to create interactive and dynamic web features using vanilla JavaScript. Knowledge of DOM manipulation, event handling, and basic ES6 features.
                </p>                  
              </div>
            </div>
            <!-- Skill 4 -->
            <div class="resume_wrap skill_wrap">
              <div class="resume_wrap-icon">
                <i class="fa-brands fa-php"></i>
              </div>
              <div class="resume_wrap-content">
                <h4>PHP</h4>
                <p>
                  Skilled in server-side scripting with PHP to build dynamic and data-driven web applications. Familiar with form handling, sessions, and basic OOP in PHP.
                </p>                  
              </div>
            </div>
            <!-- Skill 5 -->
            <div class="resume_wrap skill_wrap">
              <div class="resume_wrap-icon">
                <i class="fa-brands fa-laravel"></i>
              </div>
              <div class="resume_wrap-content">
                <h4>Laravel</h4>
                <p>
                  Experienced in developing web applications using Laravel framework. Comfortable with MVC architecture, routing, Blade templating, Eloquent ORM, and RESTful APIs.
                </p>                  
              </div>
            </div>
            <!-- Skill 6 -->
            <div class="resume_wrap skill_wrap">
              <div class="resume_wrap-icon">
                <i class="fa-solid fa-database"></i>
              </div>
              <div class="resume_wrap-content">
                <h4>SQL</h4>
                <p>
                  Capable of writing efficient SQL queries for data retrieval, manipulation, and management. Familiar with relational databases such as MySQL.
                </p>                  
              </div>
            </div>
            <!-- Add more skills as needed -->
          </div>
        </div>

        <!-- Page 3: Certificate -->
        <div class="page three" id="page-3" data-aos="fade-right" data-aos-duration="800">
          <div class="page_heading">Certificate</div>
          <div class="certificate_container">
            @foreach($certificates as $certificate)
            <div class="certificate_wrap">
              <div class="certificate_photo">
                @if($certificate->certificate_image)
                  <img src="{{ asset('storage/' . $certificate->certificate_image) }}" alt="{{ $certificate->title }}" loading="lazy">
                @else
                  <div class="certificate_placeholder">
                    <i class="fa-solid fa-certificate"></i>
                  </div>
                @endif
              </div>
              <div class="certificate_content">
                <span class="date">{{ $certificate->date }}</span>
                <h4>{{ $certificate->title }}</h4>
                <span class="position">{{ $certificate->issuer }}</span>
                @if($certificate->description)
                <p>{{ $certificate->description }}</p>
                @endif
                @if($certificate->certificate_url)
                <div class="certificate_actions">
                  <a href="{{ $certificate->certificate_url }}" target="_blank" class="btn btn-small">
                    View Certificate <i class="fa-solid fa-arrow-up-right-from-square"></i>
                  </a>
                </div>
                @endif
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection