@extends("layouts.sach_layout")

@section("title", "Danh sách sách")

@section("content")
    <h2 class="text-center mt-4">Danh sách sách</h2>
    <div class="list-book">
    @foreach($data as $row)
        <div class="book">
            <a href="{{ url('sach/chitiet/'.$row->id) }}">
                <img src="{{ asset('book_image/'.$row->file_anh_bia) }}" width='200px' height='200px'>
            </a>
            <br>
            <b>{{ $row->tieu_de }}</b><br/>
            <i>{{ number_format($row->gia_ban, 0, ",", ".") }}đ</i>
        </div>
    @endforeach
</div>
@endsection
