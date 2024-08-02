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
    let kindProductType = window.kindProductType;
    console.log(kindProductType)
    const dataConfig = window.dataConfig;
    const productTypeSelect = $("#product_type");
    const kindProductTypeSelect = $("#kind_product_type");

    // Hàm tạo tùy chọn cho select
    function updateOptions(selectedProductType) {
        let options = dataConfig
            .filter(e => e.product_type_id == selectedProductType)
            .map(e => `<option value="${e.id}" ${kindProductType == e.id ? 'selected' : ''}>${e.name}</option>`)
            .join('');

        kindProductTypeSelect.html(options);
    }

    // Khởi tạo khi trang được tải
    updateOptions(productTypeSelect.val());

    // Cập nhật khi thay đổi loại sản phẩm
    productTypeSelect.on("change", function() {
        updateOptions($(this).val());
    });
});
