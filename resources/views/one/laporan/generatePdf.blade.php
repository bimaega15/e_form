<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Laporan Pengajuan</title>

    <style>
        .fontGeneral {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
        }

        .textUppercase {
            text-transform: uppercase;
        }

        .fontWeightBold {
            font-weight: bold;
        }

        #table-content {
            border-collapse: collapse;
        }

        #table-content td,
        #table-content th {
            border: 1px solid #161A30;
            padding: 5px;
        }


        .borderSolidBlack {
            border: 1px solid #161A30;
        }

        .borderSolidHeader {
            border-top: 1px solid #161A30;
            border-left: 1px solid #161A30;
            border-right: 1px solid #161A30;
            text-align: center;
        }

        .borderSolidContent {
            padding-top: 90px;
            border-left: 1px solid #161A30;
            border-right: 1px solid #161A30;
            border-bottom: 1px solid #161A30;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <table style="width: 100%;">
        <tr>
            <td>
                <table style="width: 100%;">
                    <tr>
                        <td>
                            <img src="{{ $base64ImageStringLogo }}" alt="logo" style="height: 70px; border-radius: 5px;">
                        </td>
                        <td>
                            <h5 style="text-align: center;" class="fontGeneral textUppercase">
                                {{ $settings->nama_settings }} <br />
                                CASH REQUEST / ADVANCE
                            </h5>
                        </td>
                        <td style="text-align: right;">
                            <img src="{{ $base64ImageStringIcon }}" alt="logo" style="height: 70px; border-radius: 5px;">
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="padding-top: 30px;">
                <table style="width: 100%;">
                    <tr>
                        <td>
                            <table style="width: 100%;">
                                <tr>
                                    <td class="fontGeneral">Code Request</td>
                                    <td>:</td>
                                    <td class="fontGeneral">{{ $getTransaction->code_transaction }}</td>
                                </tr>
                                <tr>
                                    <td class="fontGeneral">Request Name</td>
                                    <td>:</td>
                                    <td class="fontGeneral">{{ $getTransaction->users->profile->nama_profile }}</td>
                                </tr>
                                <tr>
                                    <td class="fontGeneral">Divisi</td>
                                    <td>:</td>
                                    <td class="fontGeneral">{{ $getTransaction->users->profile->unit->nama_unit }}</td>
                                </tr>
                                <tr>
                                    <td class="fontGeneral">Paid To</td>
                                    <td>:</td>
                                    <td class="fontGeneral">{{ $getTransaction->paidto_transaction }}</td>
                                </tr>
                                <tr>
                                    <td class="fontGeneral">Amount USD/IDR</td>
                                    <td>:</td>
                                    <td class="fontGeneral">{{ number_format($getTransaction->totalprice_transaction, 0, ',','.') }}</td>
                                </tr>

                                <tr>
                                    <td class="fontGeneral">Purpose</td>
                                    <td>:</td>
                                    <td class="fontGeneral">{{ $getTransaction->purpose_transaction }}</td>
                                </tr>
                            </table>
                        </td>
                        <td style="vertical-align: top;">
                            <table style="width: 100%;">
                                <tr>
                                    <td class="fontGeneral">Date Request</td>
                                    <td>:</td>
                                    <td class="fontGeneral">{{ UtilsHelp::formatDateLaporan($getTransaction->tanggal_transaction) }}</td>
                                </tr>
                                <tr>
                                    <td class="fontGeneral">Payment Method</td>
                                    <td>:</td>
                                    <td class="fontGeneral">{{ $getTransaction->metodePembayaran->nama_metode_pembayaran }}</td>
                                </tr>
                                <tr>
                                    <td class="fontGeneral">Payment Terms</td>
                                    <td>:</td>
                                    <td class="fontGeneral">{{ $getTransaction->paymentterms_transaction }}</td>
                                </tr>
                                <tr>
                                    <td class="fontGeneral">Expired Date</td>
                                    <td>:</td>
                                    <td class="fontGeneral">{{ UtilsHelp::formatDateLaporan($getTransaction->expired_transaction) }}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="padding-top: 15px;">
                <table style="width: 100%;" id="table-content">
                    <tr>
                        <td colspan="6" class="fontGeneral">Description Items</td>
                    </tr>
                    <tr>
                        <td class="fontGeneral">No.</td>
                        <td class="fontGeneral">Description Of Gods</td>
                        <td class="fontGeneral">Amount</td>
                        <td class="fontGeneral">Price / Unit</td>
                        <td class="fontGeneral">Total Price</td>
                        <td class="fontGeneral">Remarks</td>
                    </tr>
                    <tr>
                        <td class="fontGeneral">1</td>
                        <td class="fontGeneral">Apart (Alat Pemadam Kebakaran)</td>
                        <td class="fontGeneral">1</td>
                        <td class="fontGeneral">30,000</td>
                        <td class="fontGeneral">30,000</td>
                        <td class="fontGeneral">-</td>
                    </tr>
                    <tr>
                        <td class="fontGeneral">1</td>
                        <td class="fontGeneral">Apart (Alat Pemadam Kebakaran)</td>
                        <td class="fontGeneral">1</td>
                        <td class="fontGeneral">30,000</td>
                        <td class="fontGeneral">30,000</td>
                        <td class="fontGeneral">-</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="fontWeightBold fontGeneral" style="text-align: right;">Subtotal</td>
                        <td class="fontWeightBold fontGeneral" style="text-align: right;">830,000</td>
                        <td class="fontWeightBold fontGeneral" style="text-align: right;"></td>
                    </tr>
                    <tr>
                        <td colspan="4" class="fontWeightBold fontGeneral" style="text-align: right;">PPN (10%)</td>
                        <td class="fontWeightBold fontGeneral" style="text-align: right;">830,000</td>
                        <td class="fontWeightBold fontGeneral" style="text-align: right;"></td>
                    </tr>
                    <tr>
                        <td colspan="4" class="fontWeightBold fontGeneral" style="text-align: right;">Grand Total</td>
                        <td class="fontWeightBold fontGeneral" style="text-align: right;">830,000</td>
                        <td class="fontWeightBold fontGeneral" style="text-align: right;"></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="padding-top: 40px; padding-bottom: 10px; border-bottom: 1px solid #161A30; text-align: right;" class="fontGeneral">
                Jakarta, 07-06-2023
            </td>
        </tr>
        <tr>
            <td style="border-top: 1px solid #161A30;"></td>
        </tr>
        <tr>
            <td style="padding-top: 15px;">
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <td rowspan="2" class="borderSolidHeader fontGeneral">Request By:</td>
                        <td colspan="2" class="borderSolidHeader fontGeneral" style="text-align: center;">Verified By:</td>
                        <td rowspan="2" class="borderSolidHeader fontGeneral">
                            <span>
                                Approved By <br>
                                (Direktur)
                            </span>
                        </td>
                        <td rowspan="2" class="borderSolidHeader fontGeneral">
                            Execute By
                        </td>
                    </tr>
                    <tr>
                        <td class="borderSolidHeader fontGeneral">Atasan Langsung</td>
                        <td class="borderSolidHeader fontGeneral">Finance</td>
                    </tr>
                    <tr>
                        <td class="borderSolidContent fontGeneral text-center">
                            <span>
                                Hendro <br>
                                07-07-2023
                            </span>
                        </td>
                        <td class="borderSolidContent fontGeneral text-center">
                            <span>
                                Hendro <br>
                                07-07-2023
                            </span>
                        </td>
                        <td class="borderSolidContent fontGeneral text-center">
                            <span>
                                Hendro <br>
                                07-07-2023
                            </span>
                        </td>
                        <td class="borderSolidContent fontGeneral text-center">
                            <span>
                                Hendro <br>
                                07-07-2023
                            </span>
                        </td>
                        <td class="borderSolidContent fontGeneral text-center">
                            <span>
                                Hendro <br>
                                07-07-2023
                            </span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>