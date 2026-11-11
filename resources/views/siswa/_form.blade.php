<div class="grid-2">
    <div class="field">
        <label class="title">NIS</label>
        <input type="text" name="nis" value="{{ old('nis', $siswa->nis) }}" class="@error('nis') is-invalid @enderror">
        @error('nis') <small class="error">{{ $message }}</small> @enderror
    </div>

    <div class="field">
        <label class="title">Nama Lengkap</label>
        <input type="text" name="nama" value="{{ old('nama', $siswa->nama) }}" class="@error('nama') is-invalid @enderror">
        @error('nama') <small class="error">{{ $message }}</small> @enderror
    </div>

    <div class="field">
        <label class="title">Jenis Kelamin</label>
        <div class="radio-group">
            <label class="radio">
                <input type="radio" name="jenis_kelamin" value="L" {{ old('jenis_kelamin', $siswa->jenis_kelamin) === 'L' ? 'checked' : '' }}>
                Laki-laki
            </label>
            <label class="radio">
                <input type="radio" name="jenis_kelamin" value="P" {{ old('jenis_kelamin', $siswa->jenis_kelamin) === 'P' ? 'checked' : '' }}>
                Perempuan
            </label>
        </div>
        @error('jenis_kelamin') <small class="error">{{ $message }}</small> @enderror
    </div>

    <div class="field">
        <label class="title">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir"
               value="{{ old('tanggal_lahir', $siswa->tanggal_lahir?->format('Y-m-d')) }}"
               class="@error('tanggal_lahir') is-invalid @enderror">
        @error('tanggal_lahir') <small class="error">{{ $message }}</small> @enderror
    </div>

    <div class="field">
        <label class="title">Kelas</label>
        <input type="text" name="kelas" value="{{ old('kelas', $siswa->kelas) }}" class="@error('kelas') is-invalid @enderror">
        @error('kelas') <small class="error">{{ $message }}</small> @enderror
    </div>

    <div class="field">
        <label class="title">Email (opsional)</label>
        <input type="email" name="email" value="{{ old('email', $siswa->email) }}" class="@error('email') is-invalid @enderror">
        @error('email') <small class="error">{{ $message }}</small> @enderror
    </div>

    <div class="field full">
        <label class="title">Alamat (opsional)</label>
        <textarea name="alamat" rows="3" class="@error('alamat') is-invalid @enderror">{{ old('alamat', $siswa->alamat) }}</textarea>
        @error('alamat') <small class="error">{{ $message }}</small> @enderror
    </div>
</div>
