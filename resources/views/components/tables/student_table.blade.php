@extends('pages.index')

@section('table')
    <a name="" id="" class="btn btn-primary" href="create" role="button">Create Student</a>

    <table id="table" data-toggle="table" data-search="true" data-pagination="true">
        <thead>
            <tr>
                <th data-field="id">ID</th>
                <th data-field="nis">NIS</th>
                <th data-field="nama">Nama</th>
                <th data-field="get_class.name">Kelas</th>
                <th data-formatter="buttonFormatter">Action</th>
            </tr>
        </thead>
    </table>
@endsection

@push('scripts')
    <script src="https://unpkg.com/bootstrap-table@1.22.2/dist/bootstrap-table.min.js"></script>

    <script>
        $('#table').bootstrapTable({
            url: "{{ url('api/student/all') }}",
            pagination: true,
            search: true
        })


        function buttonFormatter(value, row) {
            return "<button class='btn btn-warning'>Edit</button> " +
                " <button class='btn btn-danger' data-id='" + row.id + "' onClick='deleteData(this)'>Delete</button>"
        }

        function deleteData(e) {
            let id = $(e).data('id');
            console.log(id);

            $.ajax({
                type: "DELETE",
                url: "{{ url('api/student/delete') . '/' }}" + id,
                // data: "data",
                // dataType: "dataType",
                success: () => {
                    alert('Delete berhasil')
                },
                error: (err) => {
                    console.log(err);
                }
            });
        }
    </script>
@endpush
