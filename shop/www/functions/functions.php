<?php 


function clear_string($link, $cl_str) {
  $cl_str = strip_tags($cl_str); //видалення HTML i PHP тегів
  $cl_str = mysqli_real_escape_string($link, $cl_str); //екранує спецсимволи
  $cl_str = trim($cl_str); //видалення пробілів спочатку і в кінці
  
  return $cl_str;
};

