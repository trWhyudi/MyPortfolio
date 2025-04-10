const iconToggle = document.querySelector(".toggle_icon");
const navbarMenu = document.querySelector(".menu");
const menuLinks = document.querySelectorAll(".menu_link");
const iconClose = document.querySelector(".close_icon");

iconToggle.addEventListener("click", () => {
  navbarMenu.classList.toggle("active");
});

iconClose.addEventListener("click", () => {
  navbarMenu.classList.remove("active");
});

menuLinks.forEach((menuLinks) => {
  menuLinks.addEventListener("click", () => {
    navbarMenu.classList.remove("active");
  });
});

function scrollHeader() {
  const header = document.getElementById("header");
  this.scrollY >= 20
    ? header.classList.add("active")
    : header.classList.remove("active");
}

window.addEventListener("scroll", scrollHeader);

// HERO TYPE JS
const typed = document.querySelector(".typed");
if (typed) {
  let typed_strings = typed.getAttribute("data-typed-items");
  typed_strings = typed_strings.split(",");
  new Typed(".typed", {
    strings: typed_strings,
    loop: true,
    typeSpeed: 100,
    backSpeed: 50,
    backDelay: 2000,
  });
}

// RESUME SCROLL
const pages = document.querySelectorAll(".page");
const resume = document.querySelector(".resume");

function resumeActive() {
  const scrollY = window.pageYOffset;

  document.querySelectorAll(".page").forEach((page) => {
    const sectionHeight = page.offsetHeight;
    const sectionTop = page.offsetTop - 120;
    const sectionId = page.getAttribute("id");

    if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
      document
        .querySelector(`.resume_tabs a[href*="${sectionId}"]`)
        .classList.add("current");
    } else {
      document
        .querySelector(`.resume_tabs a[href*="${sectionId}"]`)
        .classList.remove("current");
    }
  });
}

window.addEventListener("scroll", resumeActive);

// Scroll menu active
const sections = document.querySelectorAll("section[id]");

function scrollActive() {
  const scrollY = window.pageYOffset;

  sections.forEach((section) => {
    const sectionHeight = section.offsetHeight;
    const sectionTop = section.offsetTop - 50;

    let sectionId = section.getAttribute("id");

    // if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
    //   document
    //     .querySelector(`.menu a[href*="${sectionId}"]`)
    //     .classList.add("active-link");
    // } else {
    //   document
    //     .querySelector(`.menu a[href*="${sectionId}"]`)
    //     .classList.remove("active-link");
    // }
  });
}

window.addEventListener("scroll", scrollActive);

// PROJECT ACTIVE LINK
let filterItems = document.querySelectorAll(".project_filters li");

function activeProject() {
  filterItems.forEach((el) => {
    el.classList.remove("filter-active");
    this.classList.add("filter-active");
  });
}
filterItems.forEach((el) => {
  el.addEventListener("click", activeProject);
});

// let mixerProject = mixitup(".project_wrap-container", {
//   selectors: {
//     target: ".project_item",
//   },
//   animation: {
//     duration: 300,
//   },
// });

const certificates = [
  {
    photo: "assets/images/project1.png",
    name: "Belajar Dasar Pemrograman Web",
    description: "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur, architecto.",
  },
  {
    photo: "assets/images/project1.png",
    name: "Belajar Dasar Pemrograman Web",
    description: "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur, architecto.",
  },
  {
    photo: "assets/images/project1.png",
    name: "Belajar Dasar Pemrograman Web",
    description: "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur, architecto.",
  },

];

const certificateContainer = document.querySelector(".certificate_container");

certificates.forEach((certificate) => {
  const certificateHTML = `
      <div class="resume_wrap certificate_wrap">
        <div class="certificate_photo">
          <img src="${certificate.photo}" alt="Certificate Photo">
        </div>
        <div class="certificate_content">
          <h4>${certificate.name}</h4>
          <p>${certificate.description}</p>
        </div>
      </div>
    `;
  // certificateContainer.innerHTML += certificateHTML;
});

// Modal Project
document.addEventListener("DOMContentLoaded", function() {
  const modal = document.getElementById("projectModal");
  if (!modal) return;

  const closeBtn = modal.querySelector(".modal-close");
  
  closeBtn?.addEventListener("click", function() {
    modal.style.display = "none";
    document.body.style.overflow = "auto";
  });
  
  window.addEventListener("click", function(event) {
    if (event.target === modal) {
      modal.style.display = "none";
      document.body.style.overflow = "auto";
    }
  });
  
  const projectLinks = document.querySelectorAll(".project_links a:first-child");
  projectLinks.forEach((link, index) => {
    link.addEventListener("click", function(e) {
      e.preventDefault();
      if (projectsData[index]) {
        openProjectModal(index);
      }
    });
  });
  
  function openProjectModal(projectIndex) {
    const project = projectsData[projectIndex];
    if (!project) return;
    
    const setContent = (id, content) => {
      const el = document.getElementById(id);
      if (el) el.textContent = content;
    };

    setContent("modal-title", project.title);
    setContent("modal-category", project.category);
    setContent("modal-description", project.description);
    setContent("modal-date", project.date);
    setContent("modal-client", project.client);
    
    const modalImg = document.getElementById("modal-img");
    if (modalImg) modalImg.src = project.image;
    
    const modalLink = document.getElementById("modal-link");
    if (modalLink) modalLink.href = project.link;
    
    const modalGithub = document.getElementById("modal-github");
    if (modalGithub) modalGithub.href = project.github;
    
    const techContainer = document.getElementById("modal-tech");
    if (techContainer) {
      techContainer.innerHTML = "";
      project.technologies.forEach(tech => {
        const techTag = document.createElement("span");
        techTag.className = "tech-tag";
        techTag.textContent = tech;
        techContainer.appendChild(techTag);
      });
    }

    modal.style.display = "block";
    document.body.style.overflow = "hidden";
  }
});
