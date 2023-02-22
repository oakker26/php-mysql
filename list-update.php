<?php require_once "./template/header.php"; ?>

<div class="container mt-4">
     <div class=" row justify-content-center">
          <div class="col-12 col-lg-6  ">
               <div class="border p-5 m-5 rounded">
                    <h2 class=" fs-2 mb-3">Update</h2>
                    <?php
                    $id=$_GET["id"];
                    $sql="SELECT * FROM oks_pr WHERE id=$id";
                    $query=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_assoc($query);

                    ?>
                    <form action="./list-update-info.php" method="post">
                         <input type="hidden" name="id" value="<?=$row["id"]?>">
                         <div>
                              <label class="form-label" for="">Name</label>
                              <input class="form-control" type="text" name="name" value="<?= $row["name"]?>" required>
                         </div>
                         <div>
                              <label class="form-label mt-3" for="">money</label>
                              <input class="form-control" type="number" name="money" value="<?= $row["money"]?>" required>
                         </div>
                         <button class="btn btn-info mt-4 text-white">Update</button>
                    </form>
               </div>
          </div>
     </div>
</div>



<?php require_once "./template/footer.php"; ?>