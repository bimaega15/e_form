<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transaction';
    protected $guarded = [];

    public function transactionDetail()
    {
        return $this->hasMany(TransactionDetail::class, 'transaction_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(TransactionDetail::class, 'transaction_id', 'id');
    }

    public function transactionApprovel()
    {
        return $this->hasMany(TransactionApprovel::class, 'transaction_id', 'id');
    }

    public function usersApproval()
    {
        return $this->hasMany(TransactionApprovel::class, 'transaction_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
    public function usersReview()
    {
        return $this->belongsTo(User::class, 'users_id_review', 'id');
    }

    public function metodePembayaran()
    {
        return $this->belongsTo(MetodePembayaran::class, 'metode_pembayaran_id', 'id');
    }

    public function overBooking()
    {
        return $this->hasOne(OverBooking::class, 'transaction_id', 'id');
    }

    public function getTransactionData($statusTransaction, $search)
    {
        $data = Transaction::with([
            'usersApproval' => function ($query) {
                $query
                    ->join('users', 'users.id', '=', 'transaction_approvel.users_id')
                    ->join('profile', 'profile.users_id', '=', 'users.id')
                    ->leftJoin('users as forward_users', 'forward_users.id', '=', 'transaction_approvel.users_id_forward')
                    ->leftJoin('profile as forward_profile', 'forward_profile.users_id', '=', 'forward_users.id')
                    ->leftJoin('jabatan as forward_jabatan', 'forward_jabatan.id', '=', 'forward_profile.jabatan_id')
                    ->select('transaction_approvel.id', 'transaction_approvel.transaction_id', 'transaction_approvel.tanggal_approvel as tanggalApprovel', 'transaction_approvel.keterangan_approvel as keteranganApprovel', 'transaction_approvel.status_transaction as statusTransaction', 'transaction_approvel.users_id_forward', 'transaction_approvel.users_id', 'profile.nama_profile as requestPeople', 'forward_users.name as forwardPeople', 'forward_users.email as forwardEmailPeople', 'forward_jabatan.nama_jabatan as forwardJabatan', 'profile.gambar_profile as profileApprovel');
            },
            'products' => function ($query) {
                $query->join('products', 'products.id', '=', 'transaction_detail.products_id')
                    ->select('transaction_detail.id', 'transaction_detail.transaction_id', 'products.name_product as name', 'transaction_detail.qty_detail as qty', 'transaction_detail.price_detail as price', 'transaction_detail.subtotal_detail as totalPrice', 'transaction_detail.remarks_detail as remarks', 'transaction_detail.subtotal_detail as subTotal', 'transaction_detail.matauang_detail as currency', 'transaction_detail.kurs_detail as curs', 'products.code_product', 'products.capacity_product', 'products.id as products_id');
            },
            'transactionApprovel', 'transactionApprovel.users', 'transactionApprovel.users.profile',  'transactionApprovel.users.profile.jabatan', 'transactionApprovel.usersForward', 'transactionApprovel.usersForward.profile', 'transactionApprovel.usersForward.profile.jabatan', 'overBooking',
            'usersReview', 'usersReview.profile', 'usersReview.profile.jabatan'
        ])
            ->join('users', 'users.id', '=', 'transaction.users_id')
            ->join('profile', 'profile.users_id', '=', 'users.id')
            ->join('jabatan', 'jabatan.id', '=', 'profile.jabatan_id')
            ->join('unit', 'unit.id', '=', 'profile.unit_id')
            ->join('category_office', 'category_office.id', '=', 'profile.category_office_id')
            ->join('metode_pembayaran', 'transaction.metode_pembayaran_id', '=', 'metode_pembayaran.id');
            if($statusTransaction != null){
                $data->where('transaction.status_transaction', $statusTransaction);
            }
            if($search != null){
                $data->where('profile.nama_profile', 'like', '%'.$search.'%')
                ->orWhere('transaction.code_transaction', 'like', '%'.$search.'%')
                ->orWhere('transaction.purpose_transaction', 'like', '%'.$search.'%')
                ->orWhere('transaction.status_transaction', 'like', '%'.$search.'%');
            }
            $data = $data->select('transaction.code_transaction as noReq', 'transaction.tanggal_transaction as reqDate', 'profile.nama_profile as reqBy', 'jabatan.nama_jabatan as position', 'category_office.nama_category_office as categoryOffice', 'transaction.paidto_transaction as paidTo', 'metode_pembayaran.nama_metode_pembayaran as paymentMethod', 'transaction.expired_transaction as expDate', 'transaction.purpose_transaction as purposeTransaction', 'transaction.purposedivisi_transaction as purposeDivisi', 'transaction.totalproduct_transaction as totalProduct', 'transaction.totalprice_transaction as totalAmount', 'transaction.isppn_transaction as ppn', 'transaction.valueppn_transaction as amountPpn', 'transaction.status_transaction as status', 'transaction.attachment_transaction as attachment', 'transaction.id', 'profile.gambar_profile as gambarProfile', 'unit.nama_unit as unitName', 'profile.alamat_profile as address', 'transaction.paymentterms_transaction as paymentTerms', 'transaction.overbooking_transaction', 'transaction.users_id_review', 'transaction.is_expired')
            ->selectSub(function ($query) {
                // Subquery to get approvalBy from the related table
                $query->select('name')->from('users')
                    ->whereRaw('users.id = transaction.users_id_review');
            }, 'approvalBy')
            ->orderBy('transaction.tanggal_transaction','desc')
            ->paginate(10);
            return $data;
    }

    public function editTransaction($id){
        $data = Transaction::with([
            'usersApproval' => function ($query) {
                $query
                    ->join('users', 'users.id', '=', 'transaction_approvel.users_id')
                    ->join('profile', 'profile.users_id', '=', 'users.id')
                    ->leftJoin('users as forward_users', 'forward_users.id', '=', 'transaction_approvel.users_id_forward')
                    ->leftJoin('profile as forward_profile', 'forward_profile.users_id', '=', 'forward_users.id')
                    ->leftJoin('jabatan as forward_jabatan', 'forward_jabatan.id', '=', 'forward_profile.jabatan_id')
                    ->select('transaction_approvel.id', 'transaction_approvel.transaction_id', 'transaction_approvel.tanggal_approvel as tanggalApprovel', 'transaction_approvel.keterangan_approvel as keteranganApprovel', 'transaction_approvel.status_transaction as statusTransaction', 'transaction_approvel.users_id_forward', 'transaction_approvel.users_id', 'profile.nama_profile as requestPeople', 'forward_users.name as forwardPeople', 'forward_users.email as forwardEmailPeople', 'forward_jabatan.nama_jabatan as forwardJabatan', 'profile.gambar_profile as profileApprovel');
            },
            'products' => function ($query) {
                $query->join('products', 'products.id', '=', 'transaction_detail.products_id')
                    ->select('transaction_detail.id', 'transaction_detail.transaction_id', 'products.name_product as name', 'transaction_detail.qty_detail as qty', 'transaction_detail.price_detail as price', 'transaction_detail.subtotal_detail as totalPrice', 'transaction_detail.remarks_detail as remarks', 'transaction_detail.subtotal_detail as subTotal', 'transaction_detail.matauang_detail as currency', 'transaction_detail.kurs_detail as curs', 'products.code_product', 'products.capacity_product', 'products.id as products_id');
            },
            'transactionApprovel', 'transactionApprovel.users', 'transactionApprovel.users.profile',  'transactionApprovel.users.profile.jabatan', 'transactionApprovel.usersForward', 'transactionApprovel.usersForward.profile', 'transactionApprovel.usersForward.profile.jabatan', 'overBooking',
            'usersReview', 'usersReview.profile', 'usersReview.profile.jabatan'
        ])
            ->join('users', 'users.id', '=', 'transaction.users_id')
            ->join('profile', 'profile.users_id', '=', 'users.id')
            ->join('jabatan', 'jabatan.id', '=', 'profile.jabatan_id')
            ->join('unit', 'unit.id', '=', 'profile.unit_id')
            ->join('category_office', 'category_office.id', '=', 'profile.category_office_id')
            ->join('metode_pembayaran', 'transaction.metode_pembayaran_id', '=', 'metode_pembayaran.id');
            $data = $data->select('transaction.code_transaction as noReq', 'transaction.tanggal_transaction as reqDate', 'profile.nama_profile as reqBy', 'jabatan.nama_jabatan as position', 'category_office.nama_category_office as categoryOffice', 'transaction.paidto_transaction as paidTo', 'metode_pembayaran.nama_metode_pembayaran as paymentMethod', 'transaction.expired_transaction as expDate', 'transaction.purpose_transaction as purposeTransaction', 'transaction.purposedivisi_transaction as purposeDivisi', 'transaction.totalproduct_transaction as totalProduct', 'transaction.totalprice_transaction as totalAmount', 'transaction.isppn_transaction as ppn', 'transaction.valueppn_transaction as amountPpn', 'transaction.status_transaction as status', 'transaction.attachment_transaction as attachment', 'transaction.id', 'profile.gambar_profile as gambarProfile', 'unit.nama_unit as unitName', 'profile.alamat_profile as address', 'transaction.paymentterms_transaction as paymentTerms', 'transaction.overbooking_transaction', 'transaction.metode_pembayaran_id', 'transaction.nomorvirtual_transaction', 'transaction.accept_transaction', 'transaction.bank_transaction', 'transaction.totalppn_transaction', 'transaction.subtotal_transaction', 'transaction.users_id_review', 'transaction.is_expired')
            ->selectSub(function ($query) {
                // Subquery to get approvalBy from the related table
                $query->select('name')->from('users')
                    ->whereRaw('users.id = transaction.users_id_review');
            }, 'approvalBy')
            ->orderBy('transaction.tanggal_transaction','desc')
            ->find($id);
        return $data;
    }
}
