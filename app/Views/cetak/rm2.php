<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak RM - </title>
    <style>
        body {
            font-size: 12pt;
        }

        table {
            border-collapse: collapse;
        }

        table tr td {
            padding-left: 5px;
            padding-bottom: 10px;
        }

        .cusMargin025 {
            -webkit-margin-after: 0.25em;
            -webkit-margin-before: 0.25em;
        }

        h3 {
            font-size: 14pt;
        }

        h2 {
            font-size: 18pt;
        }

        h5 {
            font-size: 10pt;
        }

        table.uraian td {
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .bordered {
            border-bottom: 1px solid black;
        }
    </style>
</head>

<body>
    <div style="border:1px solid black; padding:10px; height: 100%">
        <table width="100%">
            <tr>
                <td>
                    <img src="{logo}" style="width:4.5cm">
                </td>
                <td align="center" style="width:60%">
                    <h3 class="cusMargin025">PEMERINTAH KABUPATEN BANYUMAS</h3>
                    <h3 class="cusMargin025">DINAS KESEHATAN</h3>
                    <h2 class="cusMargin025">BALAI KESEHATAN PARU MASYARAKAT</h2>
                    <h5 class="cusMargin025">Jalan Jendral Ahmad Yani No. 33 Purwokerto</h5>
                </td>
                <td style="vertical-align: top;">
                    <table border="1">
                        <tr>
                            <td style="padding:10px; text-align: center;">FORM RJ 01</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <hr>
                </td>
            </tr>
            <tr>
                <td colspan="3" align="center">
                    <h3><b>FORMULIR PENDAFTARAN PASIEN BARU</b></h3>
                </td>
            </tr>
        </table>
        <br>
        <table style="width:100%;" class="uraian">
            <tr>
                <td style="width:25%">No. Rekam Medis</td>
                <td style="width:2%;">:</td>
                <td colspan="2">{norm} / {rmlama}</td>
                <td>Gol. Darah</td>
                <td style="width:2%;">:</td>
                <td colspan="3">{goldarah}</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td colspan="5">{nama}</td>
            </tr>
            <tr>
                <td>Tempat / Tgl Lahir</td>
                <td>:</td>
                <td colspan="2">{tmptlahir}</td>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td colspan="3">{tgllahir}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td colspan="5">{noktp}</td>
            </tr>
            <tr>
                <td>Cara Pembayaran</td>
                <td>:</td>
                <td colspan="5">{kelompok}</td>
            </tr>
            <tr>
                <td>No. Asuransi</td>
                <td>:</td>
                <td colspan="5">{noasuransi}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td colspan="2">{jeniskel}</td>
                <!--td>Kewarganegaraan</td>
                    <td>:</td>
                    <td>{kewarganegaraan}</td-->
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td colspan="5">{alamat}</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td>RT / RW</td>
                <td>:</td>
                <td colspan="3">{rtrw}</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td>Desa / Kelurahan</td>
                <td>:</td>
                <td colspan="3">{kelurahan}</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td>Kecamatan</td>
                <td>:</td>
                <td colspan="3">{kecamatan}</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td>Kabupaten</td>
                <td>:</td>
                <td colspan="3">{kabupaten}</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td>Provinsi</td>
                <td>:</td>
                <td colspan="3">{provinsi}</td>
            </tr>
            <tr>
                <td>Pendidikan Terakhir</td>
                <td>:</td>
                <td colspan="5">{pendidikan}</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td colspan="5">{pekerjaan}</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td colspan="5">{statKawin}</td>
            </tr>
            <!--tr>
                    <td>No. Telepon / HP</td>
                    <td>:</td>
                    <td colspan="5">{nohp}</td>
                </tr-->
            <tr>
                <td>Penanggung Jawab</td>
                <td>:</td>
                <td colspan="5">{pjwb}</td>
            </tr>
            <tr>
                <td>Ibu Kandung</td>
                <td>:</td>
                <td colspan="5">{ibuKandung}</td>
            </tr>
        </table>
        <p style="font-align:justify">
            &emsp;&emsp;&emsp; Dengan ini saya menyatakan setuju untuk dilakukan dalam upaya kesembuhan /
            keselamatan jiwa saya
            serta identitas diri saya telah saya berikan dengan sebenar-benarnya tanpa kebohongan.
        </p>
        <p><br></p>
        <table>
            <tr>
                <td width="65%" align="center"></td>
                <td align="center">
                    Purwokerto, {tanggal}
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <pre>(                      )</pre>
                </td>
            </tr>
        </table>
        <div style="float: right; text-align:center;"></div>
    </div>
</body>

</html>