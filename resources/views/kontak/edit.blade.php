@extends('layout.template') 
<!-- START FORM -->
@section('tugas')

<form action='{{url('kontak/'.$data->nohp)}}' method='post'>
    @csrf 
    @method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{url('kontak')}}" class="btn btn-secondary"><< kembali</a>
        <div class="mb-3 row">
            <label for="nohp" class="col-sm-2 col-form-label">NoHp</label>
            <div class="col-sm-10">
                {{$data->nohp}}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama' value="{{$data->nama}}" id="nama">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='alamat' value="{{$data->alamat}}" id="alamat">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>  
    </div>
</form>
    <!-- AKHIR FORM -->   
@endsection
