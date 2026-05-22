<form action="{{ route('pengaturan.update') }}" method="POST" class="p-3">
    @csrf
    
    <div class="mb-2">
        <label class="form-label text-danger small fw-bold">Nama Lengkap</label>
        <input type="text" name="nama" class="form-control form-control-sm border-danger text-dark" 
               value="{{ auth()->user()->pendaftaran->nama ?? auth()->user()->name }}" required>
    </div>

    <div class="mb-2">
        <label class="form-label text-danger small fw-bold">Nomor Telepon</label>
        <input type="text" name="no_hp" class="form-control form-control-sm border-danger text-dark" 
               value="{{ auth()->user()->pendaftaran->no_hp ?? '' }}" required>
    </div>

    <div class="mb-2">
        <label class="form-label text-danger small fw-bold">Email</label>
        <input type="email" name="email" class="form-control form-control-sm border-danger text-dark" 
               value="{{ auth()->user()->email }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label text-danger small fw-bold">Usia Kehamilan</label>
        <input type="text" class="form-control form-control-sm border-danger bg-light text-muted" 
               value="{{ auth()->user()->pendaftaran->usia_kehamilan ?? '0 Minggu' }}" readonly>
        <small class="text-muted" style="font-size: 10px;">*Otomatis terhitung dari tanggal HPHT</small>
    </div>

    <div class="d-flex gap-2 mb-3">
        <button type="submit" class="btn btn-sm text-white w-50" style="background-color: #ff69b4;">
            <i class="bi bi-save"></i> Simpan
        </button>
        <button type="reset" class="btn btn-sm btn-danger w-50">
            <i class="bi bi-trash"></i> Hapus
        </button>
    </div>
</form>