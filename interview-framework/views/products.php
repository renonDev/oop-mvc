<?php require_once 'views/templates/header.php'; ?>

<h1 class="text-3xl font-bold mb-4">Product List</h1>

<?php if (!empty($products)): ?>
    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-gray-200">
            <tr>
                <th class="py-2 px-4">Name</th>
                <th class="py-2 px-4">Description</th>
                <th class="py-2 px-4">Price</th>
                <th class="py-2 px-4">Category</th>
                <th class="py-2 px-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr class="border-t">
                    <td class="py-2 px-4"><?php echo $product['name']; ?></td>
                    <td class="py-2 px-4"><?php echo $product['description']; ?></td>
                    <td class="py-2 px-4">$<?php echo $product['price']; ?></td>
                    <td class="py-2 px-4"><?php echo $product['category']; ?></td>
                    <td class="py-2 px-4">
                        <div class="flex space-x-2">
                            <form action="?route=delete" method="POST">
                                <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                                <button type="submit" class="bg-red-500 text-white py-1 px-2 rounded">Delete</button>
                            </form>
                            <form action="?route=details" method="POST">
                                <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                                <button type="submit" class="bg-blue-500 text-white py-1 px-2 rounded">Details</button>
                            </form>
                            <form action="?route=edit" method="POST">
                                <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                                <button type="submit" class="bg-yellow-500 text-white py-1 px-2 rounded">Edit</button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p class="text-red-500">No products available.</p>
        <?php endif; ?>
        
        <button class="bg-green-500 text-white py-2 px-4 rounded mt-4">
            <a href="views/create_product.php">Create</a>
        </button>
<?php require_once 'views/templates/footer.php'; ?>
