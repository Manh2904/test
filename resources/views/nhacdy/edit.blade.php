@extends('layout.admin')
@section('content')
    <h4 class="card-header">Thêm mới </h4>
    <div class="card-body">
        <form action="{{ route('nhac-dy.update', $nhacDy->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    placeholder="Nhap du lieu" value="{{ old('name', $nhacDy->name) }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">profile_picture</label>
                <input type="file" name="profile_picture"
                    class="form-control @error('profile_picture') is-invalid @enderror" placeholder="Nhap du lieu"
                    value="{{ old('profile_picture', $nhacDy->profile_picture) }}">
                @error('profile_picture')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                @if ($nhacDy->profile_picture)
                    <img src="{{ Storage::url($nhacDy->profile_picture) }}" width="100px" height="100px" alt="">
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label">birth_date</label>
                <input type="date" name="birth_date" class="form-control @error('birth_date') is-invalid @enderror"
                    placeholder="Nhap du lieu" value="{{ old('birth_date', $nhacDy->birth_date) }}">
                @error('birth_date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">instrument</label>
                <input type="text" name="instrument" class="form-control @error('instrument') is-invalid @enderror"
                    placeholder="Nhap du lieu" value="{{ old('instrument', $nhacDy->instrument) }}">
                @error('instrument')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">biography</label>
                <textarea name="biography" class="form-control @error('biography') is-invalid @enderror" rows="3">{{ old('biography', $nhacDy->biography) }}</textarea>
                @error('biography')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3 d-flex justify-content-center">
                <button type="submit" class="btn btn-success">Thêm mới</button>
            </div>
        </form>
    </div>
@endsection
