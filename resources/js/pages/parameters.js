import $ from 'jquery';
// Import TinyMCE và các plugin cần thiết
import tinymce from 'tinymce/tinymce';
// import 'tinymce/icons/default';
// import 'tinymce/themes/silver';


// Khởi tạo TinyMCE
// tinymce.init({
//   selector: '#mytextarea', // ID của textarea bạn muốn áp dụng TinyMCE
//   plugins: 'paste link table image',
//   toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | link image'
// });

// setTimeout(() => {
//     tinymce.init({
//       selector: '#mytextarea', // ID của textarea bạn muốn áp dụng TinyMCE
//       plugins: 'paste link table image',
//       toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | link image'
//     });
//   }, 5000); 
tinymce.init({
    selector: 'textarea',  // Áp dụng TinyMCE cho tất cả các textarea
    plugins: 'advlist autolink lists link image charmap preview anchor textcolor',
    toolbar: 'undo redo | formatselect | bold italic backcolor | \
              alignleft aligncenter alignright alignjustify | \
              bullist numlist outdent indent | removeformat | help',
    content_css: 'https://www.tiny.cloud/css/codepen.min.css'
});


// $("#mytextarea").on('click',function(){
//     console.log("d")
// })
// $(function() {
//     // Đối tượng cấu hình chung cho TinyMCE
//     const commonTinyMCEConfig = {
//         plugins: 'advlist autolink lists link image charmap preview anchor pagebreak fullscreen code table media emoticons spellchecker wordcount searchreplace textcolor',
//         toolbar: 'undo redo | formatselect | bold italic underline strikethrough | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | image code fullscreen',
//         toolbar_mode: 'floating',
//         menubar: 'file edit view insert format tools table help',
//         height: 500,
//         image_caption: true,
//         image_advtab: true,
//         file_picker_callback: function(callback, value, meta) {
//             if (meta.filetype === 'image') {
//                 const input = document.createElement('input');
//                 input.setAttribute('type', 'file');
//                 input.setAttribute('accept', 'image/*');

//                 input.onchange = function() {
//                     const file = this.files[0];
//                     const reader = new FileReader();
//                     reader.onload = function() {
//                         const id = 'blobid' + (new Date()).getTime();
//                         const blobCache = tinymce.activeEditor.editorUpload.blobCache;
//                         const base64 = reader.result.split(',')[1];
//                         const blobInfo = blobCache.create(id, file, base64);
//                         blobCache.add(blobInfo);
//                         callback(blobInfo.blobUri(), {
//                             title: file.name
//                         });
//                     };
//                     reader.readAsDataURL(file);
//                 };
//                 input.click();
//             }
//         },
//         setup: function(editor) {
//             editor.on('init', function() {
//                 editor.getContainer().style.height = '400px'; // Chiều cao
//             });
//         }
//     };

//     // Khởi tạo TinyMCE cho #edit_product
//     tinymce.init({
//         ...commonTinyMCEConfig,
//         selector: '#edit_product'
//     });

//     // Khởi tạo TinyMCE cho #edit_introduction
//     tinymce.init({
//         ...commonTinyMCEConfig,
//         selector: '#edit_introduction'
//     });
// });
// function updateParameters(check) {
    
//     let content = tinymce.get(check === 1 ? 'edit_product' : 'edit_introduction').getContent();

//     let csrfToken = $('meta[name="csrf-token"]').attr('content'); // Lấy CSRF token từ meta tag
//     $.ajax({
//         url: '{{ route('product.update_parameters') }}', // Route đến controller
//         type: 'POST',
//         data: {
//             id: {{ $detailProduct->id }},
//             content: content,
//             check: check
//         },
//         headers: {
//             'X-HTTP-Method-Override': 'PUT', // Cần thêm header này để giả lập PUT
//             'X-CSRF-TOKEN': csrfToken // CSRF token
//         },
//         success: function(response) {
//             if (response == 1) {
//                 Swal.fire({
//                     title: 'Thành công!',
//                     text: 'Cập nhật thành công.',
//                     icon: 'success',
//                     confirmButtonText: 'OK'
//                 });
//             }
//         },
//         error: function(xhr) {
//             Swal.fire({
//                 title: 'Lỗi!',
//                 text: 'Đã xảy ra lỗi: ' + xhr.statusText,
//                 icon: 'error',
//                 confirmButtonText: 'OK'
//             });
//         }
//     });
// }