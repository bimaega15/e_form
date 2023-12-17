<x-modal.modal-body>
    <div class="intro-y col-span-12">
        <table style="width: 100%;">
            <tr>
                <td>
                    <table>
                        <tr>
                            <td>No. Transaksi</td>
                            <td class="px-4">:</td>
                            <td>{{ $getTransaction->code_transaction }}</td>
                        </tr>
                        <tr>
                            <td>Nama Mengajukan</td>
                            <td class="px-4">:</td>
                            <td>{{ $getTransaction->users->profile->nama_profile }}</td>
                        </tr>
                        <tr>
                            <td>Divisi</td>
                            <td class="px-4">:</td>
                            <td>{{ $getTransaction->users->profile->unit->nama_unit }}</td>
                        </tr>
                        <tr>
                            <td>Kategori Office</td>
                            <td class="px-4">:</td>
                            <td>{{ $getTransaction->users->profile->categoryOffice->nama_category_office }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td class="px-4">:</td>
                            <td>{{ $getTransaction->users->profile->alamat_profile }}</td>
                        </tr>
                        <tr>
                            <td>Purpose (Divisi)</td>
                            <td class="px-4">:</td>
                            <td>{{ $getTransaction->purposedivisi_transaction }}</td>
                        </tr>
                        <tr>
                            <td>PPN</td>
                            <td class="px-4">:</td>
                            <td>{!! $getTransaction->isppn_transaction == 1 ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>' !!}</td>
                        </tr>
                    </table>
                </td>
                <td style="vertical-align: top;">
                    <table>
                        <tr>
                            <td>Tanggal Pengajuan</td>
                            <td class="px-4">:</td>
                            <td>{{ UtilsHelp::formatDate($getTransaction->tanggal_transaction) }}</td>
                        </tr>
                        <tr>
                            <td>Jabatan</td>
                            <td class="px-4">:</td>
                            <td>{{ $getTransaction->users->profile->jabatan->nama_jabatan }}</td>
                        </tr>
                        <tr>
                            <td>Metode Pembayaran</td>
                            <td class="px-4">:</td>
                            <td>{{ $getTransaction->metodePembayaran->nama_metode_pembayaran }}</td>
                        </tr>
                        @if (strtolower($getTransaction->metodePembayaran->nama_metode_pembayaran) != 'cash')
                        @if (strtolower($getTransaction->metodePembayaran->nama_metode_pembayaran) == 'virtual account')
                        <tr>
                            <td>No. Virtual Account</td>
                            <td class="px-4">:</td>
                            <td>{{ $getTransaction->nomorvirtual_transaction }}</td>
                        </tr>
                        <tr>
                            <td>Bank Penerima</td>
                            <td class="px-4">:</td>
                            <td>{{ $getTransaction->bank_transaction }}</td>
                        </tr>
                        @endif

                        @if (strtolower($getTransaction->metodePembayaran->nama_metode_pembayaran) == 'transfer')
                        <tr>
                            <td>Rekening Penerima</td>
                            <td class="px-4">:</td>
                            <td>{{ $getTransaction->accept_transaction }}</td>
                        </tr>
                        <tr>
                            <td>Bank Penerima</td>
                            <td class="px-4">:</td>
                            <td>{{ $getTransaction->bank_transaction }}</td>
                        </tr>
                        @endif
                        @endif
                        <tr>
                            <td>Payment Terms</td>
                            <td class="px-4">:</td>
                            <td>{{ $getTransaction->paymentterms_transaction }} Hari</td>
                        </tr>
                        <tr>
                            <td>Tanggal Expired</td>
                            <td class="px-4">:</td>
                            <td>{{ UtilsHelp::formatDate($getTransaction->expired_transaction) }}</td>
                        </tr>
                        <tr>
                            <td>Tujuan Pengajuan</td>
                            <td class="px-4">:</td>
                            <td>{{ $getTransaction->purpose_transaction }}</td>
                        </tr>
                        <tr>
                            <td>Nilai PPN</td>
                            <td class="px-4">:</td>
                            <td>{{ $getTransaction->valueppn_transaction }} %</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>

</x-modal.modal-body>

<x-modal.modal-footer>
    <div class="form-group d-flex">
        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">
            OK
        </button>
    </div>
</x-modal.modal-footer>