@extends('pages.index')

@section('title', 'student')

@section('table')

    <form class="pb-3">
        <div class="mb-3">
            <label for="nis" class="form-label">NIS</label>
            <input type="text" class="form-control" id="nis">
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama">
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Umur</label>
            <input type="text" class="form-control" id="umur">
        </div>
        <div class="form-floating mb-3">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat"></textarea>
        </div>
        <div class="mb-3">
            <label for="">Gender</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="pria" name="gender" id="gender1">
                <label class="form-check-label" for="flexCheckDefault">
                    Pria
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="wanita" name="gender" id="gender2" checked>
                <label class="form-check-label" for="flexCheckChecked">
                    Wanita
                </label>
            </div>
        </div>
        <div class="mb-3 form-group">
            <label for="kelas">Kelas</label>
            <select class="form-select form-control" name="kelas" id="kelas" aria-label="Default select example">
                <option selected>Pilih</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
        </div>
        <button type="button" id="btn-create" class="btn btn-success">Submit</button>
    </form>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#btn-create').click(() => {
                $.ajax({
                    type: "POST",
                    url: "{{ url('api/student/create') }}",
                    data: {
                        nis: $('#nis').val(),
                        nama: $('#nama').val(),
                        umur: $('#umur').val(),
                        alamat: $('#alamat').val(),
                        class_id: $('#kelas').val(),
                        // gender: $('input[name="gender"]:checked').val(),
                    },
                    dataType: "dataType",
                    success: function() {
                        alert("Berhasil Tambah Data");
                    },
                    error: function(res) {
                        console.log(res)
                    }
                });
                window.location.href = "{{ url('/student_table') }}";
            })
        });
    </script>
@endpush
