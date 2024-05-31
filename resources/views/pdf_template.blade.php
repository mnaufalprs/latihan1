<!DOCTYPE html>
<html>
<head>
    <title>Data Pengukuran LoadTest</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            font-size: 8pt;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h3>Data Pengukuran Load Balance Testing</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Server Address</th>
                <th>Created At</th>
                <th>Request Count</th>
                <th>Connection Count</th>
                <th>Time taken</th>
                <th>Request/second</th>
                <th>Time/request</th>
                <th>Transfer Rate</th>
                <th>Connection Time</th>
                <th>Algoritma LB</th>
                <th>Field Chart</th>
                <!-- Tambahkan kolom lain sesuai kebutuhan -->
            </tr>
        </thead>
        <tbody>
            @php
                $a = 0;        
            @endphp
            @foreach ($data_loadtest as $data)
                <tr>
                    @php
                        $a = $a+1;        
                    @endphp
                    <td>{{ $a }}</td>
                    <td>{{ $data->server_address }}</td>
                    <td>{{ $data->created_at }}</td>
                    <td>{{ $data->request_count }}</td>
                    <td>{{ $data->connection_count }}</td>
                    <td>{{ $data->time_taken }}</td>
                    <td>{{ $data->request_second }}</td>
                    <td>{{ $data->time_request }}</td>
                    <td>{{ $data->transfer_rate }}</td>
                    <td>{{ $data->connection_time }}</td>
                    <td>{{ $data->algortima_LB }}</td>
                    <td>{{ $data->field_chart }}</td>
                    <!-- Tambahkan kolom lain sesuai kebutuhan -->
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
