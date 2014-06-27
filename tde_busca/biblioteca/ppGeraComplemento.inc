<?
  //Gera Complemento de Query para filtros
  $complementoQuerie = ' and (c.tsIdentificador = a.tsIdentificador)';

  //Filtro para idioma
  if ($idioma != 'QQR')
  {
    $complementoQuerie .= " and (c.tsIdioma = \"$idioma\")";
  }

  //Filtro para grau
  switch ($grau)
  {
    case 'QQR':
      break;
    case 'OUTROS':
      $complementoQuerie .= " and (c.tsGrau <> \"Mestre\") and (c.tsGrau <> \"Doutor\")";
      break;
    default:
      $complementoQuerie .= " and (c.tsGrau = \"$grau\")";
      break;
  }

  //Filtro para datas

  //Data de defesa
  
  //Checa se a data passada eh valida e separa componentes. Formato dd/mm/aaaa ou dd-mm-aaaa
  if (ereg ("([0-9]{1,2})[-|/]([0-9]{1,2})[-|/]([0-9]{4})", $dataInicDefesa, $compData))
  {
    $complementoQuerie .= " and (c.tsDataDefesa >= \"$compData[3]-$compData[2]-$compData[1]\")";
  }
  //Checa se a data passada eh valida e separa componentes. Formato dd/mm/aaaa ou dd-mm-aaaa
  if (ereg ("([0-9]{1,2})[-|/]([0-9]{1,2})[-|/]([0-9]{4})", $dataFimDefesa, $compData))
  {
    $complementoQuerie .= " and (c.tsDataDefesa <= \"$compData[3]-$compData[2]-$compData[1]\")";
  }
?>
