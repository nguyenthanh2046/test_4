@extends('layout.app')
@push('scripts')
    <script src="{{ mix('js/modules/categories/index.js') }}"></script>
@endpush

@section('pageTitle', 'Categories')
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
                    <a href="{{route('categories.create')}}" class="btn btn-primary">Create Category</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="table_categories">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Parent Category</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($categories->isEmpty())
                            <tr>
                                <td class="text-center" colspan="4">
                                    No category founded, please create category.
                                </td>
                            </tr>
                        @else
                            @foreach($categories as $key=>$category)
                                <tr>
                                    <th>{{$loop->index+1}}</th>
                                    <td>{{$category->name}}</td>
                                    <td>{{isset($category->parent_id) ? $category->parent->name : ''}}</td>
                                    <td class="text-right">
                                        <a href="{{route('categories.edit',$category->id)}}" class="btn btn-sm btn-action-edit btn-primary" title="Edit">Edit</a>
                                        @if($category->childs->isEmpty() && $category->products->isEmpty())
                                            <button type="button" class="btn btn-sm btn-action-delete btn-danger" data-url="{{route('categories.destroy',$category->id)}}" title="Delete">Delete</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

