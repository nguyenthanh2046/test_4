@extends('layout.app')
@push('scripts')
    <script src="{{ mix('js/modules/products/form.js') }}"></script>
    <script src="{{ mix('js/select2_category.js') }}"></script>
@endpush

@section('pageTitle', (isset($product) ? "Edit" : "Create") . " Product")
@section('content')
    <div class="container-fluid">
        <div class="card card-form">
            <div class="card-header">{{isset($product) ? 'Edit' : 'Create New'}}</div>
            <form id="products_form" class="form" method="post" action="{{isset($product) ? route('products.update', $product->id) :route('products.store')}}" enctype="multipart/form-data" novalidate autocomplete="off">
                @csrf
                @isset($method)
                    @method('put')
                @endisset
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-6 col-lg-3 form-group">
                            <label for="txt_name">Name (*)</label>
                            <input class="form-control text-alphanum" name="name" type="text" id="txt_name" value="{{ $product->name ?? old('name')}}" autocomplete="NoAutocomplete" maxlength="100">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3 form-group">
                            <label for="select_category">Category (*)</label>
                            <select name="category_id[]" class="form-control select2" id="select_category" data-url="{{route('categories.list')}}" multiple="multiple">
                                @if(isset($product))
                                    @foreach($product->categories as $key => $value)
                                        <option selected value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3 form-group">
                            <label for="txt_sku">Sku (*)</label>
                            <input class="form-control text-alphanum" name="sku" type="text" id="txt_sku" value="{{ $product->sku ?? old('sku')}}" maxlength="50">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3 form-group">
                            <label for="txt_sku">Price (*)</label>
                            <input class="form-control text-money" name="price" type="text" id="txt_price" value="{{ isset($product) ? number_format($product->price): ''}}" maxlength="12">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-8 form-group">
                            <div class="custom-file">
                                <input type="file" accept=".jpg,.gif,.png" class="custom-file-input" id="txt_image" name="image">
                                <label class="custom-file-label" for="txt_image">{{ isset($product) && $product->original_name ? $product->original_name : 'Choose file'}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-8 form-group">
                            <label for="textarea_description">Description</label>
                            <textarea name="description" class="form-control" type="text" id="textarea_description" maxlength="200" rows="3">{{ $product->description ?? old('description')}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="text-right card-footer">
                    <button class="btn btn-primary mr-2"><span>
					<span>Save</span></span>
                    </button>
                    <a href="{{route('products.index')}}" class="btn btn-outline-secondary" id="link_back">
                        <span><span>Back</span></span>
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection

