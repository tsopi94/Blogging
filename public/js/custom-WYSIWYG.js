var editor_config = {
  path_absolute : "{{URL::to('/')}}/",
  selector : 'textarea',
  content_css: "css/blog.css",
  images_upload_handler: function (blobInfo, success, failure, progress) {
    var xhr, formData;

    xhr = new XMLHttpRequest();
    xhr.withCredentials = false;
    xhr.open('POST', 'upload.php');

    xhr.upload.onprogress = function (e) {
      progress(e.loaded / e.total * 100);
    };

    xhr.onload = function() {
      var json;

      if (xhr.status < 200 || xhr.status >= 300) {
        failure('HTTP Error: ' + xhr.status);
        return;
      }

      json = JSON.parse(xhr.responseText);

      if (!json || typeof json.location != 'string') {
        failure('Invalid JSON: ' + xhr.responseText);
        return;
    }

    success(json.location);
  };

  xhr.onerror = function () {
    failure('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
  };

  formData = new FormData();
  formData.append('file', blobInfo.blob(), blobInfo.filename());

  xhr.send(formData);
  },
  images_upload_url: 'upload.php',
  height : 400,
   width: '100%',
  plugins : [
    "advlist autolink image lists link charmap print preview hr anchor pagebreak",
    "searchreplace wordcound visualblocks visualchars code fullscreen",
    "insertdatetime media nonbreaking save table contextmenu directionality",
    "emoticons template paste textcolor colorpicker textpattern"
  ],
  toolbar : "insertfile undo redo | styleselect | forecolor | bold italic | alignleft aligncenter alignright alignjustify | " +
   "bullist numlist outdent indent | link image media | backcolor emoticons",
  relative_urls : false,
  file_browser_callback : function(field_name, url, type, win){
    var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
    var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;
    var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
    if(type == 'image'){
      cmsURL = cmsURL + "&type=Images";
    } else {
      cmsURL = cmsURL + "&type=Files";
    }
    /*tinyMCE.activeEditor.windowManager.open({
      file : cmsURL,
      title : 'Filemanager',
      width : x * 0.8,  // Your dimensions may differ - toy around with them!
      height : y * 0.8,
      resizable : "yes",
      inline : "yes",  // This parameter only has an effect if you use the inlinepopups plugin!
      close_previous : "no"
    }, {
        window : win,
        input : field_name
    });*/
  }
};

tinymce.init(editor_config);
