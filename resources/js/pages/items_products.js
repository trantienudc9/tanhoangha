$(document).ready(function() {
    // Hiển thị mặc định nội dung "Sản phẩm nổi bật"
    $("#outstanding").show();
    // Đổi màu nền của button "Sản phẩm nổi bật" thành màu đỏ
    $("#btn-outstanding").css("background-color", "#f56565");
    // Xử lý sự kiện click cho button Sản phẩm nổi bật
    $("#btn-outstanding").click(function() {
        $(".content-item").hide(); // Ẩn tất cả các nội dung
        $("#outstanding").show();  // Hiển thị nội dung "Sản phẩm nổi bật"
        // Đổi màu nền của button "Sản phẩm nổi bật" thành màu đỏ
        $(this).css("background-color", "#f56565");
        // Đổi màu nền của các button khác thành màu teal
        $("#btn-news, #btn-common").css("background-color", "#14B8A6");
    });

    // Xử lý sự kiện click cho button Sản phẩm mới
    $("#btn-news").click(function() {
        $(".content-item").hide(); // Ẩn tất cả các nội dung
        $("#news").show();          // Hiển thị nội dung "Sản phẩm mới"
        // Đổi màu nền của button "Sản phẩm mới" thành màu đỏ
        $(this).css("background-color", "#f56565");
        // Đổi màu nền của các button khác thành màu teal
        $("#btn-outstanding, #btn-common").css("background-color", "#14B8A6");
    });

    // Xử lý sự kiện click cho button Tất cả
    $("#btn-common").click(function() {
        $('.check_find').html("Tất cả");
        $(".content-item").hide(); // Ẩn tất cả các nội dung
        $("#common").show();        // Hiển thị nội dung "Tất cả"
        // Đổi màu nền của button "Tất cả" thành màu đỏ
        $(this).css("background-color", "#f56565");
        // Đổi màu nền của các button khác thành màu teal
        $("#btn-outstanding, #btn-news").css("background-color", "#14B8A6");
    });
});

$(document).ready(function() {
    $("#search-input").on('input', function() {
        var searchTerm = $(this).val().trim().toLowerCase();
        // Ẩn tất cả các sản phẩm
        $(".content-item").hide();
        // Nếu searchTerm không có giá trị, chỉ hiển thị sản phẩm nổi bật
        if (searchTerm === '') {
            $(".dashboard-link").css("background-color", "#f56565");
            console.log("r")
            $("#outstanding").show();
        } else {
            // Tạo biểu thức chính quy để tìm kiếm không phân biệt chữ hoa chữ thường và hỗ trợ tiếng Việt
            var regex = new RegExp(removeAccents(searchTerm), 'i');

            // Hiển thị các sản phẩm có từ khóa tìm kiếm trong phần "Sản phẩm tìm kiếm"
            $("#common").each(function() {
                var productName = $(this).text().trim().toLowerCase();
                if (regex.test(removeAccents(productName))) {
                    $(this).closest(".content-item").show();
                    $('.check_find').html("Sản phẩm đã tìm kiếm");
                }
            });
        }

        // Đặt lại màu nền của các button danh mục sản phẩm về màu teal
        $("#btn-outstanding, #btn-news, #btn-common").css("background-color", "#14B8A6");
    });

    // Hàm loại bỏ dấu từ chuỗi
    function removeAccents(str) {
        return str.normalize('NFD').replace(/[\u0300-\u036f]/g, "");
    }
});