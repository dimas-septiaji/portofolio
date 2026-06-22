<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Dimas</title>
  <meta name="description" content="About Dimas Sulung Septiaji — Informatics Engineering student at Universitas Duta Bangsa, skilled in PHP, Laravel, JavaScript, CSS, and MySQL.">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    /* ─── HIDE SCROLLBAR ─── */
    html, body {
      scrollbar-width: none;        /* Firefox */
      -ms-overflow-style: none;     /* IE / Edge */
    }
    html::-webkit-scrollbar,
    body::-webkit-scrollbar {
      display: none;                /* Chrome / Safari / Opera */
    }

    /* ─── ABOUT PAGE SECTION ─── */
    #about-hero {
      position: relative;
      width: 100%;
      min-height: 100vh;
      background: #0b0c10
      overflow: hidden;
    }

    canvas#about-bg {
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
      display: block;
      z-index: 0;
      pointer-events: none;
    }

    .about-vignette {
      position: absolute;
      inset: 0;
      background: radial-gradient(ellipse at 70% 50%, transparent 25%, #0b0c10 85%);
      z-index: 1;
      pointer-events: none;
    }

    .about-inner {
      position: relative;
      z-index: 2;
    }

    /* ─── COIN FLIP CARD ─── */
    .flip-card-scene {
      perspective: 900px;
      width: 220px;
      height: 220px;
      cursor: pointer;
    }

    .flip-card {
      width: 100%;
      height: 100%;
      position: relative;
      transform-style: preserve-3d;
      transition: transform 0.8s cubic-bezier(0.45, 0.05, 0.55, 0.95);
      border-radius: 50%;
    }

    .flip-card.flipped {
      transform: rotateY(180deg);
    }

    .flip-card-front,
    .flip-card-back {
      position: absolute;
      width: 100%;
      height: 100%;
      border-radius: 50%;
      backface-visibility: hidden;
      -webkit-backface-visibility: hidden;
      overflow: hidden;
      box-shadow:
        0 0 0 3px rgba(255,255,255,0.06),
        0 0 32px rgba(100,200,255,0.08),
        0 8px 40px rgba(0,0,0,0.6);
    }

    .flip-card-front {
      background: #111;
    }

    .flip-card-back {
      transform: rotateY(180deg);
      background: #0d1117;
    }

    .flip-card-front img,
    .flip-card-back img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    /* Hint label */
    .flip-hint {
      font-family: 'JetBrains Mono', monospace;
      font-size: 0.65rem;
      color: rgba(255,255,255,0.25);
      text-align: center;
      margin-top: 10px;
      letter-spacing: 0.08em;
      user-select: none;
    }

    /* ─── SKILL PILLS ─── */
    .skill-pill {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 5px 14px;
      border-radius: 999px;
      border: 1px solid rgba(255,255,255,0.08);
      background: rgba(255,255,255,0.03);
      font-family: 'JetBrains Mono', monospace;
      font-size: 0.72rem;
      color: rgba(255,255,255,0.65);
      letter-spacing: 0.04em;
      transition: border-color 0.3s, color 0.3s, background 0.3s;
    }

    .skill-pill:hover {
      border-color: rgba(100,200,255,0.35);
      color: rgba(170,230,255,0.9);
      background: rgba(100,200,255,0.05);
    }

    .skill-dot {
      width: 6px;
      height: 6px;
      border-radius: 50%;
      background: rgba(100,200,255,0.5);
    }

    /* ─── INFO CARDS ─── */
    .info-card {
      border: 1px solid rgba(255, 255, 255, 0.009);
      background: rgba(255,255,255,0.02);
      padding: 22px 24px;
      transition: border-color 0.3s, background 0.3s;
    }

    .info-card:hover {
      border-color: rgba(100,200,255,0.15);
      background: rgba(100,200,255,0.03);
    }

    /* ─── DIVIDER ─── */
    /* .about-divider {
      width: 48px;
      height: 1.5px;
      background: linear-gradient(90deg, rgba(100,200,255,0.6), transparent);
      margin: 12px 0 16px;
    } */


    /* ─── FADE IN ANIMATIONS ─── */
    @keyframes fadeSlideUp {
      from { opacity: 0; transform: translateY(28px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    .fade-up {
      opacity: 0;
      animation: fadeSlideUp 0.7s ease forwards;
    }
    .fade-up:nth-child(1) { animation-delay: 0.1s; }
    .fade-up:nth-child(2) { animation-delay: 0.25s; }
    .fade-up:nth-child(3) { animation-delay: 0.4s; }
    .fade-up:nth-child(4) { animation-delay: 0.55s; }
    .fade-up:nth-child(5) { animation-delay: 0.7s; }

    /* ─── AUTO FLIP PULSE ─── */
    @keyframes subtlePulse {
      0%, 100% { box-shadow: 0 0 0 3px rgba(255,255,255,0.06), 0 0 32px rgba(100,200,255,0.08); }
      50%       { box-shadow: 0 0 0 3px rgba(100,200,255,0.2), 0 0 40px rgba(100,200,255,0.18); }
    }

    .flip-card-front, .flip-card-back {
      animation: subtlePulse 4s ease-in-out infinite;
    }
  </style>
</head>
<body>

<!-- ═══ NAV ═══ -->
<x-navbar></x-navbar>

<!-- ═══ ABOUT HERO ═══ -->
<section id="about-hero">

  <!-- Layer 0: live particle canvas -->
  <canvas id="about-bg"></canvas>

  <!-- Layer 1: vignette -->
  <div class="about-vignette"></div>

  <!-- Layer 2: content -->
  <div class="about-inner pt-24 pb-20 px-6 md:px-20 lg:px-32 xl:px-48">

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-center min-h-[calc(100vh-120px)]">

      <!-- LEFT: Photo flip card -->
      <div class="flex flex-col items-center lg:items-start">
        <!-- Coin flip wrapper -->
        <div class="fade-up flex flex-col items-center lg:items-start">
          <div class="flip-card-scene" id="flip-scene" title="Click to flip!">
            <div class="flip-card" id="flip-card">
              <!-- Front: real photo -->
              <div class="flip-card-front">
                <img src="{{ asset('images/profile.png') }}" alt="Dimas Ulung Septiaji — Photo">
              </div>
              <!-- Back: avatar -->
              <div class="flip-card-back">
                <img src="{{ asset('images/251172107.jpeg') }}" alt="Dimas Ulung Septiaji — Avatar">
              </div>
            </div>
          </div>
        </div>

        <!-- Name + title block -->
        <div class="fade-up mt-10 text-center lg:text-left">
          <h1 class="text-2xl md:text-3xl font-bold tracking-wide" style="font-family:'JetBrains Mono',monospace;">
            Dimas Ulung Septiaji
          </h1>
          <p class="text-zinc-400 font-light mt-1 text-sm" style="font-family:'Inter',sans-serif;">
            Informatics Engineering Student & Web Developer
          </p>
        </div>  

      </div>

      <!-- RIGHT: Description + Skills -->
      <div class="flex flex-col gap-8">

        <!-- Bio card -->
        <div class="fade-up">
          <h3 class="section-label">Who I am</h3>
          <hr class="w-100% mt-1.5 border-zinc-600">
          <p class="text-zinc-400 font-light leading-relaxed text-sm mt-4" style="font-family:'Inter',sans-serif;">
            I'm a <span class="text-white font-medium">university student</span> at
            <span class="text-white font-medium">Duta Bangsa Univesity</span>, majoring in
            Informatics Engineering. I have a genuine passion for building
            clean, functional, and well structured web applications
            transforming ideas into digital experiences through thoughtful code.
          </p>
        </div>

        <!-- Skills card -->
        <div class="fade-up info-card">
          <p class="section-label">Tech Stack</p>
          <hr class="w-100% mt-1.5 border-zinc-600 mb-5">
          <div class="flex flex-wrap gap-2">
            <span class="skill-pill"><span class="skill-dot"></span>PHP Native</span>
            <span class="skill-pill"><span class="skill-dot"></span>Laravel</span>
            <span class="skill-pill"><span class="skill-dot"></span>JavaScript</span>
            <span class="skill-pill"><span class="skill-dot"></span>CSS</span>
            <span class="skill-pill"><span class="skill-dot"></span>MySQL</span>
            <span class="skill-pill"><span class="skill-dot"></span>HTML</span>
            <span class="skill-pill"><span class="skill-dot"></span>Tailwind CSS</span>
          </div>
        </div>

        <!-- University + status -->
        <div class="fade-up grid grid-cols-1 sm:grid-cols-2 gap-4">
          <div class="info-card">
            <p class="section-label">University</p>
            <div class="about-divider"></div>
            <p class="text-white text-sm font-medium" style="font-family:'Inter',sans-serif;">Universitas Duta Bangsa</p>
            <p class="text-zinc-500 text-xs mt-1 font-light" style="font-family:'Inter',sans-serif;">Informatics Engineering</p>
          </div>
          <div class="info-card">
            <p class="section-label">Status</p>
            <div class="about-divider"></div>
            <div class="flex items-center gap-2">
              <span class="relative flex h-2 w-2">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-400"></span>
              </span>
              <p class="text-white text-sm font-medium" style="font-family:'Inter',sans-serif;">Available for Projects</p>
            </div>
            <p class="text-zinc-500 text-xs mt-1 font-light" style="font-family:'Inter',sans-serif;">Open to collaboration</p>
          </div>
        </div>

        <!-- Back to home -->
        <div class="fade-up">
          <a href="{{ url('/') }}" class="inline-flex items-center gap-2 text-zinc-400 hover:text-white text-sm transition-colors duration-300" style="font-family:'JetBrains Mono',monospace;">
            <span>←</span> Back to Home
          </a>
        </div>

      </div>

    </div>
  </div>
</section>

<script>
  /* ── Coin Flip Interaction ── */
  const scene = document.getElementById('flip-scene');
  const card  = document.getElementById('flip-card');
  let flipped = false;

  scene.addEventListener('click', () => {
    flipped = !flipped;
    card.classList.toggle('flipped', flipped);
  });

  /* Auto-flip once on load after 2.5s to hint the user */
  setTimeout(() => {
    card.classList.add('flipped');
    flipped = true;
    setTimeout(() => {
      card.classList.remove('flipped');
      flipped = false;
    }, 1800);
  }, 2500);

  /* ── About page: Geometric / Crystal lattice live background ── */
  const abgCanvas = document.getElementById('about-bg');
  const abgCtx    = abgCanvas.getContext('2d');
  const abgHero   = document.getElementById('about-hero');

  function abgResize() {
    abgCanvas.width  = abgHero.offsetWidth;
    abgCanvas.height = abgHero.offsetHeight;
  }
  abgResize();
  window.addEventListener('resize', abgResize);

  /* ── Floating geometric nodes ── */
  const NODE_COUNT = 55;
  const nodes = Array.from({ length: NODE_COUNT }, () => ({
    x:  Math.random() * 1000,
    y:  Math.random() * 700,
    vx: (Math.random() - 0.5) * 0.18,
    vy: (Math.random() - 0.5) * 0.14,
    r:  0.8 + Math.random() * 1.6,
    alpha: 0.08 + Math.random() * 0.18,
    shape: Math.random() < 0.35 ? 'triangle' : 'dot',
    rot:  Math.random() * Math.PI * 2,
    rotSpeed: (Math.random() - 0.5) * 0.008,
    size: 3 + Math.random() * 5,
  }));

  /* ── Slow drifting hex rings ── */
  const HEX_COUNT = 6;
  const hexRings = Array.from({ length: HEX_COUNT }, () => ({
    x:   150 + Math.random() * 700,
    y:    80 + Math.random() * 520,
    vx:  (Math.random() - 0.5) * 0.09,
    vy:  (Math.random() - 0.5) * 0.07,
    r:   30 + Math.random() * 50,
    rot: Math.random() * Math.PI * 2,
    rotSpeed: (Math.random() - 0.5) * 0.003,
  }));

  function drawHex(ctx, cx, cy, r, rot) {
    ctx.beginPath();
    for (let i = 0; i < 6; i++) {
      const a  = rot + (i / 6) * Math.PI * 2;
      const px = cx + Math.cos(a) * r;
      const py = cy + Math.sin(a) * r;
      i === 0 ? ctx.moveTo(px, py) : ctx.lineTo(px, py);
    }
    ctx.closePath();
  }

  function drawTriangle(ctx, cx, cy, size, rot) {
    ctx.beginPath();
    for (let i = 0; i < 3; i++) {
      const a  = rot + (i / 3) * Math.PI * 2 - Math.PI / 2;
      const px = cx + Math.cos(a) * size;
      const py = cy + Math.sin(a) * size;
      i === 0 ? ctx.moveTo(px, py) : ctx.lineTo(px, py);
    }
    ctx.closePath();
  }

  function abgDraw() {
    const W = abgCanvas.width, H = abgCanvas.height;
    abgCtx.clearRect(0, 0, W, H);
    const sx = W / 1000, sy = H / 700;

    /* Move nodes */
    nodes.forEach(n => {
      n.x = (n.x + n.vx + 1000) % 1000;
      n.y = (n.y + n.vy +  700) %  700;
      n.rot += n.rotSpeed;
    });

    /* Move hex rings */
    hexRings.forEach(h => {
      h.x = (h.x + h.vx + 1000) % 1000;
      h.y = (h.y + h.vy +  700) %  700;
      h.rot += h.rotSpeed;
    });

    /* Draw hex rings */
    hexRings.forEach(h => {
      drawHex(abgCtx, h.x * sx, h.y * sy, h.r * Math.min(sx, sy), h.rot);
      abgCtx.strokeStyle = 'rgba(80,160,220,0.04)';
      abgCtx.lineWidth   = 0.7;
      abgCtx.stroke();

      /* Inner hex */
      drawHex(abgCtx, h.x * sx, h.y * sy, h.r * 0.55 * Math.min(sx, sy), -h.rot);
      abgCtx.strokeStyle = 'rgba(80,160,220,0.025)';
      abgCtx.lineWidth   = 0.4;
      abgCtx.stroke();
    });

    /* Connection lines between nearby nodes */
    const LINK = 100;
    for (let i = 0; i < nodes.length; i++) {
      for (let j = i + 1; j < nodes.length; j++) {
        const dx = nodes[i].x - nodes[j].x;
        const dy = nodes[i].y - nodes[j].y;
        const d  = Math.sqrt(dx * dx + dy * dy);
        if (d < LINK) {
          abgCtx.beginPath();
          abgCtx.moveTo(nodes[i].x * sx, nodes[i].y * sy);
          abgCtx.lineTo(nodes[j].x * sx, nodes[j].y * sy);
          abgCtx.strokeStyle = `rgba(80,160,220,${(1 - d / LINK) * 0.045})`;
          abgCtx.lineWidth   = 0.4;
          abgCtx.stroke();
        }
      }
    }

    /* Draw nodes */
    nodes.forEach(n => {
      const nx = n.x * sx, ny = n.y * sy;

      if (n.shape === 'triangle') {
        drawTriangle(abgCtx, nx, ny, n.size * Math.min(sx, sy) * 12, n.rot);
        abgCtx.strokeStyle = `rgba(80,180,240,${n.alpha * 0.7})`;
        abgCtx.lineWidth   = 0.5;
        abgCtx.stroke();
      } else {
        /* Glowing dot */
        const g = abgCtx.createRadialGradient(nx, ny, 0, nx, ny, n.r * 5 * Math.min(sx, sy));
        g.addColorStop(0,   `rgba(80,180,240,${n.alpha * 1.2})`);
        g.addColorStop(0.5, `rgba(80,160,220,${n.alpha * 0.3})`);
        g.addColorStop(1,   'rgba(0,0,0,0)');
        abgCtx.beginPath();
        abgCtx.arc(nx, ny, n.r * 5 * Math.min(sx, sy), 0, Math.PI * 2);
        abgCtx.fillStyle = g;
        abgCtx.fill();

        abgCtx.beginPath();
        abgCtx.arc(nx, ny, n.r * Math.min(sx, sy), 0, Math.PI * 2);
        abgCtx.fillStyle = `rgba(130,210,255,${n.alpha * 1.5})`;
        abgCtx.fill();
      }
    });

    requestAnimationFrame(abgDraw);
  }

  abgDraw();
</script>

</body>
</html>
