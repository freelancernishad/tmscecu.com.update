<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>:: {{ sitedetails()->SCHOLL_NAME }} :: {{ sitedetails()->SCHOLL_ADDRESS }}</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset(sitedetails()->logo) }}" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Favicon -->
    {{-- <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png"> --}}
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard_asset/css/normalize.css') }}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard_asset/css/main.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard_asset/css/bootstrap.min.css') }}">
    <!-- Fontawesome CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('dashboard_asset/css/all.min.css') }}"> --}}
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v6.4.0/css/pro.min.css" />
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard_asset/fonts/flaticon.css') }}">

    <link rel="stylesheet" href="{{ asset('dashboard_asset/style.css?v=1.0.0') }}">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.maateen.me/kalpurush/font.css" rel="stylesheet">
<style>

.page-item.active .page-link {

    background-color: var(--defaultColor) !important;
    border-color: var(--defaultColor) !important;
}
.page-link {

    color: var(--defaultColor) !important;

}
li.page-item.active button {
    color: white !important;
}

.a.btn.btn-info,.btn.btn-primary {
    padding: 4px 15px;
    font-size: 25px;
}




</style>

<style>


    .modal-dialog {
        max-width: 1250px;
        margin: 1.75rem auto;
    }


    .Present:checked+label.Present {
        background: green
    }

    .att {
        background: #647a84;
        padding: 10px;
        color: #fff
    }

    input[type=radio]:checked+label {
        background: red;
        padding: 10px;
        color: #fff;
        font-size: 15px
    }

    label {
        font-size: 15px
    }

    button.btn-fill-lg.btn-gradient-yellow.btn-hover-bluedark {
        padding: 7px 7px;
        margin-top: 20px;
    }
    .filePreview {
        height: 80%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    a.item {padding: 7px;font-size: 13px;border: 1px solid #ffac01;margin: 0 2px;transition: all 0.2s;border-radius: 2px;}

    a.item:hover {background: #ffab01;color: white;cursor: pointer;}

    a.item.active {background: #ffac01;}
    .image-container.position-relative.text-center {
        width: 100% !important;
    }
    .container.flip-clock {
        position: fixed;
        top: 70px;
        left: 42%;
    }


        @media(max-width:767px){
            .btn-fill-md, .btn-fill-lg, .fw-btn-fill, .btn-fill-lmd {
        font-size: 13px;
        padding: 8px 15px;
    }
    th, th label {
        font-size: 13px !important;
    }td {
        font-size: 12px;

    }

    .tablecolhide{
        display: none;
    }
    .textwrap{
        white-space: break-spaces;
    }
    .mobilefonthead {
        font-size: 14px;
    }

    .fixednav {
        position: fixed;
        width: 100%;
        z-index: 10;
    }


        }
        .minheight{
            height: 150px;
        }
        input.btn-fill-lg.btn-gradient-yellow.btn-hover-bluedark {
            background: var(--bgColor2) !important;
        }
    </style>

    {{-- <link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.12.1/css/dataTables.semanticui.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.semanticui.min.css"> --}}

</head>
<body style="font-family: 'Kalpurush', sans-serif;">

<?php

    // print_r($classess);
    // die();
    ?>

    <div id="app">
        <component :is="$route.meta.layout || 'div'"   :user="{{Auth::user()}}"   :classes-list="{{ $classess }}" :school_detials="{{ $school_detials }}">
            <router-view />
          </component>
    </div>




<script src="{{ asset('js/backend.js?ver=1.2.65') }}"></script>




<!-- Popper js -->
<script src="{{ asset('dashboard_asset/js/popper.min.js') }}"></script>
<!-- Bootstrap js -->
<script src="{{ asset('dashboard_asset/js/bootstrap.min.js') }}"></script>
{{-- <script src="{{ asset('js/datatables.min.js') }}"></script> --}}
</body>
</html>
