<?php $id = 1; $name = "tutaj"; ?><?php
include('../../scripts-php/db.php');
$project_sql = "SELECT id, userID, galleryName, galleryHeader, themeType, firstColour, secondColour, fontColour FROM projects WHERE userID = $id AND galleryName=\"$name\"";
$project_query = mysqli_query($conn, $project_sql);
$project_results = mysqli_fetch_assoc($project_query);

$theme = $project_results["themeType"];

$theme_sql = "SELECT filePath FROM themes WHERE id=$theme;";
$theme_query = mysqli_query($conn, $theme_sql);
$theme_result = mysqli_fetch_array($theme_query);

$projectID = $project_results['id'];

$photos_sql = "SELECT projectID, photoURL, photoCaption, type FROM photogallery WHERE projectID=$projectID;";
$photos_query = mysqli_query($conn, $photos_sql);
$photos_results = [];
$i = 0;

while ($photos_row = mysqli_fetch_array($photos_query)) {
  $photos_results[$i][0] = $photos_row[0];
  $photos_results[$i][1] = $photos_row[1];
  $photos_results[$i][2] = $photos_row[2];
  $photos_results[$i][3] = $photos_row[3];
  $i++;
}

$photos_count = count($photos_results);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>
    <?php echo $project_results['galleryName']; ?>
  </title>
  <link rel="stylesheet" href="<?php echo $theme_result[0]; ?>">
  <style>
    :root {
      --primary-color:
        <?php echo "#" . $project_results['firstColour']; ?>
      ;
      --second-color:
        <?php echo "#" . $project_results['secondColour']; ?>
      ;
      --font-color:
        <?php echo "#" . $project_results['fontColour']; ?>
      ;
    }
  </style>
</head>

<body>
  <div class="main">
    <h1>
      <?php echo $project_results['galleryHeader']; ?>
    </h1>
    <?php
    $a = 0;
    for ($i = 0; $i < $photos_count / 3; $i++) {
      echo "<div class=\"row\">";
      for ($l = 0; $l < 3; $l++) {
        $src = $photos_results[$a][1];
        $caption = $photos_results[$a][2];
        $class = $photos_results[$a][3];
        if ($class != null) {
          if ($class == "header" or $class == "acapit") {
            echo "
        <figure>
        <p class=\"$class\">$caption</p>
        </figure>";
          } else {
            echo "
      <figure>
      <img class=\"$class\" src=\"$src\" alt=\"photo of $caption\">
      <figcaption>$caption</figcaption>
      </figure>
      ";
          }
        } else {
          echo "
          <figure>
          </figure>
          ";
        }
        $a++;
      }
      echo "</div>";
    }
    ?>
  </div>
</body>

</html>