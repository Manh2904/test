@extends('layout.admin')

@section('content')
    <div class="cart">
        <h1 class="text-center">Danh sach </h1>
        <div class="cart-body">
            <a href="{{route('nhac-dy.create')}}" class="btn btn-success">Them</a>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <td>STT</td>
                        <td>Ten</td>
                        <td>Anh</td>
                        <td>Ngay sinh</td>
                        <td>The loai</td>
                        <td>Mo ta</td>
                        <td>Thao tac</td>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($listNhacDy as $keys => $nhacDy)
                       <tr>
                        <td>{{$keys+1}}</td>
                        <td>{{$nhacDy->name}}</td>
                        <td>
                            @if ($nhacDy->profile_picture)
                                <img src="{{Storage::url($nhacDy->profile_picture)}}" width="100px" height="100px" alt="">
                            @endif
                        </td>
                        <td>{{$nhacDy->birth_date}}</td>
                        <td>{{$nhacDy->instrument}}</td>
                        <td>{{$nhacDy->biography}}</td>
                        <td>
                            <a href="{{ route('nhac-dy.edit', $nhacDy->id)}}" class="btn btn-warning">Sua</a>
                         
                            <form action="{{route('nhac-dy.destroy', $nhacDy->id)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button onclick="return conform('ban co muon xoa chu')" class="btn btn-danger">Xoa</button>
                            </form>
                        </td>
                       </tr>
                   @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
