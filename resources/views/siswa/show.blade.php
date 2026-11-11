@extends('layouts.app')

@section('title', 'Detail Siswa')

@section('content')
<div class="page-head">
    <h1>{{ $siswa->nama }}</h1>
    <p>Kelas {{ $siswa->kelas }} &middot; NIS {{ $siswa->nis }}</p>
</div>

<div class="panel narrow">
    <dl class="detail">
        <dt>NIS</dt><dd>{{ $siswa->nis }}</dd>
        <dt>Nama</dt><dd>{{ $siswa->nama }}</dd>
        <dt>Jenis Kelamin</dt><dd>{{ $siswa->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}</dd>
        <dt>Tanggal Lahir</dt><dd>{{ $siswa->tanggal_lahir->format('d F Y') }}</dd>
        <dt>Kelas</dt><dd>{{ $siswa->kelas }}</dd>
        <dt>Email</dt><dd>{{ $siswa->email ?? '-' }}</dd>
        <dt>Alamat</dt><dd>{{ $siswa->alamat ?? '-' }}</dd>
    </dl>

    <div class="form-actions" style="margin-top: 22px;">
        <a href="{{ route('siswa.edit', $siswa) }}" class="btn btn-light">Edit</a>
        <a href="{{ route('siswa.index') }}" class="btn btn-outline">Kembali</a>
    </div>
</div>
@endsection
