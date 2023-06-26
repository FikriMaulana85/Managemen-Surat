<html>

<head>
    <title></title>
    <style>
        * {
            margin-right: 15px;
            margin-left: 7px;
            padding: 0;
        }

        body {
            font-family: arial narrow;
            font-size: 14px;
        }

        .tdrh {
            border: 1px solid #000000;
            font-weight: bold;
            text-align: center;
        }

        .tdrh0 {
            border: 1px solid #5A5A5A;
            text-align: center;
            font-size: 10px;
            padding-left: 2px;
            padding-right: 2px;
        }

        .tdrc1 {
            border: 1px solid #5A5A5A;
            padding-left: 5px;
            padding-right: 5px;
            text-align: center;
        }

        .tdrc2 {
            border: 1px solid #ddd;
            width: 100%;
            padding-left: 5px;
            padding-right: 5px;
        }

        img {
            padding: 0 0 0 15%;
            width: 6%;
            position: fixed;
        }
    </style>
</head>

<body>
    <center>
        <font size="4"><b>LAPORAN SURAT MASUK</b>
    </center>
    </font>
    <table>
        <tr>
            <td>
                <b>Periode : {{ $tanggal_awal }} -
                    {{ $tanggal_akhir }}</b> <br>
            </td>
        </tr>
    </table>
    <br>
    <table width="100%" cellspacing="0" cellpadding="0" align="center">
        <thead>
            <tr>
                <td class="tdrh">No Agenda</th>
                <td class="tdrh">No Surat</th>
                <td class="tdrh">Tgl Surat</th>
                <td class="tdrh">Ringkasan</th>
                <td class="tdrh">Dari</th>
                <td class="tdrh">Kepada</th>
                <td class="tdrh">Kode Klasifikasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($show as $list)
                <tr>
                    <td class="tdrc1">{{ $list->nomor_agenda }}</td>
                    <td class="tdrc1">{{ $list->nomor_surat_masuk }}</td>
                    <td class="tdrc1">{{ $list->tanggal_surat }}</td>
                    <td class="tdrc1">{{ $list->deskripsi_surat_masuk }}</td>
                    <td class="tdrc1">{{ $list->sumber_surat_masuk }}</td>
                    <td class="tdrc1">{{ $list->divisi->nama_divisi }}</td>
                    <td class="tdrc1">{{ $list->jenis_surat->kode_jenis_surat }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
