document.getElementById('menu-btn').addEventListener('click', () => {
    document.getElementById('mobile-menu').classList.toggle('hidden');
  });

  /* Typewriter */
  const words = ["Hello, World!", "I'm a Web Developer", "Welcome to my portfolio."];
  let wi = 0, ci = 0, deleting = false;
  function type() {
    const word = words[wi];
    const el   = document.getElementById('typewriter');
    if (deleting) {
      el.textContent = word.substring(0, ci - 1);
      ci--;
      if (ci === 0) { deleting = false; wi = (wi + 1) % words.length; }
    } else {
      el.textContent = word.substring(0, ci + 1);
      ci++;
      if (ci === word.length) deleting = true;
    }
    setTimeout(type, deleting ? 75 : 150);
  }
  type();

  /* ── Atom particle background ── */
  const canvas = document.getElementById('bg');
  const ctx    = canvas.getContext('2d');
  const hero   = document.getElementById('hero');

  /* Resize canvas whenever section size changes */
  function resize() {
    canvas.width  = hero.offsetWidth;
    canvas.height = hero.offsetHeight;
  }
  resize();
  window.addEventListener('resize', resize);

  /* ── Nuclei ── */
  const NUCLEUS_COUNT = 10;
  const nuclei = Array.from({ length: NUCLEUS_COUNT }, (_, i) => {
    /* Distribute in a 2-col × 5-row loose grid in virtual 1000×600 space */
    const col = i % 2, row = Math.floor(i / 2);
    return {
      x:  150 + col * 700 + (Math.random() - 0.5) * 200,
      y:   60 + row * 120 + (Math.random() - 0.5) * 50,
      vx: (Math.random() - 0.5) * 0.20,
      vy: (Math.random() - 0.5) * 0.16,
      r:  2.6 + Math.random() * 2.2,
      electrons: [],
    };
  });

  nuclei.forEach(n => {
    const orbitCount = Math.floor(Math.random() * 2) + 2;
    for (let o = 0; o < orbitCount; o++) {
      const eCount = Math.floor(Math.random() * 3) + 2;
      for (let e = 0; e < eCount; e++) {
        n.electrons.push({
          angle:  (e / eCount) * Math.PI * 2,
          orbitR: 26 + o * 22 + Math.random() * 10,
          speed:  (0.006 + Math.random() * 0.008) * (Math.random() < 0.5 ? 1 : -1),
          tilt:   Math.random() * Math.PI,
        });
      }
    }
  });

  /* ── Free particles ── */
  const NUM_PARTICLES = 90;
  const particles = Array.from({ length: NUM_PARTICLES }, () => ({
    x:     Math.random() * 1000,
    y:     Math.random() * 600,
    vx:    (Math.random() - 0.5) * 0.25,
    vy:    (Math.random() - 0.5) * 0.25,
    r:     0.6 + Math.random() * 1.5,
    alpha: 0.05 + Math.random() * 0.12,
  }));

  /* ── Draw loop ── */
  function draw() {
    const W = canvas.width, H = canvas.height;
    ctx.clearRect(0, 0, W, H);

    const sx = W / 1000, sy = H / 600;

    nuclei.forEach(n => {
      n.x = (n.x + n.vx + 1000) % 1000;
      n.y = (n.y + n.vy +  600) %  600;
    });
    particles.forEach(p => {
      p.x = (p.x + p.vx + 1000) % 1000;
      p.y = (p.y + p.vy +  600) %  600;
    });

    /* Connection lines */
    const allPts = [
      ...particles.map(p => ({ x: p.x * sx, y: p.y * sy })),
      ...nuclei.map(n    => ({ x: n.x * sx, y: n.y * sy })),
    ];
    const LINK = 88;
    for (let i = 0; i < allPts.length; i++) {
      for (let j = i + 1; j < allPts.length; j++) {
        const dx = allPts[i].x - allPts[j].x;
        const dy = allPts[i].y - allPts[j].y;
        const d  = Math.sqrt(dx * dx + dy * dy);
        if (d < LINK) {
          ctx.beginPath();
          ctx.moveTo(allPts[i].x, allPts[i].y);
          ctx.lineTo(allPts[j].x, allPts[j].y);
          ctx.strokeStyle = `rgba(155,153,145,${(1 - d / LINK) * 0.055})`;
          ctx.lineWidth   = 0.4;
          ctx.stroke();
        }
      }
    }

    /* Atoms */
    nuclei.forEach(n => {
      const nx = n.x * sx, ny = n.y * sy;

      n.electrons.forEach(e => {
        e.angle += e.speed;
        const cosT = Math.cos(e.tilt), sinT = Math.sin(e.tilt);
        const exl  = Math.cos(e.angle) * e.orbitR;
        const eyl  = Math.sin(e.angle) * e.orbitR * 0.36;
        const ex   = (n.x + exl * cosT - eyl * sinT) * sx;
        const ey   = (n.y + exl * sinT + eyl * cosT) * sy;

        /* Orbit ellipse */
        ctx.beginPath();
        for (let s = 0; s <= 80; s++) {
          const a   = (s / 80) * Math.PI * 2;
          const pxl = Math.cos(a) * e.orbitR;
          const pyl = Math.sin(a) * e.orbitR * 0.36;
          const px  = (n.x + pxl * cosT - pyl * sinT) * sx;
          const py  = (n.y + pxl * sinT + pyl * cosT) * sy;
          s === 0 ? ctx.moveTo(px, py) : ctx.lineTo(px, py);
        }
        ctx.closePath();
        ctx.strokeStyle = 'rgba(200,198,190,0.05)';
        ctx.lineWidth   = 0.5;
        ctx.stroke();

        /* Electron */
        ctx.beginPath();
        ctx.arc(ex, ey, 1.5, 0, Math.PI * 2);
        ctx.fillStyle = 'rgba(215,213,205,0.48)';
        ctx.fill();
      });

      /* Glow */
      const g = ctx.createRadialGradient(nx, ny, 0, nx, ny, n.r * 4);
      g.addColorStop(0,   'rgba(240,238,228,0.55)');
      g.addColorStop(0.4, 'rgba(200,198,188,0.18)');
      g.addColorStop(1,   'rgba(120,118,108,0.00)');
      ctx.beginPath();
      ctx.arc(nx, ny, n.r * 4, 0, Math.PI * 2);
      ctx.fillStyle = g;
      ctx.fill();

      /* Core */
      ctx.beginPath();
      ctx.arc(nx, ny, n.r, 0, Math.PI * 2);
      ctx.fillStyle = 'rgba(235,233,223,0.70)';
      ctx.fill();
    });

    /* Free particles */
    particles.forEach(p => {
      ctx.beginPath();
      ctx.arc(p.x * sx, p.y * sy, p.r, 0, Math.PI * 2);
      ctx.fillStyle = `rgba(170,168,158,${p.alpha})`;
      ctx.fill();
    });

    requestAnimationFrame(draw);
  }

  draw();
