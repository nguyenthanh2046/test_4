@if($products->isEmpty())
    <tr>
        <td class="text-center" colspan="5">
            No product founded, please create product.
        </td>
    </tr>
@else
    @foreach($products as $product)
        <tr>
            <th>{{$loop->index+1}}</th>
            <td><img src="{{asset('storage/products/'.$product->file_name)}}" alt="" class="product-image"></td>
            <td>{{$product->name}}</td>
            <td>{{$product->sku}}</td>
            <td>{{number_format($product->price)}}</td>
            <td class="text-right">
                <a href="{{route('products.edit',$product->id)}}" class="btn btn-sm btn-action-edit btn-primary" title="Edit">Edit</a>
                <button type="button" class="btn btn-sm btn-action-delete btn-danger" data-url="{{route('products.destroy',$product->id)}}" title="Delete">Delete</button>
            </td>
        </tr>
    @endforeach
@endif

