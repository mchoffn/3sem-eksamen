<!doctype html>
<html>
  <head>
  
  </head>
  <body>
  <?php
 
    if(isset($_POST['btnaddvideo'])){
       $maxsize = 80000000; // 80MB
        

        print_r($_POST);

       $name = $_FILES['video_title']['name'];
       $target_dir = "ss_videos/";
       $target_file = $target_dir . $_FILES["video_title"]["name"];

       // Select file type
       $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                    // Valid file extensions
                    $extensions_arr = array("mp4","avi","3gp","mov","mpeg");

                    // Check extension
                    if( in_array($videoFileType,$extensions_arr) ){
                
                        // Check file size
                        if(($_FILES['video_title']['size'] >= $maxsize) || ($_FILES["video_title"]["size"] == 0)) {
                            echo "File too large (".($_FILES['video_title']['size'])."). File must be less than 80MB.";
                        }
                        else  {
                                // Upload
                                if(move_uploaded_file($_FILES['video_title']['tmp_name'],$target_file)){
                                // Insert record
                                $query = 'INSERT INTO ss_videos(title, description) VALUES (?,?)';


                                //Create video
                                    $vt = filter_input( INPUT_POST, 'video_title' )or die( 'Missing or illegal category title parameter' );
                                    $vd = filter_input( INPUT_POST, 'video_description' )or die( 'Missing or illegal category description parameter' );
                                    $video = $target_file;

                                    require_once( 'database-connect/dbcon.php' );



                            $query = 'INSERT INTO ss_videos(title, description, location) VALUES (?,?,?)';
                            $stmt = $link->prepare( $query );
                            $stmt->bind_param( 'sss', $vt, $vd, $video );
                            $stmt->execute();



                            if ( $stmt->affected_rows > 0 ) {
                                echo '<div class="text-center">Kategori ' . $ct . ' oprettet gå tilbage til <a href="index.php">startsiden</a></div>' . PHP_EOL;
                            } else {
                                echo '<div class="text-center">Fejl upstået under tilføjelse af ny kategori. En titel skal være unik og titlen "' . $ct . '" er allerede taget. Prøv en anden titel. Gå tilbage til <a href="index.php">startsiden</a></div>' . PHP_EOL;
                            }

                            $link->close();
        
                 }
            }
       }
  } 
     ?>

  </body>
</html>