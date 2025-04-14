@php
    // Calculate the earliest and latest dates for the date range
    $minStartDate = $staffs->min('created_at');
    $maxEndDate = $staffs->max('created_at');

    if ($minStartDate && $maxEndDate) {
        $minDate = \Carbon\Carbon::parse($minStartDate)->format('F j, Y');
        $maxDate = \Carbon\Carbon::parse($maxEndDate)->format('F j, Y');

        $formattedDateRange = $minDate === $maxDate
            ? $minDate
            : $minDate . ' to ' . $maxDate;
    } else {
        $formattedDateRange = 'No records available';
    }
@endphp

<table>
    <thead>
    <tr><th style="border-right: 1px solid #101010; background-color: #FFFFFF; height: 15px" colspan="6"></th></tr>
    <tr><th style="border-right: 1px solid #101010; background-color: #FFFFFF; height: 15px" colspan="6"></th></tr>
    <tr>
        <!-- Empty cell for column A -->
        <th style="border: none; background-color: #FFFFFF;" colspan="1"></th>
        <th style="border: none; background-color: #FFFFFF;" colspan="1"></th>
        <!-- Content starts in column B -->
        <th style="border-right: 1px solid #101010; background-color: #FFFFFF; color: #252525; font-size: 8px; font-family: 'Arial', sans-serif; text-align: start; font-weight: normal;" colspan="4">
            REPUBLIC OF THE PHILIPPINES
        </th>
    </tr>
    <tr>
        <!-- Empty cell for column A -->
        <th style="border: none; background-color: #FFFFFF;" colspan="1"></th>
        <th style="border: none; background-color: #FFFFFF;" colspan="1"></th>
        <!-- Content starts in column B -->
        <th style="border-right: 1px solid #101010; background-color: #FFFFFF; color: #252525; font-size: 8px; font-family: 'Arial', sans-serif; text-align: start; font-weight: normal;" colspan="4">
            PROVINCE OF DAVAO DEL NORTE
        </th>
    </tr>
    <tr>
        <!-- Empty cell for column A -->
        <th style="border: none; background-color: #FFFFFF;" colspan="1"></th>
        <th style="border: none; background-color: #FFFFFF;" colspan="1"></th>
        <!-- Content starts in column B -->
        <th style="border-right: 1px solid #101010; background-color: #FFFFFF ; color: #16A34A; font-size: 16px; font-family: 'Arial', sans-serif; text-align: start; font-weight: bolder; " colspan="4">
            CITY OF TAGUM
        </th>
    </tr>
    <tr>
        <!-- Empty cell for column A -->
        <th style="border: none; background-color: #16A34A;" colspan="1"></th>
        <th style="border: none; background-color: #FFFFFF;" colspan="1"></th>
        <!-- Content starts in column B -->
        <th style="border-right: 1px solid #101010; background-color: #16A34A ; color: #FFFFFF; font-size: 16px; font-family: 'Arial', sans-serif; text-align: start; font-weight: bolder; " colspan="4">
            CEO- MAINTENANCE DIVISION
        </th>
    </tr>
    <tr><th style="border-right: 1px solid #101010; background-color: #FFFFFF; height: 15px" colspan="6"></th></tr>
    <tr><th style="border-right: 1px solid #101010; background-color: #FFFFFF; height: 15px" colspan="6"></th></tr>
    <tr>
        <!-- Center the content -->
        <th style="border-right: 1px solid #101010; background-color: #FFFFFF; color: #252525; font-size: 16px; font-family: 'Arial', sans-serif; text-align: center; font-weight: bold;" colspan="6">
            LIST OF STAFFS IN IROADCHECK
        </th>
    </tr>
    <tr>
        <!-- Center the content -->
        <th style="border-right: 1px solid #101010; background-color: #FFFFFF; color: #454545; font-size: 11px; font-family: 'Arial', sans-serif; text-align: center; font-weight: bold;" colspan="6">
            As of {{ $formattedDateRange }}
        </th>
    </tr>
    <tr><th style="border-right: 1px solid #101010; background-color: #FFFFFF; height: 15px;" colspan="6"></th></tr>
    <tr>
        <th style="border: 1px solid #FFFFFF; background-color: #000000; color: #FFFFFF; width: 10px; font-family: 'Arial', sans-serif; font-size: 10px; text-align: left; font-weight:bold ">No</th>
        <th style="border: 1px solid #FFFFFF; background-color: #000000; color: #FFFFFF; width: 90px; font-family: 'Arial', sans-serif; font-size: 10px; text-align: center; font-weight:bold;" colspan="2">Staff Name</th>
        <th style="border: 1px solid #FFFFFF; background-color: #000000; color: #FFFFFF; width: 120px; font-family: 'Arial', sans-serif; font-size: 10px; text-align: center; font-weight:bold ">Username</th>
        <th style="border: 1px solid #FFFFFF; background-color: #000000; color: #FFFFFF; width: 120px; font-family: 'Arial', sans-serif; font-size: 10px; text-align: center; font-weight:bold ">Staff Role</th>
        <th style="border-right: 1px solid #101010; background-color: #000000; color: #FFFFFF; width: 160px; font-family: 'Arial', sans-serif; font-size: 10px; text-align: center; font-weight:bold ">Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($staffs as $staff)
        <tr>
            <td style="border: 1px solid #101010; text-align: center;">{{ $loop->iteration }}</td>
            <td style="border: 1px solid #101010; text-align: left;" colspan="2">{{ $staff->user->first_name }} {{ $staff->user->middle_name }} {{ $staff->user->last_name }}</td>
            <td style="border: 1px solid #101010; text-align: left;">{{ $staff->user->username }}</td>
            <td style="border: 1px solid #101010; text-align: left;">{{ optional($staff->staffRolesPermissions->staffRole)->name ?? 'No role assigned' }}</td>
            <td style="border: 1px solid #101010; text-align: left;"> {{ ucfirst($staff->status ?? 'Unknown') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
