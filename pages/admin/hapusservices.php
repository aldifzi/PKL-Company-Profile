<?php

if (!isset($_GET['id']) || $_GET['id'] == '') header('Location: index.php');

require_once '../../assets/connection.php';
$id = $_GET['id'];

// AMBIL NAMA FILE FOTO SEBELUMNYA
$data = mysqli_query($con, "SELECT icon FROM services WHERE id='$id'");
$dataImage = mysqli_fetch_assoc($data);
$oldImage = $dataImage['icon'];

// DELETE GAMBAR LAMA
$link = "../../assets/img/" . $oldImage;
unlink($link);

// DELETE DATA DARI TABLE
$result = mysqli_query($con, "DELETE FROM services WHERE id=$id");

// REDIRECT KE index.php
header("Location:services");
