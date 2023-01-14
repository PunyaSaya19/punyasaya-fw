<?php


function showFlasher()
{
  if (isset($_SESSION["CRUD"])) {
    $data = $_SESSION["CRUD"];
    unset($_SESSION["CRUD"]);
    if ($data['type'] == 1 || $data['type'] == 2) {
      return "
        <div id='flash-crud' data-flashType='" . $data['type'] . "' data-title='" . $data['title'] . "' data-text='" . $data['text'] . "' data-icon='" . $data['icon'] . "' data-flash=true>
        </div>
      ";
    } else {
      $alertType = ($data['icon'] == 'success') ? 'success' : 'danger';
      return "
        <div class='alert alert-$alertType'>
            <strong>
              " . $data['text'] . "
            </strong>
        </div>
      ";
    }
  }
}

function setFlasher($title, $icon, $text, $type = FLASH_TYPE)
{
  $_SESSION["CRUD"] = [
    'title' => $title,
    'icon' => $icon,
    'text' => $text,
    'type' => $type,
  ];
}

function setFlashInsert($is_success = true, $type = FLASH_TYPE)
{
  if ($is_success == true) {
    $title = "SELAMAT";
    $icon = "success";
    $text = "Data Berhasil DITAMBAHKAN!!";
  } else {
    $title = "OUPSS";
    $icon = "error";
    $text = "Data Gagal DITAMBAHKAN!!";
  }
  setFlasher($title, $icon, $text, $type);
}

function setFlashUpdate($is_success = true, $type = FLASH_TYPE)
{
  if ($is_success == true) {
    $title = "SELAMAT";
    $icon = "success";
    $text = "Data Berhasil DIUPDATE!!";
  } else {
    $title = "OUPSS";
    $icon = "error";
    $text = "Data Gagal DIUPDATE!!";
  }
  setFlasher($title, $icon, $text, $type);
}

function setFlashDelete($is_success = true, $type = FLASH_TYPE)
{
  if ($is_success == true) {
    $title = "SELAMAT";
    $icon = "success";
    $text = "Data Berhasil DIHAPUS!!";
  } else {
    $title = "OUPSS";
    $icon = "error";
    $text = "Data Gagal DIHAPUS!!";
  }
  setFlasher($title, $icon, $text, $type);
}
