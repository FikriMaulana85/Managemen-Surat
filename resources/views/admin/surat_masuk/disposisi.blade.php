<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        html,
        body {
            height: 100%
        }

        .kop {
            padding-top: 150px;

        }

        .container {
            height: 100%;
            display: flex;
            justify-content: center;
            /* align-
            items: center; */
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 15px;
        }
    </style>
</head>


<body>
    <div class="container">
        <div class="kop">
            <center>
                <h3>LEMBAR DISPOSISI</h3>
            </center>
            <table align="center">
                <tbody width="500px">
                    <tr>
                        <td style="border-right: 0px !important">Surat Dari</td>
                        <td style="border-left: hidden;border-right: hidden;">:</td>
                        <td>{{ $show[0]->sumber_surat_masuk }}</td>
                        <td style="border-right:0px !important">Diterima Tanggal</td>
                        <td style="border-right: hidden;border-left: hidden;">:</td>
                        <td>{{ $show[0]->tanggal_terima }}</td>
                    </tr>
                    <tr>
                        <td style="border-right: 0px !important">Tanggal Surat</td>
                        <td style="border-left: hidden;border-right: hidden;">:</td>
                        <td>{{ $show[0]->tanggal_surat }}</td>
                        <td style="border-right: 0px !important">No Agendal</td>
                        <td style="border-left: hidden;border-right: hidden;">:</td>
                        <td>{{ $show[0]->nomor_agenda }}</td>
                    </tr>
                    <tr>
                        <td>Nomor Surat</td>
                        <td style="border-left: hidden;border-right: hidden;">:</td>
                        <td>{{ $show[0]->nomor_surat_masuk }}</td>
                        <td>Diterima Kepada</td>
                        <td style="border-left: hidden;border-right: hidden;">:</td>
                        <td>{{ $show[0]->divisi->nama_divisi }}</td>
                    </tr>
                    <tr>
                        <td>Perihal</td>
                        <td style="border-left: hidden;border-right: hidden;">:</td>
                        <td>{{ $show[0]->deskripsi_surat_masuk }}</td>
                        <td>1. <br>2.<br>3.</td>
                        <td style="border-left: hidden;border-right: hidden;"></td>
                        <td></td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
