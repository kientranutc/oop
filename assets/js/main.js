tinymce.init({
  selector: '#description',
  height: 200,
  menubar: false,
   relative_urls: false,
  remove_script_host : false,
  external_filemanager_path: "/filemanager/",
  filemanager_title:" Quản lý file" ,
  external_plugins: { "filemanager":"../../filemanager/plugin.min.js"},
  //video_template_callback: videoupload,
  video_template_callback: function(data) {
    return '<video class="video-js vjs-tech" width="' + data.width + '" height="' + data.height + '"' + (data.poster ? ' poster="' + data.poster + '"' : '') + ' controls >\n' + '<source src="' + data.source1 + '"' + (data.source1mime ? ' type="' + data.source1mime + '"' : '') + ' />\n' + (data.source2 ? '<source src="' + data.source2 + '"' + (data.source2mime ? ' type="' + data.source2mime + '"' : '') + ' />\n' : '') + '</video>';
  },
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
  ],
  toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  content_css: '//www.tinymce.com/css/codepen.min.css'
});




tinymce.init({
  selector: '#content',
  height: 200,
  plugins: [
    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
    "searchreplace wordcount visualblocks visualchars fullscreen",
    "insertdatetime media nonbreaking save table contextmenu directionality",
    "emoticons template paste textcolor colorpicker textpattern imagetools code fullscreen"
  ],
  toolbar1: "undo redo bold italic underline strikethrough cut copy paste| alignleft aligncenter alignright alignjustify bullist numlist outdent indent blockquote searchreplace | styleselect formatselect fontselect fontsizeselect ",
  toolbar2: "table | hr removeformat | subscript superscript | charmap emoticons ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft | link unlink anchor image media | insertdatetime preview | forecolor backcolor print fullscreen code ",
  image_advtab: true,
  menubar: true,

  //language : "vi_VN",
  toolbar_items_size: 'small',
  relative_urls: false,
  remove_script_host : false,
  external_filemanager_path: "/filemanager/",
  filemanager_title:" Quản lý file" ,
  external_plugins: { "filemanager":"../../filemanager/plugin.min.js"},
  //video_template_callback: videoupload,
  video_template_callback: function(data) {
    return '<video class="video-js vjs-tech" width="' + data.width + '" height="' + data.height + '"' + (data.poster ? ' poster="' + data.poster + '"' : '') + ' controls >\n' + '<source src="' + data.source1 + '"' + (data.source1mime ? ' type="' + data.source1mime + '"' : '') + ' />\n' + (data.source2 ? '<source src="' + data.source2 + '"' + (data.source2mime ? ' type="' + data.source2mime + '"' : '') + ' />\n' : '') + '</video>';
  },
        // file_browser_callback: RoxyFileBrowser,
        // file_browser_callback_types: 'file image media'
});
//



// 

$("#image").click(function(event){
      $("#imagenews").modal();
     
    });
  $('#imagenews').on('hidden.bs.modal', function () {
        var imgnew=$("#image").val();
      if(imgnew!="")
      {
      $("#atrimage").attr({
             
        'src':imgnew,
        'width':150,
        'height':100,
      });
    }
  
   });

  // 


 tinymce.init({
  selector: '#sapo',
  height: 200,
  menubar: false,
   relative_urls: false,
  remove_script_host : false,
  external_filemanager_path: "/filemanager/",
  filemanager_title:" Quản lý file" ,
  external_plugins: { "filemanager":"../../filemanager/plugin.min.js"},
  //video_template_callback: videoupload,
  video_template_callback: function(data) {
    return '<video class="video-js vjs-tech" width="' + data.width + '" height="' + data.height + '"' + (data.poster ? ' poster="' + data.poster + '"' : '') + ' controls >\n' + '<source src="' + data.source1 + '"' + (data.source1mime ? ' type="' + data.source1mime + '"' : '') + ' />\n' + (data.source2 ? '<source src="' + data.source2 + '"' + (data.source2mime ? ' type="' + data.source2mime + '"' : '') + ' />\n' : '') + '</video>';
  },
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
  ],
  toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  content_css: '//www.tinymce.com/css/codepen.min.css'
});

//  
$(document).ready(function(){
        $("#selectall").click(function () {
           $('input:checkbox').not(this).prop('checked', this.checked);
       });
    });
