<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>
    @page{
  size: A4 landscape
}

body{
  font-family: 'Roboto', Tahoma, sans-serif;
}


*{
  margin: 0;
  padding:0;
  box-sizing: border-box;
}

table,
    th,
    td{
        border: 1px solid rgb(0, 0, 0);
        border-collapse: collapse;
    }

.container{
  width: 100%;
  height: 100vh;
  font-size: 0px;
}

.logo1{
  display: inline-block;
  width: 50%;
  height: 100px;
  background: blue;
}

.logo2{
  display: inline-block;
  width: 50%;
  height: 100px;
  background: blue;
}

.paciente{

}

.paciente .green{

  display: inline-block;
  width:50%;
  height:auto;
  font-size: 16px;
}

.paciente .green table{
  width:100%;

}

.paciente .blue{
  display: inline-block;
  width:50%;
  height:auto;
  font-size: 16px;
}

.paciente .blue table{
  width:100%;

}

.bold{
  font-weight: bold;
}

.table--dados-veterinario-legenda:nth-child(3){
  font-size: 12px;
  width: 13px;
}

.table--dados-veteriario{

}

.table--dados-veteriario:nth-child(2){
  width: 300px;
}

.table--dados-veteriario:nth-child(4){
  width: 80px;
}

.exame .red{
  font-size: 16px;
}

.exame .yellow{
  font-size: 16px;

}

.red{
  display: inline-block;
  width: 50%
}

.red table{
  width: 100%;
}

.yellow{
  display: inline-block;
  width: 50%;
  height:349px;

}

.yellow table{
  width: 100%;
}

.yellow table:nth-of-type(4){
    padding: 2px;
}


  </style>
</head>
<body>

  <div class="container">
    <div class="logo">
      <div class="logo1"></div>
      <div class="logo2"></div>
    </div>
    <div class="paciente">
      <div class="box green">
      <table class="table-info">
        <tbody>
          <tr class="table--nome-paciente">
            <th colspan="8">
              Informações do Paciente
            </th>
          </tr>
          <tr>
            <td class="bold table--dados-paciente-legenda">Nome:</td>
            <td colspan="8" class="table--dados-paciente"> Brucie</td>
          </tr>
          <tr class="table--dados-paciente-row">
            <td class="bold table--dados-paciente-legenda">Espécie:</td>
            <td class="table--dados-paciente paciente-especie">Canino</td>
            <td class="bold table--dados-paciente-legenda">Raça:</td>
            <td class="table--dados-paciente">Husky Siberiano</td>
            <td class="bold table--dados-paciente-legenda">Sexo:</td>
            <td class="table--dados-paciente">Macho</td>
            <td class="bold table--dados-paciente-legenda">Idade:</td>
            <td class="table--dados-paciente">19</td>
          </tr>
        </tbody>
    </table>
      <table class="table-info">
        <tbody>
          <tr class="table--cabecalho-tutor--row">
            <th class="table--cabecalho-tutor-legenda" colspan=8>Dados do Tutor</th>
          </tr>
          <tr class="table--dados-tutor--row">
            <td class="table--dados-tutor-legenda bold">Nome:</td>
            <td colspan=7 class="table--dados-tutor">Francisco Oliveira</td>
          </tr>
          <tr class="table--contato-tutor--row">
            <td class="table--contato-tutor-legenda bold" colspan="1">Telefone</td>
            <td class="table--contato-tutor" colspan="1">(21) 965214641</td>
            <td class="table--contato-tutor-legenda bold" colspan="1">E-mail:</td>
            <td class="table--contato-tutor" colspan="5">silvasousalucas@live.com</td>
          </tr>
        </tbody>
    </table>
    <table class="table-info">
        <tbody>
          <tr class="table--cabecalho-veterinario">
            <th colspan="8" class="table--cabecalho-veterinario-legenda">Dados do Veterinário</th>
          </tr>
          <tr class="table--dados-veterinario--row">
            <td class="table--dados-veterinario-legenda bold" colspan="1">Nome:</td>
            <td class="table--dados-veteriario" colspan="3">Ana Júlia Martins</td>
            <td class="table--dados-veterinario-legenda bold" colspan="1">CRMV</td>
            <td class="table--dados-veteriario" colspan="1">RJ-250025</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="box blue">
        <table class="table-info">
        <tbody>
          <tr class="table--nome-paciente">
            <th colspan="8">
              Informações do Paciente
            </th>
          </tr>
          <tr>
            <td class="bold table--dados-paciente-legenda">Nome:</td>
            <td colspan="8" class="table--dados-paciente"> Brucie</td>
          </tr>
          <tr class="table--dados-paciente-row">
            <td class="bold table--dados-paciente-legenda">Espécie:</td>
            <td class="table--dados-paciente paciente-especie">Canino</td>
            <td class="bold table--dados-paciente-legenda">Raça:</td>
            <td class="table--dados-paciente">Husky Siberiano</td>
            <td class="bold table--dados-paciente-legenda">Sexo:</td>
            <td class="table--dados-paciente">Macho</td>
            <td class="bold table--dados-paciente-legenda">Idade:</td>
            <td class="table--dados-paciente">19</td>
          </tr>
        </tbody>
    </table>
      <table class="table-info">
        <tbody>
          <tr class="table--cabecalho-tutor--row">
            <th class="table--cabecalho-tutor-legenda" colspan=8>Dados do Tutor</th>
          </tr>
          <tr class="table--dados-tutor--row">
            <td class="table--dados-tutor-legenda bold">Nome:</td>
            <td colspan=7 class="table--dados-tutor">Francisco Oliveira</td>
          </tr>
          <tr class="table--contato-tutor--row">
            <td class="table--contato-tutor-legenda bold" colspan="1">Telefone</td>
            <td class="table--contato-tutor" colspan="1">(21) 965214641</td>
            <td class="table--contato-tutor-legenda bold" colspan="1">E-mail:</td>
            <td class="table--contato-tutor" colspan="5">silvasousalucas@live.com</td>
          </tr>
        </tbody>
    </table>
    <table class="table-info">
        <tbody>
          <tr class="table--cabecalho-veterinario">
            <th colspan="8" class="table--cabecalho-veterinario-legenda">Dados do Veterinário</th>
          </tr>
          <tr class="table--dados-veterinario--row">
            <td class="table--dados-veterinario-legenda bold" colspan="1">Nome:</td>
            <td class="table--dados-veteriario" colspan="3">Ana Júlia Martins</td>
            <td class="table--dados-veterinario-legenda bold" colspan="1">CRMV</td>
            <td class="table--dados-veteriario" colspan="1">RJ-250025</td>
          </tr>
        </tbody>
      </table>
    </div>
    </div>
    <div class="exame">
      <div class="box red">
        <table class="table-info">
            <tr><th colspan="4">Bioquímica</th></tr>
            <tr>
              <td>(  ) Glicose</td>
              <td>(  ) Ureia</td>
              <td>(  ) Creatina</td>
              <td>(  ) Eletrólitos (Na+K+Cl)</td>
            </tr>
          </table>

          <table class="table-info">
            <tr>
              <td>(  ) AST(TGO)</td>
              <td>(  ) ALT(TGP)</td>
              <td>(  ) Fosfatase Alcalina</td>
              <td>(  ) Proteína Total e frações</td>
            </tr>
          </table>

          <table class="table-info">
            <tr>
              <td>(  ) Amilase</td>
              <td>(  ) Lipase</td>
              <td>(  ) Cálcio</td>
              <td>(  ) Ferro</td>
            </tr>
          </table>

          <table class="table-info">
            <tr>
              <td>(  ) Bilirrubinas Totais e Frações</td>
              <td>(  ) DHL</td>
            </tr>
          </table>


            <table class="table-info">
                <tbody>
                    <tr>
                        <th colspan="2">Hematologia</th>
                    </tr>

                    <tr>
                        <td>( ) Hemograma Completo</td>
                        <td>( ) Teste de Compatibilidade Sanguinea</td>
                    </tr>
                    <tr>
                        <td>( ) Teste de Coagulação</td>
                        <td>( ) Pesquisa de Microfilária</td>
                    </tr>
                </tbody>
            </table>

            <table class="table-info">
                <tbody>
                    <tr>
                        <th colspan="2">Imunologia</th>
                    </tr>

                    <tr>
                        <td>( ) Erliquiose lgG</td>
                        <td>( ) Dirofilariose AG</td>
                    </tr>
                    <tr>
                        <td>( ) Leishmaniose lgG</td>
                        <td>( ) Leptospirose Total (Microaglutinação)</td>
                    </tr>
                </tbody>
            </table>

            <table class="table-info">
                <tbody>
                    <tr>
                        <th colspan="1">Microbiologia</th>
                    </tr>

                    <tr>
                        <td>( ) Pesquisa de Esporotricose</td>
                    </tr>
                </tbody>
            </table>
            <table class="table-info">
                <tbody>
                    <tr>
                        <th colspan="2">Citologia</th>
                    </tr>

                    <tr>
                        <td>( ) Citologia De Líquido Ascítico/Tórax</td>
                        <td>( ) Citologia Otológica</td>
                    </tr>
                </tbody>
            </table>
            <table class="table-info">
                <tbody>
                    <tr>
                        <th colspan="2">Urinálise</th>
                    </tr>

                    <tr>
                        <td>( ) EAS</td>
                        <td>( ) Relação PTN/Creatina</td>
                    </tr>
                </tbody>
            </table>
        </div>

    <div class="box yellow">
      <table class="table-info">
        <tr><th colspan="4">Radiografia Simples</th></tr>
        <tr>
          <td>( ) Tórax</td>
          <td>( ) Abdômen</td>
          <td>( ) Pelve</td>
          <td>( ) Pescoço</td>
        </tr>
        <tr>
          <td>( ) Crânio:</td>
          <td colspan="3">( ) ATM ( ) Mandíbula ( ) Maxilar ( ) Bulas Timpânicas ( ) Seios Nasais ( ) Calota Craniana</td>
        </tr>
        <tr>
          <td>( ) Coluna:</td>
          <td colspan="3">( ) Cervical ( ) Cervitorácica ( ) Toracolombar ( ) Lombar ( ) Lombossacra ( ) Caudal</td>
        </tr>
        <tr>
          <td>( ) Membro Torácico:</td>
          <td colspan="3">( ) Esquerdo ( ) Direito</td>
        </tr>
        <tr>
          <td>( ) Membro Pélvico:</td>
          <td colspan="3">( ) Esquerdo ( ) Direito</td>
        </tr>
      </table>

      <table class="table-info">
        <tr><th colspan="4">Ultrassonografia</th></tr>
        <tr>
          <td>( ) Abdominal</td>
          <td>( ) Ocular</td>
          <td>( ) Cervical</td>
          <td>( ) Outros: ______</td>
        </tr>
      </table>

      <table class="table-info">
        <tr><th colspan="4">Tomografia Computadorizada</th></tr>
        <tr>
          <td>( ) Tórax</td>
          <td>( ) Abdômen</td>
          <td>( ) Pescoço</td>
          <td>( ) Crânio:</td>
        </tr>
        <tr>
          <td colspan="4">( ) Bulas Timpânicas ( ) Seios Nasais ( ) Encéfalo</td>
        </tr>
      </table>

      <table class="table-info">
        <tr><th colspan="3">Cardiologia</th></tr>
        <tr>
          <td>( ) Ecocardiograma</td>
          <td>( ) Eletrocardiograma</td>
          <td>( ) Avaliação Pré-Anestésica</td>

        </tr>
      </table>
</div>
    </div>
    <div class="assinatura"></div>
  </div>

</body>
</html>
