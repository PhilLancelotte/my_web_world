
<?php
// phpinfo();
// require_once "../../wwwroot/_config/config_500_words.php";

// Initialize the session
session_start();

// Retrieve the current story from session
$story = isset($_SESSION['story']) ? $_SESSION['story'] : null;
$follow_on = false; // default state

// Debug output (optional)
// echo "Current Story: " . $story;

// Transition logic (using if/elseif to ensure only one branch runs)
if ($story === 'Can You Make It Big Again') {
    $story = 'Thats A Relief';
    $follow_on = false;
} elseif ($story === 'Its Exactly Where I Left It') {
    $story = 'Can You Make It Big Again';
    $follow_on = true;
} elseif ($story === 'Where Exactly Did You Put The Moon Kevin') {
    $story = 'Its Exactly Where I Left It';
    $follow_on = true;
} else {
    // Optionally, handle a default or unknown story
    // For example:
    // $story = 'Default Story Title';
}

$_SESSION['story'] = $story;

// For debugging, you could echo the new story
// echo "Next Story: " . $story;
?>

<!DOCTYPE html>

<title><?php echo $story; ?></title>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="imagetoolbar" content="no" />
    <!--boot strap CDN server link -->
    <link href="../_bootstrap/css/bootstrap.css" rel ="stylesheet" type="text/css">
    <!-- prevent caching-->
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <link rel="shortcut icon" href="favicon.ico?">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 1800px; padding: 20px; }
        .wrapperS{ font: 18px sans-serif; width: 360px; padding: 20px; }
        .button-container {display: inline;}

        .grid-cell {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            /* background-color: red;
            color: white; */
            text-align: center;
        }

        .header {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            /* padding: 5px; Add some padding for spacing */
        }
        .header h1 {
            font-size: 40px;
            color: #9bbb59;
            margin: 0;
        }
        .header span {
            font-size: 10px;
        }
        .header a {
            margin-left: 10px;
        }

        .col-lg-3 a {
            display: block; /* This will make the link take up the full width */
        }

        .col-2-4 {
            flex: 0 0 20%;
            max-width: 20%;
        }

        .box {
            /* box-shadow: 0px 4px 8px 0px rgba(0,0,0,0.2); */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center; /* Ensures text is centered */
        }
        .box img {
            height: 100px;
        }
        .box h4 {
            margin: 0; /* Removes default margin */
        }

        .flag-custom {
            font-size: 2em;             /* Adjust size as needed */
            border: 1px solid #125;     /* Black border; change color and thickness as desired */
            padding: 0.1em;             /* Optional: add some padding around the flag */
            border-radius: 0.1em;       /* Optional: rounds the corners slightly */
        }
        
</style>
<body>
<div class="container text-center my-3">
    <h1>
      <a>
        <img src="../exactly_500_words/_story_images/500_title.png" alt="500_title" class="img-fluid" style="height:5%vh;">
      </a>
    </h1>
  </div>
  <div class="d-flex flex-wrap align-items-center justify-content-center below-header">
    <a class="btn btn-primary btn-sm" href="index.html" role="button" style="margin-right: 10px;">Return to main page</a>
    <?php if($follow_on == False){ ?>
        <a href="_info/random_story.php" class="btn btn-success btn-sm">Pick a Random Story</a>
      <?php }else{ ?>
        <a href="_info/random_story.php" class="btn btn-success btn-sm" style="margin-right: 20px;"  >Pick a Random Story</a>
        <a href="follow_on_story.php" class="btn btn-danger btn-sm">This is a series - Next</a>
     <?php } ?>
</div>

<div class="container my-2">
    <?php
    include  'template.php';
    ?>
    <style>
  /* This style will override any conflicting styles from child.html if the specificity is the same or higher */
  p {
    font-family: Arial, sans-serif;
    font-size: 20px;
  }
</style>
</div>

</body>