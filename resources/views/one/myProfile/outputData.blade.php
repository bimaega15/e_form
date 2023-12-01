<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
        <div class="report-box">
            <div class="box p-5">
                <h6 class="font-bold mb-2"> <i class="fas fa-image"></i> Gambar Profile</h6>
                <hr>
                <a class="photoviewer mt-2" href="{{ asset('upload/profile/'.$profile->profile->gambar_profile) }}" data-gallery="photoviewer" data-title="{{ asset('upload/profile/'.$profile->profile->gambar_profile) }}" target="_blank">
                    <img src="{{ asset('upload/profile/'.$profile->profile->gambar_profile) }}" alt="Upload gambar" height="100px" class="rounded">
                </a>
            </div>
        </div>
    </div>
    <div class="col-span-12 sm:col-span-6 xl:col-span-8 intro-y">
        <div class="report-box">
            <div class="box p-5">
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 sm:col-span-6 xl:col-span-12 intro-y">
                        <h2 class="font-bold mb-2"><i class="fas fa-pencil"></i> Biodata Diri</h2>
                        <hr />
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y text-right">
                        Nik :
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-8 intro-y">
                        {{ $profile->profile->nik_profile }}
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y text-right">
                        Nama :
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-8 intro-y">
                        {{ $profile->profile->nama_profile }}
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y text-right">
                        Email :
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-8 intro-y">
                        {{ $profile->profile->email_profile }}
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y text-right">
                        Alamat :
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-8 intro-y">
                        {{ $profile->profile->alamat_profile }}
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y text-right">
                        No. Handphone :
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-8 intro-y">
                        {{ $profile->profile->nohp_profile }}
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y text-right">
                        Jenis Kelamin :
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-8 intro-y">
                        {{ $profile->profile->jeniskelamin_profile == 'L' ? 'Laki-laki' : 'Perempuan' }}
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y text-right">
                        Jabatan :
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-8 intro-y">
                        {{ $profile->profile->jabatan->nama_jabatan }}
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y text-right">
                        Unit :
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-8 intro-y">
                        {{ $profile->profile->unit->nama_unit }}
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y text-right">
                        Category Office :
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-8 intro-y">
                        {{ $profile->profile->categoryOffice->nama_category_office }}
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y text-right">
                        Atasan :
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-8 intro-y">
                        {{ $profile->profile->usersid_atasan == null ? '-' : UtilsHelp::myProfile($profile->profile->usersid_atasan)->profile->nama_profile }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>