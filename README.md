# doan3
import csdl thi.sql (đã update)
thay đổi base_url trong file application/config/config.php
thay đổi csdl trong file application/config/database.php
++
- các controller nằm trong thư mục controller/admin:
    + tên bắt đầu bằng tiền tố C..
    + phải extends từ MY_Controller
    + truyền dữ liệu sang view: - khai báo 1 mảng ($data = array();)
                                - gán giá trị cho mảng: $data['records'] = $records --$records là giá trị lấy được từ model
                                - $data['content'] = 'view cần trả về'; (ví dụ ở đây: $data['content'] = 'admin/monhoc/view_monhoc_admin';
                                các view của môn học thì nằm trong thư mục view/admin/monhoc).
                                - sau đó gọi đến hàm $this->load->view('admin/view_layout_admin', $data);-
- model bắt đầu bằng chữ cái M, ví dụ Mmonhoc
- view admin/view_layout_admin chứa khung giao diện trang chủ
  + cần tạo thêm view thì thêm thư mục trong view/admin, ví dụ tạo thư mục view/admin/monhoc chứa các file view của quản lý môn học
----------------
vào trang đăng nhập admin: ví dụ ở đây là http://localhost:8080/HoTroHocTap/admin/clogin_admin.
tài khoản: ví dụ tk: duyhoa   pw: 123 or h0aday_nd 123 (muốn tạo thêm tk thì phải thêm trong phpmyadmin, mật khẩu là chuỗi đã mã hóa md5).
                
