@php
    $myProfile = UtilsHelp::myProfile();
    // dd($myProfile->profile->nama_profile);
@endphp
<div class="top-bar -mx-4 px-4 md:mx-0 md:px-0">
    <!-- BEGIN: Breadcrumb -->
    @yield('breadcrumbs')
    <!-- END: Breadcrumb -->
    <!-- BEGIN: Search -->
    <div class="intro-x relative mr-3 sm:mr-6">
        <a class="notification sm:hidden" href="#"> <i data-lucide="search"
                class="notification__icon dark:text-slate-500"></i> </a>
        <div class="search-result">
            <div class="search-result__content">
                <div class="search-result__content__title">Pages</div>
                <div class="mb-5">
                    <a href="#" class="flex items-center">
                        <div
                            class="w-8 h-8 bg-success/20 dark:bg-success/10 text-success flex items-center justify-center rounded-full">
                            <i class="w-4 h-4" data-lucide="inbox"></i>
                        </div>
                        <div class="ml-3">Mail Settings</div>
                    </a>
                    <a href="#" class="flex items-center mt-2">
                        <div class="w-8 h-8 bg-pending/10 text-pending flex items-center justify-center rounded-full">
                            <i class="w-4 h-4" data-lucide="users"></i>
                        </div>
                        <div class="ml-3">Users & Permissions</div>
                    </a>
                    <a href="#" class="flex items-center mt-2">
                        <div
                            class="w-8 h-8 bg-primary/10 dark:bg-primary/20 text-primary/80 flex items-center justify-center rounded-full">
                            <i class="w-4 h-4" data-lucide="credit-card"></i>
                        </div>
                        <div class="ml-3">Transactions Report</div>
                    </a>
                </div>
                <div class="search-result__content__title">Users</div>
                <div class="mb-5">
                    <a href="#" class="flex items-center mt-2">
                        <div class="w-8 h-8 image-fit">
                            <img alt="Midone - HTML Admin Template" class="rounded-full"
                                src="{{ asset('backend') }}/dist/images/profile-15.jpg">
                        </div>
                        <div class="ml-3">Angelina Jolie</div>
                        <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">
                            angelinajolie@left4code.com</div>
                    </a>
                    <a href="#" class="flex items-center mt-2">
                        <div class="w-8 h-8 image-fit">
                            <img alt="Midone - HTML Admin Template" class="rounded-full"
                                src="{{ asset('backend') }}/dist/images/profile-10.jpg">
                        </div>
                        <div class="ml-3">Christian Bale</div>
                        <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">
                            christianbale@left4code.com</div>
                    </a>
                    <a href="#" class="flex items-center mt-2">
                        <div class="w-8 h-8 image-fit">
                            <img alt="Midone - HTML Admin Template" class="rounded-full"
                                src="{{ asset('backend') }}/dist/images/profile-8.jpg">
                        </div>
                        <div class="ml-3">Tom Cruise</div>
                        <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">
                            tomcruise@left4code.com</div>
                    </a>
                    <a href="#" class="flex items-center mt-2">
                        <div class="w-8 h-8 image-fit">
                            <img alt="Midone - HTML Admin Template" class="rounded-full"
                                src="{{ asset('backend') }}/dist/images/profile-11.jpg">
                        </div>
                        <div class="ml-3">Russell Crowe</div>
                        <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">
                            russellcrowe@left4code.com</div>
                    </a>
                </div>
                <div class="search-result__content__title">Products</div>
                <a href="#" class="flex items-center mt-2">
                    <div class="w-8 h-8 image-fit">
                        <img alt="Midone - HTML Admin Template" class="rounded-full"
                            src="{{ asset('backend') }}/dist/images/preview-13.jpg">
                    </div>
                    <div class="ml-3">Oppo Find X2 Pro</div>
                    <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">Smartphone &amp;
                        Tablet</div>
                </a>
                <a href="#" class="flex items-center mt-2">
                    <div class="w-8 h-8 image-fit">
                        <img alt="Midone - HTML Admin Template" class="rounded-full"
                            src="{{ asset('backend') }}/dist/images/preview-11.jpg">
                    </div>
                    <div class="ml-3">Sony A7 III</div>
                    <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">Photography</div>
                </a>
                <a href="#" class="flex items-center mt-2">
                    <div class="w-8 h-8 image-fit">
                        <img alt="Midone - HTML Admin Template" class="rounded-full"
                            src="{{ asset('backend') }}/dist/images/preview-3.jpg">
                    </div>
                    <div class="ml-3">Nikon Z6</div>
                    <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">Photography</div>
                </a>
                <a href="#" class="flex items-center mt-2">
                    <div class="w-8 h-8 image-fit">
                        <img alt="Midone - HTML Admin Template" class="rounded-full"
                            src="{{ asset('backend') }}/dist/images/preview-7.jpg">
                    </div>
                    <div class="ml-3">Nikon Z6</div>
                    <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">Photography</div>
                </a>
            </div>
        </div>
    </div>
    <!-- END: Search -->
    <!-- BEGIN: Notifications -->
    <div class="intro-x dropdown mr-auto sm:mr-6" style="margin-left: auto;">
        {{-- notification--bullet sebagai penanda --}}
        <div class="dropdown-toggle notification cursor-pointer" role="button" aria-expanded="false"
            data-tw-toggle="dropdown" id="notification--bullet" data-users_id_view="" data-fresh="false">
            <i data-lucide="bell" class="notification__icon dark:text-slate-500"></i>
        </div>
        <div class="notification-content pt-2 dropdown-menu" style="height: 400px; overflow: scroll;">
        </div>
    </div>
    <!-- END: Notifications -->
    <!-- BEGIN: Account Menu -->
    <div class="intro-x dropdown w-8 h-8">
        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button"
            aria-expanded="false" data-tw-toggle="dropdown">
            <img alt="Gambar Profile" src="{{ asset('upload/profile/' . $myProfile->profile->gambar_profile) }}">
        </div>
        <div class="dropdown-menu w-56">
            <ul class="dropdown-content bg-primary text-white">
                <li class="p-2">
                    <div class="font-medium">{{ $myProfile->profile->nama_profile }}</div>
                    <div class="text-xs text-white/70 mt-0.5 dark:text-slate-500">
                        {{ $myProfile->profile->jabatan->nama_jabatan }}</div>
                </li>
                <li>
                    <hr class="dropdown-divider border-white/[0.08]">
                </li>
                <li>
                    <a href="{{ url('myProfile') }}" class="dropdown-item hover:bg-white/5"> <i data-lucide="user"
                            class="w-4 h-4 mr-2"></i> My Profile </a>
                </li>
                <li>
                    <a href="{{ url('setting/settings') }}" class="dropdown-item hover:bg-white/5"> <i
                            data-lucide="settings" class="w-4 h-4 mr-2"></i> Pengaturan </a>
                </li>
                <li>
                    <hr class="dropdown-divider border-white/[0.08]">
                </li>
                <li>
                    <a href="#" class="dropdown-item hover:bg-white/5 btn-logout"> <i
                            data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Account Menu -->
</div>
<<<<<<< HEAD
=======



>>>>>>> 3adc26b1aacfea81e4c724cc8f0fd8d73b9c2bd4
@push('custom_js')
    <script>
        var asset = "{{ asset('/') }}";
        var body = $('body');
        var audio = new Audio(`${asset}notifikasi/clink.mp3`);
        var users_id_view = "{{ Auth::user()->id }}";
<<<<<<< HEAD
        $(document).ready(function() {
            const playNotifikasi = () => {
                audio.play();
            }

=======

        $(document).ready(function() {
>>>>>>> 3adc26b1aacfea81e4c724cc8f0fd8d73b9c2bd4
            const htmlNotifikasi = () => {
                // get notifikasi to display in topbar
                const storageName = 'notifikasi';
                const getNotifikasi = localStorage.getItem(storageName);
                const notifikasi = JSON.parse(localStorage.getItem('notifikasi'));

                if (notifikasi && notifikasi.length > 0) {
                    $('#notification--bullet').addClass('notification--bullet');
                    let output = ``;
                    notifikasi.forEach((item) => {
                        output += `
                            <div class="notification-content__box dropdown-content">
                                <div class="notification-content__title">Notifikasi</div>
                                <div class="cursor-pointer relative flex items-center ">
                                    <div class="w-12 h-12 flex-none image-fit mr-1">
<<<<<<< HEAD
                                        <img alt="${item.profile.gambar_profile}" class="rounded-full"
                                            src="${asset}upload/profile/${item.profile.gambar_profile}">
                                    </div>
                                    <div class="ml-2 overflow-hidden">
                                        <div class="flex items-center">
                                            <a href="javascript:;" class="font-medium truncate mr-5">${item.profile.nama_profile}</a>
=======
                                        <img alt="${item.image}" class="rounded-full"
                                            src="${asset}upload/profile/${item.image}">
                                    </div>
                                    <div class="ml-2 overflow-hidden">
                                        <div class="flex items-center">
                                            <a href="javascript:;" class="font-medium truncate mr-5">${item.nama}</a>
>>>>>>> 3adc26b1aacfea81e4c724cc8f0fd8d73b9c2bd4
                                            <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">${item.tanggal_transaction}</div>
                                        </div>
                                        <div class="w-fulltext-slate-500 mt-0.5"
                                            style="
                                        text-align: justify; 
                                        color: #2b2b2b;
                                        font-size: 12px;
                                        font-weight: 500;
                                        ">
                                            ${item.code}
                                        </div>
                                        <div class="w-fulltext-slate-500 mt-0.5"
                                            style="
                                        text-align: justify; 
                                        color: #888;
                                        font-size: 12px;
                                        ">
                                            ${item.message}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            `;
                    });

                    $('.notification-content').html(output);
                } else {
                    $('#notification--bullet').removeClass('notification--bullet');
                    const output = `
                            <div class="notification-content__box dropdown-content" 
                            style="
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            ">
                                <div class="notification-content__title" 
                                style="margin-bottom: 0;">
                                    Tidak ada notifikasi
                                </div>
                            </div>
                            `;
                    $('.notification-content').html(output);
                }
            }

<<<<<<< HEAD
            Echo.channel('notif')
                .listen('Notifikasi', (e) => {
                    const {
                        data
                    } = e;
                    data.read = false;
                    $('#notification--bullet').data('users_id_view', data.users_id_view);

                    let pushNotifikasi = [];
                    const storageName = 'notifikasi';
                    const storedData = localStorage.getItem(storageName);
                    if (storedData) {
                        pushNotifikasi = JSON.parse(storedData);
                        if (pushNotifikasi.length > 0) {
                            pushNotifikasi = pushNotifikasi.filter(item =>
                                (item.uuid !== data.uuid) &&
                                (item.num !== data.num));
                        }
                    }
                    pushNotifikasi.push(data);
                    localStorage.setItem(storageName, JSON.stringify(pushNotifikasi));

                    const storedDataItem = localStorage.getItem(storageName);
                    if (storedDataItem) {
                        const notifikasi = JSON.parse(storedDataItem);
                        if (notifikasi.length > 0) {
                            htmlNotifikasi();
                            playNotifikasi();
                        }
                    }
                });
=======
            const playNotifikasi = () => {
                audio.play();
            }

            onMessage(messaging, (payload) => {
                console.log('payload', payload);
                const {
                    data
                } = payload;

                data.read = false;
                $('#notification--bullet').data('users_id_view', data
                    .users_id_view);

                let pushNotifikasi = [];
                const storageName = 'notifikasi';
                const storedData = localStorage.getItem(storageName);
                if (storedData) {
                    pushNotifikasi = JSON.parse(storedData);
                    if (pushNotifikasi.length > 0) {
                        pushNotifikasi = pushNotifikasi.filter(item =>
                            (item.uuid !== data.uuid) &&
                            (item.num !== data.num));
                    }
                }
                pushNotifikasi.push(data);
                localStorage.setItem(storageName, JSON.stringify(pushNotifikasi));

                const storedDataItem = localStorage.getItem(storageName);
                if (storedDataItem) {
                    const notifikasi = JSON.parse(storedDataItem);
                    if (notifikasi.length > 0) {
                        htmlNotifikasi();
                        playNotifikasi();
                    }
                }


            });
>>>>>>> 3adc26b1aacfea81e4c724cc8f0fd8d73b9c2bd4

            body.on('click', '#notification--bullet', function(e) {
                e.preventDefault();

                const get_users_id_view = $(this).data('users_id_view');
                const storageName = 'notifikasi';
<<<<<<< HEAD
                const checkClassNotification = $('.notification-content.dropdown-menu').hasClass('show');
=======
                const checkClassNotification = $(
                    '.notification-content.dropdown-menu').hasClass('show');
>>>>>>> 3adc26b1aacfea81e4c724cc8f0fd8d73b9c2bd4

                const storedData = localStorage.getItem(storageName);
                if (storedData) {
                    const notifikasi = JSON.parse(storedData);
                    if (notifikasi.length > 0) {
                        const updatedNotifikasi = notifikasi.map(item => ({
                            ...item,
                            read: true
                        }));
                        $(this).data('fresh', true);
<<<<<<< HEAD
                        localStorage.setItem(storageName, JSON.stringify(updatedNotifikasi));
=======
                        localStorage.setItem(storageName, JSON.stringify(
                            updatedNotifikasi));
>>>>>>> 3adc26b1aacfea81e4c724cc8f0fd8d73b9c2bd4
                    }
                }
                htmlNotifikasi();

<<<<<<< HEAD
                if (!checkClassNotification && (get_users_id_view == users_id_view)) {
=======
                if (!checkClassNotification && (get_users_id_view ==
                        users_id_view)) {
>>>>>>> 3adc26b1aacfea81e4c724cc8f0fd8d73b9c2bd4
                    $('#notification--bullet').removeClass('notification--bullet');
                    localStorage.removeItem(storageName);
                }
            })

            $(document).on('click', 'body', function(event) {
                const $target = $(event.target);

                // Jika klik terjadi di dalam elemen #notification--bullet atau dropdown menu, abaikan
<<<<<<< HEAD
                if ($target.closest('#notification--bullet').length > 0 || $target.closest(
=======
                if ($target.closest('#notification--bullet').length > 0 || $target
                    .closest(
>>>>>>> 3adc26b1aacfea81e4c724cc8f0fd8d73b9c2bd4
                        '.notification-content.dropdown-menu').length > 0) {
                    return;
                }

<<<<<<< HEAD
                const get_users_id_view = $('#notification--bullet').data('users_id_view');
                const storageName = 'notifikasi';
                const checkClassNotification = $('#notification--bullet').data('fresh');
                if (checkClassNotification && (get_users_id_view == users_id_view)) {
=======
                const get_users_id_view = $('#notification--bullet').data(
                    'users_id_view');
                const storageName = 'notifikasi';
                const checkClassNotification = $('#notification--bullet').data(
                    'fresh');
                if (checkClassNotification && (get_users_id_view ==
                        users_id_view)) {
>>>>>>> 3adc26b1aacfea81e4c724cc8f0fd8d73b9c2bd4
                    $('#notification--bullet').data('fresh', false);
                    $('#notification--bullet').removeClass('notification--bullet');
                    localStorage.removeItem(storageName);
                }
            });
<<<<<<< HEAD
        });
=======
        })
>>>>>>> 3adc26b1aacfea81e4c724cc8f0fd8d73b9c2bd4
    </script>
@endpush
