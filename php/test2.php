<?php

  function saySomething($link)
  { 
     $sql = "select words from DUMMY_T where id=0";
     $result = mysqli_query( $link, $sql );
     $row = mysqli_fetch_assoc($result);
      $data = $row['words'];
     
     return $data;     
  }

  function goodbye()
  {
    return "success"; 
  }
