<?php

function setComments($conn) {
  if(isset($_POST['commentSubmit'])) {
    $user_id = $_POST['user_id'];
    $date = $_POST['date'];
    $comment = $_POST['comment'];
    
    $sql = "INSERT INTO comments (user_id, date, comment) VALUES ('$user_id', '$date', '$comment')";
    $result = $conn->query($sql);
  }
}

function getComments($conn) {
  $sql = "SELECT * FROM comments";
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()) {
    echo "<div class='comment-box'><p>";
      echo $row['user_id']."<br>";
      echo $row['date']."<br>";
      echo nl2br($row['comment']);
    echo "</p>
      <form class='delete-form' method='POST' action='".deleteComments($conn)."'>
        <input type='hidden' name='count_id' value='".$row['count_id']."'>
        <button type='submit' name='commentDelete' >Delete</button>
      </form>
      <form class='edit-form' method='POST' action='editcomment.php'>
        <input type='hidden' name='count_id' value='".$row['count_id']."'>
        <input type='hidden' name='user_id' value='".$row['user_id']."'>
        <input type='hidden' name='date' value='".$row['date']."'>
        <input type='hidden' name='comment' value='".$row['comment']."'>
        <button>Edit</button>
      </form>
    </div>";
  }
}

function deleteComments($conn) {
  if(isset($_POST['commentDelete'])) {
    $count_id = $_POST['count_id'];
    
    $sql = "DELETE FROM comments WHERE count_id='$count_id'";
    $result = $conn->query($sql);
    header("Location: index.php");
  }
}




