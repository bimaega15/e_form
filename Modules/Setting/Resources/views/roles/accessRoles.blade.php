<x-modal.modal-body>
    <h6>Role: {{$role->name}}</h6>
    <hr>
    <div class="card">
        <div class="card-header">
            <i class="zmdi zmdi-format-list-bulleted"></i> List Permissions
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Permission</th>
                            <th>Action</th>
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
        </div>
    </div>
</x-modal.modal-body>

<x-modal.modal-footer>
    <div class="form-group d-flex">
        <button type="button" class="btn btn-secondary d-flex align-items-center justify-content-center mr-2" data-dismiss="modal">
            <i class="zmdi zmdi-close mr-1"></i> Close
        </button>

    </div>
</x-modal.modal-footer>
<script type="text/javascript" src="{{ asset('js/autentikasi/assignRoles/form.js') }}"></script>