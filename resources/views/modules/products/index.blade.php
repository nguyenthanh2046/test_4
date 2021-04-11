@extends('layout.app')
@push('scripts')
    <script src="{{ mix('js/select2_category.js') }}"></script>
    <script src="{{ mix('js/modules/products/index.js') }}"></script>
@endpush

@section('pageTitle', 'Products')
@section('content')
    <div class="container-fluid">
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert_action_result">
            <div class="message"></div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">List</h4>
                <div>
                    <a href="{{route('products.create')}}" class="btn btn-primary">Create Product</a>
                </div>
            </div>
            <div class="card-body">
                <form id="form_search_product" class="form" method="get" action="{{route('products.search_product_by_category')}}">
                    <label for="select_category">Search product by category:</label>
                    <div class="form-inline w-100 mb-3">
                        <select name="category_id" class="form-control select2 w-50 mb-2 mr-2" id="select_category" data-url="{{route('categories.list')}}"></select>
                        <button type="submit" class="btn btn-primary mr-2 ml-2">Seach</button>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-product" id="table_products">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Sku</th>
                            <th>Price</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody id="product_datas">
                        @include('modules.products._table_product_content')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
