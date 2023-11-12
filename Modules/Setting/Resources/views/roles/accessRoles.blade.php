<x-modal.modal-body>
    <div class="col-span-12 sm:col-span-12 mb-2">
        <h2 class="intro-y text-lg font-medium">
            Role: {{$role->name}}
        </h2>
        <hr>
    </div>
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2 w-full" id="dataTable">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">NO.</th>
                    <th class="whitespace-nowrap">PERMISSION</th>
                    <th class="text-center whitespace-nowrap">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $index => $item)
                <tr>
                    <td>{{$index + 1}}</td>
                    <td>{{$item->name}}</td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input check-input-roles" type="checkbox" value="{{$item->id}}" id="id_{{$item->id}}" data-id="{{$item->id}}" data-url="{{ url('autentikasi/assignRoles') }}" data-role_id="{{$role->id}}" {{$role->hasPermissionTo($item->name) ? 'checked' : ''}}>
                            <label class="form-check-label" for="id_{{$item->id}}">
                            </label>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- END: Data List -->
</x-modal.modal-body>

<x-modal.modal-footer>
    <div class="form-group d-flex">
        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">
            OK
        </button>
    </div>
</x-modal.modal-footer>
<script type="text/javascript" src="{{ asset('js/setting/assignRoles/form.js') }}"></script>