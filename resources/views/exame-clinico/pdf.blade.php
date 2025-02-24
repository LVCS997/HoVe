<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prontuário - {{ $exameClinico->pet->nome }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        h1, h2 {
            color: #2d3748;
        }
        .section {
            margin-bottom: 20px;
        }
        .section h2 {
            border-bottom: 2px solid #2d3748;
            padding-bottom: 5px;
        }
        .info {
            margin-bottom: 10px;
        }
        .info p {
            margin: 5px 0;
        }
        .info .label {
            font-weight: bold;
            color: #4a5568;
        }
        .header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .header img {
            width: 100px;
            height: auto;
            margin-right: 20px;
            margin-bottom: 20px;
        }
        .header .title {
            font-size: 24px;
            font-weight: bold;
            color: #2d3748;
        }
        .two-columns {
            width: 100%;
            border-collapse: collapse;
        }
        .two-columns td {
            width: 50%;
            vertical-align: top;
            padding: 5px;
        }
    </style>
</head>
<body>
<div class="header">
    <img src="{{ public_path('img/LogoPMDC.a9ec58f9.png') }}" alt="Logo">
    <div class="title">Prontuário Médico</div>
</div>

<div class="section">
    <h2>Informações Gerais</h2>
    <table class="two-columns">
        <tr>
            <td>
                <div class="info">
                    <p><span class="label">Data do Exame:</span> {{ $exameClinico->created_at->format('d/m/Y H:i') }}</p>
                    <p><span class="label">Médico Responsável:</span> {{ $exameClinico->medico->nome }} (CRMV: {{ $exameClinico->medico->crmv }})</p>
                    <p><span class="label">Pet:</span> {{ $exameClinico->pet->nome }}</p>
                    <p><span class="label">Unidade:</span> Hospital Municipal Veterinário de Duque de Caxias</p>
                </div>
            </td>
            <td>
                <div class="info">
                    <p><span class="label">Dono:</span> {{ $exameClinico->pet->owner->nome }}</p>
                    <p><span class="label">CPF:</span> {{ $exameClinico->pet->owner->cpf }}</p>
                </div>
            </td>
        </tr>
    </table>
</div>

<div class="section">
    <h2>Detalhes do Exame</h2>
    <table class="two-columns">
        <tr>
            <td>
                <div class="info">
                    <p><span class="label">Escore Corporal:</span> {{ $exameClinico->escore_corporal }}</p>
                    <p><span class="label">Pelo e Pele:</span> {{ $exameClinico->pelo_pele }}</p>
                    <p><span class="label">Atividade Geral:</span> {{ $exameClinico->atividade_geral }}</p>
                    <p><span class="label">Desidratação:</span> {{ $exameClinico->desidratacao }}</p>
                    <p><span class="label">Ectoparasitas:</span> {{ $exameClinico->ectoparasitas }}</p>
                    <p><span class="label">Temperatura Corporal:</span> {{ $exameClinico->temperatura_corporal }}</p>
                    <p><span class="label">Frequência Respiratória:</span> {{ $exameClinico->frequencia_respiratoria }}</p>
                </div>
            </td>
            <td>
                <div class="info">
                    <p><span class="label">Frequência Cardíaca:</span> {{ $exameClinico->frequencia_cardiaca }}</p>
                    <p><span class="label">Tempo de Preenchimento Capilar:</span> {{ $exameClinico->tempo_preenchimento_capilar }}</p>
                    <p><span class="label">Mucosas:</span> {{ $exameClinico->mucosas }}</p>
                    <p><span class="label">Perdas:</span> {{ $exameClinico->perdas }}</p>
                    <p><span class="label">Afundamento Ocular:</span> {{ $exameClinico->afundamento_ocular }}</p>
                    <p><span class="label">Elasticidade da Pele:</span> {{ $exameClinico->elasticidade_pele }}</p>
                </div>
            </td>
        </tr>
    </table>
    <div class="info">
        <p><span class="label">Observações:</span> {{ $exameClinico->observacoes }}</p>
        <p><span class="label">Exames Realizados:</span> {{ $exameClinico->exames_realizados }}</p>
        <p><span class="label">Diagnóstico Presuntivo:</span> {{ $exameClinico->diagnostico_presuntivo }}</p>
        <p><span class="label">Prescrição Hospitalar:</span> {{ $exameClinico->prescricao_hospitalar }}</p>
        <p><span class="label">Prescrição Domiciliar:</span> {{ $exameClinico->prescricao_domiciliar }}</p>
    </div>
</div>
</body>
</html>
