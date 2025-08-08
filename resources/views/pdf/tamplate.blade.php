<!-- filepath: resources/views/pdf/tamplate.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Fatura - {{ $title ?? 'Documento' }}</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; }
        .fatura-box { max-width: 700px; margin: auto; border: 1px solid #eee; padding: 30px; }
        .topo { display: flex; justify-content: space-between; align-items: center; }
        .empresa { font-size: 20px; font-weight: bold; }
        .dados-cliente, .dados-fatura { margin-top: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #ccc; }
        th, td { padding: 8px; text-align: left; }
        th { background: #f5f5f5; }
        .total { text-align: right; font-size: 16px; font-weight: bold; }
        .rodape { margin-top: 40px; font-size: 12px; color: #888; text-align: center; }
    </style>
</head>
<body>
    <div class="fatura-box">
        <div class="topo">
            <div class="empresa">
                {{ $empresa ?? 'Minha Empresa Ltda.' }}
            </div>
            <div>
                <strong>Fatura Nº:</strong> {{ $numero ?? '0001' }}<br>
                <strong>Data:</strong> {{ $data ?? now()->format('d/m/Y') }}
            </div>
        </div>

        <div class="dados-cliente">
            <strong>Cliente:</strong> {{ $cliente ?? 'Nome do Cliente' }}<br>
            <strong>Endereço:</strong> {{ $endereco ?? 'Rua Exemplo, 123' }}
        </div>

        <div class="dados-fatura">
            <table>
                <thead>
                    <tr>
                        <th>Descrição</th>
                        <th>Quantidade</th>
                        <th>Valor Unitário</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($itens ?? [] as $item)
                    <tr>
                        <td>{{ $item['descricao'] }}</td>
                        <td>{{ $item['quantidade'] }}</td>
                        <td>Kz{{ number_format($item['valor'], 2, ',', '.') }}</td>
                        <td>Kz {{ number_format($item['quantidade'] * $item['valor'], 2, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="total">
                Total: Kz {{ number_format($total ?? 0, 2, ',', '.') }}
            </div>
        </div>

        <div class="rodape">
            Obrigado pela preferência!<br>
            Gerado em: {{ now()->format('d/m/Y H:i') }}
        </div>
    </div>
</body>
</html>