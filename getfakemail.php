<?php
 
  // Set default timezone
  date_default_timezone_set('UTC');
  header("Expires: Fri, 01 Jan 2010 05:00:00 GMT");
  if(strstr($_SERVER["HTTP_USER_AGENT"],"MSIE")==false) {
    header("Cache-Control: no-cache");
    header("Pragma: no-cache");
  }
 
  try {
    /**************************************
    * Create databases and                *
    * open connections                    *
    **************************************/
 
    // Create (connect to) SQLite database in file
    $file_db = new PDO('sqlite:/tmp/_fakemailbox');
    // Set errormode to exceptions
    $file_db->setAttribute(PDO::ATTR_ERRMODE, 
                            PDO::ERRMODE_EXCEPTION);

    if ( isset($_GET['kill']) ) {
      $del = "DELETE FROM mail WHERE id=:id";
      $stmt = $file_db->prepare($del);
      $stmt->bindValue(':id', $_GET['kill'], SQLITE3_INTEGER);
      $stmt->execute();
    }

      // Select all data from file db messages table 
    $result = $file_db->query('SELECT * FROM mail');
    $output=array();
    foreach ($result as $m) {
      $output[] = array(
        'id'=>$m['id'],
        'created_at'=>$m['created_at'],
        'mail'=>htmlspecialchars(base64_decode($m['message'])),
      );
    }    
    echo json_encode($output);

    /**************************************
    * Close db connections                *
    **************************************/
 
    // Close file db connection
    $file_db = null;

 
  } catch(PDOException $e) {
    // Print PDOException message
    echo $e->getMessage();
  }
