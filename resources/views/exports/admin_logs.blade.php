@php
    // Calculate the earliest and latest dates for the date range
    $minStartDate = $adminLogs->min('created_at');
    $maxEndDate = $adminLogs->max('created_at');

    if ($minStartDate && $maxEndDate) {
        $minDate = \Carbon\Carbon::parse($minStartDate)->format('F j, Y');
        $maxDate = \Carbon\Carbon::parse($maxEndDate)->format('F j, Y');

        $formattedDateRange = $minDate === $maxDate
            ? $minDate
            : $minDate . ' to ' . $maxDate;
    } else {
        $formattedDateRange = 'No logs available';
    }
@endphp

<table>
    <thead>
    <tr><th style="border-right: 1px solid #101010; background-color: #FFFFFF; height: 15px" colspan="5"></th></tr>
    <tr><th style="border-right: 1px solid #101010; background-color: #FFFFFF; height: 15px" colspan="5"></th></tr>
    <tr>
        <!-- Empty cell for column A -->
        <th style="border: none; background-color: #FFFFFF;" colspan="1"></th>
        <th style="border: none; background-color: #FFFFFF;" colspan="1"></th>
        <!-- Content starts in column B -->
        <th style="border-right: 1px solid #101010; background-color: #FFFFFF; color: #252525; font-size: 8px; font-family: 'Arial', sans-serif; text-align: start; font-weight: normal;" colspan="3">
            REPUBLIC OF THE PHILIPPINES
        </th>
    </tr>
    <tr>
        <!-- Empty cell for column A -->
        <th style="border: none; background-color: #FFFFFF;" colspan="1"></th>
        <th style="border: none; background-color: #FFFFFF;" colspan="1"></th>
        <!-- Content starts in column B -->
        <th style="border-right: 1px solid #101010; background-color: #FFFFFF; color: #252525; font-size: 8px; font-family: 'Arial', sans-serif; text-align: start; font-weight: normal;" colspan="3">
            PROVINCE OF DAVAO DEL NORTE
        </th>
    </tr>
    <tr>
        <!-- Empty cell for column A -->
        <th style="border: none; background-color: #FFFFFF;" colspan="1"></th>
        <th style="border: none; background-color: #FFFFFF;" colspan="1"></th>
        <!-- Content starts in column B -->
        <th style="border-right: 1px solid #101010; background-color: #FFFFFF ; color: #16A34A; font-size: 16px; font-family: 'Arial', sans-serif; text-align: start; font-weight: bolder; " colspan="3">
            CITY OF TAGUM
        </th>
    </tr>
    <tr>
        <!-- Empty cell for column A -->
        <th style="border: none; background-color: #16A34A;" colspan="1"></th>
        <th style="border: none; background-color: #FFFFFF;" colspan="1"></th>
        <!-- Content starts in column B -->
        <th style="border-right: 1px solid #101010; background-color: #16A34A ; color: #FFFFFF; font-size: 16px; font-family: 'Arial', sans-serif; text-align: start; font-weight: bolder; " colspan="3">
            CEO- MAINTENANCE DIVISION
        </th>
    </tr>
    <tr><th style="border-right: 1px solid #101010; background-color: #FFFFFF; height: 15px" colspan="5"></th></tr>
    <tr><th style="border-right: 1px solid #101010; background-color: #FFFFFF; height: 15px" colspan="5"></th></tr>
    <tr>
        <!-- Center the content -->
        <th style="border-right: 1px solid #101010; background-color: #FFFFFF; color: #252525; font-size: 16px; font-family: 'Arial', sans-serif; text-align: center; font-weight: bold;" colspan="5">
            LIST OF ADMIN LOGS IN IROADCHECK
        </th>
    </tr>
    <tr>
        <!-- Center the content -->
        <th style="border-right: 1px solid #101010; background-color: #FFFFFF; color: #454545; font-size: 11px; font-family: 'Arial', sans-serif; text-align: center; font-weight: bold;" colspan="5">
            As of {{ $formattedDateRange }}
        </th>
    </tr>
    <tr><th style="border-right: 1px solid #101010; background-color: #FFFFFF; height: 15px;" colspan="5"></th></tr>
    <tr>
        <th style="border: 1px solid #FFFFFF; background-color: #000000; color: #FFFFFF; width: 10px; font-family: 'Arial', sans-serif; font-size: 10px; text-align: left; font-weight:bold ">No</th>
        <th style="border: 1px solid #FFFFFF; background-color: #000000; color: #FFFFFF; width: 90px; font-family: 'Arial', sans-serif; font-size: 10px; text-align: center; font-weight:bold;"  colspan="2">Admin Name</th>
        <th style="border: 1px solid #FFFFFF; background-color: #000000; color: #FFFFFF; width: 120px; font-family: 'Arial', sans-serif; font-size: 10px; text-align: center; font-weight:bold ">Action</th>
        <th style="border-right: 1px solid #101010; background-color: #000000; color: #FFFFFF; width: 160px; font-family: 'Arial', sans-serif; font-size: 10px; text-align: center; font-weight:bold ">Date and Time</th>
    </tr>
    </thead>
    <tbody>
    @foreach($adminLogs as $log)
        <tr>
            <td style="border: 1px solid #101010; text-align: center;">{{ $loop->iteration }}</td>
            <td style="border: 1px solid #101010; text-align: left;" colspan="2">{{ $log->admin->name }}</td>
            <td style="border: 1px solid #101010; text-align: left;">{{ $log->action }}</td>
            <td style="border: 1px solid #101010; text-align: left;">
                {{ \Carbon\Carbon::parse($log->created_at)->format('F d, Y \a\t h:i A') }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
