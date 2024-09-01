<?php
// Example inventory data (you can replace this with actual database fetching later)
include_once("../../app/model/fetchDB.php");
$inventory = fetchInventory($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management</title>
    <link rel="stylesheet" href="../../static/css/admin/inventory.css">
</head>
<body>
    <section class="inventory ">
        <div class="inventorySummary">
            <h3>Inventory Overview</h3>
            <div class="inventory-overview">
                <p>Total Items: <span id="total-items"><?= count($inventory) ?></span></p>
                <p>Low Stock Alerts: <span id="low-stock"><?= count(array_filter($inventory, fn($item) => $item['stock'] <= 0)) ?></span></p>
                <p>Out of Stock: <span id="out-of-stock"><?= count(array_filter($inventory, fn($item) => $item['stock'] == 0)) ?></span></p>
            </div>
        </div>
        <div class="inventoryUpdate">
            <h2>Inventory List</h2>
            <table class="inventory-table">
                <thead>
                    <tr>
                    <th>SKU/ID</th>

                        <th>Item Name</th>
                        <th>Category</th>
                        <th>Quantity in Stock</th>
                        <th>Sold</th>
                        <th>Price</th>
                        <th>Image Path</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                    foreach ($inventory as $item): ?>
                        <tr>
                        <td><?= htmlspecialchars($item['productID']) ?></td>
                        <td><?= htmlspecialchars($item['prod_Name']) ?></td>
                        <td><?= htmlspecialchars($item['category']) ?></td>
                        <td><?= htmlspecialchars($item['stock']) ?></td>
                        <td><?= htmlspecialchars($item['sold']) ?></td>
                        <td>Rs. <?= htmlspecialchars($item['price']) ?></td>
                        <td><img src="<?='../../' .htmlspecialchars($item['prod_image']) ?>" alt="<?= htmlspecialchars($item['prod_Name']) ?>" class="product-image"></td>
                        <td>
                            <form method="POST" action="inventory.php">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($item['productID']) ?>">
                                <button type="submit" name="edit_item" class="edit-btn">Edit</button>
                                <button type="submit" name="delete_item" class="delete-btn">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <form method="POST" action="inventory.php">
                <h3>Add New Item</h3>
                <input type="text" name="name" placeholder="Item Name" required>
                <input type="text" name="category" placeholder="Category" required>
                <input type="number" name="quantity" placeholder="Quantity in Stock" required>
                <input type="number" name="reorder_level" placeholder="Reorder Level" required>
                <input type="number" step="0.01" name="price" placeholder="Price" required>
                <input type="text"  name="img_url" placeholder="img path" required>
                
                <button type="submit" name="add_item" class="add-item-btn">Add New Item</button>
            </form>
        </div>
    </section>
</body>
</html>
