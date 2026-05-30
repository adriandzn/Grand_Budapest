<?php
$search_query = "";
$amenity_sql = "SELECT * FROM tbl_amenitydetails";

if (isset($_POST['btnsearch']) && !empty($_POST['searchinput'])) {
    $search_query = $conn->real_escape_string($_POST['searchinput']);
    $amenity_sql .= " WHERE amenity_id LIKE '%$search_query%' 
                      OR amenity_name LIKE '%$search_query%' 
                      OR description LIKE '%$search_query%'";
}
$amenity_sql .= " ORDER BY amenity_id DESC";
$amenities = $conn->query($amenity_sql);
?>

<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
    <div class="font-title text-darkbrown fs-2 fw-bold">Amenities</div>
    
    <form method="POST" action="" class="d-flex gap-2 w-100 mobile-w-auto" style="max-width: 400px;">
        <input type="search" name="searchinput" value="<?php echo isset($_POST['searchinput']) ? htmlspecialchars($_POST['searchinput']) : ''; ?>" placeholder="Search amenities..." class="form-control rounded-pill border-secondary shadow-sm">
        <button type="submit" name="btnsearch" class="btn pink-button text-dark px-4 rounded-pill fw-semibold shadow-sm">Search</button>
    </form>
</div>

<div class="bg-white rounded-4 shadow-sm p-4">
    <?php if ($amenities->num_rows > 0): ?>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Amenity Name</th>
                        <th>Description</th>
                        <th>Price Per Use</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($amn = $amenities->fetch_assoc()) { ?>
                    <tr>
                        <td>#<?php echo $amn['amenity_id']; ?></td>
                        <td class="fw-bold"><?php echo htmlspecialchars($amn['amenity_name']); ?></td>
                        <td><?php echo htmlspecialchars($amn['description']); ?></td>
                        <td>₱<?php echo number_format($amn['price_per_use'], 2); ?></td>
                        <td><button class="btn btn-sm btn-outline-secondary">Edit</button></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="text-center py-4 text-muted font-body">No matching amenities found.</div>
    <?php endif; ?>
</div>