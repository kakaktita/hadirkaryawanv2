@extends('layouts.presensi')
@section('header')
    {{-- Materialize Datepicker --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    {{-- App Header --}}
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="/presensi/izin" class="headerButton" goBack>
                <ion-icon name="chevron-back-outline">
                </ion-icon></a>
        </div>
        <div class="pageTittle">Form Izin</div>
        <div class="right"></div>
    </div>
    {{-- App Header --}}
@endsection
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col">
            <form action="/presensi/storeizin" method="POST" id="frmIzin">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control datepicker" id="tgl_izin" name="tgl_izin"
                        placeholder="Tanggal">
                </div>
                <div class="form-group">
                    <select name="status" id="status" class="form-control">
                        <option value="">-Pilih Status-</option>
                        <option value="i">Izin</option>
                        <option value="s">Sakit</option>
                    </select>
                </div>
                <div class="form-group">
                    <textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control" placeholder="Keterangan"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block">Kirim</button>

                </div>
            </form>
        </div>
    </div>
@endsection
@push('myscript')
    <script>
        var currYear = (new Date()).getFullYear();

        $(document).ready(function() {
            $(".datepicker").datepicker({
                format: "yyyy-mm-dd"
            });

            $("#frmIzin").submit(function() {
                var tgl_izin = $("#tgl_izin").val();
                var status = $("#status").val();
                var keterangan = $("#keterangan").val();
                if (tgl_izin == "") {
                    Swal.fire({
                        title: 'Oopss!',
                        text: 'Tanggal Harus Diisi',
                        icon: 'warning',
                    });
                    return false;
                } else if (status == "") {
                    Swal.fire({
                        title: 'Oopss!',
                        text: 'Status Harus Diisi',
                        icon: 'warning',
                    })
                    return false;
                } else if (keterangan == "") {
                    Swal.fire({
                        title: 'Oopss!',
                        text: 'Keterangan Harus Diisi',
                        icon: 'warning',
                    })
                    return false;
                }
            });
        });
    </script>
@endpush
