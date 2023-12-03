@if (isset($access))
<form method="post" action="{{ url('setting/access/'.$access->id.'?_method=put') }}" id="form-submit">
    @else
    <form method="post" action="{{ route('setting.access.store') }}" id="form-submit">
        @endif
        <x-modal.modal-body>
            <div class="col-span-12 sm:col-span-12 mb-2">
                <h1>User: {{$getProfile->profile->nama_profile}}</h1>
                <hr>
            </div>
            <div class="col-span-12 sm:col-span-12 mb-2">
                <div class="grid grid-cols-12 gap-6">
                    <div class="intro-y col-span-12 lg:col-span-12">
                        <!-- BEGIN: Form Layout -->
                        <div class="intro-y box p-5">
                            <div class="overflow-auto lg:overflow-visible">
                                <table class="table table-report -mt-2">
                                    <thead>
                                        <tr>
                                            <th class="whitespace-nowrap">No.</th>
                                            <th class="whitespace-nowrap">Nama Roles</th>
                                            <th class="text-center whitespace-nowrap">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $index => $item)
                                        <tr>
                                            <td>{{$index + 1}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>
                                                <div class="col-span-12 sm:col-span-6 mb-2">
                                                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 check-input-roles" value="{{$item->id}}" id="id_{{$item->id}}" data-id="{{$item->id}}" data-url="{{ url('setting/access') }}" data-users_id="{{$getProfile->id}}" {{$getProfile->hasRole($item->name) ? 'checked' : ''}}>
                                                    <label for="id_{{$item->id}}" class="ml-2 text-gray-700">
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END: Form Layout -->
                    </div>
                </div>
            </div>
        </x-modal.modal-body>

        <x-modal.modal-footer>
            <div class="form-group d-flex">
                <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">
                    OK
                </button>
            </div>
        </x-modal.modal-footer>
    </form>


    <script type="text/javascript" src="{{ asset('js/setting/access/index.js') }}"></script>