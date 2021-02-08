<html>
    <head>
       <title>BERITA ACARA UJIAN</title>
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
                    <div align="center">
                        <img src="http://portal.unand.ac.id/images/logo_univ1.jpg" width=40 height=45/>
                        <h2>PANITIA UJIAN SEMESTER<br><small>Fakultas Teknologi Informasi</small></h2>
                    </div>
                    <h2 align="center"><u>UJIAN SEMESTER</u></h2>
           
                    <table width="100%">
                        <tr> 
                            <td width="20%">Mata Ujian</td>
                            <td>: {{ $data->classe->course->name }}</td>
                        </tr>
                        <tr> 
                            <td>Kelas</td>
                            <td>: {{ $data->classe->name }}</td>
                        </tr>
                        <tr> 
                            <td>SKS</td>
                            <td>: {{ $data->classe->course->sks }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Ujian</td>
                            <td>: {{ $data->date }}</td>
                        </tr>
                        <tr>
                            <td>Program Studi</td>
                            <td>: Sistem Informasi - Strata 1</td>
                        </tr>
                        <tr>
                            <td>Pukul</td>
                            <td>: {{ $data->start_hour->format('H:m').'-'.$data->ending_hour->format('H:m') }}</td>
                        </tr>
                        <tr>
                            <td>Ruang Ujian</td>
                            <td>: {{ $data->room->name }}</td>
                        </tr>
                        <tr> 
                            <td>Peserta</td>
                            <td>: {{ $data->presence->count() }}</td>
                        </tr>
                        <tr>
                            <td>Peserta Hadir</td>
                            <td>: {{ $data->presence()->where('status',1)->get()->count() }} </td>
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
                        </tr>
                    </table>
                    <br/>
                    <h4 align="center"><u>CATATAN PELAKSANAAN UJIAN</u>
                    <table width="100%" class="tabel-common">
                        <tr>
                            <th style="width: 10%">No.</th>
                            <th>Catatan</th>
                        </tr>
                        @foreach ($data->newsEvents as $key => $event)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $event->news_event }}</td>
                            </tr>
                        @endforeach
                        
                    </table>
                    <br />
                    <br/>
                    <h4 align="center"><u>PENGAWAS UJIAN</u>
                    <table width="100%" class="tabel-common">  
                        <tr>
                            <th style="width: 10%">No.</th>
                            <th>Nama</th>
                            <th colspan="2">Tanda Tangan</th>
                        </tr>
                        @foreach ($data->staffs as $key => $staff)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $staff->name }}</td>
                                <td> {{ $key%2==0 ? $key+1 : "" }}</td>
                                <td>{{ $key%2!=0 ? $key+1 : "" }}</td>
                            </tr>
                        @endforeach
                        
                    </table>
                    <br />
                    <table align="right" width="30%" style="text-align: center">
                        <tr>
                            <td>Padang, 20 Januari 2021</td>
                        </tr>
                        <tr>
                            <td>.....................</td>
                        </tr>
                        <tr><td><br></td></tr>
                        <tr><td><br></td></tr>
                        <tr><td><br></td></tr>
                        <tr><td>....................................</td></tr>
                        <tr><td>--------------------------------------</td></tr>
                        <tr><td>NIP: .................................</td></tr>
                    </table>
                    <div class="footer">
                        <p>Sistem Informasi Presensi Ujian/{{ auth('api')->user() ? auth('api')->user()->lecturer->name : "null" }}/{{ date('Y-m-d') }}</p>
                    </div>
            </div>
          </div>
    </body>
 </html>