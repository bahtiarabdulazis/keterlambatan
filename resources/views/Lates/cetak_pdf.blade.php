<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Pernyataan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row text-center mt-5 fs-5 fw-bold mb-5">
            <p>SURAT PERNYATAAN<br>TIDAK AKAN DATANG TERLAMBAT KESEKOLAH</p>
        </div>
        <div class="row mt-5">
            <p class="fw-semibold">Yang bertanda tangan dibawah ini :</p>
            <p>NIS : {{ $student->nis }}</p>
            <p>Nama : {{ $student->name }}</p>
            <p>Rombel : {{ $student->rombel->rombel }}</p>
            <p>Rayon : {{ $student->rayon->rayon }}</p>
        </div>
        <div class="row mt-3">
            <p>Dengan ini menyatakan bahwa saya telah melakukan pelanggaran tata tertib sekolah,
                yaitu terlambat datang ke sekolah sebanyak <b>3 kali</b>  yang mana hal tersebut termasuk kedalam pelanggaran kedisiplinan
                . Saya berjanji tidak akan terlambat datang ke sekolah lagi.
                Apabila saya terlambat datang ke sekolah lagi saya siap diberikan sanksi
                yang sesuai dengan peraturan sekolah.
            </p>
            <br>
            <p class="mt-3" style="margin-bottom: 200px;">Demikian surat pernyataan terlambat ini saya dengan penuh penyesalan</p>
        </div>
        <div class="container mt-5 text-center">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <p class="fw-semibold">Peserta Didik,<p>
                        <br>
                        <br>
                        <br>
                        <p>( {{$student->name}} )</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <p> Bogor, {{ now()->format('d F Y') }}</p>
                        <p class="fw-semibold">Orang Tua/Wali Peserta Didik,<p>
                        <br>
                        <br>
                        <br>
                        <p>( .............................................................. )</p>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 100px;">
                <div class="col-md-6">
                    <div class="mb-3">
                        <p class="fw-semibold">Pembimbing Siswa,</p>
                        <br>
                        <br>
                        <br>
                        <p>( .............................................................. )</p>
                    </div>
                </div>
        
                <div class="col-md-6">
                    <div class="mb-3">
                        <p class="fw-semibold">Kesiswaan,</p>
                        <br>
                        <br>
                        <br>
                        <p>( .............................................................. )</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>