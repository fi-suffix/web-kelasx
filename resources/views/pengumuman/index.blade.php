<x-layout>
    <div class="pengumuman-page">
        <div class="summary-header">
            <h1>Pengumuman Kelas</h1>
            {{-- <p>Lihat semua informasi pengumuman kelas di sini. Tambahkan, edit, atau hapus pengumuman jika diperlukan.</p> --}}
        </div>

        @auth
            <div class="page-actions">
                <a href="{{ route('pengumuman.create') }}" class="btn-primary">Tambah Pengumuman</a>
            </div>
        @endauth

        <div class="pengumuman-list">
            @forelse ($allPengumuman as $pengumuman)
                <article class="announcement-item">
                    <div class="announcement-content">
                        <h4>{{ $pengumuman->judul }}</h4>
                        <p>{{ $pengumuman->isi }}</p>
                        @if($pengumuman->created_at)
                            <span class="announcement-meta">Diterbitkan {{ $pengumuman->created_at->format('d M Y') }}</span>
                        @endif
                    </div>
                    <div class="announcement-actions">
                        <a href="{{ route('pengumuman.show', $pengumuman->id) }}">Lihat</a>
                        @auth
                            <a href="{{ route('pengumuman.edit', $pengumuman->id) }}">Edit</a>
                            <form action="{{ route('pengumuman.destroy', $pengumuman->id) }}" method="POST" class="inline-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Hapus</button>
                            </form>
                        @endauth
                    </div>
                </article>
            @empty
                <p>Tidak ada pengumuman terbaru.</p>
            @endforelse
        </div>
    </div>
</x-layout>