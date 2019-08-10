<?php

require_once './config/base.php';
require_once './config/database.php';
require_once './helper/helper.php';
require_once './core/Database.php';
require_once './core/Controller.php';
require_once './controller/Student.php';
require_once './controller/api/Room.php';
require_once './controller/api/User.php';
require_once './controller/api/Register.php';
require_once './controller/api/Member.php';
require_once './core/App.php';

// jalankan app
new App();
