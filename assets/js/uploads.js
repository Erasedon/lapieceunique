var file_browser = document.querySelector('#file_browser');
var img_preview2 = document.querySelector('#img-preview2');
file_browser.addEventListener('change',()=>{
  var reader = new FileReader();
  reader.onload = function(e) {
    img_preview2.src = e.target.result
  }
  reader.readAsDataURL(document.querySelector('#file_browser').files[0]);
})
