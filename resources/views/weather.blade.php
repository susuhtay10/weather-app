<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Forecast</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Your table code will be placed here -->
    <div class="container my-4">
        <h1 class="mb-4">{{ $city }} Weather Forecast</h1>
        <!--<pre>
            <?php
                print_r($weather_array);
            ?>
        </pre>-->
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Date</th>
                    <th>Maximum Temperature</th>
                    <th>Minimum Temperature</th>
                    <th>Condition</th>
                    <th>Icon</th>
                </tr>
            </thead>
            <tbody>
                <!-- Sample data row -->
                @foreach($weather_array as $key)
                <tr>
                    <td>
                        {{ $key['date'] }}
                    </td>
                    <td>
                        {{ $key['maxtemp_c'] }} °C
                    </td>
                    <td>
                        {{ $key['mintemp_c'] }} °C
                    </td>
                    <td>
                        {{ $key['condition_text'] }}
                    </td>
                    <td>
                        <img src="http:{{ $key['condition_icon'] }}" alt="{{ $key['condition_text'] }} Icon" width="50">
                    </td>
                </tr>
                @endforeach
                <!-- Add more data rows -->
            </tbody>
        </table>
    </div>
</body>
</html>
