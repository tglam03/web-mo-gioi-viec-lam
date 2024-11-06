<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Trang Web môi giới việc làm
## _Dự án web môi giới việc làm_

## Đối tượng sử dụng
- Quản trị viên
 - Nhà tuyển dụng
- Ứng viên

## Chức năng từng đối tượng
A. Quản trị viên
- Quản lý trang thông tin: banner, giới thiệu..
- Quản lý người dùng 
- Quản lí file: file JD, CV

## Nhà tuyển dụng
- Đăng bài tuyển dụng JD(bản chất là form kèm file JD, tên công ty, địa điểm,	ngôn ngữ)
- Tìm kiếm CV
- Chỉnh sửa thông tin cá nhân (thuộc công ty nào, thông tin liên hệ)

## Ứng viên
- Tìm kiếm công việc theo mức lương, ngôn ngữ, trình độ, yêu cầu bằng cấp chứng chỉ, địa điểm, số lượng
- Đăng cv
- Xem danh sách công việc(có thể ghim và còn lại sắp sếp ngẫu nhiên)
- Báo cáo vi: công ty, cá nhân



## Phân tích tác nhân
- Đăng bài tuyển dụng

| Các tác nhân | Nhà tuyển dụng |
| ------ | ------ |
| Mô tả | Người dùng ấn vào nút “Đăng bài tuyển dụng” trên thanh menu |
| Đầu vào | Tên công ty<br>Tên công việc<br>Địa điểm: thành phố - quận (select2 - load về local)<br>Remote |
| Trình tự xử lý	 |  |
| Đầu ra | Đúng: Hiển thị trang người dùng và thông báo thành công<br>Sai: Hiển thị trang đăng nhập và thông báo thất bại |
| Lưu ý | Kiểm tra ô nhập không được để trống bằng JavaScript |



