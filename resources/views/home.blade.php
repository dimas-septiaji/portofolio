<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dimas's Portfolio</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
</head>
<body>

<!-- ═══ NAV ═══ -->

<x-navbar></x-navbar>

<!-- ═══ HERO ═══ -->
<section id="hero" class="fade-up">

  <!-- Layer 0: particle canvas -->
  <canvas id="bg"></canvas>

  <!-- Layer 1: vignette -->
  <div class="vignette"></div>

  <!-- Layer 2: content -->
  <div class="hero-inner pt-16 px-6 md:px-20 lg:px-54">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-12">

      <!-- Main intro -->
      <div class="md:col-span-2 my-14 md:my-48 lg:my-32 ">
        <div class="flex justify-center md:justify-start">
          <div class="w-48 h-48 md:w-64 md:h-64 rounded-full overflow-hidden mb-14">
            <img src="images/profile.png" class="w-full h-full object-cover">
          </div>
        </div>
        <div class="md:w-64 h-1.5 bg-white rounded-full mb-7 opacity-80"></div>
        <h1 id="typewriter"
            class="text-2xl md:text-3xl lg:text-5xl min-h-[70px] md:min-h-[100px] leading-tight">
        </h1>
        <p class="font-extralight mb-2">Hi, I'm Dimas 👋.</p>
        <p class="text-sm md:text-base lg:text-lg font-extralight leading-relaxed text-zinc-300">
          Here, you can explore my background, skills, projects, and learning journey as a web developer and Informatics Engineering student. This portfolio showcases the experiences, technologies, and projects I have worked on.
        </p>
      </div>

      <!-- Side cards -->
      <div class="md:col-span-1 md:my-38 px-0 md:px-10" style="font-family:'Inter',sans-serif;">
        <div class="mb-16">
          <h3 style="font-family:'JetBrains Mono',monospace;">About Me</h3>
          <p class="text-zinc-400 mt-3 font-light text-sm">Passionate about building websites and learning new technologies.</p>
          <a href="{{ url('/about') }}">
            <h3 style="font-family:'JetBrains Mono',monospace;" class="mt-3 text-sm">Learn More -></h3>
            <hr class="w-28 mt-1.5 border-zinc-600">
          </a>
        </div>

        <div class="w-full h-px bg-zinc-700 mb-16"></div>

        <div class="mb-16">
          <h3 style="font-family:'JetBrains Mono',monospace;">My Work</h3>
          <p class="text-zinc-400 mt-3 font-light text-sm">Duta Bangsa University student majoring in informatics engineering.</p>
          <a href="#">
            <h3 style="font-family:'JetBrains Mono',monospace;" class="mt-3 text-sm">Browse Portfolio -></h3>
            <hr class="w-40 mt-1.5 border-zinc-600">
          </a>
        </div>

        <div class="w-full h-px bg-zinc-700 mb-16"></div>

        <div>
          <h3 style="font-family:'JetBrains Mono',monospace;" class="mb-3">Follow Me on</h3>
          <div class="flex gap-4">
            <a href="https://www.instagram.com/dmssptiaji/"><img src="{{ asset('images/instagram.png') }}" alt="Instagram" width="45"></a>
            <a href="https://github.com/dimas-septiaji"><img src="{{ asset('images/social.png') }}" alt="Social" width="45"></a>
            <a href="https://www.linkedin.com/in/dimas-septiaji/"><img src="{{ asset('images/linkedin.png') }}" alt="LinkedIn" width="45"></a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

</body>
</html>
