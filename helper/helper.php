<?php

// untuk memudahkan penggunaan base url dan parameter
function base_url($param = null)
{
  if ($param == null) {
    return BASEURL;
  } else {
    return BASEURL . $param;
  }
}
