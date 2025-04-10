<!-- HEADER START -->
<header id="header">
    <div class="container">
      <a href="{{ route('website.home') }}" class="logo">
        <h4><span>Tri</span>Wahyudi.</h4>
      </a>
      <ul class="menu">
        <li class="menu_item">
          <a href="{{ route('website.home') }}" class="menu_link {{ isset($activePage) && $activePage == 'home' ? 'active-link' : '' }}">Home</a>
        </li>
        <li class="menu_item">
          <a href="{{ route('website.about') }}" class="menu_link {{ isset($activePage) && $activePage == 'about' ? 'active-link' : '' }}">About</a>
        </li>
        <li class="menu_item">
          <a href="{{ route('website.resume') }}" class="menu_link {{ isset($activePage) && $activePage == 'resume' ? 'active-link' : '' }}">Resume</a>
        </li>
        <li class="menu_item">
          <a href="{{ route('website.project') }}" class="menu_link {{ isset($activePage) && $activePage == 'project' ? 'active-link' : '' }}">Project</a>
        </li>
        <li class="menu_item">
          <a href="{{ route('website.contact') }}" class="menu_link {{ isset($activePage) && $activePage == 'contact' ? 'active-link' : '' }}">Contact</a>
        </li>
        <i class="fa-solid fa-xmark close_icon"></i>
      </ul>
      <i class="fa-solid fa-bars toggle_icon"></i>
    </div>
  </header>
  <!-- HEADER END -->
