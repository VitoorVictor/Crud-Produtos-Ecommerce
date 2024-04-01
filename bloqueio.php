<?php

    if(!isset($_SESSION)) {
    session_start();
    }

    

    if(!isset($_SESSION['id']) ){
        header("Location: index.php");
<<<<<<< HEAD
        
=======
>>>>>>> 2ba88c1d19ce13ccd10b10f56cc6c5b377e6b198
    }

     
