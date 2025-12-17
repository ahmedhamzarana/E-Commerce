<?php
    session_start();
    session_destroy();
    session_cache_expire();
    session_abort();
    echo "<script>window.location.href='login.php';</script>;"
?>