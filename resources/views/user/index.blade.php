@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <h2>Nhập Dữ Liệu Khoản Chi</h2>
    <form action="" method="get">
        <div class="form-group">
            <label for="dateField">Ngày tháng:</label>
            <input type="date" class="form-control" id="dateField" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <div class="form-group">
            <label for="expenseName">Tên khoản chi:</label>
            <input type="text" class="form-control" id="expenseName" placeholder="Nhập tên khoản chi">
        </div>
        <div class="form-group">
            <label for="amount">Số tiền chi:</label>
            <input type="number" class="form-control" id="amount" placeholder="Nhập số tiền chi">
        </div>
        <div class="form-group">
            <label for="debt">Có phải khoản nợ?</label>
            <select class="form-control" id="debt">
                <option value="khong">Không</option>
                <option value="co">Có</option>
            </select>
        </div>
        <div class="form-group">
            <label for="loan">Có phải khoản cho vay?</label>
            <select class="form-control" id="loan">
                <option value="khong">Không</option>
                <option value="co">Có</option>
            </select>
        </div>
        <div class="form-group">
            <label for="source">Nguồn tiền:</label>
            <select class="form-control" id="source">
                <option value="tietkiem">Tiết kiệm</option>
                <option value="luong">Lương</option>
                <option value="khac">Khác</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Gửi</button>
    </form>
</div>
@endsection
