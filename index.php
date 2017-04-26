

<?php include_once 'config.php'; ?>

<?php include_once 'header.php'; ?>

<div class="clearfix"></div>

<div class="container">
<a href="create.php" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Add Records</a>
</div>

<div class="clearfix"></div><br />

<div class="container">
<table class="table table-bordered table-responsive">
    <tr>
      <th>#</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Bio</th>
      <th colspan="4" align="center">Actions</th>
    </tr>
    <?php
    $query = "SELECT * FROM inventors";
    $db->dataview($query);
    ?>
    <tr>
            <td colspan="7" align="center">
        <div class="pagination-wrap">
                <?php //$db->paginglink($query,$records_per_page); ?>
             </div>
            </td>
        </tr>
</table>
</div>

<?php include_once 'footer.php';
