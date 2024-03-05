<?php
require_once "include/header.php";
?>

<?php 

        $category_error = $category =  "";
    if( $_SERVER["REQUEST_METHOD"] == "POST"){
       
        if(empty($_REQUEST["cat_name"])){
            $category_error = "<p style='color:red'> * Yêu cầu nhập tên chương trình</p>";
        }else {
          $category = $_REQUEST["cat_name"];
        }

        if( !empty($category) ){
            // database connection 
            require_once "include/connection.php";
            $cat_select = "SELECT * FROM post_category WHERE c_name = '$category' ";
            $result = mysqli_query($conn , $cat_select);

            if( mysqli_num_rows($result) > 0 ){
                $category_error =  "<p style='color:red'>* đã tồn tại chương trình </p>";
            }else{
               
                $add_cat = "INSERT INTO post_category( c_name ) VALUES( '$category' ) ";
                $add = mysqli_query( $conn , $add_cat );
                if($add){
                    echo "<script>
                    $(document).ready( function(){
                        $('#showModal').modal('show');
                        $('#linkBtn').attr('href', 'manage-category.php');
                        $('#linkBtn').text('Toàn bộ chương trình');
                        $('#addMsg').text('Thêm chương trình thành công !');
                        $('#closeBtn').text('Thêm tiếp');
                    })
                </script>
                ";
                }
            }
        }
    }
?>


<div class="login-form-bg h-100">
        <div class="container mt-5 h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5 shadow">                       
                                    <h4 class="text-center pb-3">Thêm chương trình</h4>
                                <form method="POST" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                            
                                <div class="form-group">
                                    <label >CHương trình :</label>
                                    <input type="text" class="form-control" value=" <?php echo $category; ?>"  name="cat_name" >
                                    <?php echo $category_error; ?>
                                </div>
                                <button type="submit" class=" btn btn-primary btn-block">Thêm</button>
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php 
require_once "include/footer.php";
?>