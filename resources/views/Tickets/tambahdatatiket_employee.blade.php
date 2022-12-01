@extends('Layouts.layout')

@section('content')

    @push('css')
        <!-- Plugins css start-->
        <!-- Bootstrap CSS -->
    @endpush

        <div class="page-body">
            <div class="col-sm-6">
                <h3> Add Ticket </h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboardv1"> Home </a></li>
                    <li class="breadcrumb-item"><a href="/ticket_employee"> Support Ticket </a></li>
                    <li class="breadcrumb-item active"> Add Ticket </li>
                </ol>
            </div>
            <div class="row justify-content-center">
                <div class="col-9">
                    <div class="card">
                        <div class="card-body">
                            <form action="/insertdatatiket_employee" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ticket Subject</label>
                                    <input type="text" name="ticket_subject" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Description</label>
                                    <input type="text" name="description" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Status Ticket</label>
                                    <br>
                                    <select class="form-select" name="status" aria-label="Default select example">
                                        <option selected>Status</option>
                                        <option value="1">Order</option>
                                        <option value="2">Progres</option>
                                        <option value="3">Pending</option>
                                        <option value="4">Done</option>
                                        <option value="5">Cancel</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
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
@endpush
