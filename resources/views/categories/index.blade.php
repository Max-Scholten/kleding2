<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kleding2</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Categories</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="filter-group">
            <div class="filter-title">Name Search</div>
            <div class="search-bar">
                <label for="name-search"></label><input type="text" class="search-input" id="name-search" placeholder="Search by name...">
            </div>
        </div>

        <div class="filter-group">
            <div class="filter-title">Price Search</div>
            <div class="search-bar">
                <label for="price-search"></label><input type="text" class="search-input" id="price-search" placeholder="Search by price...">
            </div>
        </div>

        <div class="filter-group">
            <div class="filter-title">Size Search</div>
            <div class="search-bar">
                <label for="size-search"></label><input type="text" class="search-input" id="size-search" placeholder="Search by size...">
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($categories as $category)
            <div class="filter-group ">
                <div class="filter-title text-lg font-semibold ">{{ $category->category_name }}</div><!--Couldn't find out to assign different colors to the category names-->
                <table class="table w-full">
                    <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-left">Name</th>
                        <th class="px-4 py-2 text-left">Price </th>
                        <th class="px-4 py-2 text-left">Size</th>
                    </tr>
                    </thead>
                    <tbody id="product-table-body">
                    @foreach ($category->products as $product)
                        <tr>
                            <td class="px-4 py-2 border-b">{{ $product->name }}</td>
                            <td class="px-4 py-2 border-b">€ {{ $product-> price }}</td>
                            <td class="px-4 py-2 border-b">{{ $product->size }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>

</div>

<script>
    const nameSearchInput = document.getElementById('name-search');
    const sizeSearchInput = document.getElementById('size-search');

    function filterProducts() {
        const nameFilter = nameSearchInput.value.toUpperCase();
        const sizeFilter = sizeSearchInput.value.toUpperCase();

        const tables = document.querySelectorAll('.table');
        tables.forEach(function(table) {
            const tr = table.getElementsByTagName('tr');
            for (let i = 1; i < tr.length; i++) {
                let found = false;
                const nameTd = tr[i].getElementsByTagName('td')[0];
                const sizeTd = tr[i].getElementsByTagName('td')[2];
                const nameValue = nameTd.textContent || nameTd.innerText;
                const sizeValue = sizeTd.textContent || sizeTd.innerText;

                if (nameFilter && sizeFilter) {
                    if (nameValue.toUpperCase().indexOf(nameFilter) > -1 && sizeValue.toUpperCase().indexOf(sizeFilter) > -1) {
                        found = true;
                    }
                } else if (nameFilter) {
                    if (nameValue.toUpperCase().indexOf(nameFilter) > -1) {
                        found = true;
                    }
                } else if (sizeFilter) {
                    if (sizeValue.toUpperCase().indexOf(sizeFilter) > -1) {
                        found = true;
                    }
                }

                if (found) {
                    tr[i].style.display = '';
                } else {
                    tr[i].style.display = 'none';
                }
            }
        });
    }

    nameSearchInput.addEventListener('keyup', filterProducts);
    sizeSearchInput.addEventListener('keyup', filterProducts);
</script>
</body>
</html>
