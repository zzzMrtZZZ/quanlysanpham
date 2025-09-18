<!DOCTYPE html>
<html>
<body>
    <h2>Chào {{ $user->name }},</h2>
    <p>Bạn đã đăng ký thành công tài khoản trên hệ thống.</p>
    <p>Thông tin đăng ký:</p>
    <ul>
        <li>Email: {{ $user->email }}</li>
        <li>Số điện thoại: {{ $user->phone ?? '—' }}</li>
    </ul>
    <p>Chúc bạn một ngày tốt lành!</p>
</body>
</html>
