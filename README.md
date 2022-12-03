# Otearai 2022
## 1. Mô tả
Otearai 2022 là trang web "Dự báo tỷ số trúng thưởng" dịp World Cup Qatar 2022. Mục đích nhằm gây quỹ cho chuyến đi chơi cuối khoá của lớp tác giả.
## 2. Công nghệ
* Backend: PHP Laravel
* Frontend: JQuery, Bootstrap
* Database: MySQL
## 3. Yêu cầu:
* PHP >= 7.4
* Yêu cầu cài đặt Web Server (Apache, NginX) và RDBMS (MySQL, MariaDB, PostgreSQL)
## 4. Hướng dẫn Deploy
* Database mẫu ở file wc2022.sql
* Thông tin đăng nhập database xem tại file .env
* Sau khi thêm Database mới có cấu trúc tương tự, tiến hành cấu hình thông tin đăng nhập vào file .env
* tại folder root của source code, chạy các câu lệnh sau
```console
$ php artisan config:cache
$ php artisan cache:clear
```
## 5. Hướng dẫn sử dụng:
* Tạo user với password cho người chơi bằng file .csv rồi add vào bảng users
* Thêm trận đấu mới và cập nhật tỉ số thủ công vào bảng matches
* call tới API /api/update (GET) để cập nhật kết quả của người chơi

## 6. Lưu ý
1. Trang web được tạo ra với mục đích **học tập** và **gây quỹ** cho chuyến đi chơi, với mức đặt cược thấp, **không tư lợi cá nhân**. Tiền lãi thu được của nhà cái được **xung cho quỹ tập thể**.
2. Tác giả không chịu trách nhiệm khi trang web được sử dụng với các mục đích phi pháp.

## 7. Phiên bản
v1.0 - 25/11/2022