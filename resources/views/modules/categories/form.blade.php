@extends('layout.app')
@push('scripts')
    <script src="{{ mix('js/modules/categories/form.js') }}"></script>
    <script src="{{ mix('js/select2_category.js') }}"></script>
@endpush

@section('pageTitle', (isset($category) ? "Edit" : "Create") . " Category")
@section('content')
    <div class="container-fluid">
        <div class="card card-form">
            <div class="card-header">{{isset($category) ? 'Edit' : 'Create New'}}</div>
            <form id="categories_form" class="form" method="post" action="{{isset($category) ? route('categories.update', $category->id) :route('categories.store')}}" autocomplete="off" novalidate>
                @csrf
                @isset($method)
                    @method('put')
                @endisset
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-6 col-lg-4 form-group">
                            <label for="txt_name">Name (*)</label>
                            <input class="form-control" name="name" type="text" id="txt_name" value="{{ $category->name ?? old('name')}}" autocomplete="" maxlength="100">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4 form-group">
                            <label for="select_category">Parent category</label>
                            <select name="parent_id" class="form-control select2" id="select_category" data-url="{{route('categories.list', $category->id ?? '')}}">
                                @if(isset($category) && $category->parent_id)
                                    <option value="{{$category->parent_id}}" selected>{{ $category->parent->name }}</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="text-right card-footer">
                    <button class="btn btn-primary mr-2"><span>
					<span>Save</span></span>
                    </button>
                    <a href="{{route('categories.index')}}" class="btn btn-outline-secondary" id="link_back">
                        <span><span>Back</span></span>
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
