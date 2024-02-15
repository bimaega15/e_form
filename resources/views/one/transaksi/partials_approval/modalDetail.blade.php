<div id="modal-detail-pengajuan" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" style="width: 60%; !imporant;">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="font-medium text-base mr-auto modal-title">Detail Request</h2>
                <a data-tw-dismiss="modal" href="javascript:;" class="btn btn-outline-secondary hidden sm:flex"> <i class="fas fa-times fa-2x"></i>
                </a>
                <hr>
            </div>
            <div class="modal-body">
                @if ($getTransaction->overbooking_transaction != 1)
                <div class="grid grid-cols-12 gap-6">
                    <div class="intro-y col-span-12">
                        <h3 class="mb-2">Detail Request</h3>
                        <hr />
                    </div>
                    <div class="intro-y col-span-12 overflow-auto">
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
                    <div class="intro-y col-span-12">
                        <h3 class="mb-2">Detail Product</h3>
                        <hr />
                    </div>
                    <div class="intro-y col-span-12 overflow-auto">
                        <table style="width: 100%;" class="table">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Nama</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Sub Total</th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getTransactionRequest as $item)
                                <tr>
                                    <td class="text-center">{{ $item->transaction->code_transaction }}</td>
                                    <td class="text-center">{{ $item->products->name_product }}</td>
                                    <td class="text-center">{{ $item->qty_detail }}</td>
                                    <td class="text-center">Rp {{ number_format($item->price_detail, 0,',','.') }},-</td>
                                    <td class="text-center">Rp {{ number_format($item->subtotal_detail,0,',','.') }},-</td>
                                    <td class="text-center">{{ $item->remarks_detail }},-</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @else
                <div class="grid grid-cols-12 gap-6">
                    <div class="intro-y col-span-12 overflow-auto">
                        <table style="width: 100%;" id="table-content" class="table">
                            <tr>
                                <td colspan="6" class="fontGeneral text-center font-bold" style="padding-bottom: 20px;">Overbooking Acccount</td>
                            </tr>
                            <tr>
                                <td>Jenis</td>
                                <td>:</td>
                                <td colspan="4">{{ $getOverBooking != null ? $getOverBooking->jenis_over_booking : '-'}}</td>
                            </tr>
                            <tr>
                                <td>Dari Nomor Rekening</td>
                                <td>:</td>
                                <td>{{ $getOverBooking != null ? $getOverBooking->darirekening_booking : '-' }}</td>
                                <td>Nama Pemilik Rekening</td>
                                <td>:</td>
                                <td>{{ $getOverBooking != null ? $getOverBooking->pemilikrekening_booking : '-' }}</td>
                            </tr>
                            <tr>
                                <td>Nomor Rekening Tujuan</td>
                                <td>:</td>
                                <td>{{ $getOverBooking != null ? $getOverBooking->tujuanrekening_booking : '-' }}</td>
                                <td>Nama Pemilik Rekening</td>
                                <td>:</td>
                                <td>{{ $getOverBooking != null ? $getOverBooking->pemiliktujuan_booking : '-' }}</td>
                            </tr>
                
                            <tr>
                                <td>Nominal</td>
                                <td>:</td>
                                <td colspan="4">Rp.  {{ $getOverBooking != null ? number_format($getOverBooking->nominal_booking, 0,',','.') : 0 }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

