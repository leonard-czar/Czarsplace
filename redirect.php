<?php function sanitize($data)
{
  $data = trim($data);
  $data = strtolower($data);
  return $data;
} ?>
<link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.css">
<?php
if (isset($_REQUEST['btnsearch'])) {
  if (sanitize($_REQUEST['searchbox']) == "male" || sanitize($_REQUEST['searchbox']) == "men") {
    header("Location: malewatches.php");
    exit;
  }
  if (sanitize($_REQUEST['searchbox']) == "female" || (sanitize($_REQUEST['searchbox'])) == "ladies" || (sanitize($_REQUEST['searchbox'])) == "women") {
    header("Location: femalewatches.php");
    exit;
  }
  if (sanitize($_REQUEST['searchbox']) == "rolex") {
    header("Location: rolexdash.php");
    exit;
  }
  if (sanitize($_REQUEST['searchbox']) == "hublot") {
    header("Location: hublotdash.php");
    exit;
  }
  if (sanitize($_REQUEST['searchbox']) == "audemars" || sanitize($_REQUEST['searchbox']) == "audemars piguet") {
    header("Location: audemarsdash.php");
    exit;
  } else {
    echo "<div class='col-sm alert alert-danger text-center'><h3>Invalid search please try again </h3></div>";
    echo "<div class='col-sm text-center '><a href='dashboard.php' class='text-primary'>Back</a></div>";
  }
}

?>