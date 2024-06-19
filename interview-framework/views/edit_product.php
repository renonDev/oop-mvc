<?php require_once 'templates/header.php'; ?>

<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Edit Product</h2>
    <form action="?route=update" method="POST" class="bg-white shadow-md rounded p-4">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($product['id']); ?>">
        
        <div class="mb-4">
            <label for="name" class="block text-sm font-bold mb-2">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        
        <div class="mb-4">
            <label for="description" class="block text-sm font-bold mb-2">Description:</label>
            <textarea id="description" name="description" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><?php echo htmlspecialchars($product['description']); ?></textarea>
        </div>
        
        <div class="mb-4">
            <label for="price" class="block text-sm font-bold mb-2">Price:</label>
            <input type="number" step="0.01" id="price" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        
        <div class="mb-4">
            <label for="category" class="block text-sm font-bold mb-2">Category:</label>
            <input type="text" id="category" name="category" value="<?php echo htmlspecialchars($product['category']); ?>" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        
        <div class="flex items-center justify-between">
            <input type="submit" value="Update Product" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        </div>
    </form>
</div>

<?php require_once 'templates/footer.php'; ?>
