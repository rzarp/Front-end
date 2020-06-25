@extends('backend.layouts.app')

@section('content')
<title>{{ config('app.name', 'Laravel') }} - Products</title>
<meta name="base_url" content="{{ url('products') }}">

<div class="d-sm-flex align-items-center mg-b-20 mg-lg-b-25 mg-xl-b-30">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                <li class="breadcrumb-item"><a href="#">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">Index</li>
            </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Welcome to Products</h4>
    </div>
</div>

<div class="d-flex align-items-center">
    <div class="card shadow flex-fill">
        <div class="card-body">
            <div class="d-flex bd-highlight mb-3">
                <h4 class="mr-auto p-2 bd-highlight card-title">List Products</h4>
                <div class="p-2 bd-highlight">
                    <div class="btn-group shadow" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-sm btn-primary refresh-button"><i class="fas fa-sync"></i></button>
                        <a href="{{ url('products/create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover" id="datatable">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Pricelist</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function () {
        table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            defaultContent: '-',
            responsive: true,
            destroy: true,
            ajax: {
                url: '{{ url("datatables/products") }}',
                type: 'POST',
            },
            order: [
                [1, "DESC"]
            ],
            columns: [
                { data: 'title' },
                { data: 'pricelist' },
                { data: 'description' },
                { data: 'action' }
            ]
        });
    });
</script>
@endpush