<x-layout>
    <p><strong>Cidade de Nascimento:</strong> {{ $pet->cidade_nascimento ?? 'Não informado' }}</p>
    <p><strong>UF de Nascimento:</strong> {{ $pet->uf_nascimento ?? 'Não informado' }}</p>
    <p><strong>País de Nascimento:</strong> {{ $pet->pais_nascimento ?? 'Não informado' }}</p>
    <p><strong>Temperatura no Nascimento:</strong> {{ $pet->temperatura_nascimento ?? 'Não informado' }} °C</p>
    <p><strong>Peso no Nascimento:</strong> {{ $pet->peso ?? 'Não informado' }} kg</p>
    <p><strong>Hora de Nascimento:</strong> {{ $pet->hora_nascimento ?? 'Não informado' }}</p>
    <p><strong>Data de Nascimento:</strong> {{ $pet->data_nascimento ?? 'Não informado' }}</p>
    <p><strong>CPF do Dono:</strong> {{ $pet->owner->cpf ?? 'Não informado' }}</p>
</x-layout>
