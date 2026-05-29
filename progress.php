<?php
    if ($current_step == 1) {
        echo '<img src="images/progress-1.png" alt="Progress Step 1" class="img-progress d-block mx-auto">';
    } else if ($current_step == 2) {
        echo '<img src="images/progress-2.png" alt="Progress Step 2" class="img-progress d-block mx-auto">';
    } else if ($current_step == 3) {
        echo '<img src="images/progress-3.png" alt="Progress Step 3" class="img-progress d-block mx-auto">';
    } else if ($current_step == 4) {
        echo '<img src="images/progress-4.png" alt="Progress Step 4" class="img-progress d-block mx-auto">';
    }
?>