<?php

if (!isset($_GET['id']) || $_GET['id'] == '') header('Location: index.php');

require_once '../../assets/connection.php';
$id = $_GET['id'];

// AMBIL NAMA FILE FOTO SEBELUMNYA
$data = mysqli_query($con, "SELECT gambar FROM team WHERE id='$id'");
$dataImage = mysqli_fetch_assoc($data);
$oldImage = $dataImage['gambar'];

// DELETE GAMBAR LAMA
$link = "image/" . $oldImage;
unlink($link);

// DELETE DATA DARI TABLE
$result = mysqli_query($con, "DELETE FROM team WHERE id=$id");

// REDIRECT KE index.php
header("Location:team.php");
