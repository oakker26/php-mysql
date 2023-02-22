<?php require_once "./template/header.php"; ?>

<div class="container mt-4">
     <div class=" row justify-content-center">
          <div class="col-12 col-lg-6  ">
               <div class="border p-5 m-5 rounded">
                    <h2 class=" fs-2 mb-3">Create List</h2>
                    <?php

                    if ($_SERVER["REQUEST_METHOD"] === "POST") {
                         $name = $_POST['name'];
                         $money = $_POST['money'];
                         $sql = "INSERT INTO oks_pr (name,money) Value
                          ('$name',$money)";
                         if( mysqli_query($conn,$sql)){
                              echo alert("greate job","success");
                         }
                    }


                    ?>
                    <form action="" method="post">
                         <div>
                              <label class="form-label" for="">Name</label>
                              <input class="form-control" type="text" name="name" required>
                         </div>
                         <div>
                              <label class="form-label mt-3" for="">money</label>
                              <input class="form-control" type="number" name="money" required>
                         </div>
                         <button class="btn btn-info mt-4 text-white">Create</button>
                    </form>
               </div>
          </div>
     </div>
</div>



<?php require_once "./template/footer.php"; ?>