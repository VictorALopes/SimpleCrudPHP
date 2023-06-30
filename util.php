<?php
$conn = pg_connect("host=localhost port=5432 dbname=telecontrol user=postgres password=123");

function MensagemPopUp(string $msg)
{
    return "<script>alert('" . $msg . "');</script>";
}

function RedirecionarPara(string $pagina)
{
    return "<script>location.href='?page=" . $pagina . "'</script>";
}
