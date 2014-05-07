<?php
session_start();
session_cache_limiter('nocache');
session_cache_expire(0);
session_destroy();

?>
