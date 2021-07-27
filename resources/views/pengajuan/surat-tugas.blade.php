<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Document</title>
  <style>
    table {
      width: 80%;
      margin: auto;
    }
    h1 {
      text-align: center;
    }
    h3 {
      text-align: center;
    }
  </style>
</head>
<body>
  <h1>SURAT PERJALANAN DINAS</h1>
  <h3>PT XYZ / {{ date("Y") }}</h3>
  <br>
  <table>
    <tr>
      <td>1</td>
      <td>Nama Karyawan</td>
      <td>: {{ $pengajuan->pengaju->name }}</td>
    </tr>
    <tr>
      <td>2</td>
      <td>Posisi Karyawan</td>
      <td>: {{ $pengajuan->pengaju->posisi }}</td>
    </tr>
    <tr>
      <td>3</td>
      <td>Tujuan Perjalanan Dinas</td>
      <td>: {{ $pengajuan->tujuan_perjalanan->nama }}</td>
    </tr>
    <tr>
      <td>4</td>
      <td>Tipe Perjalanan Dinas</td>
      <td>: {{ $pengajuan->jenis_transportasi->tipe_perjalanan->nama }}</td>
    </tr>
    <tr>
      <td>5</td>
      <td>Jenis Transportasi</td>
      <td>: {{ $pengajuan->jenis_transportasi->nama }}</td>
    </tr>
    <tr>
      <td>6</td>
      <td>Alamat Tujuan - Alamat Asal</td>
      <td>: {{ $pengajuan->alamat_tujuan }} -  {{ $pengajuan->alamat_asal }}</td>
    </tr>
    <tr>
      <td>7</td>
      <td>Tanggal Berangkat - Tanggal Kembali</td>
      <td>: {{ date_format(date_create($pengajuan->datetime_keberangkatan),"d/M/Y") }} - {{ date_format(date_create($pengajuan->datetime_kembali),"d/M/Y") }}</td>
    </tr>
    <tr>
      <td>8</td>
      <td>Total Biaya</td>
      <td>: Rp. {{ number_format($pengajuan->jumlah_pengajuan,0,",",".") }}</td>
    </tr>
    <tr>
      <td>9</td>
      <td>Keterangan</td>
      <td>: {{ $pengajuan->keterangan }}</td>
    </tr>
    <tr><td><br></td></tr>
    <tr><td><br></td></tr>
    <tr><td><br></td></tr>
    <tr><td><br></td></tr>
    <tr><td><br></td></tr>
    <tr>
        <td></td>
        <td></td>
        <td>Jakarta, {{ date('d/m/Y') }}</td>
      </tr>
      <tr>
        <td></td>
        <td>{{ $pengajuan->pengaju->name }}</td>
        <td>Disetujui Oleh:</td>
      </tr>
      <tr><td> <br> </td></tr>
      <tr><td> <br> </td></tr>
      <tr>
        <td></td>
        <td></td>
        <td>{{ $pengajuan->PUK->name }}</td>
      </tr>
  </table>
</body>
</html>