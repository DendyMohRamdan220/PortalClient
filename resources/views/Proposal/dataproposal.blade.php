@extends('Layouts.layout')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Proposal</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item">Pages </li>
                            <li class="breadcrumb-item active">Proposal</li>
                        </ol>
                    </div>

                    <!-- Container-fluid starts-->
                    <div class="container-fluid support-ticket">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header pb-0">
                                        <h5>Add Proposal Detail</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="col-sm-12">
                                            <div class="row g-3 align-items-center mt-2">
                                                <div class="col-auto">
                                                    <a href="/tambahdataproposal_admin" class="btn btn-success"> <i
                                                            class="nav-icon icon-plus"></i> Add Proposal</a>
                                                </div>
                                                <div class="col-auto">
                                                    <form action="/dataproposal_admin" method="GET">
                                                        <input type="search" id="inputPassword6" name="search"
                                                            class="form-control" aria-describedby="passwordHelpInline">
                                                    </form>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="/exportpdf_admin" class="btn btn-info"> <i
                                                            class="nav-icon fas fa-file-pdf"></i> Export PDF</a>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-success">
                                                        <thead class="tbl-strip-thad-bdr">
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">Name</th>
                                                                <th scope="col">Total</th>
                                                                <th scope="col">Created at</th>
                                                                <th scope="col">Valid till</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $no = 1;
                                                            @endphp
                                                            @foreach ($data as $dataproposal_admin => $row)
                                                                <tr>
                                                                    <th scope="row">
                                                                        {{ $dataproposal_admin + $data->firstItem() }}</th>
                                                                    <td>{{ $row->proposal_name }}</td>
                                                                    <td>{{ $row->total }}</td>
                                                                    <td>{{ $row->created_at->isoFormat('D MMM Y') }}</td>
                                                                    <td>{{ $row->valid_till }}</td>
                                                                    <td>
                                                                        <a class="btn btn-info"
                                                                            href="/editdataproposal_admin/{{ $row->id }}">
                                                                            <i class="nav-icon icon-pencil-alt"></i></a>
                                                                        <a class="btn btn-danger delete" href="#"
                                                                            data-id="{{ $row->id }}"
                                                                            data-name="{{ $row->proposal_name }}">
                                                                            <i class="nav-icon icon-trash"></i></a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <div class="card-body">
                                                        <nav aria-label="Page navigation example">
                                                            <ul class="pagination pagination-primary">{{ $data->links() }}
                                                            </ul>
                                                        </nav>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Container-fluid Ends-->
                </div>
            </div>
        @endsection

        @push('scripts')
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
            </script>

            <script src="https://code.jquery.com/jquery-3.6.1.min.js"
                integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
                integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            </body>
            <script>
                $('.delete').click(function() {
                    var proposalid = $(this).attr('data-id');
                    var namaproposal = $(this).attr('data-subject');
                    swal({
                            title: "Are you sure?",
                            text: "Once deleted, you will not be able to recover data from the Proposal Subject " +
                                namaproposal + " ",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                window.location = "/deletedataproposal_admin/" + proposalid + ""
                                swal("Your data from Proposal Subject " + namaproposal + " has been deleted!", {
                                    icon: "success",
                                });
                            } else {
                                swal("Deletion of data from Proposal Subject " + namaproposal + " has been cancelled!");
                            }
                        });
                });
            </script>
            <script>
                @if (Session::has('success'))
                    toastr.success("{{ Session::get('success') }}");
                @endif
            </script>
        @endpush
