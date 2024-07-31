   // Lắng nghe sự kiện thay đổi trên input file
$('#fileInput').on('change', function(event) {
    // Lấy tệp được chọn từ input
    const file = event.target.files[0];
    const $filePreview = $('#filePreview');

    // Kiểm tra nếu có tệp được chọn
    if (file) {
        const reader = new FileReader();

        // Đọc nội dung của tệp sau khi nó được chọn
        reader.onload = function(e) {
            let content;
            // Kiểm tra xem tệp có phải là hình ảnh không
            if (file.type.startsWith('image/')) {
                content =
                    `<img src="${e.target.result}" class="file-preview rounded-lg shadow-lg max-w-full h-auto" alt="Preview">`;
            } else {
                content = `
    <div class="bg-white p-4 rounded-lg shadow-md">
        <p class="text-gray-800 font-semibold">File: ${file.name}</p>
        <p class="text-gray-600">Type: ${file.type}</p>
        <p class="text-gray-600">Size: ${file.size} bytes</p>
    </div>`;
            }
            // Hiển thị nội dung của tệp lên giao diện
            $filePreview.html(content);
        };

        // Đọc tệp dưới dạng Data URL (dùng cho hình ảnh và tệp khác)
        reader.readAsDataURL(file);
    } else {
        // Xóa bản xem trước nếu không có tệp được chọn
        $filePreview.empty();
    }
});

$(document).ready(function() {
    $('table').DataTable({
        paging: true,
        searching: true,
        info: true,
        responsive: true,
        language: {
            search: "Tìm kiếm:",
            lengthMenu: "Hiển thị _MENU_ mục",
            info: "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
            paginate: {
                first: "Trang đầu",
                last: "Trang cuối",
                next: "Tiếp",
                previous: "Trước"
            }
        }
    });

    $('#chooseImage').on('click', function() {
        $('#fileInput').click();
    });

    $('#fileInput').on('change', function(event) {
        const file = event.target.files[0];
        const $filePreview = $('#filePreview');

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                let content;
                if (file.type.startsWith('image/')) {
                    content = `<img src="${e.target.result}" class="file-preview rounded-lg shadow-lg max-w-full h-auto" alt="Preview">`;
                } else {
                    content = `
        <div class="bg-white p-4 rounded-lg shadow-md">
          <p class="text-gray-800 font-semibold">File: ${file.name}</p>
          <p class="text-gray-600">Type: ${file.type}</p>
          <p class="text-gray-600">Size: ${file.size} bytes</p>
        </div>`;
                }
                $filePreview.html(content);
            };

            reader.readAsDataURL(file);
        } else {
            $filePreview.empty();
        }
    });
});
