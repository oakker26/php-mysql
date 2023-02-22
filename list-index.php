<?php require_once "./template/header.php"; ?>

<div class="container">
     <div class=" row">
          <div class="col-12 ">
               <div class="border rounded p-5 m-5">
                    <?php
                    if(!empty($_SESSION['status'])){
                         echo alert($_SESSION['status']['message']);
                         $_SESSION['status']=null;
                    }
                    ?>
                    <h3> အကြွေး  ပေးရမည့်သူများး </h3>
                    <?php

                    $sql = "SELECT * FROM oks_pr";
                    if(isset($_GET['q'])){
                         $q=$_GET['q'];
                     $sql .=" WHERE name LIKE '%$q%'";    
                    }
                    $query = mysqli_query($conn, $sql);

                    $totalSql="SELECT sum(money) AS total_amount FROM oks_pr";
                   
                    $totalQuery=mysqli_query($conn,$totalSql);

                    ?>
                   <div class='row justify-content-between align-items-center'>
                   <div class=" fw-bold col-4">
                         Total List : <?=$query->num_rows ?>
                    </div>
                    <div class="col-4">
                        <form action="" method="get">
                        <div class="input-group">
                         <input type="text" name="q" value="<?php if(isset($_GET['q'])): ?><?=$_GET['q']?><?php endif ?>" class="form-control">
                              <a href="./list-index.php" class="btn btn-light border">
                                   <i class="bi bi-x-circle"></i>
                              </a>
                         <button class="btn btn-info">search</button>
                        </div>
                        </form>
                    </div>
                   </div>
<table class=" table table-bordered">
                         <thead>
                              <tr>
                                   <th>NO</th>
                                   <th>Name</th>
                                   <th>Money</th>
                                   <th>Controls</th>
                                   <th>Created At</th>
                              </tr>
                         </thead> 
                         <tbody>
                              <?php while($row=mysqli_fetch_assoc($query)): ?>;
                                   <tr class="align-middle">
                                   <td><?= $row["id"] ?></td>
                                   <td><?= $row["name"] ?></td>
                                   <td class="text-end" ><?= $row["money"] ?></td>
                                   <td>
                                        <a href=""></a>
                                        <a href="./list-update.php?id=<?=$row['id']?>" class="btn btn-info">update</a>
                                        <form action="./list-delete.php" class="d-inline-block" method="post">
                                             <input type="hidden" name="id" value="<?=$row['id']?>">
                                        <button  onclick="return confirm('are you sure to deleted??')" class="btn btn-danger">delete</button>

                                        </form>
                                   </td>

                                   <td>
                                   <p class=" small">
                                        <i class="bi bi-calendar-heart"></i>
                                        <?= DateTime($row['create_at']) ?></p>
                                   <p class="mb-0 small">
                                        <i class="bi bi-clock-history"></i>
                                        <?= DateTime($row['create_at'],"g:i:sa") ?></p>
                                   </td>
                                   </tr>
                              <?php endwhile ?>;

                         </tbody>
                         <tfoot>
                              <tr>
                              <td colspan="2">Total</td>
                                   <td class="text-end" colspan=" 1"><?= mysqli_fetch_assoc($totalQuery)['total_amount']?></td>
                                   <td colspan="2"></td>
                              </tr>
                         </tfoot>
                    </table>
               </div>
          </div>
     </div>
</div>



<?php require_once "./template/footer.php"; ?>
