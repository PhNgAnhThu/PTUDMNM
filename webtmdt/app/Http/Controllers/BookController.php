<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    function laythongtintheloai()
    {
        $the_loai_sach = Category::all();
        return view("qlsach.the_loai",compact("the_loai_sach"));
    }
    function laythongtinsach()
    {
        $sach = Book::select("tieu_de","tac_gia")
                ->where("nha_xuat_ban","Văn Học")
                ->where("gia_ban",">=",50000)
                ->where("gia_ban","<=",90000)->get();
        return view("qlsach.thong_tin_sach",compact("sach"));
    }
    function nhapdulieu()
    {
        return view("qlsach.nhap_du_lieu");
    }
    function luudulieu(Request $request)
    {
        $ids=$request->input("id");
        $ten_the_loai=$request->input("ten_the_loai");
        /*$data = ["id"=>$id,"ten_the_loai"=>$ten_the_loai];
        DB::table("the_loai")->insert($data);
        return "Thêm thành công";*/
        // Thêm dữ liệu vào database
        for ($i = 0; $i < count($ids); $i++) {
        $the_loai = new Category();
        $the_loai->id = $ids[$i];
        $the_loai->ten_the_loai = $ten_the_loai[$i];
        $the_loai->save();}

        // Lấy danh sách thể loại sau khi thêm mới
        $the_loai_sach = Category::all();

        // Chuyển hướng đến trang danh sách thể loại
        return redirect('/qlsach/theloai');
    }
}