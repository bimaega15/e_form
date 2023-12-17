<x-modal.modal-body>
    @include('one.transaksi.partials_history.history')
</x-modal.modal-body>

<x-modal.modal-footer>
    <div class="form-group d-flex">
        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">
            OK
        </button>
    </div>
</x-modal.modal-footer>

<script type="text/javascript" src="{{ asset('js/transaksi/form.js') }}"></script>
<script class="url_root" data-url="{{ url('/') }}"></script>