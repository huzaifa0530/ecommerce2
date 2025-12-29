<head>
    <title>@yield('title', 'My App')</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Citrus Talent  Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords"
        content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, Citrus Talent , Citrus Talent  bootstrap admin template, free admin theme, free dashboard template" />
    <meta name="author" content="CodedThemes" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user-role" content="{{ Auth::user()->role->name ?? 'No Role' }}">


    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('Admin/assets/images/favicon.ico')}}" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{ asset('Admin/assets/fonts/fontawesome/css/fontawesome-all.min.css') }}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{ asset('Admin/assets/plugins/animation/css/animate.min.css') }}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('Admin/assets/css/style.css') }}">
    <!-- DataTables Bootstrap 4 CSS -->
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap4.min.css" rel="stylesheet">

    <style>
        .btn-icon {
            width: 36px;
            height: 36px;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.375rem !important;
        }

        .table td,
        .table th {
            vertical-align: middle;
        }

        .profile-header {
            text-align: center;
            padding: 2rem 1rem;
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: #fff;
            border-radius: 8px 8px 0 0;
        }

        .profile-header img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid #fff;
            margin-bottom: 1rem;
            object-fit: cover;
        }

        .profile-card {
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .profile-form label {
            font-weight: 600;
            color: #333;
        }

        .btn-save {
            width: 100%;
            font-weight: 600;
        }


        .dropdown-item:active,
        .dropdown-item:focus,
        .dropdown-item:hover {
            background-color: rgba(150, 202, 74, 0.1) !important;
            color: inherit !important;
        }

        .color-picker {
            width: 100%;
            height: calc(3.25rem + 2px);
            padding: .375rem .75rem;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            background-color: #fff;
        }
        .color-row{
            gap: 30px;
        }
    </style>
</head>