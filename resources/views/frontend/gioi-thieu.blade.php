<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Giới thiệu</title>
</head>
<body>
    <h1>Danh sách liên hệ</h1>
    <table border="1" style="border-collapse: collapse; border-color: red" cellpadding="5">
        <tr>
            <td>STT</td>
            <td>Phương thức</td>
            <td>Giá trị</td>
        </tr>
        @foreach ($ds_lienlac as $value)
            <tr>
                <td> {{ $value['stt'] }} </td>
                <td> {{ $value['phuong_thuc'] }} </td>
                <td> {{ $value['gia_tri'] }} </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
