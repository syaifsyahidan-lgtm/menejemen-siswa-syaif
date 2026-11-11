@extends('layouts.app')

@section('title', 'Data Siswa')

@section('content')
<section class="hero">
    <h1>MENEJEMEN SYAIF</h1>
    <h2>Sistem Manajeme syaif</h2>
    <p>Kelola data siswa dalam satu tempat: tambah, lihat, ubah, dan hapus dengan mudah.
       Saat ini terdapat {{ $siswa->total() }} siswa terdaftar.</p>
    <a href="{{ route('siswa.create') }}" class="btn btn-light">Tambah Siswa</a>
</section>

<section class="panel">
    <form method="GET" action="{{ route('siswa.index') }}" class="search">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nama atau NIS...">
        <button class="btn btn-outline">Cari</button>
    </form>

    <div class="table-scroll">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>JK</th>
                    <th>Tgl Lahir</th>
                    <th>Kelas</th>
                    <th class="text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($siswa as $item)
                    <tr>
                        <td>{{ $siswa->firstItem() + $loop->index }}</td>
                        <td>{{ $item->nis }}</td>
                        <td>{{ $item->nama }}</td>
                        <td><span class="badge">{{ $item->jenis_kelamin }}</span></td>
                        <td>{{ $item->tanggal_lahir->format('d-m-Y') }}</td>
                        <td>{{ $item->kelas }}</td>
                        <td class="text-right">
                            <a href="{{ route('siswa.show', $item) }}" class="btn btn-sm btn-info">Detail</a>
                            <a href="{{ route('siswa.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('siswa.destroy', $item) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Yakin hapus data {{ $item->nama }}?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="empty">Belum ada data siswa.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $siswa->links('vendor.pagination.siswa') }}
</section>
@endsection
