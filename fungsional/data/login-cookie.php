<?php

   //setcookie("userId", "");

    


   // if (!empty($iduser)) 
    //{
      //  include "./fungsional/halm/homeUser.php";

    //}
    //else
    //{

        if (empty($iduser)) 
        {
          $course="<a href='#' data-toggle='modal' data-target='#pesanCourse' class='btn btn-primary'>Read More</a>";
          //$course="<a href='#' data-toggle='modal' data-target='#DaftarCourse' class='btn btn-primary'>Read More</a>";
          $home="<a href='?hal=kontak-kami' class='btn btn-primary btn-xl rounded-pill mt-5'>Read More</a>";
        } 
        else 
        {
          $course="<a href='?hal=course' class='btn btn-primary'>Read More</a>";
          $home="<a href='?hal=event' class='btn btn-primary btn-xl rounded-pill mt-5'>Read More</a>";
          
        }
       
        
        include "./fungsional/halm/homeUmum.php";
    //}

?>