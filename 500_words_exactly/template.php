<?php
// session_start();

// Example: Set default values if session variables aren’t already set.
// In your actual application, you'll convert the RTF to HTML and assign it.
$story   = isset($_SESSION['story']) ? $_SESSION['story'] : 'No Story Available - Sorry';
$content = isset($_SESSION['story']) ? file_get_contents('_story_files/'.$story.'.txt') : '<p>This is the default content.</p>';
$content = nl2br($content); // Converts newline characters to <br> tags
$headerImage = isset($_SESSION['story']) ? $_SESSION['story'] : ''; // Optional image URL

$story_title = $story;

if (
  str_starts_with($story_title, 'Where') || 
  str_starts_with($story_title, 'What') || 
  str_starts_with($story_title, 'Why') || 
  str_starts_with($story_title, 'Who') || 
  str_starts_with($story_title, 'How') || 
  str_starts_with($story_title, 'Can')
) {
  $story_title .= "?"; // Append "?" to the string
}else{
  $story_title .= "."; // Append "." to the string
}

$story_title = preg_replace('/\bThats\b/', "That's", $story_title);
$story_title = preg_replace('/\bIts\b/', "It's", $story_title);
$story_title = preg_replace('/\bWhats\b/', "What's", $story_title);
$story_title = preg_replace('/\bMikes\b/', "Mike's", $story_title);
$story_title = preg_replace('/\bDont\b/', "Don't", $story_title);
$story_title = preg_replace('/\bdont\b/', "don't", $story_title);
$story_title = preg_replace('/\bDihydrogen\b/', "Di-Hydrogen", $story_title);


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo htmlspecialchars($story); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Link to an external stylesheet for further styling -->
  <link href="../_bootstrap/css/bootstrap.css" rel ="stylesheet" type="text/css">
  <link rel="stylesheet" href="styles.css">
  <style>
    /* Basic styles; you can also move these to an external CSS file */
    body {
      font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
      line-height: 1.5;
      margin: 0;
      padding: 0;
      background: #fff;
      color: #333;
    }
    /* .container {
      max-width: 900px;
      margin: 0rem auto;
      padding: 0.2rem;
    } */
    header {
      text-align: center;
      margin-bottom: 2rem;
    }

    .image_container {
        align-items: center;
        text-align: center;
        margin-bottom: 1rem;
    }

    header h1 {
      font-size: 2.5rem;
      margin: 0;
    }
    .content {
      font-size: 1.4rem;
    }
    img.responsive {
      max-width: 100%;
      height: auto;
    }

    .scrollable-container {
        max-height: 55vh;
        overflow-y: scroll;
        padding: 1px;
      }

      .scrollable-container::-webkit-scrollbar {
        width: 8px;  /* Width of the scrollbar */
        color: rgb(244, 66, 66);
      }

      .scrollable-container::-webkit-scrollbar-track {
        background:rgb(252, 186, 186);  /* Background of the scrollbar track */
      }

      .scrollable-container::-webkit-scrollbar-thumb {
        background-color: #888;  /* Color of the scrollbar thumb */
        border-radius: 4px;      /* Rounded corners on the thumb */
        border: 1px solid #555;  /* Optional: add a border around the thumb */
      }

      .scrollable-container::-webkit-scrollbar-thumb:hover {
        background-color: #555;  /* Color when the thumb is hovered */
      }

  </style>

</head>

<body>
  <div class="container">
    <header>
      <h1><?php echo htmlspecialchars($story_title); ?></h1>
    </header>
      <div class="scrollable-container">
        <div class="image_container">
            <?php if (!empty($headerImage)) : ?>
                <img src="_story_images/<?php echo $story; ?>.png" alt="<?php echo $story; ?>" class="responsive" style="height:400px; ">
            <?php endif; ?>
            </div>
        <main class="content">
            <?php
                echo $content;
            ?>
        </main>
    </div>
  </div>
</body>
</html>
