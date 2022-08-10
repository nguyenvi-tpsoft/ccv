<?php
include('../../includes/config.php');
include('../../includes/database.php');
include('../../modules/CCVClass.php');

$db = new CCV();

$list = $db->ccv_getall();
