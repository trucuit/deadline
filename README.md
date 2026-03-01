# Deadline

Hệ thống quản lý khóa học video trực tuyến, được xây dựng bằng PHP thuần theo mô hình MVC.

## 📋 Tính năng

- Quản lý danh mục khóa học (CRUD)
- Quản lý video bài giảng
- Tích hợp YouTube API để lấy thông tin video/playlist
- Hệ thống đăng nhập/phân quyền người dùng
- Giao diện quản trị

## 🛠️ Công nghệ

- **Backend:** PHP (MVC pattern)
- **Database:** MySQL
- **API:** YouTube Data API v3

## ⚙️ Cài đặt

### 1. Clone repository

```bash
git clone https://github.com/trucuit/deadline.git
cd deadline
```

### 2. Tạo database

```sql
CREATE DATABASE deadline;
```

### 3. Cấu hình Environment

Tạo file `.env` hoặc thiết lập biến môi trường trước khi chạy:

| Biến | Mô tả | Mặc định |
|------|--------|----------|
| `DB_HOST` | MySQL host | `localhost` |
| `DB_USER` | MySQL username | `root` |
| `DB_PASS` | MySQL password | _(empty)_ |
| `DB_NAME` | Tên database | `deadline` |
| `YOUTUBE_API_KEY` | Google YouTube Data API v3 key | _(required)_ |
| `DOMAIN` | Domain chạy ứng dụng | `http://localhost` |

### 4. Lấy YouTube API Key

1. Truy cập [Google Cloud Console](https://console.cloud.google.com/)
2. Tạo project mới hoặc chọn project có sẵn
3. Bật **YouTube Data API v3** trong Library
4. Tạo **API Key** trong Credentials
5. Set biến môi trường:

```bash
export YOUTUBE_API_KEY="your-api-key-here"
```

### 5. Chạy ứng dụng

Deploy lên Apache/Nginx web server với PHP enabled.

```
http://localhost/do-an/deadline
```

## 🔒 Bảo mật

> **⚠️ QUAN TRỌNG:** Không bao giờ commit API key hoặc mật khẩu database vào source code. Luôn sử dụng biến môi trường.

## 📄 License

All rights reserved.
