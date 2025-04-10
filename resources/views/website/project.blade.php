@php
    $pageTitle = 'Project';
    $activePage = 'project';
@endphp

@extends('website.layout.main')

@section('main-body')
  <section class="project section" id="project" style="margin-bottom: 100px">
    <h2 class="section_title">My <span>Projects</span></h2>

    <div class="project_container container">
      <ul class="project_filters">
        <li data-filter="*" class="filter-active">All</li>
        @foreach($categories as $category)
          <li data-filter=".filter-{{ $category->filter_class }}">{{ $category->name }}</li>
        @endforeach
      </ul>
      <div class="project_wrap-container">
        @foreach($projects as $project)
        <div class="project_item filter-{{ $project->category->filter_class }}">
          <div class="project_wrap">
            <img
              src="{{ asset('storage/' . $project->project_image) }}"
              alt="{{ $project->title }}"
              class="img-fluid"
            />
            <div class="project_info">
              <h4>{{ $project->title }}</h4>
              <p>{{ $project->category->name }}</p>
              <div class="project_links">
                <a href="#" class="view-project" 
                   data-title="{{ $project->title }}"
                   data-category="{{ $project->category->name }}"
                   data-image="{{ asset('storage/' . $project->project_image) }}"
                   data-description="{{ $project->description }}"
                   data-tech="{{ $project->technologies }}"
                   data-date="{{ $project->date }}"
                   data-client="{{ $project->client ?? 'Personal Project' }}"
                   data-demo="{{ $project->demo_url ?? '#' }}"
                   data-github="{{ $project->github_url ?? '#' }}">
                  <i class="fa-solid fa-plus"></i>
                </a>
                @if($project->demo_url)
                <a href="{{ $project->demo_url }}" target="_blank"><i class="fa-solid fa-link"></i></a>
                @endif
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>

    <div id="projectModal" class="project-modal">
      <div class="modal-content">
        <span class="modal-close">&times;</span>
        <div class="modal-header">
          <h2 id="modal-title">Project Title</h2>
          <p id="modal-category">Category</p>
        </div>
        <div class="modal-body">
          <div class="modal-image">
            <img id="modal-img" src="" alt="Project Image" class="img-fluid">
          </div>
          <div class="modal-info">
            <div class="info-item">
              <h4>Project Description</h4>
              <p id="modal-description"></p>
            </div>
            <div class="info-item">
              <h4>Technologies Used</h4>
              <div id="modal-tech" class="tech-tags">

              </div>
            </div>
            <div class="info-item">
              <h4>Project Date</h4>
              <p id="modal-date"></p>
            </div>
            <div class="info-item">
              <h4>Client</h4>
              <p id="modal-client"></p>
            </div>
            <div class="modal-actions">
              <a href="#" id="modal-link" class="btn" target="_blank">
                Live Demo
                <i class="fa-solid fa-arrow-right"></i>
              </a>
              <a href="#" id="modal-github" class="btn btn-secondary" target="_blank">
                Source Code
                <i class="fa-brands fa-github"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Script loaded for project modal');
        
        const viewButtons = document.querySelectorAll('.view-project');
        const modal = document.getElementById('projectModal');
        const closeBtn = document.querySelector('.modal-close');
        
        console.log('View buttons found:', viewButtons.length);
        console.log('Modal found:', modal ? 'Yes' : 'No');
        
        // Initialize MixItUp
        let mixer = mixitup('.project_wrap-container', {
            selectors: {
                target: '.project_item'
            },
            animation: {
                duration: 300
            }
        });
        
        // Project filters
        let filterItems = document.querySelectorAll('.project_filters li');
        filterItems.forEach((el) => {
          el.addEventListener('click', function() {
            filterItems.forEach(item => item.classList.remove('filter-active'));
            this.classList.add('filter-active');
          });
        });
        
        viewButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('Button clicked:', this.dataset);
                
                // Set data dari data attributes
                document.getElementById('modal-title').textContent = this.dataset.title;
                document.getElementById('modal-category').textContent = this.dataset.category;
                document.getElementById('modal-img').src = this.dataset.image;
                document.getElementById('modal-description').textContent = this.dataset.description;
                
                // Teknologi
                const techTags = this.dataset.tech.split(',').map(tech => 
                    `<span class="tech-tag">${tech.trim()}</span>`
                ).join('');
                document.getElementById('modal-tech').innerHTML = techTags;
                
                document.getElementById('modal-date').textContent = this.dataset.date || 'Not specified';
                document.getElementById('modal-client').textContent = this.dataset.client || 'Personal Project';
                
                // Links
                const demoLink = document.getElementById('modal-link');
                demoLink.href = this.dataset.demo;
                
                const githubLink = document.getElementById('modal-github');
                githubLink.href = this.dataset.github;
                
                // Tampilkan modal
                modal.style.display = 'block';
                document.body.style.overflow = 'hidden';
                
                console.log('Modal opened');
            });
        });
        
        if (closeBtn) {
            closeBtn.addEventListener('click', function() {
                modal.style.display = 'none';
                document.body.style.overflow = 'auto';
                console.log('Modal closed via button');
            });
        }
        
        window.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.style.display = 'none';
                document.body.style.overflow = 'auto';
                console.log('Modal closed via outside click');
            }
        });
    });
  </script>
@endsection