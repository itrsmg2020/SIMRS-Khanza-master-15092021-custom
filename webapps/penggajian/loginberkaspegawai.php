<?php
    include_once "conf/command.php";
    require_once('../conf/conf.php');
    
    $usere      = trim(isset($_GET['usere']))?trim($_GET['usere']):NULL;
    $passwordte = trim(isset($_GET['passwordte']))?trim($_GET['passwordte']):NULL;
    $url        = "index.php?act=Kontak";
    if ($_GET['act']=="login"){
        if((USERHYBRIDWEB==$usere)&&(PASHYBRIDWEB==$passwordte)){
            session_start();
            $_SESSION['ses_admin']="admin";
            $url = "index.php?act=DetailBerkasPegawai&action=TAMBAH&nik=".validTeks($_GET['nik'])."&kategori=".validTeks($_GET['kategori'])."";			
        }else{
            session_start();
            session_destroy();
            if (cekSessiAdmin()){
                session_unregister("ses_admin");
            }
            if (cekSessiPegawai()){
                session_unregister("ses_pegawai");
            }
            $url = "index.php?act=Kontak";
        }
    }
    header("Location:".$url);
?>