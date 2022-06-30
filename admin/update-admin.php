<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <br><br>

        <?php
            // 1. get the ID of Admin to be deleted
            $id = $_GET['id'];
            
            // 2. Create SQL Query to Delete Admin
            $sql = "DELETE FROM tbl_admin WHERE id=$id";
            
            //Execute the Query
            $res = mysqli_query($conn, $sql);
            
            //Check whether the query executed successfully or not
            if($res=TRUE)
            {
                //Check whether the data is available or not
                $count = mysqli_num_rows($res);
                //Check whether we have admin data or not
                if($count==1);
                {
                    //Get the details
                    //echo "Admin Available"
                    $row=mysqli_fetch_assoc($res);

                    $full_name = $rows['full_name'];
                    $username = $rows['username'];
                }
                else
                {
                    //Redirect Page to Manage Admin
                    header("location:".SITEURL.'admin/manage-admin.php');
                }
            }
        
        
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" value="<?php echo $usernamee; ?>">
                    </td>
                </tr>

                <tr>
                    <td colspans="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name= "submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
    </div>
</div>

<?php 
    //Check whether the submit Button is Clicked or not
    if($_POST['submit'])
    {
        echo "Button Clicked";
    }
?>

<?php include('partials/footer.php'); ?>