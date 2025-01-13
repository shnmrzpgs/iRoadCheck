@php
    // Calculate the earliest and latest dates for the date range
    $minStartDate = $residentLogs->min('created_at');
    $maxEndDate = $residentLogs->max('created_at');

    $formattedDateRange = $minStartDate && $maxEndDate
        ? \Carbon\Carbon::parse($minStartDate)->format('F j, Y') . ' to ' . \Carbon\Carbon::parse($maxEndDate)->format('F j, Y')
        : 'No logs available';
@endphp

<table>
    <thead>
    <tr><th style="border: none; background-color: #FFFFFF; height: 15px" colspan="5"></th></tr>
    <tr><th style="border: none; background-color: #FFFFFF; height: 15px" colspan="5"></th></tr>
    <tr>
        <!-- Empty cell for column A -->
        <th style="border: none; background-color: #FFFFFF;" colspan="1"></th>
        <!-- Content starts in column B -->
        <th style="border: none; background-color: #FFFFFF; color: #252525; font-size: 13px; font-family: 'Arial', sans-serif; text-align: start; font-weight: bold;" colspan="4">
            RESIDENT LOGS REPORT
        </th>
    </tr>
    <tr>
        <!-- Empty cell for column A -->
        <th style="border: none; background-color: #FFFFFF;" colspan="1"></th>
        <!-- Content starts in column B -->
        <th style="border: none; background-color: #FFFFFF; color: #454545; font-size: 9px; font-family: 'Arial', sans-serif; text-align: start; font-weight: bold;" colspan="4">
            {{ $formattedDateRange }}
        </th>
    </tr>
    <tr><th style="border: none; background-color: #FFFFFF; height: 8px" colspan="5"></th></tr>
    <tr><th style="border: none; background-color: #16A34A; height: 5px" colspan="5"></th></tr>
    <tr><th style="border: none; background-color: #16A34A; height: 15px" colspan="5"></th></tr>
    <tr>
        <th style="border: none; background-color: #16A34A; height: 8px" colspan="5"></th></tr>
    <tr>
        <th style="border: 1px solid #FFFFFF; background-color: #000000; color: #FFFFFF; font-family: 'Arial', sans-serif; font-size: 10px; text-align: center; font-weight:bold ">No</th>
        <th style="border: 1px solid #FFFFFF; background-color: #000000; color: #FFFFFF; font-family: 'Arial', sans-serif; font-size: 10px; text-align: center; font-weight:bold ">Resident Name</th>
        <th style="border: 1px solid #FFFFFF; background-color: #000000; color: #FFFFFF; font-family: 'Arial', sans-serif; font-size: 10px; text-align: center; font-weight:bold ">Action</th>
        <th style="border: 1px solid #FFFFFF; background-color: #000000; color: #FFFFFF; font-family: 'Arial', sans-serif; font-size: 10px; text-align: center; font-weight:bold ">Date and Time</th>
        <th style="border: 1px solid #FFFFFF; background-color: #000000; color: #FFFFFF; font-family: 'Arial', sans-serif; font-size: 10px; text-align: center; font-weight:bold ">Created At</th>
    </tr>
    </thead>
    <tbody>
    @foreach($residentLogs as $log)
        <tr>
            <td style="border: 1px solid #101010; text-align: center;">{{ $loop->iteration }}</td>
            <td style="border: 1px solid #101010; text-align: left;">{{ $log->resident->name }}</td>
            <td style="border: 1px solid #101010; text-align: left;">{{ $log->action }}</td>
            <td style="border: 1px solid #101010; text-align: left;">{{ \Carbon\Carbon::parse($log->date_time)->format('F j, Y h:i A') }}</td>
            <td style="border: 1px solid #101010; text-align: left;">{{ \Carbon\Carbon::parse($log->created_at)->format('F j, Y h:i A') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
