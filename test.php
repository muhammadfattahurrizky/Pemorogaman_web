<?php
$nama = "Fatah";
$nim = 3337250001;
$ipk = 4.0;

$skills = ["HTML, CSS, PHP"];

echo "Halo, " . $nama . " Nim : " . $nim;

?>

<ul>
 <?php foreach($mahasiswa as $mhs): ?>
    <li>
        <?= $mhs["nama"] ?>  ipk : <?= $mhs["ipk"] ?> 
        // "mahasiswa tidak terdefinisi ini hanya template"
    </li>
 <?php endforeach; ?>
 </ul>