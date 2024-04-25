<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Invoice</title>
            <style>
                body {
                    font-family: sans-serif;
                }

                table {
                    width: 100%;
                    border-collapse: collapse;
                }

                th, td {
                    border: 1px solid #ddd;
                    padding: 8px;
                }

                th {
                    text-align: left;
                    background-color: #f0f0f0;
                }
            </style>
        </head>
        <body>
        

            <table border ="0">
                <tr>
                    <th>id</th>
                    <th>Participante</th>
                    <th>Stand</th>
                    <th>Subtotal</th>
                </tr>
               
                    <tr>
                        <td>{{ $venta->id}}</td>
                        <td>{{ $participante->nombre}}</td>
                        <td>{{ $stand->nombre }}</td>
                        <td>{{ $venta->montocancelado}}</td>
                    </tr>
                
                <tr>
                    <td colspan="3">Subtotal</td>
                    <td>{{$venta->montocancelado }}</td>
                </tr>
                
                <tr>
                    <td colspan="3">Total</td>
                    <td>{{ $venta->montocancelado }}</td>
                </tr>
            </table>

            <p>Thank you for your business!</p>
        </body>
        </html>