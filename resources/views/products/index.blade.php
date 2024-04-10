<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kleding2</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <style>
        /* Your Tailwind CSS styles here */
        /* Note: Tailwind CSS classes are used directly in the HTML for styling */
        /* You can adjust these styles as needed */
        .table {
            border-collapse: collapse;
            width: 100%;
        }
        .table th, .table td {
            border: 1px solid #e2e8f0;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #edf2f7;
            font-weight: bold;
            cursor: pointer; /* Add cursor pointer to indicate clickable header */
        }
        .table tr:nth-child(even) {
            background-color: #f7fafc;
        }
        .table tr:hover {
            background-color: #e2e8f0;
        }
        .filter-group {
            margin-bottom: 20px;
        }
        .filter-title {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .filter-item {
            margin-left: 20px;
            margin-bottom: 5px;
        }
    </style>
</head>
<body class="bg-gray-100">
<nav class="bg-gray-800 text-white p-4">
    <div class="container mx-auto">
        <a href="/" class="font-bold">Home</a>
        <a href="{{ route('categories.index') }}" class="ml-4">Categories</a>
        <a href="{{ route('products.index') }}" class="ml-4">Products</a>
    </div>
</nav>

<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Products</h1>

    <div class="filter-group">
        <div class="filter-title">Product title</div>
        <label for="product-title-filter"></label><input type="text" class="search-input" id="product-title-filter">
    </div>

    {{--    @foreach ($products as $product)--}}
    {{--        <div>--}}
    {{--            <h3>{{ $product->name }}</h3>--}}
    {{--            <p>Price: {{ $product->price }}</p>--}}
    {{--            <p>Size: {{ $product->size }}</p>--}}
    {{--            <p>Categories:</p>--}}
    {{--            <ul>--}}
    {{--                @foreach ($product->categories as $category)--}}
    {{--                    <li>{{ $category->name }}</li>--}}
    {{--                @endforeach--}}
    {{--            </ul>--}}
    {{--        </div>--}}
    {{--    @endforeach--}}

    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Size</th>
        </tr>
        </thead>
        <tbody id="product-table-body">
        @foreach ($products as $product)
            <div>
                <h3>{{ $product->name }}</h3>
                <p>Price: {{ $product->price }}</p>
                <p>Size: {{ $product->size }}</p>
                <p>Categories:</p>
                <ul>
                    @foreach ($product->categories as $category)
                        <li>{{ $category->name }}</li>
                    @endforeach
                </ul>
            </div>
        @endforeach
        </tbody>
    </table>
</div>

<script src="{{ mix('js/app.js') }}"></script>
<script>
    document.getElementById('product-title-filter').addEventListener('keyup', function() {
        filterProductTitles();
    });

    function filterProductTitles() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById('product-title-filter');
        filter = input.value.toUpperCase();
        table = document.querySelector('.table');
        tr = table.getElementsByTagName('tr');
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName('td')[0]; // Get the first column (Name)
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = '';
                } else {
                    tr[i].style.display = 'none';
                }
            }
        }
    }
</script>
</body>
</html>
