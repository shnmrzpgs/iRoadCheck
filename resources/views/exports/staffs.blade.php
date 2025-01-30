<table>
    <thead>
    <tr>
        <td colspan="4" height="20"></td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: center; margin-top: 40px; font-size: 11px; font-weight: bold;">
            Republic of the Philippines
        </td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: center; font-size: 11px; font-weight: bold;">
            Province of Davao del Norte
        </td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: center; font-size: 11px; font-weight: bold;">
            CITY OF TAGUM
        </td>
    </tr>
    <tr>
        <td colspan="4"></td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: center; font-size: 9px; font-weight: bold;">
            OFFICE OF THE CITY ENGINEERING
        </td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: center; font-size: 9px; font-weight: regular;">
            2/F Annex Building, City Government, J.V. Ayala Ave., Barangay Apokon, Tagum City
        </td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: center; font-size: 9px; font-weight: regular;">
            Telephone No. (9) 216 - 9367 Local 141
        </td>

        <!-- Spacing -->
    <tr style="border-bottom: 4px solid #000;">
        <td colspan="4" height="10"></td>
    </tr>
    <tr style="border-bottom: 4px solid #000;">
        <td colspan="4" height="20"></td>
    </tr>

    <tr>
        <td colspan="4" style="text-align: center; font-size: 14px; font-weight: bold;">
            <strong>iRoadCheck Staffs</strong>
        </td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: center; font-size: 12px;">
            @if(!empty($subtitle))
                @foreach($subtitle as $line)
                    {{ $line }}<br>
                @endforeach
            @endif
            As of {{ now()->format('F d, Y') }}
        </td>
    </tr>
    <!-- Spacing -->
    <tr>
        <td colspan="4" height="20"></td>
    </tr>
    <tr>
        <th style="border: 1px solid #FFFFFF; background-color: #000000; color: #FFFFFF; font-family: 'Arial', sans-serif; font-size: 10px; text-align: center; font-weight:bold ">No</th>
        <th style="border: 1px solid #FFFFFF; background-color: #000000; color: #FFFFFF; font-family: 'Arial', sans-serif; font-size: 10px; text-align: center; font-weight:bold ">Staff Name</th>
        <th style="border: 1px solid #FFFFFF; background-color: #000000; color: #FFFFFF; font-family: 'Arial', sans-serif; font-size: 10px; text-align: center; font-weight:bold ">Username</th>
        <th style="border: 1px solid #FFFFFF; background-color: #000000; color: #FFFFFF; font-family: 'Arial', sans-serif; font-size: 10px; text-align: center; font-weight:bold ">Staff Role</th>
        <th style="border: 1px solid #FFFFFF; background-color: #000000; color: #FFFFFF; font-family: 'Arial', sans-serif; font-size: 10px; text-align: center; font-weight:bold ">Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($staffs as $staff)
        <tr>
            <td style="border: 1px solid #101010; text-align: center;">{{ $loop->iteration }}</td>
            <td style="border: 1px solid #101010; text-align: left;">{{ $staff->user->first_name }} {{ $staff->user->middle_name }} {{ $staff->user->last_name }}</td>
            <td style="border: 1px solid #101010; text-align: left;">{{ $staff->username }}</td>
            <td style="border: 1px solid #101010; text-align: left;">{{ optional($staff->staffRolesPermissions->staffRole)->name ?? 'No role assigned' }}</td>
            <td style="border: 1px solid #101010; text-align: left;"> {{ ucfirst($staff->status ?? 'Unknown') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
