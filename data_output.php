<?php

echo "<br><h2><center> 주 소 록 </center></h2>";
echo "<hr>";

$connect = mysqli_connect('localhost', 'root', '');
mysqli_select_db($connect, 'addr_db');        //질의 수행

/*--- 한글 깨짐 방지 코드 ---*/
mysqli_query($connect, "set session character_set_connection=utf8;");
mysqli_query($connect, "set session character_set_results=utf8;");
mysqli_query($connect, "set session character_set_client=utf8;");

$sql = "select * from member";              // 테이블 검색 질의
$result = mysqli_query($connect, $sql);     // 질의 수행
$count = mysqli_num_fields($result);       // 필드의 개수 구하기

echo "<B> * 테이블 이름 : member </B><br><br>";
?>

<table width='600' border="1" bordercolor='blue' cellpadding='1'>
    <tr>
        <td bgcolor="#FFFF00"><B> 학번 </B></td>
        <td bgcolor="#FFFF00"><B> 이름 </B></td>
        <td bgcolor="#FFFF00"><B> 주소 </B></td>
    </tr>
    <?php
    
    while($rows=mysqli_fetch_row($result))
    {
        echo "<tr>";
        for($a = 0; $a < $count; $a++)
        {
    echo "<td> $rows[$a] </td>";
        }
        echo "<tr>";
    }
    ?>

</table><br>

<?php
    $rows_count = mysqli_num_rows($result);     //레코드 개수 구하기
    echo "* 전체 레코드의 수 : <B>[ {$rows_count} 개 ]</B>";
    mysqli_close($connect);
?>

<html>
    <body>
        ◀◀ [<a href="data_input.php">주소 입력 화면</a>]으로 이동
    </body>
</html>