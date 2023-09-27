<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>O</title>

    <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        table {
            border-collapse: collapse;
            border: 1px solid black;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;

        }

        tr:nth-child(even) {
            background-color: #D6EEEE;
        }

        .table-header {
            border-collapse: collapse;
            border: 1px solid black;
            width: 100%;
        }

        .table-header td {

            padding: 10px 5px;
            border-style: solid;
            border-width: 1px;
            overflow: hidden;
            word-break: normal;
            border-color: black;
        }

        .table-header th {
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: normal;
            padding: 10px 5px;
            border-style: solid;
            border-width: 1px;
            overflow: hidden;
            word-break: normal;
            border-color: black;
        }

        .table-header .img {
            text-align: center
        }

        .table-header .title {
            font-weight: bold;
            text-align: center
        }
    </style>

</head>

<body>
    <div class="card mt-2">
        <!--contenido variable para cada pagina-->
        @yield('content')
    </div>
</body>

</html>
