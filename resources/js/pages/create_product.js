$('#image').change(function() {
    var file = this.files[0];
    var reader = new FileReader();
    reader.onload = function(e) {
        $('#image-preview').empty(); // Clear previous preview
        var imgElement = $('<img>').attr({
            src: e.target.result,
            class: 'rounded-lg shadow-md',
            style: 'max-width: 100%;'
        });
        $('#image-preview').append(imgElement);
    };
    reader.readAsDataURL(file);
    $('#file-name').text(file.name);
});

$(document).ready(function() {
    // Lưu cấu hình vào biến toàn cục để truy xuất nhanh hơn
    const dataConfig = window.dataConfig;

    $("#product_type").on("change", function() {
        const productType = $(this).val();
        const data_type = dataConfig[productType] || {};

        // Tạo các tùy chọn
        const options = Object.entries(data_type).map(([key, value]) =>
            `<option value="${key}">${value}</option>`
        ).join('');

        // Cập nhật HTML
        const add_data = options ? `
    <label for="kind_product_type" class="block text-gray-700 text-sm font-bold mb-2">Sản phẩm:</label>
    <select id="kind_product_type" name="kind_product_type"
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        ${options}
    </select>` : '';

        $(".add_kind").html(add_data);
    });
});
