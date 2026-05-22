<div class="card shadow-sm border-0" style="width: 320px; border-radius: 15px;">
    <div class="card-body p-3">
        <h5 class="text-center fw-bold mb-3">Pengaturan & Profil</h5>
        
        <div class="text-center mb-3">
            <form action="#" method="POST" enctype="multipart/form-data" id="avatarForm">
                @csrf
                <div class="profile-avatar-container mb-2 d-inline-block position-relative" 
                     onclick="document.getElementById('avatarInput').click();" 
                     style="cursor: pointer;" 
                     title="Klik untuk mengubah foto">
                    <img src="{{ auth()->user()->avatar ?? asset('images/default-avatar.png') }}" class="rounded-circle border" width="80" height="80" alt="Avatar">
                </div>
                <input type="file" id="avatarInput" name="avatar" accept="image/*" style="display: none;" onchange="document.getElementById('avatarForm').submit();">
            </form>
            <button class="btn btn-xs text-white rounded-pill px-3 py-0" style="font-size: 11px; background-color: #ff69b4;" onclick="document.getElementById('avatarInput').click();">Edit Profile ▼</button>
        </div>

        @if(auth()->user()->role === 'bumil')
            @include('partials.pengaturanpasien')
        @endif

        <div class="settings-menu-list">
            <h6 class="fw-bold px-2 mb-2">Pengaturan</h6>
            
            <div class="menu-item d-flex justify-content-between align-items-center p-2 mb-2 rounded bg-light">
                <span>Mode malam</span>
                <div class="form-check form-switch m-0">
                    <input class="form-check-input" type="checkbox" id="darkModeSwitch" style="cursor: pointer;">
                </div>
            </div>

            <a href="#" class="menu-item d-flex justify-content-between align-items-center p-2 mb-2 rounded bg-light text-decoration-none text-dark">
                <span>Keamanan</span> <i class="bi bi-chevron-right text-muted"></i>
            </a>

            <a href="#" class="menu-item d-flex justify-content-between align-items-center p-2 mb-2 rounded bg-light text-decoration-none text-dark">
                <span>Ganti Nomor HP</span> <i class="bi bi-chevron-right text-muted"></i>
            </a>

            <a href="#" class="menu-item d-flex justify-content-between align-items-center p-2 mb-3 rounded bg-light text-decoration-none text-dark">
                <span>Pusat Bantuan</span> <i class="bi bi-chevron-right text-muted"></i>
            </a>
        </div>

        <div class="other-menu-list border-top pt-2" style="background-color: #fbe3ed; border-radius: 10px;">
            <p class="text-center small fw-bold text-muted my-1">Lainnya</p>
            
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-100 btn text-start d-flex justify-content-between align-items-center py-2 px-3 text-danger fw-bold border-0 bg-transparent" style="font-size: 14px;">
                    <span><i class="bi bi-box-arrow-right me-2"></i> Keluar</span> <i class="bi bi-chevron-right"></i>
                </button>
            </form>

            <form action="{{ route('profile.destroy') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-100 btn text-start d-flex justify-content-between align-items-center py-2 px-3 text-danger fw-bold border-0 bg-transparent" style="font-size: 14px;">
                    <span><i class="bi bi-trash me-2"></i> Hapus akun</span> <i class="bi bi-chevron-right"></i>
                </button>
            </form>
        </div>

    </div>
</div>