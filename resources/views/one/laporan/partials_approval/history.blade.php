<div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 mt-3 px-10">
    <div class="intro-x flex items-center h-10">
        <h2 class="text-lg font-medium truncate mr-5">
            History Pengajuan
        </h2>
    </div>
    <div class="mt-5 relative before:block before:absolute before:w-px before:h-[85%] before:bg-slate-200 before:dark:bg-darkmode-400 before:ml-5 before:mt-5">
        @foreach ($getTransactionApprove as $setApprove)
        <div class="intro-x relative flex items-center mb-3">
            <div class="before:block before:absolute before:w-20 before:h-px before:bg-slate-200 before:dark:bg-darkmode-400 before:mt-5 before:ml-5">
                <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                    <img alt="{{ $setApprove->users->profile->gambar_profile }}" src="{{ asset('upload/profile/'.$setApprove->users->profile->gambar_profile) }}">
                </div>
            </div>
            <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
                <div class="flex items-center">
                    <div class="font-medium">{{ $setApprove->users->profile->nama_profile }} [{{ $setApprove->users->profile->jabatan->nama_jabatan }}]</div>
                    <div class="text-xs text-slate-500 ml-auto">{{ UtilsHelp::formatDate($setApprove->tanggal_approvel) }}</div>
                </div>
                <div class="text-slate-500 mt-1">Telah Approve Pengajuan</div>
                @php
                $usersForward = UtilsHelp::forwardUsers($setApprove->users_id_forward);
                @endphp
                <div class="text-slate-500 mt-1">Diteruskan Oleh {{ $usersForward->profile->nama_profile }} [{{ $usersForward->profile->jabatan->nama_jabatan }}]</div>
                <div class="box px-5 py-3 ml-4 flex-1">
                    <strong>{{ $setApprove->keterangan_approvel }}</strong>
                </div>
            </div>
        </div>
        @endforeach

        @if (count($getTransactionApprove) == 0)
        <div class="intro-x relative flex items-center mb-3">
            <div class="box px-5 py-3 ml-4 flex-1">
                <div class="text-slate-500 mt-1">Tidak Ada</div>
            </div>
        </div>
        @endif
    </div>
</div>