@extends('layouts.app')

@section('title', 'Tambah Siswa')

@section('content')
<div class="page-head">
    <h1>Tambah Siswa</h1>
    <p>Isi data siswa baru dengan lengkap.</p>
</div>

<div class="panel narrow">
    <form action="{{ route('siswa.store') }}" method="POST">
        @csrf
        @include('siswa._form', ['siswa' => new \App\Models\Siswa()])
        <div class="form-actions">
            <button class="btn btn-light">Simpan</button>
            <a href="{{ route('siswa.index') }}" class="btn btn-outline">Batal</a>
        </div>
    </form>
</div>
@endsection
