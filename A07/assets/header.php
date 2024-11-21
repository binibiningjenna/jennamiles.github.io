

<!-- Header -->
<div class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#home">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-send-plus"
          viewBox="0 0 16 16">
          <path
            d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855a.75.75 0 0 0-.124 1.329l4.995 3.178 1.531 2.406a.5.5 0 0 0 .844-.536L6.637 10.07l7.494-7.494-1.895 4.738a.5.5 0 1 0 .928.372zm-2.54 1.183L5.93 9.363 1.591 6.602z" />
          <path
            d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0m-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5" />
        </svg>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link fw-bold" href="#home">Home</a></li>
          <li class="nav-item"><a class="nav-link fw-bold" href="#about">About</a></li>
          <li class="nav-item"><a class="nav-link fw-bold" href="#feed">Feed</a></li>
          <li class="nav-item"><a class="nav-link fw-bold" href="#account"id="accountLink">Account</a></li>
        </ul>
      </div>
    </div>
</div>

<style>
    .navbar {
    background-color: transparent; 
    transition: background-color 0.5s ease;
}

.navbar.scrolled {
    background-color: white; 
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); 
}

.navbar .nav-link {
    color: #1d1d1d;
    transition: color 0.3s ease; 
}

.navbar .nav-link:hover {
    color: #601f83; 
}
</style>

<script>
    // Change navbar background on scroll
    window.onscroll = function () {
      const navbar = document.querySelector('.navbar');
      if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    };
  </script>