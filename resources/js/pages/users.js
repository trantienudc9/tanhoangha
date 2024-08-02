$(function(){
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
})