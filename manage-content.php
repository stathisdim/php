
<?php require_once("includes/db_connection.php");  ?>

<?php require_once("includes/functions.php"); ?>

                  <?php  $query = "SELECT * FROM subjects WHERE visible = 1";  
                        $result =  mysqli_query($connection, $query);
                        confirm_query($result);    /*   fuction called to confirm if db query is ok!  */
?>

<?php   

if(isset($_GET["subject"]))  {
   $selected_page_id = null;
 $selected_subject_id = $_GET["subject"];

}elseif(isset($_GET["page"])){
 $selected_subject_id = null;
  $selected_page_id = $_GET["page"];
}else{

  $selected_subject_id = null;
  $selected_page_id = null;
}

  ?>

<?php include("includes/layouts/header.php");  ?>
  

  <body>

   <div class="container-fuid">
      
      <nav class="navbar bg-info navbar-info navbar-expand-sm">
              <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
              </button>
       <div class="container">
       <a href="index.php" class="navbar-brand text-warning d-none d-sm-inline">Widget Corp</a>
       <div class="collapse ml-sm-auto navbar-collapse" id="navbarTogglerDemo01">
        <div class="navbar-nav ml-sm-auto " >
          
                            <?php  
                                 $subject_set = find_all_subjects();
                               ?>

                            <?php while ($subject = mysqli_fetch_assoc($subject_set)){ ?>
                            <div class="dropdown">
                            <a class='nav-item nav-link text-light dropdown-toggle float-left ' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true' href=manage-content.php?subject=<?php  echo urlencode($subject["id"]) ;  ?>'> <?php  echo $subject["menu_name"];  ?> </a> 



                                

          <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">  
            

                               <?php 
                                  $page_set = find_pages_by_id($subject["id"])
                               ?>

                               <?php while ($page = mysqli_fetch_assoc($page_set)){
                                ?>
                              <a class='dropdown-item 



                              <?php  


                              if($page["id"] == $selected_page_id){

                                echo ' font-weight-bold';

                              }


                               ?>' href=manage-content.php?page=<?php echo urlencode($page["id"]) ;   ?>> <?php echo $page["menu_name"]  ;  ?> </a>

                              <?php

                              }  

                              ?>


                <?php    mysqli_free_result($page_set); ?>
             </div>
             </div>
             <?php
               }

           ?>

            </div>

          <?php    mysqli_free_result($subject_set); ?>

       <!--     <div class="dropdown">
                <a class="nav-item nav-link text-light dropdown-toggle float-left" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Products</a>

                    <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Product 1</a>
                        <a class="dropdown-item" href="#">Product 2</a>
                        <a class="dropdown-item" href="#">Product 3</a>
                    </div>
               </div> 
               
                <div class="dropdown">     
                    <a class="nav-item nav-link text-light dropdown-toggle id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Products23</a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Produfdg1</a>
                        <a class="dropdown-item" href="#">Prodfdg 2</a>
                        <a class="dropdown-item" href="#">Proddfg 3</a>
                    </div>
           </div> 
         -->
        </div>
      </div>
       </div>
       </nav>

       <div class="container">

             <h2> Manage Content </h2>


               <?php  $query3 = "SELECT * FROM pages WHERE id = {$selected_page_id} ";
                      $page_content = mysqli_query($connection, $query3);


              while($page_cont = mysqli_fetch_assoc($page_content)){

                  echo $page_cont["content"];

              }

               ?>










       </div>

    </div>
               
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
  </html>

  <?php   require_once("includes/layouts/footer.php");  ?>