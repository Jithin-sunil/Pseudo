<?php
include('../Asset/Connection/Connection.php');
include('SessionValidator.php');
include('Header.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>All works</title>
  
  <!-- CSS FILES -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
  <link href="../Asset/Templates/Main/css/bootstrap.min.css" rel="stylesheet">
  <link href="../Asset/Templates/Main/css/bootstrap-icons.css" rel="stylesheet">
  <link href="../Asset/Templates/Main/css/templatemo-topic-listing.css" rel="stylesheet">
  
</head>

<body>
  <section class="explore-section section-padding" id="section_2">
    <div class="container">
      <div class="col-12 text-center">
        <h2 class="mb-4">Browse Works</h1>
      </div>
    </div>
    

    <div class="col-lg-8 col-12 mx-auto">
      <form method="get" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search">
        <div class="input-group input-group-lg">
          <span class="input-group-text bi-search" id="basic-addon1"></span>
          <input name="keyword" type="search" class="form-control" id="keyword" placeholder="Design, Code, Marketing, Finance ..." aria-label="Search">
          <button type="submit" class="form-control">Search</button>
        </div>
      </form>
    </div>

    <div class="container-fluid">
      <div class="row">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="tab-all" data-bs-toggle="tab" data-bs-target="#tab-pane-all" type="button" role="tab" aria-controls="tab-pane-all" aria-selected="true">ALL</button>
          </li>
          <?php
          $selqry = "SELECT * FROM tbl_category";
          $category = $con->query($selqry);
          while ($data = $category->fetch_assoc()) {
          ?>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="tab-<?php echo $data['category_id'] ?>" data-bs-toggle="tab" data-bs-target="#tab-pane-<?php echo $data['category_id'] ?>" type="button" role="tab" aria-controls="tab-pane-<?php echo $data['category_id'] ?>" aria-selected="false"><?php echo $data['category_name'] ?></button>
            </li>
          <?php
          }
          ?>
        </ul>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-pane-all" role="tabpanel" aria-labelledby="tab-all" tabindex="0">
              <div class="row mb-4">
                <?php
                $selAll = "SELECT * FROM tbl_work w INNER JOIN tbl_subcat s ON w.subcat_id=s.subcat_id";
                $allWorks = $con->query($selAll);
                while ($data = $allWorks->fetch_assoc()) {
                ?>
                  <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="custom-block bg-white shadow-lg">
                      <a href="Work_Details.php?wid=<?php echo $data['work_id']; ?>">
                        <div class="d-flex">
                          <div>
                            <h5 class="mb-2"><?php echo $data['work_name'] ?></h5>
                            <p class="mb-0"><?php echo $data['work_price'] ?></p>
                            <p class="mb-0"><?php echo $data['subcat_name'] ?></p>
                          </div>
                          <!-- <span class="badge bg-design rounded-pill ms-auto">14</span> -->
                        </div>
                        <p class="mt-2"><?php echo substr($data['work_details'], 0, 100); ?>...</p> <!-- Description field -->
                      </a>
                      </a>
                    </div>
                  </div>
                <?php
                }
                ?>
              </div>
            </div>
            <?php
            $resCat = $con->query($selqry);
            while ($dataCat = $resCat->fetch_assoc()) {
            ?>
              <div class="tab-pane fade" id="tab-pane-<?php echo $dataCat['category_id'] ?>" role="tabpanel" aria-labelledby="tab-<?php echo $dataCat['category_id'] ?>" tabindex="0">
                <div class="row mb-4">
                  <?php
                  $selqry = "SELECT * FROM tbl_work w INNER JOIN tbl_subcat s ON w.subcat_id=s.subcat_id WHERE category_id=" . $dataCat['category_id'];
                  $work = $con->query($selqry);
                  while ($data = $work->fetch_assoc()) {
                  ?>
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                      <div class="custom-block bg-white shadow-lg">
                      <a href="Work_Details.php?wid=<?php echo $data['work_id']; ?>">
                          <div class="d-flex">
                            <div>
                              <h5 class="mb-2"><?php echo $data['work_name'] ?></h5>
                              <p class="mb-0"><?php echo $data['work_price'] ?></p>
                              <p class="mb-0"><?php echo $data['subcat_name'] ?></p>
                            </div>
                            <!-- <span class="badge bg-design rounded-pill ms-auto">14</span> -->
                          </div>
                          <p class="mt-2"><?php echo substr($data['work_details'], 0, 100); ?>...</p> <!-- Description field -->
                      </a>
                        </a>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- JAVASCRIPT FILES -->
  <script src="../Asset/Templates/Main/js/jquery.min.js"></script>
  <script src="../Asset/Templates/Main/js/bootstrap.bundle.min.js"></script>
  <script src="../Asset/Templates/Main/js/jquery.sticky.js"></script>
  <script src="../Asset/Templates/Main/js/click-scroll.js"></script>
  <script src="../Asset/Templates/Main/js/custom.js"></script>
</body>

<?php include('Footer.php'); ?>

</html>