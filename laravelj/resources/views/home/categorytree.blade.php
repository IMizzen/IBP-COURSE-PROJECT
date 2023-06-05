@foreach ($children as $subcategory)
<div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
    @if(count($subcategory->children))
        <a href="" class="dropdown-item">{{$subcategory->title}}</a>
        <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
            @include('home.categorytree',['children'=>$subcategory->children])
        </div>
        <hr>
    @else
        <a href="{{route('categoryproducts',['id'=>$subcategory->id, 'slug'=>$subcategory->title]) }}" class="dropdown-item"> {{$subcategory->title}}</a>
    @endif
</div>
@endforeach