<?php

/**
 * @author Oscar Batlle <oscarbatlle@gmail.com>
 */
class Gallery {

    public function __construct($filename)
    {
        $files = glob('images/'. $filename .'*.{jpg,png}', GLOB_BRACE);
        $cache = "?" . time();
        echo '<div id="links">';
        foreach ($files as $file)
        {
            echo '<div class="col-lg-4 col-md-4">';
            echo '<div class="thumbnail">';
            echo '<a href="' . $file . $cache . '" title="' . basename($file) . '">';
            echo '<img src="' . $file . $cache . '" alt="">';
            echo '</a>';
            echo '<div class="caption">';
            echo '<p>' . basename($file) . ' | ' . '<a href="' . $file . $cache .'" download>Download</a></p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    }
}