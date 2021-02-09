<!DOCTYPE html>
<html>
<head>
    <title>Sistem Informasi Persensi Ujian</title>
</head>
<body>
    <h1>{{ $data->title }}</h1>
    <p>Berikut File Bimbingan Bapak / Ibu : </p>
    <p> 
        <ul>
            <li>Nama Dosen : {{ $data->name }}</li>
            <li>Kelas : {{ $data->kelas }}</li>
            <li>Tanggal : {{ $data->Tanggal_ujian }}</li>
            <li>Mulai : {{ $data->waktu_mulai }}</li>
            <li>Selesai : {{ $data->waktu_selesai }}</li>
        </ul>    
    </p>
     
    <p>Thank you</p>
</body>
</html>