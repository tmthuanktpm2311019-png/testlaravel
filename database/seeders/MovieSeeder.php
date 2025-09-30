<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \DB::table('movies')->insert([
            [
                'movie_id' => 1,
                'title' => 'Tử Chiến Trên Không',
                'description' => 'Tử Chiến Trên Không lấy cảm hứng từ những vụ cướp máy bay chấn động Việt Nam thời hậu chiến. Tử Chiến Trên Không kể về Bình, một chuyên viên đào tạo Cảnh vệ Hàng không, đang trên chuyến bay đến Thành phố Hồ Chí Minh. Hành trình của anh bất ngờ rơi vào hỗn loạn, khi máy bay bị một nhóm không tặc liều lĩnh do Long cầm đầu khống chế 15 phút sau khi cất cánh. Sự chống cự kiên cường của phi hành đoàn càng khiến Long và đồng bọn thêm hung tợn, khi chúng dùng mọi thủ đoạn tàn độc để xâm nhập buồng lái và gieo rắc kinh hoàng cho hành khách. Bình phải tận dụng mưu trí và sức mạnh của mình, cùng sự hỗ trợ của các hành khách cùng phi hành đoàn can đảm để hạ gục bọn không tặc.',

                'duration' => '118',
                'release_date' => '2025-09-18',
                'poster_url' => '/public/assets/img/tu-chien-tren-khong/tu-chien-tren-khong-pt.jpg',
                'bg_url' => '/public/assets/img/tu-chien-tren-khong/tu-chien-tren-khong-bg.jpg',
                'status' => 'now_showing',
                'category' => 'Hành động, Tội phạm',
                'actor' => 'Thái Hòa, Kaity Nguyễn, Thanh Sơn, Võ Điền Gia Huy, Trần Ngọc Vàng, Lợi Trần',
                'diretor' => 'Hàm Trần',
                'country' => 'Việt Nam',
                'trailer_url' => 'https://www.youtube.com/watch?v=dasVBQuL_nA&t=2s',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'movie_id' => 2,
                'title' => 'Mưa Đỏ',
                'description' => '“Mưa Đỏ” - Phim truyện điện ảnh về đề tài chiến tranh cách mạng, kịch bản của nhà văn Chu Lai, lấy cảm hứng và hư cấu từ sự kiện 81 ngày đêm chiến đấu anh dũng, kiên cường của nhân dân và cán bộ, chiến sĩ bảo vệ Thành Cổ Quảng Trị năm 1972. Tiểu đội 1 gồm toàn những thanh niên trẻ tuổi và đầy nhiệt huyết là một trong những đơn vị chiến đấu, bám trụ tại trận địa khốc liệt này. Bộ phim là khúc tráng ca bằng hình ảnh, là nén tâm nhang tri ân và tưởng nhớ những người con đã dâng hiến tuổi thanh xuân cho đất nước, mang âm hưởng của tình yêu, tình đồng đội thiêng liêng, là khát vọng hòa bình, hoà hợp dân tộc của nhân dân Việt Nam.',

                'duration' => '124',
                'release_date' => '2025-08-21',
                'poster_url' => '/public/assets/img/mua-do/mua-do-pt.jpg',
                'bg_url' => '/public/assets/img/mua-do/mua-do-bg.jpg',
                'status' => 'now_showing',
                'category' => 'Chiến Tranh, Hành Động',
                'actor' => 'Đỗ Nhật Hoàng, Phương Nam, Lâm Thanh Nhã, Hứa Vỹ Văn',
                'diretor' => 'Đặng Thái Huyền',
                'country' => 'Việt Nam',
                'trailer_url' => 'https://www.youtube.com/watch?v=nEZcU-BZ5c4',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'movie_id' => 3,
                'title' => 'Khế Ước Bán Dâu',
                'description' => 'Lấy cảm hứng từ tiểu thuyết tâm linh của nhà văn Thục Linh kể về Nhài - một cô dâu trẻ được gả vào gia tộc họ Vũ và vô tình bị cuốn vào một “khế ước” kinh hoàng với quỷ dữ. Phim mới Khế Ước Bán Dâu suất chiếu sớm 11.09 (không áp dụng Movie voucher), dự kiến khởi chiếu 12.09.2025 tại các rạp chiếu phim toàn quốc.',
                'duration' => '114',
                'release_date' => '2025-09-11',
                'poster_url' => '/public/assets/img/khe-uoc-co-dau/khe-uoc-co-dau-poster.jpg',
                'bg_url' => '/public/assets/img/khe-uoc-co-dau/khe-uoc-co-dau-bg.jpg',
                'status' => 'now_showing',
                'category' => 'Tâm Lý, Ly Kì',
                'actor' => 'Lâm Thanh Mỹ, Lãnh Thanh, NSND Trung Anh, Hữu Vĩ',
                'diretor' => 'Lê Văn Kiệt',
                'country' => 'Việt Nam',
                'trailer_url' => 'https://www.youtube.com/watch?v=5XYDm7Pj9EI',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            
        ]);
    }
}
