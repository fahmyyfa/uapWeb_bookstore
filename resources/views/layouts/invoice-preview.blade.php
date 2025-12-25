<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Invoice Preview</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body class="bg-gray-100 py-10">
    @yield('content')
</body>
</html>
