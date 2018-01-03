<?php
    include_once 'header.php';
?>

    <section class="main-container">
        <div class="main-wrapper">
            <h2>Home</h2>

            <h3>Please login to see the shopping cart.</h3>
            <?php
                if (isset($_SESSION['u_id'])){
                    echo "You are logged in!";

                    if ($_SESSION['u_admin']=="1"){
                        echo "<p>Welcome Administrator!</p>";
                    }
                    include 'includes/dbh.php';
                    $query = "SELECT * FROM tbl_product ORDER BY id ASC";  
                    $result = mysqli_query($conn, $query);  
                    if(mysqli_num_rows($result) > 0)  
                    {  
                         while($row = mysqli_fetch_array($result))  
                         {  
                    ?>  
                    <div class="col-md-4">  
                         <form method="post" action="index.php?action=add&id=<?php echo $row["id"]; ?>">  
                              <div class="cart" align="center">  
                                   <img src="<?php echo $row["image"]; ?>" class="img-responsive" /><br />  
                                   <h4 class="text-info"><?php echo $row["name"]; ?></h4>  
                                   <h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>  
                                   <input type="text" name="quantity" class="form-control" value="1" />  
                                   <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />  
                                   <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />  
                                   <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
                              </div>  
                         </form>  
                    </div>  
                    <?php  
                         }  
                    }  
                      
                }
            ?>
        </div>
    </section>


    <?php
    include_once 'footer.php';
?>