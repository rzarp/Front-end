@extends('backend.layouts.app')

@section('content')

<meta name="base_url" content="{{ url('products') }}">
<title>{{ config('app.name', 'Laravel') }} - Form Products</title>

<div class="d-sm-flex align-items-center mg-b-20 mg-lg-b-25 mg-xl-b-30">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                <li class="breadcrumb-item"><a href="{{ url('products') }}">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form</li>
            </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Welcome to Products</h4>
    </div>
</div>

<div class="row">
    <div class="col-sm">
        <div class="card shadow mb-4">
            <!-- Card Header -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="mt-2 font-weight-bold text-primary">
                    Form Post [{{ $data ? $data->title : 'Baru' }}]
                </h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form id="form" action="{{ $form == 'create'? url('products/store') : url('products/update/'.$id) }}" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="">Title</label>
                            <input type="text" class="form-control" name="title" value="{{ $data ? $data->title : '' }}" id="" required>
                        </div>
                        <div class="form-group col-12">
                            <label for="">Price</label>
                            <input type="text" class="form-control" name="pricelist" value="{{ $data ? $data->pricelist : '' }}" id="" oninput="inputRupiah(event)" required>
                        </div>
                        <div class="form-group col-12">
                            <label for="">Image</label>
                            <input type="file" class="form-control" name="images" value="{{ $data ? $data->images : '' }}" id="" onchange="preview_image(event)" required>
                            <img id="output_image" style="max-width: 470px; max-height: 263px;" src="{{ $data ? $data->images : '' }}">
                        </div>
                        <div class="form-group col-12">
                            <label for="">Description</label>
                            <textarea cols="30" rows="4" class="form-control" name="description" value="{{ $data ? $data->description : '' }}" id="" required></textarea>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            select2Generator('#select-group', '{{ url('user/group/list') }}');
            @if($data)
                let groups = @json($data->groups);
                $.each(groups, function(index, value) {
                    $('#select-group').append(`<option value="${value.id}" selected>${value.name}</option>`);
                });
            @endif
        });
    </script>
@endpush
