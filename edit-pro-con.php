<?php
$select = mysqli_query($conn,"SELECT * FROM product")
while($row = mysqli_fetch_assoc($select))
?>