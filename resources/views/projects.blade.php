<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <title>Projects</title>
</head>

<body>
  <x-navbar></x-navbar>
    <section class="projects pt-24 px-6 md:px-20 lg:px-32 xl:px-48 max-w-7xl">
    <div class="project-card">
        <h3>Portfolio Website</h3>
        <p>Website portfolio menggunakan Laravel dan Tailwind CSS.</p>
        <img src="" alt="" srcset="">
    </div>

    <div class="project-card">
        <h3>Student Classification</h3>
        <p>Sistem klasifikasi prestasi siswa menggunakan Naive Bayes.</p>
        <img src="" alt="" srcset="">
    </div>

    <div class="project-card">
        <h3>Server Monitoring</h3>
        <p>Monitoring server Ubuntu menggunakan Tailscale.</p>
        <img src="" alt="" srcset="">
    </div>
</section>
</body>
</html>