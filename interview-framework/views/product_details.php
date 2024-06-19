<?php require_once 'templates/header.php'; ?>

<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Product Details</h2>
    <?php if ($product): ?>
        <div class="bg-white shadow-md rounded p-4">
            <p><span class="font-bold">Name:</span> <?php echo htmlspecialchars($product['name']); ?></p>
            <p><span class="font-bold">Description:</span> <?php echo htmlspecialchars($product['description']); ?></p>
            <p><span class="font-bold">Price:</span> $<?php echo htmlspecialchars($product['price']); ?></p>
            <p><span class="font-bold">Category:</span> <?php echo htmlspecialchars($product['category']); ?></p>
           
        </div>
    <?php else: ?>
        <p class="text-red-500">Product not found.</p>
    <?php endif; ?>
    <a href="index.php" class="block mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Back</a>
</div>

<?php require_once 'templates/footer.php'; ?>
