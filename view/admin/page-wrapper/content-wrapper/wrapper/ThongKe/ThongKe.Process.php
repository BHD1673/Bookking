<?php
function loadallthongke(){
    $sql = "select * loaiphong.ID as madm, loaiphong.name as tendm , count(datphong.id) as countsp, min(datphong.TongTien) as minTongTien,  max(datphong.TongTien) as maxTongTien, avg(datphong.TongTien) as avgTongTien";
    $sql.=" from datphong left join loaiphong on loaiphong.ID = datphong.id_loaiphong";
    $sql.=" group by loaiphong.ID order by loaiphong.ID desc";
    $listtk = pdo_query($sql);
    return $listtk;
}

?>