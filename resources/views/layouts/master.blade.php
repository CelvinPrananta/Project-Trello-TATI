<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="PT TATI - Aplikasi Trello">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="PT TATI">
    <meta name="robots" content="noindex, nofollow">
    <title id="pageTitle">Beranda | Trello - PT TATI </title>
    <script src="{{ asset('assets/js/title-move.js') }}"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('assets/img/favicon.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ URL::to('assets/css/bootstrap.min.css') }}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ URL::to('assets/css/font-awesome.min.css') }}">
    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="{{ URL::to('assets/css/line-awesome.min.css') }}">
    <!-- Datatable CSS -->
    <link rel="stylesheet" href="{{ URL::to('assets/css/dataTables.bootstrap4.min.css') }}">
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ URL::to('assets/css/select2.min.css') }}">
    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="{{ URL::to('assets/css/bootstrap-datetimepicker.min.css') }}">
    <!-- Chart CSS -->
    <link rel="stylesheet" href="{{ URL::to('ssets/plugins/morris/morris.css') }}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ URL::to('assets/css/style.css?v='.time()) }}">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/abea6a9d41.js" crossorigin="anonymous"></script>

    <!-- Untuk Moving Kolom -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
    <!-- Untuk Moving Kolom -->

    {{-- message toastr --}}
    <link rel="stylesheet" href="{{ URL::to('assets/css/toastr.min.css') }}">
    <script src="{{ URL::to('assets/js/toastr_jquery.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/toastr.min.js') }}"></script>
</head>

<body oncontextmenu="return false">
    @yield('style')
    <style>
        .invalid-feedback {
            font-size: 14px;
        }
        .error {
            color: red;
        }
    </style>

    <style>
        @foreach($result_tema as $sql_mode => $mode_tema)
            body{background-color: {{ $mode_tema->warna_sistem }} !important; color: {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .peta-jabatan{background-color: {{ $mode_tema->warna_sistem }} !important;}
            .nav-tabs .nav-link:focus, .nav-tabs .nav-link:hover{background-color: {{ $mode_tema->warna_sistem }} !important;}
            .fitur-tema{background-color: {{ $mode_tema->warna_sistem }} !important;}
            .fitur-tema2{background-color: {{ $mode_tema->warna_sistem }} !important;}
            .edit-icon{background-color: {{ $mode_tema->warna_sistem }} !important;}
            .edit-icon-avatar{background-color: {{ $mode_tema->warna_sistem }} !important;}
            .fitur-tema-sub-terang{background-color: {{ $mode_tema->warna_sistem }} !important;}
            .fitur-tema2-sub-terang{background-color: {{ $mode_tema->warna_sistem }} !important;}
            .fitur-tema-sub-gelap{background-color: {{ $mode_tema->warna_sistem }} !important;}
            .fitur-tema2-sub-gelap{background-color: {{ $mode_tema->warna_sistem }} !important;}
            .view-icons .btn{background-color: {{ $mode_tema->warna_sistem }} !important;}
            .nav-tabs .nav-link.active{background-color: {{ $mode_tema->warna_sistem }} !important;}
            .page-item.disabled .page-link{background-color: {{ $mode_tema->warna_sistem }} !important; color : {{ $mode_tema->warna_sistem_tulisan }} !important; border-color: {{ $mode_tema->warna_mode }} !important;}
            .page-link{background-color: {{ $mode_tema->warna_sistem }} !important; border: 1px solid {{ $mode_tema->warna_mode }} !important;}
            .datepicker{background-color: {{ $mode_tema->warna_sistem }} !important; color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .select2-dropdown {background-color: {{ $mode_tema->warna_sistem }} !important; color: {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .select2-search--dropdown{background-color: {{ $mode_tema->warna_sistem }} !important; color: {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .select2-container--default .select2-search--dropdown .select2-search__field{background-color: {{ $mode_tema->warna_sistem }} !important; color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .bootstrap-datetimepicker-widget table td.day:hover,
            .bootstrap-datetimepicker-widget table td.hour:hover,
            .bootstrap-datetimepicker-widget table td.minute:hover,
            .bootstrap-datetimepicker-widget table td.second:hover{color: {{ $mode_tema->warna_sistem }} !important}
            .bg-whites{background-color: {{ $mode_tema->warna_sistem }} !important;}
            .mention-tag-item:hover{background-color : {{ $mode_tema->warna_sistem }} !important;}
            .mention-tag-keterangan-item:hover{background-color : {{ $mode_tema->warna_sistem }} !important;}
            .mention-tag-comment-item:hover{background-color : {{ $mode_tema->warna_sistem }} !important;}
            .aksi-kolom{background-color: {{ $mode_tema->warna_sistem }} !important;}
            .add-column{background-color: {{ $mode_tema->warna_sistem }} !important;}

            .card-title{color: {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .table{color: {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-pesan-form{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-1{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-2{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-3{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-4{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-5{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-6{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-7{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-8{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-9{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-10{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-11{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-12{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-13{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-14{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-15{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-16{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-17{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-18{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-19{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-20{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-21{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-22{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-23{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-24{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-25{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-26{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-27{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-28{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-29{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-30{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-31{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-32{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-33{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-34{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-35{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-36{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-37{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-38{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-39{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-40{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-41{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-42{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-43{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .info-draganddrop-44{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-1{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-2{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-3{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-4{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-5{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-6{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-7{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-8{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-9{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-10{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-11{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-12{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-13{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-14{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-15{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-16{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-17{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-18{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-19{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-20{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-21{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-22{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-23{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-24{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-25{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-26{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-27{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-28{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-29{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-30{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-31{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-32{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-33{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-34{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-35{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-36{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-37{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-38{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-39{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-40{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-41{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-42{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-43{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropzone-area-44{border: 2px dashed {{ $mode_tema->warna_sistem_tulisan }} !important;}
            table.table td h2 a{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            svg{fill : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            a{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .boc-input>label{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .text-muted{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .user-name{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .personal-info li .title{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .personal-info li .text{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .page-header .breadcrumb a{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .page-header .breadcrumb{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .nav-tabs.nav-justified > li > a{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .apexcharts-text{fill : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .apexcharts-yaxis-label{fill : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .fitur-tema-tulisan-terang{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .fitur-tema2-tulisan-terang{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .fitur-tema-tulisan-gelap{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .fitur-tema2-tulisan-gelap{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .page-header .page-title{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .page-header .breadcrumb-item.active{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .dropdown-item{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .notification-title{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .clear-noti{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .logo-text{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .fa{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .fa-xl{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .cal-icon:after{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .bar-icon span{background-color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .apexcharts-legend-text{color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .menu-title{color: {{ $mode_tema->warna_sistem_tulisan }} !important}
            .sidebar .sidebar-left .text{color: {{ $mode_tema->warna_sistem_tulisan }} !important}
            .form-header h3{color: {{ $mode_tema->warna_sistem_tulisan }} !important}
            .form-header p{color: {{ $mode_tema->warna_sistem_tulisan }} !important}
            .slide-card-atass .currency{color: {{ $mode_tema->warna_sistem_tulisan }} !important}
            .slide-card-bawahs .currency{color: {{ $mode_tema->warna_sistem_tulisan }} !important}
            .slide-card-atass h2{color: {{ $mode_tema->warna_sistem_tulisan }} !important}
            .slide-card-bawahs h2{color: {{ $mode_tema->warna_sistem_tulisan }} !important}
            .arrow-kanan{color: {{ $mode_tema->warna_sistem_tulisan }} !important}
            .arrow-kanan2{color: {{ $mode_tema->warna_sistem_tulisan }} !important}
            .arrow-kiri{color: {{ $mode_tema->warna_sistem_tulisan }} !important}
            .arrow-kiri2{color: {{ $mode_tema->warna_sistem_tulisan }} !important}
            .text-gray-400{color: {{ $mode_tema->warna_sistem_tulisan }} !important}
            .icon-view-team {color: {{ $mode_tema->warna_sistem_tulisan }} !important}
            .icon-view-board {color: {{ $mode_tema->warna_sistem_tulisan }} !important}
            .text-latensi {color: {{ $mode_tema->warna_sistem_tulisan }} !important}

            .apexcharts-xaxistooltip, .apexcharts-yaxistooltip{background: {{ $mode_tema->warna_mode }} !important; color : {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .form-control{background-color: {{ $mode_tema->warna_mode }} !important; color: {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .profile-widget{background-color: {{ $mode_tema->warna_mode }} !important;}
            .card{background-color: {{ $mode_tema->warna_mode }} !important;}
            .sidebar {background-color: {{ $mode_tema->warna_mode }} !important;}
            .custom-table tr{background-color: {{ $mode_tema->warna_mode }} !important;}
            .modal-content{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-1{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-2{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-3{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-4{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-5{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-6{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-7{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-8{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-9{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-10{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-11{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-12{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-13{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-14{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-15{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-16{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-17{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-18{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-19{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-20{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-21{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-22{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-23{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-24{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-25{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-26{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-27{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-28{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-29{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-30{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-31{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-32{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-33{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-34{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-35{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-36{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-37{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-38{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-39{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-40{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-41{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-42{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-43{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropzone-box-44{background-color: {{ $mode_tema->warna_mode }} !important;}
            .kartu-trello {background-color: {{ $mode_tema->warna_mode }} !important;}
            .card-trello {background-color: {{ $mode_tema->warna_mode }} !important;}
            .opsi-hapus-cover{background-color: {{ $mode_tema->warna_mode }} !important;}
            .fa-circle-check{color: {{ $mode_tema->warna_mode }} !important;}
            .bg-white{background-color: {{ $mode_tema->warna_mode }} !important;}
            .bg-gray-100{background-color: {{ $mode_tema->warna_mode }} !important;}
            .boc-edit-form-instruments{background-color: {{ $mode_tema->warna_mode }} !important;}
            .boc-edit-form-fields{background-color: {{ $mode_tema->warna_mode }} !important;}
            .status-persetujuan-user{background-color: {{ $mode_tema->warna_mode }} !important; color: {{ $mode_tema->warna_sistem_tulisan }} !important}
            .continue-btn{background-color: {{ $mode_tema->warna_mode }}}
            .cancel-btn{background-color: {{ $mode_tema->warna_mode }}}
            .card-header{background-color: {{ $mode_tema->warna_mode }} !important;}
            .slide-card-atass{background: {{ $mode_tema->warna_mode }} !important}
            .slide-card-bawahs{background: {{ $mode_tema->warna_mode }} !important}
            ::-webkit-scrollbar-thumb{background: {{ $mode_tema->warna_mode }}}
            .action-button2{background: {{ $mode_tema->warna_mode }}}
            .action-button{background: {{ $mode_tema->warna_mode }}}
            .nav-tabs{background-color: {{ $mode_tema->warna_mode }} !important;}
            .profile-img-wrap{background : {{ $mode_tema->warna_mode }} !important;}
            .mention-tag{background-color : {{ $mode_tema->warna_mode }} !important;}
            .mention-tag-keterangan{background-color : {{ $mode_tema->warna_mode }} !important;}
            .mention-tag-comment{background-color : {{ $mode_tema->warna_mode }} !important;}
            .header{background: {{ $mode_tema->warna_mode }} !important; box-shadow: {{ $mode_tema->bayangan_kotak_header }} !important;}
            .btn-white{background-color: {{ $mode_tema->warna_mode }} !important;}
            .btn-outline-secondary{background-color: {{ $mode_tema->warna_mode }} !important;}
            .page-item.active .page-link{background: {{ $mode_tema->warna_mode }} !important; border-color: {{ $mode_tema->warna_mode }} !important;}
            .boc-light .boc-input>input, .boc-light .boc-input>select{background-color: {{ $mode_tema->warna_mode }} !important; color: {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .apexcharts-tooltip.apexcharts-theme-light {background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropdown-item.active, .dropdown-item:active{background-color: {{ $mode_tema->warna_mode }} !important;}
            .dropdown-item:focus, .dropdown-item:hover{background-color: {{ $mode_tema->warna_mode }} !important; border-radius : 10px !important; width: 90% !important; margin-left: 10px !important;}
            .notifications ul.notification-list > li a:hover{background-color: {{ $mode_tema->warna_mode }} !important;}
            .input-group-text{background-color: {{ $mode_tema->warna_mode }} !important; color: {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .select2-container--default .select2-selection--single .select2-selection__rendered{background-color: {{ $mode_tema->warna_mode }} !important; color: {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .form-focus .select2-container--default .select2-selection--single .select2-selection__rendered{background-color: {{ $mode_tema->warna_mode }} !important; color: {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .custom-select{background: {{ $mode_tema->warna_mode }} url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='4' height='5' viewBox='0 0 4 5'%3e%3cpath fill='{{ $mode_tema->warna_sistem_tulisan }}' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e") right .75rem center/8px 10px no-repeat !important;}
            .table-striped tbody tr:nth-of-type(odd){background-color: {{ $mode_tema->warna_mode }} !important;}
            .card-nama{background-color: {{ $mode_tema->warna_mode }} !important; color: {{ $mode_tema->warna_sistem_tulisan }} !important;}
            .aksi-card-icon{background-color: {{ $mode_tema->warna_mode }} !important; color: #B6C2CF !important;}

            .form-control::-webkit-input-placeholder{color: {{ $mode_tema->tabel_tulisan_tersembunyi }} !important;}
            .form-control::-moz-placeholder{color: {{ $mode_tema->tabel_tulisan_tersembunyi }} !important;}
            .form-control:-ms-input-placeholder{color: {{ $mode_tema->tabel_tulisan_tersembunyi }} !important;}
            .form-control::-ms-input-placeholder{color: {{ $mode_tema->tabel_tulisan_tersembunyi }} !important;}
            .form-control::placeholder{color: {{ $mode_tema->tabel_tulisan_tersembunyi }} !important;}
            .form-focus .focus-label{color: {{ $mode_tema->tabel_tulisan_tersembunyi }} !important;}
            
            .dropdown-menu{background-color: {{ $mode_tema->warna_dropdown_menu }} !important;}
            .slide-card-atass:hover{background: {{ $mode_tema->warna_dropdown_menu }} !important}
            .slide-card-bawahs:hover{background: {{ $mode_tema->warna_dropdown_menu }} !important}
            ::-webkit-scrollbar{background: {{ $mode_tema->warna_dropdown_menu }}}
            
            .select2-container--default .select2-selection--single{background-color: {{ $mode_tema->tabel_warna }} !important;}
            .dash-widget-icon{background-color: {{ $mode_tema->ikon_plugin }} !important;}
            .apexcharts-tooltip.apexcharts-theme-light .apexcharts-tooltip-title{background: {{ $mode_tema->warna_mode_2 }} !important;}
            .select2-container--default .select2-results__option--selected{background-color: {{ $mode_tema->warna_mode_2 }} !important;}
            .aksi-kolom:active {background-color: #091e421c !important; color: #9fadbc !important;}
            .opsi-hapus-cover:hover {background-color: #091e4275 !important; color: #9fadbc !important;}
            .opsi-hapus-cover:active {background-color: #091e4240 !important; color: #9fadbc !important;}

            @foreach($result_tema as $sql_user => $aplikasi_tema)
                @if ($aplikasi_tema->tema_aplikasi == 'Gelap')
                    .header .has-arrow .dropdown-toggle:after{
                        border-bottom: 2px solid {{ $mode_tema->warna_sistem_tulisan }} !important; 
                        border-right: 2px solid {{ $mode_tema->warna_sistem_tulisan }} !important;
                    }
                    .noti-dot:after{border-right: 17px solid {{ $mode_tema->warna_sistem }} !important}
                    .cancel-btn{color: #f43b48 !important}
                    .cancel-btn:hover, .cancel-btn:focus, .cancel-btn:active {color: {{ $mode_tema->warna_sistem_tulisan }} !important}
                    .topnav-dropdown-footer a:hover{color: #f83f37 !important}
                    .topnav-dropdown-header .clear-noti:hover{color: #f83f37 !important}
                    .notification-message.noti-read .noti-title{color: #989c9e !important}
                    .boc-edit-form-header{background-color: {{ $mode_tema->warna_dropdown_menu }} !important; border-radius: 0px !important;}
                    .boc-dark .boc-input>label.focused,.boc-light .boc-input>label.focused{color:#039be5 !important}
                    hr{border-top: 1px solid {{ $mode_tema->warna_sistem_tulisan }} !important}
                    .text-black {color: white !important}
                    .bg-slate-100{background-color: {{ $mode_tema->warna_sistem }} !important;}
                    .fa-ellipsis{color: #B6C2CF !important;}
                    .aksi-kolom:hover {background-color: #a6c5e229 !important; color: #9fadbc !important;}
                    .aksi-kolom:active {background-color: #a6c5e241 !important; color: #9fadbc !important;}
                    .kolom-nama {border-bottom: 3px solid {{ $mode_tema->warna_mode }} !important;}
                    .aksi-card-icon:hover{background-color: #22272B !important;}
                    .card-nama{border: 2px solid transparent;transition: border-color 0.3s ease;}
                    .card-nama:hover{opacity: 1; border-color: #85B8FF;}
                    .info-status4 .text-status4{background-color: #9fadbc !important; color: #1D2125 !important;}
                    .info-status5 .text-status5{background-color: #9fadbc !important; color: #1D2125 !important;}
                    .info-status6 .text-status6{background-color: #9fadbc !important; color: #1D2125 !important;}
                    .info-status7 .text-status7{background-color: #9fadbc !important; color: #1D2125 !important;}
                    .info-status8 .text-status8{background-color: #9fadbc !important; color: #1D2125 !important;}
                    .info-status9 .text-status9{background-color: #9fadbc !important; color: #1D2125 !important;}
                    .info-status9 .text-status9a{background-color: #9fadbc !important; color: #1D2125 !important;}
                    .info-status10 .text-status10{background-color: #9fadbc !important; color: #1D2125 !important;}
                    .info-status11 .text-status11{background-color: #9fadbc !important; color: #1D2125 !important;}
                    .info-status12 .text-status12{background-color: #9fadbc !important; color: #1D2125 !important;}
                    .info-status13 .text-status13{background-color: #9fadbc !important; color: #1D2125 !important;}
                    .info-status14 .text-status14{background-color: #9fadbc !important; color: #1D2125 !important;}
                    .info-status15 .text-status15{background-color: #9fadbc !important; color: #1D2125 !important;}
                    .info-status16 .text-status16{background-color: #9fadbc !important; color: #1D2125 !important;}
                    .info-status17 .text-status17{background-color: #9fadbc !important; color: #1D2125 !important;}
                    .info-status18 .text-status18{background-color: #9fadbc !important; color: #1D2125 !important;}
                    .info-status19 .text-status19{background-color: #9fadbc !important; color: #1D2125 !important;}
                    .info-status20 .text-status20{background-color: #9fadbc !important; color: #1D2125 !important;}
                    .info-status21 .text-status21{background-color: #9fadbc !important; color: #1D2125 !important;}
                    .icon-trash {color: #B6C2CF !important;}
                    .icon-trash:hover {color: #dc3546e1 !important;}
                    .icon-trash:active {color: #e62034 !important;}
                    .icon-comment {color: #B6C2CF !important;}
                    .icon-comment:hover {color: #157347 !important;}
                    .icon-comment:active {color: #146c43 !important;}
                    .isian-history{background: rgb(31 28 54) !important}
                    .isian-activity{color: white !important}
                    .mention-tag-container {border-bottom: 1px solid rgba(9, 45, 66, 0.13) !important; background: {{ $mode_tema->warna_sistem }} !important; box-shadow: 0 1px 1px rgba(9, 45, 66, 0.25), 0 0 0 1px rgba(9, 45, 66, 0.08) !important;}
                    .mention-nama{color: #B6C2CF !important;}
                    .mention-waktu{color: #8C9BAB !important;}
                    .isian-mention-tag{background-color: {{ $mode_tema->warna_mode }} !important; color: #B6C2CF !important; box-shadow: 0px 1px 1px #5a5e6f, 0px 0px 1px #464a5b !important;}
                    .isian-deskripsi{color: white; background-color: #292D3E; border-color: white !important}

                    {{-- Untuk Pulihkan Kartu --}}
                    .isian-pulihkan-kartu{background-color: #464a5b; color: {{ $mode_tema->warna_sistem_tulisan }};}
                    .waktu-pulihkan-kartu {color: {{ $mode_tema->warna_sistem_tulisan }};}
                    .opsi-pulihkan{background-color: #737788; border: 1px solid #737788;}
                    .opsi-pulihkan:hover{background-color: #3a3c47; border-color:#3a3c47;}
                    .opsi-pulihkan2{background-color: #737788; border: 1px solid #737788;}
                    .opsi-pulihkan2:hover{background-color: #3a3c47; border-color:#3a3c47;}
                    .isian-pulihkan-title{background-color: #464a5b; color: {{ $mode_tema->warna_sistem_tulisan }};}
                    .waktu-pulihkan-title {color: {{ $mode_tema->warna_sistem_tulisan }};}
                    .opsi-pulihkan-title{background-color: #737788; border: 1px solid #737788;}
                    .opsi-pulihkan-title:hover{background-color: #3a3c47; border-color:#3a3c47;}
                    .opsi-pulihkan-title2{background-color: #737788; border: 1px solid #737788;}
                    .opsi-pulihkan-title2:hover{background-color: #3a3c47; border-color:#3a3c47;}
                    .isian-pulihkan-checklist{background-color: #464a5b; color: {{ $mode_tema->warna_sistem_tulisan }};}
                    .waktu-pulihkan-checklist {color: {{ $mode_tema->warna_sistem_tulisan }};}
                    .opsi-pulihkan-checklist{background-color: #737788; border: 1px solid #737788;}
                    .opsi-pulihkan-checklist:hover{background-color: #3a3c47; border-color:#3a3c47;}
                    .opsi-pulihkan-checklist2{background-color: #737788; border: 1px solid #737788;}
                    .opsi-pulihkan-checklist2:hover{background-color: #3a3c47; border-color:#3a3c47;}
                    .isian-pulihkan-kolom{background-color: #464a5b; color: {{ $mode_tema->warna_sistem_tulisan }};}
                    .waktu-pulihkan-kolom {color: {{ $mode_tema->warna_sistem_tulisan }};}
                    .opsi-pulihkan-kolom{background-color: #737788; border: 1px solid #737788;}
                    .opsi-pulihkan-kolom:hover{background-color: #3a3c47; border-color:#3a3c47;}
                    .opsi-pulihkan-kolom2{background-color: #737788; border: 1px solid #737788;}
                    .opsi-pulihkan-kolom2:hover{background-color: #3a3c47; border-color:#3a3c47;}
                    .text-pulihkan{color: {{ $mode_tema->warna_sistem_tulisan }} !important;}
                    .text-from-judul{color: {{ $mode_tema->warna_sistem_tulisan }} !important;}

                    @foreach ($belum_dibaca as $notifikasi_belum_dibaca)
                        #popup-notifikasi_{{ $notifikasi_belum_dibaca->id }} {background: {{ $mode_tema->warna_mode }} !important}
                        .noti-details2{color: {{ $mode_tema->warna_sistem_tulisan }} !important}
                        .noti-time3{color: {{ $mode_tema->warna_sistem_tulisan }} !important}
                        .fa-clock{color: {{ $mode_tema->warna_sistem_tulisan }} !important}
                    @endforeach
                    @foreach ($dibaca as $notifikasi_dibaca)
                        #popup-notifikasi_{{ $notifikasi_dibaca->id }} {background: {{ $mode_tema->warna_mode }} !important}
                        .noti-details2{color: {{ $mode_tema->warna_sistem_tulisan }} !important}
                        .noti-time3{color: {{ $mode_tema->warna_sistem_tulisan }} !important}
                        .fa-clock{color: {{ $mode_tema->warna_sistem_tulisan }} !important}
                    @endforeach
                @endif
            @endforeach

            @foreach ($belum_dibaca as $notifikasi_belum_dibaca)
            #popup-notifikasi_{{ $notifikasi_belum_dibaca->id }} {
                display: none;
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background: #fff;
                padding: 20px;
                border-radius: 15px;
                box-shadow: 0px 0px 100px rgba(0, 0, 0, 0.2);
            }

            #close-popup_{{ $notifikasi_belum_dibaca->id }} {
                background-color: #e74a3b;
                border-color: #e74a3b;
                color: #fff;
                border: none;
                padding: 3px 20px;
                border-radius: 7px;
                font-size: 20px;
            }

            #close-popup_{{ $notifikasi_belum_dibaca->id }}:hover {
                background-color: #e02d1b;
                border-color: #d52a1a;
            }

            .close-notifikasi {
                position: absolute;
                bottom: 20px;
                left: 41%;
            }
            
            .logo-pttati2 img{
                position: relative;
                width: 100px;
                left: 81.5%;
                top: 15px;
            }

            .noti-time3 {
                position: absolute;
                bottom: 5px;
                right: 15px;
                float: right;
                color: #333;
                font-size: 14px;
                font-family: 'Poppins';
                text-align: center;
            }
            @endforeach

            @foreach ($dibaca as $notifikasi_dibaca)
            #popup-notifikasi_{{ $notifikasi_dibaca->id }} {
                display: none;
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background: #fff;
                padding: 20px;
                border-radius: 15px;
                box-shadow: 0px 0px 100px rgba(0, 0, 0, 0.2);
            }

            #close-popup_{{ $notifikasi_dibaca->id }} {
                background-color: #e74a3b;
                border-color: #e74a3b;
                color: #fff;
                border: none;
                padding: 0px 7px 4px 8px;
                border-radius: 10px;
            }

            #close-popup_{{ $notifikasi_dibaca->id }}:hover {
                background-color: #e02d1b;
                border-color: #d52a1a;
            }

            .close-notifikasi-2 {
                position: absolute;
                top: 15px;
                right: 15px;
            }

            .logo-pttati2 img{
                position: relative;
                width: 100px;
                left: 81.5%;
                top: 15px;
            }

            .noti-time3 {
                position: absolute;
                bottom: 5px;
                right: 15px;
                float: right;
                color: #333;
                font-size: 14px;
                font-family: 'Poppins';
                text-align: center;
            }
            @endforeach
        @endforeach
    </style>

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <!-- Loader -->
        <div id="loader-wrapper">
            <div id="loader">
                <div class="loader-ellips">
                    <span class="loader-ellips__dot"></span>
                    <span class="loader-ellips__dot"></span>
                    <span class="loader-ellips__dot"></span>
                    <span class="loader-ellips__dot"></span>
                </div>
            </div>
        </div>
        <!-- /Loader -->

        <!-- Header -->
        <div class="header">
            
                <!-- Untuk Mengatur Tema Aplikasi -->
                @foreach($result_tema as $sql_user => $aplikasi_tema)
                    <div class="fitur-tema2">
                        <li class="nav-item dropdown">
                            <a href="#" class="dropdown-toggle nav-link" id="temaAplikasi" data-toggle="dropdown" aria-expanded="false">
                                @if ($aplikasi_tema->tema_aplikasi == 'Terang')
                                    {{-- <i class="fa-regular fa-sun" style="color: #fdae4b; font-size: 25px;"></i> --}}
                                    <svg fill="currentColor" style="color: #fdae4b; margin-top: -7px; margin-left: -4px; width: 37px; height: 37px;" aria-hidden="true" data-slot="icon" viewBox="0 0 20 20" class="h-4 w-4 fill-hurricane">
                                        <path d="M10 2a.75.75 0 0 1 .75.75v1.5a.75.75 0 0 1-1.5 0v-1.5A.75.75 0 0 1 10 2Zm0 13a.75.75 0 0 1 .75.75v1.5a.75.75 0 0 1-1.5 0v-1.5A.75.75 0 0 1 10 15Zm0-8a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm5.657-1.596a.75.75 0 1 0-1.06-1.06l-1.061 1.06a.75.75 0 0 0 1.06 1.06l1.06-1.06Zm-9.193 9.192a.75.75 0 1 0-1.06-1.06l-1.06 1.06a.75.75 0 0 0 1.06 1.06l1.06-1.06ZM18 10a.75.75 0 0 1-.75.75h-1.5a.75.75 0 0 1 0-1.5h1.5A.75.75 0 0 1 18 10ZM5 10a.75.75 0 0 1-.75.75h-1.5a.75.75 0 0 1 0-1.5h1.5A.75.75 0 0 1 5 10Zm9.596 5.657a.75.75 0 0 0 1.06-1.06l-1.06-1.061a.75.75 0 1 0-1.06 1.06l1.06 1.06ZM5.404 6.464a.75.75 0 0 0 1.06-1.06l-1.06-1.06a.75.75 0 1 0-1.061 1.06l1.06 1.06Z"></path>
                                    </svg>
                                @elseif ($aplikasi_tema->tema_aplikasi == 'Gelap')
                                    <i class="fa-solid fa-moon fa-rotate-by" style="color: #fdae4b; margin-top: -5px; font-size: 32px; --fa-rotate-angle: 320deg;"></i>
                                @endif
                            </a>
                            <div class="dropdown-menu" aria-labelledby="temaAplikasi">
                                <form action="{{ route('updateTemaAplikasi', $aplikasi_tema->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    
                                    <!-- Untuk Mode Terang -->
                                    <button type="submit" class="dropdown-item" name="tema_aplikasi" value="Terang">
                                        <div class="fitur-tema2-sub-terang">
                                            {{-- <i class="fa-regular fa-sun" style="color: #fdae4b; font-size: 20px; margin-top: 6px;"></i> --}}
                                            <svg fill="currentColor" style="fill: #fdae4b !important; margin-top: 1px; margin-left: 0px; width: 30px; height: 29px;" aria-hidden="true" data-slot="icon" viewBox="0 0 20 20" class="h-4 w-4 fill-hurricane">
                                                <path d="M10 2a.75.75 0 0 1 .75.75v1.5a.75.75 0 0 1-1.5 0v-1.5A.75.75 0 0 1 10 2Zm0 13a.75.75 0 0 1 .75.75v1.5a.75.75 0 0 1-1.5 0v-1.5A.75.75 0 0 1 10 15Zm0-8a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm5.657-1.596a.75.75 0 1 0-1.06-1.06l-1.061 1.06a.75.75 0 0 0 1.06 1.06l1.06-1.06Zm-9.193 9.192a.75.75 0 1 0-1.06-1.06l-1.06 1.06a.75.75 0 0 0 1.06 1.06l1.06-1.06ZM18 10a.75.75 0 0 1-.75.75h-1.5a.75.75 0 0 1 0-1.5h1.5A.75.75 0 0 1 18 10ZM5 10a.75.75 0 0 1-.75.75h-1.5a.75.75 0 0 1 0-1.5h1.5A.75.75 0 0 1 5 10Zm9.596 5.657a.75.75 0 0 0 1.06-1.06l-1.06-1.061a.75.75 0 1 0-1.06 1.06l1.06 1.06ZM5.404 6.464a.75.75 0 0 0 1.06-1.06l-1.06-1.06a.75.75 0 1 0-1.061 1.06l1.06 1.06Z"></path>
                                            </svg>
                                        </div>
                                        <div class="fitur-tema2-tulisan-terang">Terang</div>
                                    </button>
                                    <!-- /Untuk Mode Terang -->
                                    
                                    <!-- Untuk Mode Gelap -->
                                    <button type="submit" class="dropdown-item" name="tema_aplikasi" value="Gelap">
                                        <div class="fitur-tema2-sub-gelap">
                                            <i class="fa-solid fa-moon fa-rotate-by" style="color: #fdae4b; font-size: 24px; margin-top: 4px; margin-left: -2px; --fa-rotate-angle: 320deg;"></i>
                                        </div>
                                        <div class="fitur-tema2-tulisan-gelap">Gelap</div>
                                    </button>
                                    <!-- /Untuk Mode Gelap -->
                                    
                                </form>
                            </div>
                        </li>
                    </div>
                @endforeach
                <!-- /Untuk Mengatur Tema Aplikasi -->

            <a id="toggle_btn" href="javascript:void(0);">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>
            <!-- /Header Title -->
            <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

            <!-- Header Menu -->
            <ul class="nav user-menu">

                <!-- Untuk Mengatur Tema Aplikasi -->
                @foreach($result_tema as $sql_user => $aplikasi_tema)
                    <div class="fitur-tema">
                        <li class="nav-item dropdown">
                            <a href="#" class="dropdown-toggle nav-link" id="temaAplikasi" data-toggle="dropdown" aria-expanded="false">
                                @if ($aplikasi_tema->tema_aplikasi == 'Terang')
                                    {{-- <i class="fa-regular fa-sun" style="color: #fdae4b; font-size: 25px;"></i> --}}
                                    <svg fill="currentColor" style="color: #fdae4b; margin-top: -7px; margin-left: -4px; width: 37px; height: 37px;" aria-hidden="true" data-slot="icon" viewBox="0 0 20 20" class="h-4 w-4 fill-hurricane">
                                        <path d="M10 2a.75.75 0 0 1 .75.75v1.5a.75.75 0 0 1-1.5 0v-1.5A.75.75 0 0 1 10 2Zm0 13a.75.75 0 0 1 .75.75v1.5a.75.75 0 0 1-1.5 0v-1.5A.75.75 0 0 1 10 15Zm0-8a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm5.657-1.596a.75.75 0 1 0-1.06-1.06l-1.061 1.06a.75.75 0 0 0 1.06 1.06l1.06-1.06Zm-9.193 9.192a.75.75 0 1 0-1.06-1.06l-1.06 1.06a.75.75 0 0 0 1.06 1.06l1.06-1.06ZM18 10a.75.75 0 0 1-.75.75h-1.5a.75.75 0 0 1 0-1.5h1.5A.75.75 0 0 1 18 10ZM5 10a.75.75 0 0 1-.75.75h-1.5a.75.75 0 0 1 0-1.5h1.5A.75.75 0 0 1 5 10Zm9.596 5.657a.75.75 0 0 0 1.06-1.06l-1.06-1.061a.75.75 0 1 0-1.06 1.06l1.06 1.06ZM5.404 6.464a.75.75 0 0 0 1.06-1.06l-1.06-1.06a.75.75 0 1 0-1.061 1.06l1.06 1.06Z"></path>
                                    </svg>
                                @elseif ($aplikasi_tema->tema_aplikasi == 'Gelap')
                                    <i class="fa-solid fa-moon fa-rotate-by" style="color: #fdae4b; margin-top: -5px; font-size: 32px; --fa-rotate-angle: 320deg;"></i>
                                @endif
                            </a>
                            <div class="dropdown-menu" aria-labelledby="temaAplikasi">
                                <form action="{{ route('updateTemaAplikasi', $aplikasi_tema->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    
                                    <!-- Untuk Mode Terang -->
                                    <button type="submit" class="dropdown-item" name="tema_aplikasi" value="Terang">
                                        <div class="fitur-tema-sub-terang">
                                            {{-- <i class="fa-regular fa-sun" style="color: #fdae4b; font-size: 20px; margin-top: 6px;"></i> --}}
                                            <svg fill="currentColor" style="fill: #fdae4b !important; margin-top: 1px; margin-left: 0px; width: 30px; height: 29px;" aria-hidden="true" data-slot="icon" viewBox="0 0 20 20" class="h-4 w-4 fill-hurricane">
                                                <path d="M10 2a.75.75 0 0 1 .75.75v1.5a.75.75 0 0 1-1.5 0v-1.5A.75.75 0 0 1 10 2Zm0 13a.75.75 0 0 1 .75.75v1.5a.75.75 0 0 1-1.5 0v-1.5A.75.75 0 0 1 10 15Zm0-8a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm5.657-1.596a.75.75 0 1 0-1.06-1.06l-1.061 1.06a.75.75 0 0 0 1.06 1.06l1.06-1.06Zm-9.193 9.192a.75.75 0 1 0-1.06-1.06l-1.06 1.06a.75.75 0 0 0 1.06 1.06l1.06-1.06ZM18 10a.75.75 0 0 1-.75.75h-1.5a.75.75 0 0 1 0-1.5h1.5A.75.75 0 0 1 18 10ZM5 10a.75.75 0 0 1-.75.75h-1.5a.75.75 0 0 1 0-1.5h1.5A.75.75 0 0 1 5 10Zm9.596 5.657a.75.75 0 0 0 1.06-1.06l-1.06-1.061a.75.75 0 1 0-1.06 1.06l1.06 1.06ZM5.404 6.464a.75.75 0 0 0 1.06-1.06l-1.06-1.06a.75.75 0 1 0-1.061 1.06l1.06 1.06Z"></path>
                                            </svg>
                                        </div>
                                        <div class="fitur-tema-tulisan-terang">Terang</div>
                                    </button>
                                    <!-- /Untuk Mode Terang -->
                                    
                                    <!-- Untuk Mode Gelap -->
                                    <button type="submit" class="dropdown-item" name="tema_aplikasi" value="Gelap">
                                        <div class="fitur-tema-sub-gelap">
                                            <i class="fa-solid fa-moon fa-rotate-by" style="color: #fdae4b; font-size: 24px; margin-top: 4px; margin-left: -2px; --fa-rotate-angle: 320deg;"></i>
                                        </div>
                                        <div class="fitur-tema-tulisan-gelap">Gelap</div>
                                    </button>
                                    <!-- /Untuk Mode Gelap -->
                                    
                                </form>
                            </div>
                        </li>
                    </div>
                @endforeach
                <!-- /Untuk Mengatur Tema Aplikasi -->

                <!-- Notifications -->
                <li class="nav-item dropdown">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="fa fa-bell-o" style="color : #66615b"></i>
                        <span class="badge badge-pill">{{ $unreadNotifications->count() }}</span>
                    </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Notifikasi</span>
                            @if (count($unreadNotifications) > 0 )
                                <form id="mark-all" method="POST" action="{{ route('bacasemuaNotifikasi') }}">
                                    @csrf
                                    <button type="submit" class="clear-noti">Tandai Semua Dibaca</button>
                                </form>
                            @endif
                        </div>
                        <div class="noti-content">
                            <ul class="notification-list" style="display: block">
                                @if(auth()->user()->unreadNotifications()->count() > 0)
                                    <li class="notification-message noti-unread hidden" id="noNewNotifications">
                                        <p class="noti-details" style="margin-top: 30px; text-align: center;">
                                            <img src="{{ URL::to('/assets/images/notification-icon.svg') }}" style="position: relative;" loading="lazy">
                                        </p>
                                        <p class="noti-details" style="font-size: 20px; margin-top: 10px; text-align: center;">Tidak ada notifikasi baru</p>
                                    </li>
                                @else
                                    <li class="notification-message noti-unread" id="noNewNotifications">
                                        <p class="noti-details" style="margin-top: 30px; text-align: center;">
                                            <img src="{{ URL::to('/assets/images/notification-icon.svg') }}" style="position: relative;" loading="lazy">
                                        </p>
                                        <p class="noti-details" style="font-size: 20px; margin-top: 10px; text-align: center;">Tidak ada notifikasi baru</p>
                                    </li>
                                @endif

                                @foreach ($belum_dibaca->where('notifiable_id', auth()->id()) as $notifikasi_belum_dibaca)
                                    @php
                                        $notifikasiDataBelumDibaca = json_decode($notifikasi_belum_dibaca->data);
                                        $created_at = \Carbon\Carbon::parse($notifikasi_belum_dibaca->created_at);
                                        $read_at = \Carbon\Carbon::parse($notifikasi_belum_dibaca->read_at);
                                    @endphp
                                    <li class="notification-message noti-unread">
                                        <a href="#" id="open-popup_{{ $notifikasi_belum_dibaca->id }}">
                                            @if ($notifikasiDataBelumDibaca->message == 'Selamat Ulang Tahun')
                                                <div class="media">
                                                    <span class="avatar">
                                                        <img alt="" src="{{ URL::to('/assets/images/' . $notifikasiDataBelumDibaca->avatar) }}" loading="lazy">
                                                    </span>
                                                    <div class="media-body">
                                                        <p class="noti-details">
                                                            <span class="noti-title">
                                                                <b>{{ $notifikasiDataBelumDibaca->message }} {{ $notifikasiDataBelumDibaca->name }}</b>
                                                            </span><br>
                                                                Ada pesan baru untuk anda !!
                                                        </p>
                                                        <p class="noti-time">
                                                            <i class="fa-solid fa-clock" style="color: #808080;" aria-hidden="true"></i>
                                                            <span class="notification-time">{{ $created_at->diffForHumans() }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($notifikasiDataBelumDibaca->message == 'Mention Tag Description')
                                                <div class="media">
                                                    <span class="avatar">
                                                        <img alt="" src="{{ URL::to('/assets/images/' . $notifikasiDataBelumDibaca->avatar) }}" loading="lazy">
                                                    </span>
                                                    <div class="media-body">
                                                        <p class="noti-details">
                                                            <span class="noti-title">
                                                                <b>{{ $notifikasiDataBelumDibaca->message }} <br>{{ $notifikasiDataBelumDibaca->name }}</b>
                                                                <p style="color: #4999de !important; margin-bottom: -1rem !important;"> Ada pesan baru untuk anda !!</p>
                                                            </span>
                                                        </p>
                                                        <p class="noti-time">
                                                            <i class="fa-solid fa-clock" style="color: #808080;" aria-hidden="true"></i>
                                                            <span class="notification-time">{{ $created_at->diffForHumans() }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($notifikasiDataBelumDibaca->message == 'Mention Tag Checklist')
                                                <div class="media">
                                                    <span class="avatar">
                                                        <img alt="" src="{{ URL::to('/assets/images/' . $notifikasiDataBelumDibaca->avatar) }}" loading="lazy">
                                                    </span>
                                                    <div class="media-body">
                                                        <p class="noti-details">
                                                            <span class="noti-title">
                                                                <b>{{ $notifikasiDataBelumDibaca->message }} <br>{{ $notifikasiDataBelumDibaca->name }}</b>
                                                                <p style="color: #4999de !important; margin-bottom: -1rem !important;"> Ada pesan baru untuk anda !!</p>
                                                            </span>
                                                        </p>
                                                        <p class="noti-time">
                                                            <i class="fa-solid fa-clock" style="color: #808080;" aria-hidden="true"></i>
                                                            <span class="notification-time">{{ $created_at->diffForHumans() }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($notifikasiDataBelumDibaca->message == 'Mention Tag Comment')
                                                <div class="media">
                                                    <span class="avatar">
                                                        <img alt="" src="{{ URL::to('/assets/images/' . $notifikasiDataBelumDibaca->avatar) }}" loading="lazy">
                                                    </span>
                                                    <div class="media-body">
                                                        <p class="noti-details">
                                                            <span class="noti-title">
                                                                <b>{{ $notifikasiDataBelumDibaca->message }} <br>{{ $notifikasiDataBelumDibaca->name }}</b>
                                                                <p style="color: #4999de !important; margin-bottom: -1rem !important;"> Ada pesan baru untuk anda !!</p>
                                                            </span>
                                                        </p>
                                                        <p class="noti-time">
                                                            <i class="fa-solid fa-clock" style="color: #808080;" aria-hidden="true"></i>
                                                            <span class="notification-time">{{ $created_at->diffForHumans() }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            @endif
                                        </a>
                                    </li>
                                @endforeach

                                {{-- @foreach ($dibaca->where('notifiable_id', auth()->id()) as $notifikasi_dibaca)
                                    @php
                                        $notifikasiDataDibaca = json_decode($notifikasi_dibaca->data);
                                        $created_at = \Carbon\Carbon::parse($notifikasi_dibaca->created_at);
                                        $read_at = \Carbon\Carbon::parse($notifikasi_dibaca->read_at);
                                    @endphp
                                    <li class="notification-message noti-read">
                                        <a href="#" id="open-popup_{{ $notifikasi_dibaca->id }}">
                                            @if ($notifikasiDataDibaca->message == 'Selamat Ulang Tahun')
                                                <div class="media">
                                                    <span class="avatar">
                                                        <img alt="" src="{{ URL::to('/assets/images/' . $notifikasiDataDibaca->avatar) }}" loading="lazy">
                                                    </span>
                                                    <div class="media-body">
                                                        <p class="noti-details">
                                                            <span class="noti-title">
                                                                <b>{{ $notifikasiDataDibaca->message }} {{ $notifikasiDataDibaca->name }}</b>
                                                            </span><br>
                                                                Ada pesan baru untuk anda !!
                                                        </p>
                                                        <p class="noti-time">
                                                            <i class="fa-solid fa-clock" style="color: #808080;" aria-hidden="true"></i>
                                                            <span class="notification-time">{{ $created_at->diffForHumans() }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($notifikasiDataDibaca->message == 'Mention Tag Description')
                                                <div class="media">
                                                    <span class="avatar">
                                                        <img alt="" src="{{ URL::to('/assets/images/' . $notifikasiDataDibaca->avatar) }}" loading="lazy">
                                                    </span>
                                                    <div class="media-body">
                                                        <p class="noti-details">
                                                            <span class="noti-title">
                                                                <b>{{ $notifikasiDataDibaca->message }} <br>{{ $notifikasiDataDibaca->name }}</b>
                                                                <p style="color: #989c9e !important; margin-bottom: -1rem !important;"> Ada pesan baru untuk anda !!</p>
                                                            </span>
                                                        </p>
                                                        <p class="noti-time">
                                                            <i class="fa-solid fa-clock" style="color: #808080;" aria-hidden="true"></i>
                                                            <span class="notification-time">{{ $created_at->diffForHumans() }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($notifikasiDataDibaca->message == 'Mention Tag Checklist')
                                                <div class="media">
                                                    <span class="avatar">
                                                        <img alt="" src="{{ URL::to('/assets/images/' . $notifikasiDataDibaca->avatar) }}" loading="lazy">
                                                    </span>
                                                    <div class="media-body">
                                                        <p class="noti-details">
                                                            <span class="noti-title">
                                                                <b>{{ $notifikasiDataDibaca->message }} <br>{{ $notifikasiDataDibaca->name }}</b>
                                                                <p style="color: #989c9e !important; margin-bottom: -1rem !important;"> Ada pesan baru untuk anda !!</p>
                                                            </span>
                                                        </p>
                                                        <p class="noti-time">
                                                            <i class="fa-solid fa-clock" style="color: #808080;" aria-hidden="true"></i>
                                                            <span class="notification-time">{{ $created_at->diffForHumans() }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($notifikasiDataDibaca->message == 'Mention Tag Comment')
                                                <div class="media">
                                                    <span class="avatar">
                                                        <img alt="" src="{{ URL::to('/assets/images/' . $notifikasiDataDibaca->avatar) }}" loading="lazy">
                                                    </span>
                                                    <div class="media-body">
                                                        <p class="noti-details">
                                                            <span class="noti-title">
                                                                <b>{{ $notifikasiDataDibaca->message }} <br>{{ $notifikasiDataDibaca->name }}</b>
                                                                <p style="color: #989c9e !important; margin-bottom: -1rem !important;"> Ada pesan baru untuk anda !!</p>
                                                            </span>
                                                        </p>
                                                        <p class="noti-time">
                                                            <i class="fa-solid fa-clock" style="color: #808080;" aria-hidden="true"></i>
                                                            <span class="notification-time">{{ $created_at->diffForHumans() }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            @endif
                                        </a>
                                    </li>
                                @endforeach --}}
                            </ul>
                        </div>
                        @if (count($unreadNotifications) > 0 )
                            <div class="topnav-dropdown-footer"><a href="{{ route('tampilan-semua-notifikasi') }}">Semua Notifikasi</a></div>
                        @elseif (count($readNotifications) > 0 )
                            <div class="topnav-dropdown-footer"><a href="{{ route('tampilan-semua-notifikasi') }}">Semua Notifikasi</a></div>
                        @endif
                    </div>
                </li>
				<!-- /Notifications -->

                <!-- Notifikasi Belum Dibaca Modal -->
                @foreach ($belum_dibaca as $notifikasi_belum_dibaca)
                @php
                    $notifikasiDataBelumDibaca = json_decode($notifikasi_belum_dibaca->data);
                    $created_at = \Carbon\Carbon::parse($notifikasi_belum_dibaca->created_at);
                    $read_at = \Carbon\Carbon::parse($notifikasi_belum_dibaca->read_at);
                @endphp
                <div id="popup-notifikasi_{{ $notifikasi_belum_dibaca->id }}" style="width: 575px;">
                    <li class="notification-message noti-unread">
                        <div class="media">
                            <div class="media-body">
                                <p class="noti-details3"><br>
                                    <a><b>{{ $notifikasiDataBelumDibaca->name }}</b></a><br>
                                    <a>Surabaya / <span id="tanggal-master_{{ $notifikasi_belum_dibaca->id }}"></span> | <span id="waktu-master_{{ $notifikasi_belum_dibaca->id }}"></span></a><br>
                                    <a style="color: #808080; font-weight: 500; font-size: 12px">ID Notifikasi: {{ substr($notifikasi_belum_dibaca->id, 0, 8) }}</a>
                                </p><br>
                                <p class="noti-details2">
                                    @if ($notifikasiDataBelumDibaca->message == 'Selamat Ulang Tahun')
                                        <i>{{ $notifikasiDataBelumDibaca->message2 }} <b>{{ $notifikasiDataBelumDibaca->message3 }}</b> @if (!empty($notifikasiDataBelumDibaca->message4)) {{ $notifikasiDataBelumDibaca->message4 }} @endif
                                        @if (!empty($notifikasiDataBelumDibaca->message5)) {{ $notifikasiDataBelumDibaca->message5 }} @endif<b>@if (!empty($notifikasiDataBelumDibaca->message6)) {{ $notifikasiDataBelumDibaca->message6 }} @endif</b>
                                        Kepada <b>{{ $notifikasiDataBelumDibaca->name }}</b> @if (!empty($notifikasiDataBelumDibaca->message7)) {{ $notifikasiDataBelumDibaca->message7 }} @endif </i>
                                    @endif
                                    @if ($notifikasiDataBelumDibaca->message == 'Mention Tag Description')
                                        <div class="mention-tag-container">
                                            <div class="header-mention-tag">
                                                @php
                                                    $userAvatar = '';
                                                    if (!empty($notifikasiDataBelumDibaca->message6)) { $user = \App\Models\User::find($notifikasiDataBelumDibaca->message6); if ($user) { $userAvatar = URL::to('/assets/images/' . $user->avatar); } }
                                                @endphp
                                                <a href="{{ $userAvatar }}" data-fancybox="mention-foto">
                                                    <img class="avatar-notif" src="{{ $userAvatar }}" loading="lazy">
                                                </a>
                                                <p class="mention-nama">{{ $notifikasiDataBelumDibaca->message4 }}</p>
                                                <p class="mention-waktu">{{ \Carbon\Carbon::parse($notifikasiDataBelumDibaca->message5)->isoFormat('D MMMM [at] h:mm') }}</p>
                                            </div>
                                            <div class="isian-mention-tag">
                                                {{ $notifikasiDataBelumDibaca->message3 }}
                                            </div>
                                        </div>
                                    @endif
                                    @if ($notifikasiDataBelumDibaca->message == 'Mention Tag Checklist')
                                        <div class="mention-tag-container">
                                            <div class="header-mention-tag">
                                                @php
                                                    $userAvatar = '';
                                                    if (!empty($notifikasiDataBelumDibaca->message6)) { $user = \App\Models\User::find($notifikasiDataBelumDibaca->message6); if ($user) { $userAvatar = URL::to('/assets/images/' . $user->avatar); } }
                                                @endphp
                                                <a href="{{ $userAvatar }}" data-fancybox="mention-foto">
                                                    <img class="avatar-notif" src="{{ $userAvatar }}" loading="lazy">
                                                </a>
                                                <p class="mention-nama">{{ $notifikasiDataBelumDibaca->message4 }}</p>
                                                <p class="mention-waktu">{{ \Carbon\Carbon::parse($notifikasiDataBelumDibaca->message5)->isoFormat('D MMMM [at] h:mm') }}</p>
                                            </div>
                                            <div class="isian-mention-tag">
                                                {{ $notifikasiDataBelumDibaca->message3 }}
                                            </div>
                                        </div>
                                    @endif
                                    @if ($notifikasiDataBelumDibaca->message == 'Mention Tag Comment')
                                        <div class="mention-tag-container">
                                            <div class="header-mention-tag">
                                                @php
                                                    $userAvatar = '';
                                                    if (!empty($notifikasiDataBelumDibaca->message6)) { $user = \App\Models\User::find($notifikasiDataBelumDibaca->message6); if ($user) { $userAvatar = URL::to('/assets/images/' . $user->avatar); } }
                                                @endphp
                                                <a href="{{ $userAvatar }}" data-fancybox="mention-foto">
                                                    <img class="avatar-notif" src="{{ $userAvatar }}" loading="lazy">
                                                </a>
                                                <p class="mention-nama">{{ $notifikasiDataBelumDibaca->message4 }}</p>
                                                <p class="mention-waktu">{{ \Carbon\Carbon::parse($notifikasiDataBelumDibaca->message5)->isoFormat('D MMMM [at] h:mm') }}</p>
                                            </div>
                                            <div class="isian-mention-tag">
                                                {{ $notifikasiDataBelumDibaca->message3 }}
                                            </div>
                                        </div>
                                    @endif
                                <br><br></p>
                                <p class="logo-pttati2">
                                    @foreach($result_tema as $sql_user => $aplikasi_tema)
                                        @if ($aplikasi_tema->tema_aplikasi == 'Terang')
                                            <img src="{{ asset('assets/images/Logo_Perusahaan_Merah.png') }}" alt="Logo PT TATI" loading="lazy">
                                            @elseif ($aplikasi_tema->tema_aplikasi == 'Gelap')
                                                <img src="{{ asset('assets/images/Logo_Perusahaan_Putih.png') }}" alt="Logo PT TATI" loading="lazy">
                                        @endif
                                    @endforeach
                                </p><br>
                                <p class="noti-time3">
                                    <i class="fa-solid fa-clock" style="color: #808080;" aria-hidden="true"></i>
                                    <span class="notification-time">{{ $created_at->diffForHumans() }}</span>
                                </p>
                            </div>
                        </div>
                    </li>
                    <div class="close-notifikasi">
                        <a href="#" class="close-notification" data-id="{{ $notifikasi_belum_dibaca->id }}">
                            <button id="close-popup_{{ $notifikasi_belum_dibaca->id }}">Tutup</button>
                        </a>
                    </div>
                </div>
                @endforeach
                @include('allrole.membaca-notifikasi')
                <!-- /Notifikasi Belum Dibaca Modal -->

                <!-- Notifikasi Dibaca Modal -->
                @foreach ($dibaca as $notifikasi_dibaca)
                @php
                    $notifikasiDataDibaca = json_decode($notifikasi_dibaca->data);
                    $created_at = \Carbon\Carbon::parse($notifikasi_dibaca->created_at);
                    $read_at = \Carbon\Carbon::parse($notifikasi_dibaca->read_at);
                @endphp
                <div id="popup-notifikasi_{{ $notifikasi_dibaca->id }}" style="width: 575px;">
                    <li class="notification-message noti-unread">
                        <div class="media">
                            <div class="media-body">
                                <p class="noti-details3"><br>
                                    <a><b>{{ $notifikasiDataDibaca->name }}</b></a><br>
                                    <a>Surabaya / <span id="tanggal-master_{{ $notifikasi_dibaca->id }}"></span> | <span id="waktu-master_{{ $notifikasi_dibaca->id }}"></span></a><br>
                                    <a style="color: #808080; font-weight: 500; font-size: 12px">ID Notifikasi: {{ substr($notifikasi_dibaca->id, 0, 8) }}</a>
                                </p><br>
                                <p class="noti-details2">
                                    @if ($notifikasiDataDibaca->message == 'Selamat Ulang Tahun')
                                        <i>{{ $notifikasiDataDibaca->message2 }} <b>{{ $notifikasiDataDibaca->message3 }}</b> @if (!empty($notifikasiDataDibaca->message4)) {{ $notifikasiDataDibaca->message4 }} @endif
                                        @if (!empty($notifikasiDataDibaca->message5)) {{ $notifikasiDataDibaca->message5 }} @endif<b>@if (!empty($notifikasiDataDibaca->message6)) {{ $notifikasiDataDibaca->message6 }} @endif</b>
                                        Kepada <b>{{ $notifikasiDataDibaca->name }}</b> @if (!empty($notifikasiDataDibaca->message7)) {{ $notifikasiDataDibaca->message7 }} @endif </i>
                                    @endif
                                    @if ($notifikasiDataDibaca->message == 'Mention Tag Description')
                                        <div class="mention-tag-container">
                                            <div class="header-mention-tag">
                                                @php
                                                    $userAvatar = '';
                                                    if (!empty($notifikasiDataDibaca->message6)) { $user = \App\Models\User::find($notifikasiDataDibaca->message6); if ($user) { $userAvatar = URL::to('/assets/images/' . $user->avatar); } }
                                                @endphp
                                                <a href="{{ $userAvatar }}" data-fancybox="mention-foto">
                                                    <img class="avatar-notif" src="{{ $userAvatar }}" loading="lazy">
                                                </a>
                                                <p class="mention-nama">{{ $notifikasiDataDibaca->message4 }}</p>
                                                <p class="mention-waktu">{{ \Carbon\Carbon::parse($notifikasiDataDibaca->message5)->isoFormat('D MMMM [at] h:mm') }}</p>
                                            </div>
                                            <div class="isian-mention-tag">
                                                {{ $notifikasiDataDibaca->message3 }}
                                            </div>
                                        </div>
                                    @endif
                                    @if ($notifikasiDataDibaca->message == 'Mention Tag Checklist')
                                        <div class="mention-tag-container">
                                            <div class="header-mention-tag">
                                                @php
                                                    $userAvatar = '';
                                                    if (!empty($notifikasiDataDibaca->message6)) { $user = \App\Models\User::find($notifikasiDataDibaca->message6); if ($user) { $userAvatar = URL::to('/assets/images/' . $user->avatar); } }
                                                @endphp
                                                <a href="{{ $userAvatar }}" data-fancybox="mention-foto">
                                                    <img class="avatar-notif" src="{{ $userAvatar }}" loading="lazy">
                                                </a>
                                                <p class="mention-nama">{{ $notifikasiDataDibaca->message4 }}</p>
                                                <p class="mention-waktu">{{ \Carbon\Carbon::parse($notifikasiDataDibaca->message5)->isoFormat('D MMMM [at] h:mm') }}</p>
                                            </div>
                                            <div class="isian-mention-tag">
                                                {{ $notifikasiDataDibaca->message3 }}
                                            </div>
                                        </div>
                                    @endif
                                    @if ($notifikasiDataDibaca->message == 'Mention Tag Comment')
                                        <div class="mention-tag-container">
                                            <div class="header-mention-tag">
                                                @php
                                                    $userAvatar = '';
                                                    if (!empty($notifikasiDataDibaca->message6)) { $user = \App\Models\User::find($notifikasiDataDibaca->message6); if ($user) { $userAvatar = URL::to('/assets/images/' . $user->avatar); } }
                                                @endphp
                                                <a href="{{ $userAvatar }}" data-fancybox="mention-foto">
                                                    <img class="avatar-notif" src="{{ $userAvatar }}" loading="lazy">
                                                </a>
                                                <p class="mention-nama">{{ $notifikasiDataDibaca->message4 }}</p>
                                                <p class="mention-waktu">{{ \Carbon\Carbon::parse($notifikasiDataDibaca->message5)->isoFormat('D MMMM [at] h:mm') }}</p>
                                            </div>
                                            <div class="isian-mention-tag">
                                                {{ $notifikasiDataDibaca->message3 }}
                                            </div>
                                        </div>
                                    @endif
                                <br><br></p>
                                <p class="logo-pttati2">
                                    @foreach($result_tema as $sql_user => $aplikasi_tema)
                                        @if ($aplikasi_tema->tema_aplikasi == 'Terang')
                                            <img src="{{ asset('assets/images/Logo_Perusahaan_Merah.png') }}" alt="Logo PT TATI" loading="lazy">
                                            @elseif ($aplikasi_tema->tema_aplikasi == 'Gelap')
                                                <img src="{{ asset('assets/images/Logo_Perusahaan_Putih.png') }}" alt="Logo PT TATI" loading="lazy">
                                        @endif
                                    @endforeach
                                </p><br>
                                <p class="noti-time3">
                                    <i class="fa-solid fa-clock" style="color: #808080;" aria-hidden="true"></i>
                                    <span class="notification-time">{{ $created_at->diffForHumans() }}</span>
                                </p>
                            </div>
                        </div>
                    </li>
                    <div class="close-notifikasi-2">
                        <button type="button" class="close" id="close-popup_{{ $notifikasi_dibaca->id }}">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                @endforeach
                <!-- /Notifikasi Dibaca Modal -->

                <!-- Profil -->
                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img">
                            <i class="fa-solid fa-gear fa-xl" style="color : #66615b"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        @if (Auth::user()->role_name == 'Admin')
                            <a class="dropdown-item" href="{{ route('admin-profile') }}">Profil Saya</a>
                        @endif
                        @if (Auth::user()->role_name == 'User')
                            <a class="dropdown-item" href="{{ route('user-profile') }}">Profil Saya</a>
                        @endif                        
                        @if (Auth::user()->role_name == 'Admin')
                            <a class="dropdown-item" href="{{ route('pengaturan-perusahaan') }}">Pengaturan</a>
                        @endif
                        <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                    </div>
                </li>
            </ul>
            <!-- /Header Menu -->

            <!-- Mobile Menu -->
            <div class="dropdown mobile-user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    @if (Auth::user()->role_name == 'Admin')
                        <a class="dropdown-item" href="{{ route('admin-profile') }}">Profil Saya</a>
                    @endif
                    @if (Auth::user()->role_name == 'User')
                        <a class="dropdown-item" href="{{ route('user-profile') }}">Profil Saya</a>
                    @endif
                    <a class="dropdown-item" href="{{ route('tampilan-semua-notifikasi') }}">Notifikasi</a>
                    @if (Auth::user()->role_name == 'Admin')
                        <a class="dropdown-item" href="{{ route('pengaturan-perusahaan') }}">Pengaturan</a>
                    @endif
                    <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                </div>
            </div>
            <!-- /Mobile Menu -->

        </div>
        <!-- /Header -->
        <!-- Sidebar -->
        @include('sidebar.sidebar')
        <!-- /Sidebar -->
        <!-- Page Wrapper -->
        @yield('content')
        <!-- /Page Wrapper -->
    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="{{ URL::to('assets/js/jquery-3.5.1.min.js') }}"></script>
    <!-- Bootstrap Core JS -->
    <script src="{{ URL::to('assets/js/popper.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/bootstrap.min.js') }}"></script>
    <!-- Chart JS -->
    <script src="{{ URL::to('assets/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ URL::to('assets/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/chart.js') }}"></script>
    <script src="{{ URL::to('assets/js/Chart.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/line-chart.js') }}"></script>
    <!-- Slimscroll JS -->
    <script src="{{ URL::to('assets/js/jquery.slimscroll.min.js') }}"></script>
    <!-- Select2 JS -->
    <script src="{{ URL::to('assets/js/select2.min.js') }}"></script>
    <!-- Datetimepicker JS -->
    <script src="{{ URL::to('assets/js/moment.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <!-- Datatable JS -->
    <script src="{{ URL::to('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Multiselect JS -->
    <script src="{{ URL::to('assets/js/multiselect.min.js') }}"></script>
    <!-- validation-->
    <script src="{{ URL::to('assets/js/jquery.validate.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ URL::to('assets/js/app.js') }}"></script>

    <script>
        @foreach ($belum_dibaca as $notifikasi_belum_dibaca)
            $(document).ready(function() {
                $("#open-popup_{{ $notifikasi_belum_dibaca->id }}").click(function() {
                    $("#popup-notifikasi_{{ $notifikasi_belum_dibaca->id }}").fadeIn();
                });
            });

            $(document).ready(function() {
                document.getElementById('close-popup_{{ $notifikasi_belum_dibaca->id }}').addEventListener('click', function() {
                    document.querySelector('#popup-notifikasi_{{ $notifikasi_belum_dibaca->id }}').style.display = 'none';
                });
            });
        @endforeach
    </script>

    <script>
        @foreach ($dibaca as $notifikasi_dibaca)
            $(document).ready(function() {
                $("#open-popup_{{ $notifikasi_dibaca->id }}").click(function() {
                    $("#popup-notifikasi_{{ $notifikasi_dibaca->id }}").fadeIn();
                });
            });

            $(document).ready(function() {
                document.getElementById('close-popup_{{ $notifikasi_dibaca->id }}').addEventListener('click', function() {
                    document.querySelector('#popup-notifikasi_{{ $notifikasi_dibaca->id }}').style.display = 'none';
                });
            });
        @endforeach
    </script>

    <script src="{{ asset('assets/js/atur-tanggal-waktu-indo-realtime.js') }}"></script>

    <script>
        var toggleBtn = document.getElementById("toggle_btn");
        var logoText = document.querySelector(".logo-text");
        var faUser = document.querySelector(".fa-user");

        toggleBtn.addEventListener("click", function() {
            if (logoText.style.display === "none") {
                logoText.style.display = "inline-block";
                faUser.style.display = "inline-block";
            } else {
                logoText.style.display = "none";
                faUser.style.display = "inline-block";
            }
        });
    </script>

    <!-- FancyBox Foto Profil -->
    <script>
        $(document).ready(function() {
            $('[data-fancybox="mention-foto"]').fancybox({
            });
        });
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <!-- /FancyBox Foto Profil -->

    <script src="{{ asset('assets/js/checking-online.js') }}"></script>
    
    @yield('script')
    
</body>
</html>