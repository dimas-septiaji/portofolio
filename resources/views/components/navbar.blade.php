<div>
<nav>
  <div class="max-w-6xl mx-auto px-4">
    <div class="flex justify-between items-center h-16">
      <div class="flex items-center gap-2">
        <img src="{{ asset('images/coding.png') }}" alt="" width="36" class="opacity-80">
        <h1 class="text-xl md:text-2xl">DimasDev</h1>
      </div>
      <div class="hidden md:flex space-x-8 text-sm text-zinc-50">
        <a href="{{ url('/') }}" class="hover:text-amber-300 transition-colors">Home</a>
        <a href="{{ url('/about') }}" class="hover:text-amber-300 transition-colors">About</a>
        <a href="#" class="hover:text-amber-300 transition-colors">Project</a>
        <a href="#" class="hover:text-amber-300 transition-colors">Contact</a>
      </div>
      <button id="menu-btn" class="md:hidden text-xl focus:outline-none">☰</button>
    </div>
  </div>
  <div id="mobile-menu" class="hidden md:hidden px-4 pb-4 space-y-2 border-t border-zinc-800 text-sm text-zinc-400">
    <a href="{{ url('/') }}" class="block hover:text-amber-300 py-1">Home</a>
    <a href="{{ url('/about') }}" class="block hover:text-amber-300 py-1">About</a>
    <a href="#" class="block hover:text-amber-300 py-1">Project</a>
    <a href="#" class="block hover:text-amber-300 py-1">Contact</a>
  </div>
</nav>
</div>