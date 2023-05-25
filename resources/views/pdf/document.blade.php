<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $doc_type->descripcion }} - {{ $customer->nombre }}</title>
    <style>
        /* Estilos CSS para el diseño de la impresión */
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        h1 {
            font-size: 16px;
            margin-bottom: 10px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 5px;
        }
        th {
            background-color: #f5f5f5;
        }
        .message {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>
    <h1>{{ $doc_type->descripcion }} - {{ $customer->nombre }}</h1>
    <table>
        <thead>
            <tr>
                <th>Cedula</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $customer->ci }}</td>
                <td>{{ $customer->nombre }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
