@extends('layout.default')
@section('title')
    Trang chủ
    @parent

@stop

@section('content')
    <div>
        <div class="bg-white p-4 m-auto max-w-screen-xl rounded-lg shadow-lg">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="md:col-span-1">
                    <img src="{{ asset($detailProduct->URL) }}" alt="Product Image" class="w-full rounded-lg hover:shadow-lg">
                </div>
                <div class="md:col-span-2">
                    <div class="flex items-center justify-between">
                        <h2 class="text-3xl font-semibold mb-2">{{ $detailProduct->name }}</h2>
                    </div>
                    <hr class="my-2 border-gray-300">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="col-span-2 space-y-2">
                            <div>
                                <textarea id="edit_product" name="content">{!! $detailProduct->parameters !!}</textarea>
                                <button id="update_parameters"
                                    class="bg-green-500 mt-2 text-white py-2 px-4 rounded-md shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 transition-all"
                                    onclick="updateParameters(check = 1)">
                                    Cập Nhật
                                </button>

                            </div>
                        </div>
                        <div class="mt-4 md:mt-0 space-y-4 md:col-span-1">
                            <div class="flex items-center space-x-2">
                                <button
                                    class="rounded-full bg-blue-500 text-white p-2 hover:bg-blue-600 transition duration-200">
                                    <i class="fa-solid fa-phone-volume"></i>
                                </button>
                                <a href="tel:0337444552" class="text-blue-500">0337444552</a>
                            </div>
                            <div class="flex items-center space-x-2">
                                <button
                                    class="rounded-full bg-blue-500 text-white p-2 hover:bg-blue-600 transition duration-200">
                                    <i class="fa-brands fa-facebook"></i>
                                </button>
                                <a href="https://facebook.com/trantienduc" class="text-blue-500">Trần Tiến Đức</a>
                            </div>
                            <div class="flex items-center space-x-2">
                                <button
                                    class="rounded-full bg-blue-500 text-white p-2 hover:bg-blue-600 transition duration-200">
                                    <i class="fa-solid fa-z"></i>
                                </button>
                                <a href="#" class="text-blue-500">Vật liệu xây dựng</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <h3 class="text-xl font-semibold mb-2">Giới thiệu: </h3>
                <textarea id="edit_introduction">{!! $detailProduct->product_introduction !!}</textarea>
                <button id="update_parameters" onclick="updateParameters(check = 2)"
                    class="bg-green-500 mt-2 text-white py-2 px-4 rounded-md shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 transition-all">
                    Cập Nhật
                </button>
            </div>
        </div>

    </div>

@section('script')


    <!-- Thêm các tài nguyên JavaScript của bạn tại đây -->
    <script type="text/javascript">
        $(function() {
            // Đối tượng cấu hình chung cho TinyMCE
            const commonTinyMCEConfig = {
                plugins: 'advlist autolink lists link image charmap preview anchor pagebreak fullscreen code table media emoticons spellchecker wordcount searchreplace textcolor',
                toolbar: 'undo redo | formatselect | bold italic underline strikethrough | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | image code fullscreen',
                toolbar_mode: 'floating',
                menubar: 'file edit view insert format tools table help',
                height: 500,
                image_caption: true,
                image_advtab: true,
                file_picker_callback: function(callback, value, meta) {
                    if (meta.filetype === 'image') {
                        const input = document.createElement('input');
                        input.setAttribute('type', 'file');
                        input.setAttribute('accept', 'image/*');

                        input.onchange = function() {
                            const file = this.files[0];
                            const reader = new FileReader();
                            reader.onload = function() {
                                const id = 'blobid' + (new Date()).getTime();
                                const blobCache = tinymce.activeEditor.editorUpload.blobCache;
                                const base64 = reader.result.split(',')[1];
                                const blobInfo = blobCache.create(id, file, base64);
                                blobCache.add(blobInfo);
                                callback(blobInfo.blobUri(), {
                                    title: file.name
                                });
                            };
                            reader.readAsDataURL(file);
                        };
                        input.click();
                    }
                },
                setup: function(editor) {
                    editor.on('init', function() {
                        editor.getContainer().style.height = '400px'; // Chiều cao
                    });
                }
            };

            // Khởi tạo TinyMCE cho #edit_product
            tinymce.init({
                ...commonTinyMCEConfig,
                selector: '#edit_product'
            });

            // Khởi tạo TinyMCE cho #edit_introduction
            tinymce.init({
                ...commonTinyMCEConfig,
                selector: '#edit_introduction'
            });
        });

        function updateParameters(check) {

            let content = tinymce.get(check === 1 ? 'edit_product' : 'edit_introduction').getContent();

            let csrfToken = $('meta[name="csrf-token"]').attr('content'); // Lấy CSRF token từ meta tag
            $.ajax({
                url: '{{ route('product.update_parameters') }}', // Route đến controller
                type: 'POST',
                data: {
                    id: {{ $detailProduct->id }},
                    content: content,
                    check: check
                },
                headers: {
                    'X-HTTP-Method-Override': 'PUT', // Cần thêm header này để giả lập PUT
                    'X-CSRF-TOKEN': csrfToken // CSRF token
                },
                success: function(response) {
                    if (response == 1) {
                        Swal.fire({
                            title: 'Thành công!',
                            text: 'Cập nhật thành công.',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        title: 'Lỗi!',
                        text: 'Đã xảy ra lỗi: ' + xhr.statusText,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        }
    </script>
@stop

@stop
