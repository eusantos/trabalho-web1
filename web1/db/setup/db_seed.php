<?php

   $sql = "INSERT INTO users (
    name, email, md5_password, role) 
    VALUES ('admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'admin'
    );";

  run_sql($sql);

?>

