@if (isset($profile))
<form method="post" action="{{ url('setting/users/'.$profile->users_id.'?_method=put') }}" id="form-submit">
    @else
    <form method="post" action="{{ route('setting.users.store') }}" id="form-submit">
        @endif
        <x-modal.modal-body>
            <input type="hidden" name="id" value="{{ isset($profile) ? $profile->id : '' }}">
            <input type="hidden" name="password_old" value="{{ isset($profile) ? $profile->users->password : '' }}">
            <div class="col-span-12 sm:col-span-12 mb-2">
                <label for="" class="form-label">Email</label>
                <input type="text" class="form-control" name="email_profile" placeholder="Email..." value="{{ isset($profile) ? $profile->email_profile : '' }}">
            </div>
            <div class="col-span-12 sm:col-span-6 mb-2">
                <label for="" class="form-label">Password</label>
                <input type="text" class="form-control" name="password" placeholder="Password..." value="{{ isset($profile) ? $profile->password : '' }}">
            </div>
            <div class="col-span-12 sm:col-span-6 mb-2">
                <label for="" class="form-label">Konfirmasi Password</label>
                <input type="text" class="form-control" name="password_confirm" placeholder="Konfirmasi Password..." value="{{ isset($profile) ? $profile->password_confirm : '' }}">
            </div>

            <div class="col-span-12 sm:col-span-12 mb-2">
                <label for="" class="form-label">NIK</label>
                <input type="text" class="form-control" name="nik_profile" placeholder="NIK..." value="{{ isset($profile) ? $profile->nik_profile : '' }}">
            </div>
            <div class="col-span-12 sm:col-span-12 mb-2">
                <label for="" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama_profile" placeholder="Nama profile..." value="{{ isset($profile) ? $profile->nama_profile : '' }}">
            </div>
            <div class="col-span-12 sm:col-span-12 mb-2">
                <label for="" class="form-label">No. Handphone</label>
                <input type="text" class="form-control" name="nohp_profile" placeholder="No. Handphone..." value="{{ isset($profile) ? $profile->nohp_profile : '' }}">
            </div>
            <div class="col-span-12 sm:col-span-12 mb-2">
                <label for="" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat_profile" placeholder="Alamat..." name="alamat_profile">{{ isset($profile) ? $profile->alamat_profile : '' }}</textarea>
            </div>

            <div class="form-group">
                <label for="">Jenis Kelamin</label> <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jeniskelamin_profile" id="jeniskelamin_profilel" value="L" {{ isset($profile) ? $profile->jeniskelamin_profile == 'L' ? 'checked' : '' : '' }}>
                    <label class="form-check-label" for="jeniskelamin_profilel">Laki-laki</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jeniskelamin_profile" id="jeniskelamin_profilep" value="P" {{ isset($profile) ? $profile->jeniskelamin_profile == 'P' ? 'checked' : '' : '' }}>
                    <label class="form-check-label" for="jeniskelamin_profilep">Perempuan</label>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-4 mb-2">
                <label for="" class="form-label">Icon</label>
                <input type="file" class="form-control" name="gambar_profile">
                @if (isset($profile))
                @if ($profile != null)
                <div id="load_gambar_profile">
                    <a class="photoviewer" href="{{ asset('upload/users/'.$profile->gambar_profile) }}" data-gallery="photoviewer" data-title="{{ $profile->gambar_profile }}" target="_blank">
                        <img src="{{ asset('upload/users/'.$profile->gambar_profile) }}" alt="Upload gambar" height="100px" class="rounded">
                    </a>
                </div>
                @endif
                @endif
            </div>
        </x-modal.modal-body>

        <x-modal.modal-footer>
            <div class="form-group d-flex">
                <button type="button" class="btn btn-secondary d-flex align-items-center justify-content-center mr-2" data-dismiss="modal">
                    <i class="zmdi zmdi-close mr-1"></i> Close
                </button>
                <button type="submit" class="btn btn-primary mr-2" id="btn_submit"><i class="zmdi zmdi-mail-send mr-1"></i>
                    Simpan</button>
            </div>
        </x-modal.modal-footer>
    </form>


    <script type="text/javascript" src="{{ asset('js/setting/users/form.js') }}"></script>