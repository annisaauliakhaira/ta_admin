
   <html>
    <head>
       <title>DAFTAR PESERTA UJIAN DAN NILAI UJIAN AKHIR SEMESTER</title>
       <link href="http://portal.unand.ac.id/css/a-portal-print.css" rel="stylesheet" type="text/css" title="Default" />
       <link href="http://portal.unand.ac.id/css/a-portal-media-print.css" rel="stylesheet" type="text/css" title="Default" />
       <style>
            .footer {
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
            }
        </style>
    </head>
    <body>
          <div class="page">
            <div class="page-potrait">
                <div class="nobreak">
                <table border ="0" width="80%">  
                    <tr> 
                        <td rowspan="2"><img src="http://portal.unand.ac.id/images/logo_univ1.jpg" width=40 height=45/></td>
                        <td align="left"><h2>Universitas Andalas<br><small>Fakultas Teknologi Informasi</small></h2></td>
                        </tr>
                        <td><hr></td>
                    </tr>
                </table>
                <h2 align="center"><u>DAFTAR PESERTA UJIAN DAN NILAI UJIAN AKHIR SEMESTER</u></h2>     
                <h3 align="center">Semester: {{ $data->classe->period->semester==1 ? "Ganjil" : "Genap" }} {{ $data->classe->period->year }} / {{ $data->classe->period->year+1 }}</h3><br/><br />
       
                <table width="100%">
                    <tr> 
                        <td>Kelas/Kode Mtk</td>
                        <td>: {{ $data->classe->name }}</td>
                        <td>Tanggal Ujian</td>
                        <td>: {{ $data->date }}</td>
                    </tr>
                    <tr> 
                        <td>Matakuliah</td>
                        <td>: {{ $data->classe->course->name }}</td>
                        <td>Ruang Ujian</td>
                        <td>: {{ $data->room->name }}</td>
                    </tr>
                    <tr> 
                        <td>Dosen Penguji</td>
                        <td>: 
                            @foreach ($data->classe->lecturers as $key => $value)
                                @if($key==0)
                                    {{ $value->name }}
                                @else
                                    & {{ $value->name }}
                                @endif
                            @endforeach
                        </td>
                        <td>Jam Ujian</td>
                        <td>: {{ $data->start_hour->format('H:m').'-'.$data->ending_hour->format('H:m') }}</td>
                    </tr>
                    <tr> 
                        <td>Prodi</td>
                        <td>: -</td>
                        <td>Peserta</td>
                        <td>: {{ $data->presence->count() }}</td>
                    </tr>
                </table>
                <br/>
                <table width="100%" class="tabel-common">
                    <tr>
                        <th rowspan="2">No.</th>
                        <th rowspan="2">No BP</th>
                        <th rowspan="2">Nama</th>
                        <th rowspan="2">Absen</th>
                        <th colspan="6">NILAI LENGKAP AKHIR SEMESTER (NLAS)</th>
                        {{-- <th rowspan="2">TANDA TANGAN</th> --}}
                    </tr>
                    <tr>
                        <th>UTS</th>
                        <th>PRAK.</th>
                        <th>Tugas</th>
                        <th>UAS</th>
                        <th>Rata2</th>
                        <th>Huruf</th>
                    </tr>
                    @foreach ($data->presence as $key => $value)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $value->krs->student->nim }}</td>
                            <td>{{ $value->krs->student->name }}</td>
                            <td style="text-align: center">
                                @if ($value->status=="0")
                                    Tidak Hadir
                                @elseif($value->status=="1")
                                    Hadir
                                @else
                                    Izin
                                @endif
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            {{-- <td></td> --}}
                        </tr>
                    @endforeach
                </table>
                <br />
                <b>Mengetahui</b>
                <table width="70%"  class="tabel-common">
                    <tr>
                        <th style="width: 15%">No.</th>
                        <th style="width: 50%">Nama Pengawas</th>
                        <th>Verifikasi</th>
                    </tr>
                    <tr>
                        <td style="text-align: center">1</td>
                        <td>{{ $data->staff->name }}</td>
                        <td>{{ $data->verified }}</td>
                    </tr>
                </table>
                <br>
                <table width="70%"  class="tabel-common">
                    <tr>
                        <th style="width: 15%">No.</th>
                        <th style="width: 50%">Nama Dosen</th>
                        <th>Tanda Tangan</th>
                    </tr>
                    @foreach ($data->classe->lecturers as $key => $value)
                        <tr>
                            <td style="text-align: center">{{ $key+1 }}</td>
                            <td>{{ $value->name }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </table>
                <br />
                <b>Range Nilai</b>
                <br>
                <table width="100%">
                    <tr> 
                        <td width="20%">Kelompok Nilai A</td>
                        <td>: 80 - 100 = A &nbsp; 75 - 79 = A-</td>
                    </tr>
                    <tr> 
                        <td>Kelompok Nilai B</td>
                        <td>: 70 - 74 = B+ &nbsp; 65 - 69 =	B &nbsp; 60 - 64 = B-</td>
                    </tr>
                    <tr> 
                        <td>Kelompok Nilai C</td>
                        <td>: 55 - 59 =	C+ &nbsp; 50 - 54 =	C</td>
                    </tr>
                    <tr> 
                        <td>Kelompok Nilai D dan E</td>
                        <td>: 45 - 49 = D &nbsp; 00 - 44 = E</td>
                    </tr>
                </table>
                <div class="footer">
                    <p>Sistem Informasi Presensi Ujian/{{ auth('api')->user() ? auth('api')->user()->lecturer->name : "null" }}/{{ date('Y-m-d') }}</p>
                </div>
    </body>
 </html>
