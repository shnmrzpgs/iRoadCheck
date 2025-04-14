@php
    // Calculate the earliest and latest dates for the date range
    $minStartDate = $reports->min('date');
    $maxEndDate = $reports->max('date');

    $formattedDateRange = $minStartDate && $maxEndDate
        ? \Carbon\Carbon::parse($minStartDate)->format('F j, Y') . ' to ' . \Carbon\Carbon::parse($maxEndDate)->format('F j, Y')
        : 'No reports available';
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
            STAFF ACTIVITY LOG: ROAD INFORMATION UPDATES
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
        <th style="border: 1px solid #FFFFFF; background-color: #000000; color: #FFFFFF; width: 90px; font-family: 'Arial', sans-serif; font-size: 10px; text-align: center; font-weight:bold;">Defect Type</th>
        <th style="border: 1px solid #FFFFFF; background-color: #000000; color: #FFFFFF; width: 120px; font-family: 'Arial', sans-serif; font-size: 10px; text-align: center; font-weight:bold ">Location</th>
        <th style="border: 1px solid #FFFFFF; background-color: #000000; color: #FFFFFF; width: 120px; font-family: 'Arial', sans-serif; font-size: 10px; text-align: center; font-weight:bold ">Date</th>
        <th style="border-right: 1px solid #101010; background-color: #000000; color: #FFFFFF; width: 160px; font-family: 'Arial', sans-serif; font-size: 10px; text-align: center; font-weight:bold ">Road Defect Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($reports as $report)
        <tr>
            <td style="border: 1px solid #101010; text-align: center;">{{ $loop->iteration }}</td>
            <td style="border: 1px solid #101010; text-align: left;">{{ $report->defect }}</td>
            <td style="border: 1px solid #101010; text-align: left;">
                {{ $report->street }}, {{ $report->purok }}, {{ $report->barangay }}
            </td>
            <td style="border: 1px solid #101010; text-align: left;">
                {{ $report->date ? \Carbon\Carbon::parse($report->date)->format('F j, Y') : 'N/A' }}
            </td>
            <td style="border: 1px solid #101010; text-align: center;">
                {{ ucfirst($report->status) }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
