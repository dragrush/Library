<?php
//see the demo on http://wang115l.myweb.cs.uwindsor.ca/test/test2.php
//test with a simple db: bookList{bookid, bookName, author, pic, detail, publish_year, borrow, location}
  require_once 'login.php';
	$conn=new mysqli($hn, $un, $pw, $db);
	if($conn->connect_error){
	    die("connect failed".$conn->connect_error);
	}

  $bookID=$_GET['id']; //click a book on pre-page, it will collect the id of the book
  $sql="SELECT * FROM bookList WHERE id='$bookID'";
  $result=$conn->query($sql);
  //$b=1;
  //$a=mysqli_num_rows($result);
  //echo "find: $a and $b <br>";
  //echo "isset($result)";
  if($result){
    $row=mysqli_fetch_assoc($result);
        //echo $row['year'],"<br>".$row['name'];
        //echo $row;
        $name=$row['name'];
        $author=$row['author'];
        $pic=$row['pic'];
        $detail=$row['detail'];
        $publish_year=$row['publish_year'];
        $borrow=$row['borrow'];
        $location=$row['location'];

  }
  else{
    die("ERROR: $sql"."<br>".$conn->error);
  }

  //echo $pic;

  echo <<<EOF
    <head>
      <!--<link rel=\"stylesheet\" type=\"text/css\" href=\"theme.css\" />-->
      <title>bookpage</title>
      <link rel="stylesheet" href="testcss.css">
    </head>
    <body>
      <script src="testjs.js"></script>
      <div class="all">
        <div class="tabs" id="list">
          <ul>
            <li><a href="#">picture</a></li>
            <li><a href="#">details</a></li>
            <li><a href="#">introduction</a></li>
          </ul>
        </div>
        <div class="tab" id="item">
          <div id="elem">
EOF;

            echo "<img src=$pic/>";
        echo <<<EOF
          </div>

          <div id="elem">
            <ul>
EOF;

              echo "<li>title: "."$name"."</li>";
              echo "<li>author: "."$author"."</li>";
              echo "<li>year: "."$publish_year"."</li>";
              echo "<li>borrowed: "."$borrow"."</li>";
              echo "<li>location: "."$location"."</li>";

            echo <<<EOF
            </ul>
          </div>

          <div id="elem">
EOF;

            echo "<h>introduction: "."$detail"."</h>";

          echo <<<EOF
        </div>
      </div>
    </body>
  </html>

EOF;
 ?>
