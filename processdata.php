<html>
  <?php
    //login data for online database
    $host_name = "REDACTED";
    $database = "REDACTED";
    $user_name = "REDACTED";
    $password = "REDACTED";
    
    //connect to database
    $connect = mysqli_connect ($host_name, $user_name, $password, $database);
    
    global $message;
    $message = "";
    
    //check connection - return error if issue found
    if(mysqli_connect_errno()) {
      $message = 'There was a connection error: ' . mysqli_conncect_error();
    }
    
    //clean up data to prevent security risks
    function testinput($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    
    //get all values sent from drawing experiment (index.html)
    //encompasses anything from an <input> tag and identifies it from what's under "name"
    //TODO: edit these as i add more values to collect in the main experiment; drawings; finish WB tutorial #3
    
    //study: image sequence(?)
    $is = testinput($_POST("imseq"));
    //recognition task sequence(?)
    $rs = testinput($_POST("recogseq"));
    $rts = testinput($_POST("recogtypeseq"));
    $rps = testinput($_POST("recogperfseq"));
    //drawing data
    $d1 = testinput($_POST("drawing1"));
    $d2 = testinput($_POST("drawing2"));
    $d3 = testinput($_POST("drawing3"));
    $d4 = testinput($_POST("drawing4"));
    $d5 = testinput($_POST("drawing5"));
    $d6 = testinput($_POST("drawing6"));
    //mouse movements (might delete these since data is not needed)
    /*
    $mm1 = testinput($_POST("mousemove1"));
    $mm2 = testinput($_POST("mousemove2"));
    $mm3 = testinput($_POST("mousemove3"));
    $mm4 = testinput($_POST("mousemove4"));
    $mm5 = testinput($_POST("mousemove5"));
    $mm6 = testinput($_POST("mousemove6"));
    */
    //canvas edges
    $wl = testinput($_POST("wpaintleft"));
    $wr = testinput($_POST("wpaintright"));
    $wt = testinput($_POST("wpainttop"));
    $wb = testinput($_POST("wpaintbottom"));
    //vviq questions
    $vv1 = testinput($_POST("vviq1"));
    $vv2 = testinput($_POST("vviq2"));
    $vv3 = testinput($_POST("vviq3"));
    $vv4 = testinput($_POST("vviq4"));
    $vv5 = testinput($_POST("vviq5"));
    $vv6 = testinput($_POST("vviq6"));
    $vv7 = testinput($_POST("vviq7"));
    $vv8 = testinput($_POST("vviq8"));
    $vv9 = testinput($_POST("vviq9"));
    $vv10 = testinput($_POST("vviq10"));
    $vv11 = testinput($_POST("vviq11"));
    $vv12 = testinput($_POST("vviq12"));
    $vv13 = testinput($_POST("vviq13"));
    $vv14 = testinput($_POST("vviq14"));
    $vv15 = testinput($_POST("vviq15"));
    $vv16 = testinput($_POST("vviq16"));
    //osiq questions
    $os1 = testinput($_POST("osiq1"));
    $os2 = testinput($_POST("osiq2"));
    $os3 = testinput($_POST("osiq3"));
    $os4 = testinput($_POST("osiq4"));
    $os5 = testinput($_POST("osiq5"));
    $os6 = testinput($_POST("osiq6"));
    $os7 = testinput($_POST("osiq7"));
    $os8 = testinput($_POST("osiq8"));
    $os9 = testinput($_POST("osiq9"));
    $os10 = testinput($_POST("osiq10"));
    $os11 = testinput($_POST("osiq11"));
    $os12 = testinput($_POST("osiq12"));
    $os13 = testinput($_POST("osiq13"));
    $os14 = testinput($_POST("osiq14"));
    $os15 = testinput($_POST("osiq15"));
    $os16 = testinput($_POST("osiq16"));
    $os17 = testinput($_POST("osiq17"));
    $os18 = testinput($_POST("osiq18"));
    $os19 = testinput($_POST("osiq19"));
    $os20 = testinput($_POST("osiq20"));
    $os21 = testinput($_POST("osiq21"));
    $os22 = testinput($_POST("osiq22"));
    $os23 = testinput($_POST("osiq23"));
    $os24 = testinput($_POST("osiq24"));
    $os25 = testinput($_POST("osiq25"));
    $os26 = testinput($_POST("osiq26"));
    $os27 = testinput($_POST("osiq27"));
    $os28 = testinput($_POST("osiq28"));
    $os29 = testinput($_POST("osiq29"));
    $os30 = testinput($_POST("osiq30"));
    //final demographic questions
    $hp = testinput($_POST("hardestpart"));
    $wh = testinput($_POST("whyhardest"));
    $a = testinput($_POST("age"));
    $g = testinput($_POST("gender"));
    $o = testinput($_POST("occupation"));
    $de = testinput($_POST("device"));
    $in = testinput($_POST("inputdevice"));
    $aa = testinput($_POST("artabilities"));
    $ae = testinput($_POST("artexperience"));
    
    //insert all inputs into database
    $sql = "INSERT INTO REDACTED (imseq,recogseq,recogtypeseq,recogperfseq,drawing1,drawing2,drawing3,drawing4,drawing5,drawing6,wpaintleft,wpaintright,wpainttop,wpaintbottom,vviq1,vviq2,vviq3,vviq4,vviq5,vviq6,vviq7,vviq8,vviq9,vviq10,vviq11,vviq12,vviq13,vviq14,vviq15,vviq16,osiq1,osiq2,osiq3,osiq4,osiq5,osiq6,osiq7,osiq8,osiq9,osiq10,osiq11,osiq12,osiq13,osiq14,osiq15,osiq16,osiq17,osiq18,osiq19,osiq20,osiq21,osiq22,osiq23,osiq24,osiq25,osiq26,osiq27,osiq28,osiq29,osiq30,hardestpart,whyhardest,age,gender,occupation,device,inputdevice,artabilities,artexperience) VALUES ('$is','$rs','$rts','$rps','$d1','$d2','$d3','$d4','$d5','$d6','$wl','$wr','$wt','$wb','$vv1','$vv2','$vv3','$vv4','$vv5','$vv6','$vv7','$vv8','$vv9','$vv10','$vv11','$vv12','$vv13','$vv14','$vv15','$vv16','$os1','$os2','$os3','$os4','$os5','$os6','$os7','$os8','$os9','$os10','$os11','$os12','$os13','$os14','$os15','$os16','$os17','$os18','$os19','$os20','$os21','$os22','$os23','$os24','$os25','$os26','$os27','$os28','$os29','$os30','$hp','$wh','$a','$g','$o','$de','$in','$aa','$ae')";
    
    //web message for completed surveys
    if (mysqli_query($connect, $sql)) {
      $displayperformance = "<div style='font-family:helvetica;font-size:24'> Thank you for participating in this study!<br><br>You may now close this tab.</div>";
    } else {
      $displayperformance = "Error: " . $sql . "<br>" . mysqli_error($connect);
    }
    mysqli_close($connect);
  ?>
  <title>Experiment Complete</title>
  <center>
    <div style='font-family:helvetica;font-size:24px'>Thank you!</div>
    <br><br>
    <p><?php echo $displayperformance ?></p>
  </center>
</html>
