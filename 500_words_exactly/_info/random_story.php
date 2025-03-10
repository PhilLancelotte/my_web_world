<?php
// Define an array of story URLs
$stories = [
    '../story.php?story=Fog',
    '../story.php?story=Snot',
    '../story.php?story=Windbag',
    '../story.php?story=The Wrong Spatula',
    '../story.php?story=Frankie Skid - Fearless Squid',
    '../story.php?story=Noodle Pig',
    '../story.php?story=Couch Potato',
    '../story.php?story=Gary Blizzard - Almost Wizard',
    '../story.php?story=Cone Of Shame',
    '../story.php?story=Whats That Noise',
    '../story.php?story=Doctor Boomers Alternative Medicine',
    '../story.php?story=Visitors',
    '../story.php?story=Space Armada',
    '../story.php?story=Where Exactly Did You Put The Moon Kevin',
    '../story.php?story=Detention',
    '../story.php?story=Nuts',
    '../story.php?story=Blue Whale Cheese',
    '../story.php?story=Mikes Magic Underpants',
    '../story.php?story=Slug',
    '../story.php?story=Day 1347',
    '../story.php?story=The Dripping Tap',
    '../story.php?story=The School Of Mum And Dad',
    '../story.php?story=Halfway Up A Mountain',
    '../story.php?story=Dihydrogen Monoxide',
    '../story.php?story=Odd Socks',
    '../story.php?story=Bless You',
    '../story.php?story=I Dont Like THAT Colour'




// the last one has no comma
];

// Pick a random story
$random_story = $stories[array_rand($stories)];

// Redirect to the chosen story
header('Location: ' . $random_story);
exit;
?>