document.getElementById('image').addEventListener('change', function() {
    console.log('fff');
    var file = this.files[0];
    var reader = new FileReader();
    reader.onload = function(e) {
        var imagePreview = document.getElementById('image-preview');
        imagePreview.innerHTML = '';
        var imgElement = document.createElement('img');
        imgElement.src = e.target.result;
        imgElement.className = 'rounded-lg shadow-md';
        imgElement.style.maxWidth = '100%';
        imagePreview.appendChild(imgElement);
    }
    reader.readAsDataURL(file);
    document.getElementById('file-name').textContent = file.name;
});

$('.test').on('click',function(){
    console.log("hai xóau")
})
