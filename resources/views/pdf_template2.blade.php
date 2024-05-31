<!DOCTYPE html>
<html>
<head>
    <title>Data Pengukuran RealtimeTest</title>
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
    <h3>Data Pengukuran Realtime Testing</h3>
    <h5>Connection Count = {{ $input_livetest2 ? $input_livetest2->connection_count : 'null' }}</h5>
    <h5>Request Count = {{ $input_livetest2 ? $input_livetest2->connection_count : 'null' }}</h5>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Server Address</th>
                <th>Created At</th>
                <th>Time taken</th>
                <th>Request/second</th>
                <th>Time/request</th>
                <th>Transfer Rate</th>
                <th>Connection Time</th>
                <th>Request Loss</th>
                <!-- Tambahkan kolom lain sesuai kebutuhan -->
            </tr>
        </thead>
        <tbody>
            @php
                $a = 0;        
            @endphp
            @foreach ($data_livetest2 as $data2)
                <tr>
                    @php
                        $a = $a+1;        
                    @endphp
                    <td>{{ $a }}</td>
                    <td>{{ $data2->server_address }}</td>
                    <td>{{ $data2->created_at }}</td>
                    <td>{{ $data2->time_taken }}</td>
                    <td>{{ $data2->request_second }}</td>
                    <td>{{ $data2->time_request }}</td>
                    <td>{{ $data2->transfer_rate }}</td>
                    <td>{{ $data2->connection_time }}</td>
                    <td>{{ $data2->request_loss }}</td>
                    <!-- Tambahkan kolom lain sesuai kebutuhan -->
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
