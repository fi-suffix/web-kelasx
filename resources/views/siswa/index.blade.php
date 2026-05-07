<x-layout>
    <div class="search-container">
        <form action="/siswa/search" method="GET" class="search-form">
            <input type="text" name="keyword" placeholder="Cari siswa..." class="search-input">
            <button type="submit" class="search-button" value="keyword">Cari</button>
        </form>
    </div>
    <br>
    {{-- @auth adalah akses yang hanya dibuat untuk admin --}}
    @auth
    <a class="create-siswa-btn" href="{{ route('siswa.create') }}">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3">
            <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/>
        </svg>
        Tambah Siswa
    </a>
    {{-- akses selesai di @endauth --}}
    @endauth
    <br>
    <br>
    <div class="siswa-grid">
        @foreach ($siswa as $wargakelas)
        <div class="team-card">
            <img src="{{ asset('storage/image/'. $wargakelas->image) }}" alt="gambar orang" loading="lazy">
            <div class="info">
                <h3>{{ $wargakelas->nama }}</h3>
                <p>{{ $wargakelas->jabatan }}</p>
            </div>
            <div class="crud">
                <a href="{{ route('siswa.show', $wargakelas->id) }}">show</a>
                @auth
                    <a href="{{ route('siswa.edit', $wargakelas->id) }}">edit</a>
                    <form action="{{ route('siswa.destroy', $wargakelas->id) }}" method="POST">
                        @csrf
                        {{-- pergantian method dari post menjadi delete --}}
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                @endauth
            </div>
        </div>
        @endforeach
    </div>
</x-layout>