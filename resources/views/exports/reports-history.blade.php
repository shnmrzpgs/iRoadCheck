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
    <tr><th style="border: none; background-color: #FFFFFF; height: 15px" colspan="5"></th></tr>
    <tr><th style="border: none; background-color: #FFFFFF; height: 15px" colspan="5"></th></tr>
    <tr>
        <th style="border: none; background-color: #FFFFFF;" colspan="1"></th>
        <th style="border: none; background-color: #FFFFFF; color: #252525; font-size: 13px; font-family: 'Arial', sans-serif; text-align: start; font-weight: bold;" colspan="4">
            REPORT HISTORY
        </th>
    </tr>
    <tr>
        <th style="border: none; background-color: #FFFFFF;" colspan="1"></th>
        <th style="border: none; background-color: #FFFFFF; color: #454545; font-size: 9px; font-family: 'Arial', sans-serif; text-align: start; font-weight: bold;" colspan="4">
            {{ $formattedDateRange }}
        </th>
    </tr>
    <tr><th style="border: none; background-color: #FFFFFF; height: 8px" colspan="5"></th></tr>
    <tr><th style="border: none; background-color: #16A34A; height: 5px" colspan="5"></th></tr>
    <tr><th style="border: none; background-color: #16A34A; height: 15px" colspan="5"></th></tr>
    <tr><th style="border: none; background-color: #16A34A; height: 8px" colspan="5"></th></tr>
    <tr>
        <th style="border: 1px solid #FFFFFF; background-color: #000000; color: #FFFFFF; font-family: 'Arial', sans-serif; font-size: 10px; text-align: center; font-weight:bold;">No</th>
        <th style="border: 1px solid #FFFFFF; background-color: #000000; color: #FFFFFF; font-family: 'Arial', sans-serif; font-size: 10px; text-align: center; font-weight:bold;">Defect Type</th>
        <th style="border: 1px solid #FFFFFF; background-color: #000000; color: #FFFFFF; font-family: 'Arial', sans-serif; font-size: 10px; text-align: center; font-weight:bold;">Location</th>
        <th style="border: 1px solid #FFFFFF; background-color: #000000; color: #FFFFFF; font-family: 'Arial', sans-serif; font-size: 10px; text-align: center; font-weight:bold;">Date</th>
        <th style="border: 1px solid #FFFFFF; background-color: #000000; color: #FFFFFF; font-family: 'Arial', sans-serif; font-size: 10px; text-align: center; font-weight:bold;">Status</th>
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
