<?php
require 'header.php';

// Define the number of records per page
$records_per_page = 5;

// Get the current page number from the URL, default to 1
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the OFFSET for the SQL query
$offset = ($current_page - 1) * $records_per_page;

// Get total number of records
$total_sql = "SELECT COUNT(*) AS total_records FROM `student`";
$total_result = mysqli_query($conn, $total_sql);
$total_row = mysqli_fetch_assoc($total_result);
$total_records = $total_row['total_records'];

// Calculate total pages
$total_pages = ceil($total_records / $records_per_page);

// Fetch the records for the current page
$sql = "SELECT * FROM `student` LIMIT $records_per_page OFFSET $offset";
$result = mysqli_query($conn, $sql);

if (!$result) {
  die("Query Failed: " . mysqli_error($conn));
}
?>

<div class="row">
  <div class="col-8 text-center h2"> All Students </div>
  <div class="col-4 text-center h2">
    <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Student</button>
  </div>
</div>

<!-- Alert Messages -->
<?php
if (isset($_GET['successful'])) {
  echo "<div class='alert alert-success text-center'>" . $_GET['successful'] . "</div>";
}
?>

<?php
if (isset($_GET['message'])) {
  echo "<div class='alert alert-danger text-center'>" . $_GET['message'] . "</div>";
}
?>

<?php
if (isset($_GET['update'])) {
  echo "<div class='alert alert-success text-center'>" . $_GET['update'] . "</div>";
}
?>

<?php
if (isset($_GET['msg'])) {
  echo "<div class='alert alert-danger text-center'>" . $_GET['msg'] . "</div>";
}
?>

<table class="table table-bordered table-hover table-striped text-center shadow">
  <tr class="t-row">
    <th class="thead">ID</th>
    <th class="thead">Name</th>
    <th class="thead">Last Name</th>
    <th class="thead">Age</th>
    <th class="thead">Action</th>
  </tr>

  <?php
  while ($row = mysqli_fetch_assoc($result)) {
  ?>
    <tr class="t-row">
      <td class="td"><?php echo $row['id']; ?> </td>
      <td class="td"><?php echo $row['name']; ?> </td>
      <td class="td"><?php echo $row['last_name']; ?> </td>
      <td class="td"><?php echo $row['age']; ?> </td>
      <td class="td">
        <a href="update.php?id=<?php echo $row['id']; ?>"><button class="btn btn-warning me-4">Edit&nbsp;<i class="fas fa-edit"></i></button></a>
        <a href="delete.php?id=<?php echo $row['id']; ?>"><button class="btn btn-danger"><i class="fas fa-trash"></i></button></a>
      </td>
    </tr>
  <?php
  }
  ?>
</table>

<!-- Pagination -->
<div class="pagination" style="text-align: center;">
  <?php
  if ($current_page > 1) {
    echo "<a href='?page=" . ($current_page - 1) . "' class='btn btn-primary'>Previous</a>";
  }

  for ($page = 1; $page <= $total_pages; $page++) {
    if ($page == $current_page) {
      echo "<a href='?page=$page' class='btn btn-secondary'>$page</a>";
    } else {
      echo "<a href='?page=$page' class='btn btn-outline-primary'>$page</a>";
    }
  }

  if ($current_page < $total_pages) {
    echo "<a href='?page=" . ($current_page + 1) . "' class='btn btn-primary'>Next</a>";
  }
  ?>
</div>

<!-- Modal Add Student -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Student</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="add.php" method="POST">
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" required>
          </div>
          <div class="form-group">
            <label for="lastname">Last Name:</label>
            <input type="text" class="form-control" id="lastname" placeholder="Enter your last name" name="last_name" required>
          </div>
          <div class="form-group mb-3">
            <label for="age">Age:</label>
            <input type="number" class="form-control" id="age" placeholder="Enter your age" name="age" required>
          </div>
          <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success" name="add_students" value="Add Student">Add Student</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
require 'footer.php';
?>