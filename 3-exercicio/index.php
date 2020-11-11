<?php 

$files = ['video.mov', 'imagen.jpeg', 'music.mp3', 'photo.png'];

foreach ($files as $file) {
   $extensions[]= ltrim(substr($file, strrpos($file, '.' ) ));
}

sort($extensions);

foreach ($extensions as $key => $extension) {
    $key += 1;
    echo "<p> {$key} {$extension} </p>";
}