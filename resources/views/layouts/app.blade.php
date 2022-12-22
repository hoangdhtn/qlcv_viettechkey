{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
    </html> --}}

    <!DOCTYPE html>
    <html class="no-js css-menubar" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="bootstrap material admin template">
        <meta name="author" content="">

        <title>Hệ thống điều hành tác nghiệp | Sở GD&ĐT</title>

        <link rel="apple-touch-icon" href="{{asset('public/backend/assets/images/ico.png')}}">
        <link rel="shortcut icon" href="{{asset('public/backend/assets/images/ico.png')}}">

        <!-- Stylesheets -->
        <link rel="stylesheet" href="{{asset('public/backend/global/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/global/css/bootstrap-extend.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/assets/css/site.min.css')}}">

        <!-- Plugins -->
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/animsition/animsition.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/switchery/switchery.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/intro-js/introjs.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/slidepanel/slidePanel.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/jquery-mmenu/jquery-mmenu.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/flag-icon-css/flag-icon.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/waves/waves.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/jvectormap/jquery-jvectormap.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/assets/examples/css/dashboard/v1.css')}}">
        {{-- Datatable --}}
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/datatables.net-bs4/dataTables.bootstrap4.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/datatables.net-fixedheader-bs4/dataTables.fixedheader.bootstrap4.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/datatables.net-fixedcolumns-bs4/dataTables.fixedcolumns.bootstrap4.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/datatables.net-rowgroup-bs4/dataTables.rowgroup.bootstrap4.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/datatables.net-scroller-bs4/dataTables.scroller.bootstrap4.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/datatables.net-select-bs4/dataTables.select.bootstrap4.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/datatables.net-responsive-bs4/dataTables.responsive.bootstrap4.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/datatables.net-buttons-bs4/dataTables.buttons.bootstrap4.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/assets/examples/css/tables/datatable.css')}}">
        {{-- Model --}}
        <link rel="stylesheet" href="{{asset('public/backend/assets/examples/css/uikit/modals.css')}}">
        {{-- Alert --}}
        <link rel="stylesheet" href="{{asset('public/backend/assets/examples/css/structure/alerts.css')}}">
        {{-- Table --}}
        <link rel="stylesheet" href="{{asset('public/backend/assets/examples/css/tables/basic.css')}}">

        {{-- Advanced --}}
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/select2/select2.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/bootstrap-tokenfield/bootstrap-tokenfield.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/bootstrap-select/bootstrap-select.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/icheck/icheck.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/switchery/switchery.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/asrange/asRange.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/ionrangeslider/ionrangeslider.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/asspinner/asSpinner.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/clockpicker/clockpicker.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/ascolorpicker/asColorPicker.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/bootstrap-touchspin/bootstrap-touchspin.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/jquery-labelauty/jquery-labelauty.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/bootstrap-maxlength/bootstrap-maxlength.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/timepicker/jquery-timepicker.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/jquery-strength/jquery-strength.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/multi-select/multi-select.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/typeahead-js/typeahead.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/assets/examples/css/forms/advanced.css')}}">

        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/blueimp-file-upload/jquery.fileupload.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/dropify/dropify.css')}}">

        {{-- Statistics --}}
        <link rel="stylesheet" href="{{asset('public/backend/assets/examples/css/widgets/statistics.css')}}">

       

        <!-- Fonts -->
        <link rel="stylesheet" href="{{asset('public/backend/global/fonts/material-design/material-design.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/global/fonts/brand-icons/brand-icons.min.css')}}">
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

    <!--[if lt IE 9]>
    <script src="../../global/vendor/html5shiv/html5shiv.min.js"></script>
<![endif]-->

    <!--[if lt IE 10]>
    <script src="../../global/vendor/media-match/media.match.min.js"></script>
    <script src="../../global/vendor/respond/respond.min.js"></script>
<![endif]-->

    <!-- Scripts -->
    <script src="{{asset('public/backend/global/vendor/breakpoints/breakpoints.js')}}"></script>
    <script>
      Breakpoints();
  </script>

  <style>
      /*File Uploader Starts here*/
      .card {
          margin-top: 100px;
      }
      .btn-upload {
        padding: 10px 20px;
        margin-left: 10px;
    }
    .upload-input-group {
        margin-bottom: 10px;
    }

    .input-group>.custom-select:not(:last-child), .input-group>.form-control:not(:last-child) {
      height: 45px;
  }


/*tree view checkbox*/
.tree {
  list-style: none;
}

.tree ul {

  display: none;
  border-left: 1px dashed #dfdfdf;
}


.tree li {
    list-style: none;
  padding: 6px 9px;
  cursor: pointer;
  vertical-align: middle;
  background: #fff;
}

.tree li:first-child {
  border-radius: 3px 3px 0 0;
}

.tree li:last-child {
  border-radius: 0 0 3px 3px;
}

.tree .active,
.active li {
  background: #efefef;
}

.tree label {
  cursor: pointer;
}

.tree input[type=checkbox] {
  margin: -2px 6px 0 0px;
}

.has > label {
  color: #000;
}

.tree .total {
  color: #e13300;
}

</style>
</head>
<body class="animsition site-navbar-small dashboard">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

        @include('layouts.navigation')



        <!-- Page -->
        <div class="page">
          <div class="page-content container-fluid">

            {{-- @yeaild --}}
            @yield('content')
        </div>
    </div>
    <!-- End Page -->


    <!-- Footer -->
    <footer class="site-footer">
      <div class="site-footer-legal">© 2022 <a href="">Hệ thống điều hành tác nghiệp</a></div>
      <div class="site-footer-right">
        Xây dựng bởi <a href="">VietTechKey</a>
    </div>
</footer>
<!-- Core  -->
<script src="{{asset('public/backend/global/vendor/babel-external-helpers/babel-external-helpers.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/jquery/jquery.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/popper-js/umd/popper.min.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/bootstrap/bootstrap.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/animsition/animsition.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/asscrollbar/jquery-asScrollbar.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/asscrollable/jquery-asScrollable.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/waves/waves.js')}}"></script>

<!-- Plugins -->
<script src="{{asset('public/backend/global/vendor/jquery-mmenu/jquery.mmenu.min.all.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/switchery/switchery.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/intro-js/intro.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/screenfull/screenfull.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/slidepanel/jquery-slidePanel.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/chartist/chartist.min.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/jvectormap/jquery-jvectormap.min.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/jvectormap/maps/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/matchheight/jquery.matchHeight-min.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/peity/jquery.peity.min.js')}}"></script>
{{--   Datatable --}}
<script src="{{asset('public/backend/global/vendor/datatables.net/jquery.dataTables.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/datatables.net-fixedheader/dataTables.fixedHeader.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/datatables.net-fixedcolumns/dataTables.fixedColumns.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/datatables.net-rowgroup/dataTables.rowGroup.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/datatables.net-scroller/dataTables.scroller.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/datatables.net-responsive/dataTables.responsive.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/datatables.net-responsive-bs4/responsive.bootstrap4.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/datatables.net-buttons/dataTables.buttons.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/datatables.net-buttons/buttons.html5.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/datatables.net-buttons/buttons.flash.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/datatables.net-buttons/buttons.print.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/datatables.net-buttons/buttons.colVis.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/datatables.net-buttons-bs4/buttons.bootstrap4.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/asrange/jquery-asRange.min.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/bootbox/bootbox.js')}}"></script>
{{-- Form material --}}
<script src="{{asset('public/backend/global/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>
{{-- Form Advanced --}}
<script src="{{asset('public/backend/global/vendor/select2/select2.full.min.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/bootstrap-tokenfield/bootstrap-tokenfield.min.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/bootstrap-select/bootstrap-select.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/icheck/icheck.min.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/switchery/switchery.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/asrange/jquery-asRange.min.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/ionrangeslider/ion.rangeSlider.min.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/asspinner/jquery-asSpinner.min.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/ascolor/jquery-asColor.min.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/asgradient/jquery-asGradient.min.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/ascolorpicker/jquery-asColorPicker.min.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/bootstrap-maxlength/bootstrap-maxlength.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/jquery-knob/jquery.knob.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/bootstrap-touchspin/bootstrap-touchspin.min.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/jquery-labelauty/jquery-labelauty.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/timepicker/jquery.timepicker.min.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/datepair/datepair.min.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/datepair/jquery.datepair.min.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/jquery-strength/password_strength.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/jquery-strength/jquery-strength.min.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/multi-select/jquery.multi-select.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/typeahead-js/bloodhound.min.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/typeahead-js/typeahead.jquery.min.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>
<!-- Upload Form -->
<script src="{{asset('public/backend/global/vendor/jquery-ui/jquery-ui.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/blueimp-tmpl/tmpl.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/blueimp-canvas-to-blob/canvas-to-blob.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/blueimp-load-image/load-image.all.min.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/blueimp-file-upload/jquery.fileupload.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/blueimp-file-upload/jquery.fileupload-process.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/blueimp-file-upload/jquery.fileupload-image.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/blueimp-file-upload/jquery.fileupload-audio.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/blueimp-file-upload/jquery.fileupload-video.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/blueimp-file-upload/jquery.fileupload-validate.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/blueimp-file-upload/jquery.fileupload-ui.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/dropify/dropify.min.js')}}"></script>
<script src="{{asset('public/backend/global/vendor/summernote/summernote.min.js')}}"></script>


<!-- Scripts -->
<script src="{{asset('public/backend/global/js/Component.js')}}"></script>
<script src="{{asset('public/backend/global/js/Plugin.js')}}"></script>
<script src="{{asset('public/backend/global/js/Base.js')}}"></script>
<script src="{{asset('public/backend/global/js/Config.js')}}"></script>

<script src="{{asset('public/backend/assets/js/Section/Menubar.js')}}"></script>
<script src="{{asset('public/backend/assets/js/Section/Sidebar.js')}}"></script>
<script src="{{asset('public/backend/assets/js/Section/PageAside.js')}}"></script>
<script src="{{asset('public/backend/assets/js/Section/GridMenu.js')}}"></script>

<!-- Config -->
<script src="{{asset('public/backend/global/js/config/colors.js')}}"></script>
<script src="{{asset('public/backend/assets/js/config/tour.js')}}"></script>
<script>Config.set('assets', '{{asset('public/backend/assets')}}');</script>

<!-- Page -->
<script src="{{asset('public/backend/assets/js/Site.js')}}"></script>
<script src="{{asset('public/backend/global/js/Plugin/asscrollable.js')}}"></script>
<script src="{{asset('public/backend/global/js/Plugin/slidepanel.js')}}"></script>
<script src="{{asset('public/backend/global/js/Plugin/switchery.js')}}"></script>
<script src="{{asset('public/backend/global/js/Plugin/matchheight.js')}}"></script>
<script src="{{asset('public/backend/global/js/Plugin/jvectormap.js')}}"></script>
<script src="{{asset('public/backend/global/js/Plugin/peity.js')}}"></script>
{{--  Datatable --}}
<script src="{{asset('public/backend/global/js/Plugin/datatables.js')}}"></script>
<script src="{{asset('public/backend/assets/examples/js/tables/datatable.js')}}"></script>
<script src="{{asset('public/backend/assets/examples/js/uikit/icon.js')}}"></script>
<script src="{{asset('public/backend/assets/examples/js/dashboard/v1.js')}}"></script>
{{-- Form material --}}
<script src="{{asset('public/backend/global/js/Plugin/jquery-placeholder.js')}}"></script>
<script src="{{asset('public/backend/global/js/Plugin/material.js')}}"></script>
{{-- Table --}}
<script src="{{asset('public/backend/global/js/Plugin/asselectable.js')}}"></script>
<script src="{{asset('public/backend/global/js/Plugin/selectable.js')}}"></script>
<script src="{{asset('public/backend/global/js/Plugin/table.js')}}"></script>
{{-- Form Advanced --}}
<script src="{{asset('public/backend/global/js/Plugin/select2.js')}}"></script>
<script src="{{asset('public/backend/global/js/Plugin/bootstrap-tokenfield.js')}}"></script>
<script src="{{asset('public/backend/global/js/Plugin/bootstrap-tagsinput.js')}}"></script>
<script src="{{asset('public/backend/global/js/Plugin/bootstrap-select.js')}}"></script>
<script src="{{asset('public/backend/global/js/Plugin/icheck.js')}}"></script>
<script src="{{asset('public/backend/global/js/Plugin/switchery.js')}}"></script>
<script src="{{asset('public/backend/global/js/Plugin/asrange.js')}}"></script>
<script src="{{asset('public/backend/global/js/Plugin/ionrangeslider.js')}}"></script>
<script src="{{asset('public/backend/global/js/Plugin/asspinner.js')}}"></script>
<script src="{{asset('public/backend/global/js/Plugin/clockpicker.js')}}"></script>
<script src="{{asset('public/backend/global/js/Plugin/ascolorpicker.js')}}"></script>
<script src="{{asset('public/backend/global/js/Plugin/bootstrap-maxlength.js')}}"></script>
<script src="{{asset('public/backend/global/js/Plugin/jquery-knob.js')}}"></script>
<script src="{{asset('public/backend/global/js/Plugin/bootstrap-touchspin.js')}}"></script>
<script src="{{asset('public/backend/global/js/Plugin/card.js')}}"></script>
<script src="{{asset('public/backend/global/js/Plugin/jquery-labelauty.js')}}"></script>
<script src="{{asset('public/backend/global/js/Plugin/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('public/backend/global/js/Plugin/jt-timepicker.js')}}"></script>
<script src="{{asset('public/backend/global/js/Plugin/datepair.js')}}"></script>
<script src="{{asset('public/backend/global/js/Plugin/jquery-strength.js')}}"></script>
<script src="{{asset('public/backend/global/js/Plugin/multi-select.js')}}"></script>
<script src="{{asset('public/backend/global/js/Plugin/jquery-placeholder.js')}}"></script>

<script src="{{asset('public/backend/assets/examples/js/forms/advanced.js')}}"></script>



{{-- CKEDITOR --}}
<script src="{{asset('public/ckeditor/ckeditor.js')}}"></script>




{{-- Upload Form --}}
<script src="{{asset('public/backend/global/js/Plugin/dropify.js')}}"></script>
<script src="{{asset('public/backend/assets/examples/js/forms/uploads.js')}}"></script>




<script>


  (function(document, window, $){
    'use strict';
    
    var Site = window.Site;
    $(document).ready(function(){
      Site.run();
  });
})(document, window, jQuery);

// Alert
$(document).ready(function () {
   
    window.setTimeout(function() {
        $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
            $(this).remove(); 
        });
    }, 2500);
    
});


$(function () {
    $(document).on('click', '.btn-add', function (e) {
        e.preventDefault();

        var controlForm = $('.controls:first'),
        currentEntry = $(this).parents('.entry:first'),
        newEntry = $(currentEntry.clone()).appendTo(controlForm);

        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
        .removeClass('btn-add').addClass('btn-remove')
        .removeClass('btn-success').addClass('btn-danger')
        .html('<span class="icon md-minus-circle"></span>');
    }).on('click', '.btn-remove', function (e) {
        $(this).parents('.entry:first').remove();

        e.preventDefault();
        return false;
    });
});



$(document).on('click', '.tree label', function(e) {
  $(this).next('ul').fadeToggle();
  e.stopPropagation();
});

$(document).on('change', '.tree input[type=checkbox]', function(e) {
  $(this).siblings('ul').find("input[type='checkbox']").prop('checked', this.checked);
  $(this).parentsUntil('.tree').children("input[type='checkbox']").prop('checked', this.checked);
  e.stopPropagation();
});

$(document).on('click', '#ccc', function(e) {
  switch ($(this).text()) {
    case 'Đóng tất cả':
      $('.tree ul').fadeOut();
      break;
    case 'Mở tất cả':
      $('.tree ul').fadeIn();
      break;
    case 'Chọn tất cả':
      $(".tree input[type='checkbox']").prop('checked', true);
      break;
    case 'Bỏ chọn tất cả':
      $(".tree input[type='checkbox']").prop('checked', false);
      break;
    default:
  }
});



</script>

</body>
</html>
