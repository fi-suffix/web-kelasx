<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RPL 1</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <header class="main-header">
        
    <div class="navbar-right-elements">
    <div class="brand-container">
        <h1 class="class-name">X RPL 1</h1>
        <p>Class Management Dashboard</p>
    </div>
        @guest
            <a class="logbtn" href="/login">Login</a>
        @endguest
        @auth
          <h2 class="welcome-message">Welcome, {{ auth()->user()->name }}! (Admin)</h2>
            <form action="/logout" method="POST">
              @csrf
              <button class="logbtn" type="submit">Logout</button>
            </form>
        @endauth

    </header>
    <div class="content-wrapper">
        <nav id="sidebar">
          <ul>
            <li>
              <span class="nav-logo">X RPL 1</span>
              <button onclick=toggleSidebar() id="toggle-btn">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  height="24px"
                  viewBox="0 -960 960 960"
                  width="24px"
                  fill="#e3e3e3"
                >
                  <path
                    d="M440-240 200-480l240-240 56 56-183 184 183 184-56 56Zm264 0L464-480l240-240 56 56-183 184 183 184-56 56Z"
                  />
                </svg>
              </button>
            </li>
            
        <li>
          <x-nav-link href="/" :active="request()->is('/')">
            <x-svg-link :active="request()->is('/')" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M520-600v-240h320v240H520ZM120-440v-400h320v400H120Zm400 320v-400h320v400H520Zm-400 0v-240h320v240H120Zm80-400h160v-240H200v240Zm400 320h160v-240H600v240Zm0-480h160v-80H600v80ZM200-200h160v-80H200v80Zm160-320Zm240-160Zm0 240ZM360-280Z"/></x-svg-link>
            <span>Ringkasan</span>
          </x-nav-link>
        </li>
        <li>
          <x-nav-link href="/siswa" :active="request()->is('siswa')">
            <x-svg-link :active="request()->is('siswa')" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M0-240v-63q0-43 44-70t116-27q13 0 25 .5t23 2.5q-14 21-21 44t-7 48v65H0Zm240 0v-65q0-32 17.5-58.5T307-410q32-20 76.5-30t96.5-10q53 0 97.5 10t76.5 30q32 20 49 46.5t17 58.5v65H240Zm540 0v-65q0-26-6.5-49T754-397q11-2 22.5-2.5t23.5-.5q72 0 116 26.5t44 70.5v63H780Zm-455-80h311q-10-20-55.5-35T480-370q-55 0-100.5 15T325-320ZM160-440q-33 0-56.5-23.5T80-520q0-34 23.5-57t56.5-23q34 0 57 23t23 57q0 33-23 56.5T160-440Zm640 0q-33 0-56.5-23.5T720-520q0-34 23.5-57t56.5-23q34 0 57 23t23 57q0 33-23 56.5T800-440Zm-320-40q-50 0-85-35t-35-85q0-51 35-85.5t85-34.5q51 0 85.5 34.5T600-600q0 50-34.5 85T480-480Zm0-80q17 0 28.5-11.5T520-600q0-17-11.5-28.5T480-640q-17 0-28.5 11.5T440-600q0 17 11.5 28.5T480-560Zm1 240Zm-1-280Z"/></x-svg-link>
            <span>Siswa</span>
          </x-nav-link>
        </li>
        <li>
          <x-nav-link href="/piket" :active="request()->is('piket')">
            <x-svg-link :active="request()->is('piket')"
            xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M120-40v-280q0-83 58.5-141.5T320-520h40v-320q0-33 23.5-56.5T440-920h80q33 0 56.5 23.5T600-840v320h40q83 0 141.5 58.5T840-320v280H120Zm80-80h80v-120q0-17 11.5-28.5T320-280q17 0 28.5 11.5T360-240v120h80v-120q0-17 11.5-28.5T480-280q17 0 28.5 11.5T520-240v120h80v-120q0-17 11.5-28.5T640-280q17 0 28.5 11.5T680-240v120h80v-200q0-50-35-85t-85-35H320q-50 0-85 35t-35 85v200Zm320-400v-320h-80v320h80Zm0 0h-80 80Z"/></x-svg-link>
            <span>Jadwal Piket</span>
          </x-nav-link>
        </li>
        <li>
          <x-nav-link href="/pengumuman" :active="request()->is('pengumuman')">
            <x-svg-link :active="request()->is('pengumuman')" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M720-440v-80h160v80H720Zm48 280-128-96 48-64 128 96-48 64Zm-80-480-48-64 128-96 48 64-128 96ZM200-200v-160h-40q-33 0-56.5-23.5T80-440v-80q0-33 23.5-56.5T160-600h160l200-120v480L320-360h-40v160h-80Zm240-182v-196l-98 58H160v80h182l98 58Zm120 36v-268q27 24 43.5 58.5T620-480q0 41-16.5 75.5T560-346ZM300-480Z"/></x-svg-link>
            <span>Pengumuman</span>
          </x-nav-link>
        </li>
        <li>
          <x-nav-link href="/jadwal" :active="request()->is('jadwal')">
            <x-svg-link :active="request()->is('jadwal')" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M200-80q-33 0-56.5-23.5T120-160v-560q0-33 23.5-56.5T200-800h40v-80h80v80h320v-80h80v80h40q33 0 56.5 23.5T840-720v560q0 33-23.5 56.5T760-80H200Zm0-80h560v-400H200v400Zm0-480h560v-80H200v80Zm0 0v-80 80Z"/></x-svg-link>
            <span>Jadwal</span>
          </x-nav-link>
        </li>
      </ul>
    </nav>


    <main>
        <div>
            {{$slot}}
        </div>
    </main>
    </div>
</body>
<footer>
  <p>&copy; 2025 GitsubTeams. All rights reserved.</p>
  <div class="iframe">
    <h2>Lokasi:</h2>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d991.1074708402244!2d106.8647249243388!3d-6.467100609764616!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c1005501fd65%3A0x13e8a639e1e82f0d!2sMarkas%20Besar%20Rongawi%20Empire!5e0!3m2!1sid!2sid!4v1777869172763!5m2!1sid!2sid" width="400" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
</footer>
</html>