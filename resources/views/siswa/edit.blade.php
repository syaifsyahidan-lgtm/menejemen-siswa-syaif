@extends('layouts.app')

@section('title', 'Edit Siswa')

@section('content')
<div class="page-head">
    <h1>Edit Siswa</h1>
    <p>Perbarui data untuk {{ $siswa->nama }}.</p>
</div>

<div class="panel narrow">
    <form action="{{ route('siswa.update', $siswa) }}" method="POST">
        @csrf
        @method('PUT')
        @include('siswa._form')
        <div class="form-actions">
            <button class="btn btn-light">Perbarui</button>
            <a href="{{ route('siswa.index') }}" class="btn btn-outline">Batal</a>
        </div>
    </form>
</div>
@endsection
