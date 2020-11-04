@if ($category != null)
<div class="table-data" id="list-category">
    <table  id="bootstrap-data-category-table"  class="table">
        <thead>
            <tr>
                <td>
                    
                </td>
                <td>name</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            {{-- {{dd($category)}} --}}
            @foreach ($category as $item)
            <tr>
                <td>
                    <img src="{{$item->img}}" alt="" width="50" height="50">
                </td>
            <td>{{$item->name}}</td>
                
                
                <td>
                    <div class="table-data-feature">
                        {{-- <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                            <i class="zmdi zmdi-mail-send"></i>
                        </button> --}}
                    <a href="{{route('category.edit',$item->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                            <i class="zmdi zmdi-edit"></i>
                        </a>
                        <button id="deleteCategoryButton" data-toggle="modal" data-target="#deleteCategoryModal" data-token="{{ csrf_token() }}"
                             class="item" id="deletecategory" data-id="{{$item->id}}" >
                            <i class="zmdi zmdi-delete"></i>
                        </button>
                        {{-- <a href="{{route('category.detail',$item->id)}}" data-id="{{$item->id}}" class="item js_category_item" title="detail">
                            <i class="zmdi zmdi-eye"></i>
                        </a > --}}
                    </div>
                </td>
            </tr>
            @endforeach
           
        </tbody>
    </table>
</div>
    
@endif