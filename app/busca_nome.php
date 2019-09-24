<?php
$nome = $_GET["nome"];
echo("<center>");
echo("
<table border='1' bgcolor='#A020F0'>
<tr>
<td width='40'><center>ID</center></td>
<td width='200'><center>NOME</center></td>
<td width='200'><center>E-MAIL</center></td>
<td width='100'><center>FONE</center></td>
<td width='250'><center>ENDEREÇO</center></td>
<td width='70'><center>CIDADE</center></td>
<td width='40'><center>U.F</center></td>
<td width='40'><center></center></td>
<td width='40'><center></center></td>
</tr>
</table>
");
$pdo = new PDO('mysql:host=localhost;dbname=estacio', 'root', null);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
$consulta = $pdo->query("SELECT * FROM alunos WHERE nome LIKE '%$nome%'");
echo("<table border='1'>"); 
$cor='#CDC5BF';  
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    if($cor == '#CDC5BF'){$cor='#EEE5DE';}else{$cor='#CDC5BF';}
	echo "
<tr bgcolor=$cor>
<td width='40'>{$linha['idaluno']}</td>
<td width='200'>{$linha['nome']}</td>
<td width='200'>{$linha['mail']}</td>
<td width='100'>({$linha['ddd']}){$linha['fone']}</td>
<td width='250'>{$linha['endereco']}</td>
<td width='70'>{$linha['cidade']}</td>
<td width='40'>{$linha['uf']}</td>
<td width='40'><center>
<a href=delete.php?idaluno={$linha['idaluno']} onclick=\"return confirm('Tem certeza que deseja excluir o registro?'); return false;\"><img src='imgs/del.png'>
</a>
</center></td>
<td width='40'><center>
<a href=editar.php?idaluno={$linha['idaluno']}><img src='imgs/edit.png'>
</a>
</center></td>
</tr>
	";
}
echo("</table>");
echo("<center><br><a href='relatorio.php'><img src='imgs/xls.png'></a><img src='imgs/print.png' onClick='window.print();'></center>");
echo("</center>");

?>
