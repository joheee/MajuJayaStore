<?php
    function include_template($file, $data = []) {
        extract($data);
        ob_start();
        include $file;
        return ob_get_clean();
    }
?>