<div class="col-span-12 sm:col-span-12 mb-2">
    <label for="" class="form-label">Email</label>
    <input type="text" class="form-control" name="email_profile" placeholder="Email..." value="{{ isset($profile) ? $profile->email_profile : '' }}">
</div>
<div class="col-span-12 sm:col-span-6 mb-2">
    <label for="" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password..." value="{{ isset($profile) ? $profile->password : '' }}">
</div>
<div class="col-span-12 sm:col-span-6 mb-2">
    <label for="" class="form-label">Konfirmasi Password</label>
    <input type="password" class="form-control" name="password_confirm" placeholder="Konfirmasi Password..." value="{{ isset($profile) ? $profile->password_confirm : '' }}">
</div>
<div class="col-span-12 sm:col-span-12 mb-2">
    <label for="" class="form-label">NIK</label>
    <input type="number" class="form-control" name="nik_profile" placeholder="NIK..." value="{{ isset($profile) ? $profile->nik_profile : '' }}">
</div>
<div class="col-span-12 sm:col-span-12 mb-2">
    <label for="" class="form-label">Nama</label>
    <input type="text" class="form-control" name="nama_profile" placeholder="Nama profile..." value="{{ isset($profile) ? $profile->nama_profile : '' }}">
</div>
<div class="col-span-12 sm:col-span-12 mb-2">
    <label for="" class="form-label">No. Handphone</label>
    <input type="number" class="form-control" name="nohp_profile" placeholder="No. Handphone..." value="{{ isset($profile) ? $profile->nohp_profile : '' }}">
</div>
<div class="col-span-12 sm:col-span-12 mb-2">
    <label for="" class="form-label">Alamat</label>
    <textarea class="form-control" id="alamat_profile" placeholder="Alamat..." name="alamat_profile">{{ isset($profile) ? $profile->alamat_profile : '' }}</textarea>
</div>
<div class="col-span-12 sm:col-span-12 mb-2">
    <label for="">Jenis Kelamin</label> <br>
    <div class="form-check mt-2">
        <input id="jeniskelamin_profilel" class="form-check-input" type="radio" name="jeniskelamin_profile" value="L" {{ isset($profile) ? $profile->jeniskelamin_profile == 'L' ? 'checked' : '' : '' }}>
        <label class="form-check-label" for="jeniskelamin_profilel">Laki-laki</label>
    </div>
    <div class="form-check mt-2">
        <input id="jeniskelamin_profilep" class="form-check-input" type="radio" name="jeniskelamin_profile" value="P" {{ isset($profile) ? $profile->jeniskelamin_profile == 'P' ? 'checked' : '' : '' }}>
        <label class="form-check-label" for="jeniskelamin_profilep">Perempuan</label>
    </div>
</div>
<div class="col-span-12 sm:col-span-4 mb-2">
    <label for="" class="form-label">Profile</label>
    <input type="file" class="form-control" name="gambar_profile">
    @if (isset($profile))
    @if ($profile != null)
    <div id="load_gambar_profile">
        <a class="photoviewer" href="{{ asset('upload/profile/'.$profile->gambar_profile) }}" data-gallery="photoviewer" data-title="{{ $profile->gambar_profile }}" target="_blank">
            <img src="{{ asset('upload/profile/'.$profile->gambar_profile) }}" alt="Upload gambar" height="100px" class="rounded">
        </a>
    </div>
    @endif
    @endif
</div>