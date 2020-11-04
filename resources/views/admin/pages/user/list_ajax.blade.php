@if ($user != null)
<div class="table-data" id="list-user">
    <table  id="bootstrap-data-user-table"  class="table">
        <thead>
            <tr>
                <td>
                    
                </td>
                <td>name</td>
                <td>role</td>
                <td>phone</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            {{-- {{dd($user)}} --}}
            @foreach ($user as $item)
            <tr>
                <td>
                    <img src="{{$item->img}}" alt="" width="50" height="50">
                </td>
                <td>
                    <div class="table-data__info">
                    <h6>{{$item->first_name}} {{$item->last_name}}</h6>
                        <span>
                            <a href="#">{{$item->email}}</a>
                        </span>
                    </div>
                </td>
                <td>
                    @if ($item->permission->permission == 'admin')
                        <span class="role admin">admin</span>
                        @elseif ($item->permission->permission == 'shop')
                        <span class="role member">Shop</span>
                        @elseif ($item->permission->permission == 'customer')
                        <span class="role user">Customer</span>
                        @endif
                    
                </td>
                <td>
                    {{$item->phone}}
                </td>
                <td>
                    <div class="table-data-feature">
                        <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                            <i class="zmdi zmdi-mail-send"></i>
                        </button>
                    <a href="{{route('user.edit',$item->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                            <i class="zmdi zmdi-edit"></i>
                        </a>
                        <button id="deleteUserModal" data-toggle="modal" data-target="#deleteModal" data-token="{{ csrf_token() }}"
                             class="item" id="deleteuser" data-id="{{ $item->id }}" >
                            <i class="zmdi zmdi-delete"></i>
                        </button>
                        <a href="{{route('user.detail',$item->id)}}" data-id="{{$item->id}}" class="item js_user_item" title="detail">
                            <i class="zmdi zmdi-eye"></i>
                        </a >
                    </div>
                </td>
            </tr>
            @endforeach
           
        </tbody>
    </table>
</div>
@endif