<?php

require_once('config.php');

function executeQuery($query)
{
  $connection = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
  mysqli_set_charset($connection, 'utf8');

  mysqli_query($connection, $query);

  mysqli_close($connection);
}

function getDataBySelect($query, $isSingle = false)
{
  $data = null;

  $connection = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
  mysqli_set_charset($connection, 'utf8');

  $results = mysqli_query($connection, $query);
  if ($isSingle) {
    $data = mysqli_fetch_array($results, 1);
  } else {
    $data = [];
    while (($row = mysqli_fetch_array($results, 1)) != null) {
      $data[] = $row;
    }
  }

  mysqli_close($connection);

  return $data;
}
