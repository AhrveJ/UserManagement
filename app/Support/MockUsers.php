<?php

namespace App\Support;

/**
 * In-memory mock data source for the User Management screen.
 * Swap this out for an Eloquent model + migration later without
 * touching the controller's public API.
 */
class MockUsers
{
    /**
     * @return array<int, array<string, string>>
     */
    public static function all(): array
    {
        return [
            ['id' => '0513', 'firstName' => 'John',   'lastName' => 'Doe',     'email' => 'JohnDoe@Email.com',      'group' => 'Admin',     'division' => 'NY', 'region' => 'Corporate', 'userType' => 'Executive', 'status' => 'Active',   'submittedDate' => '2025-05-01', 'enabledDate' => '2025-05-01'],
            ['id' => '1681', 'firstName' => 'Mike',   'lastName' => 'Harry',   'email' => 'Mikeharry@Email.com',    'group' => 'Admin',     'division' => 'NY', 'region' => 'Corporate', 'userType' => 'Manager',   'status' => 'Active',   'submittedDate' => '2025-05-02', 'enabledDate' => '2025-05-05'],
            ['id' => '0123', 'firstName' => 'Jess',   'lastName' => 'Lambert', 'email' => 'JLambert91@Email.com',   'group' => 'Licensed',  'division' => 'NY', 'region' => 'Corporate', 'userType' => 'Standard',  'status' => 'Active',   'submittedDate' => '2025-05-01', 'enabledDate' => '2025-05-01'],
            ['id' => '8415', 'firstName' => 'Yor',    'lastName' => 'Plan',    'email' => 'YorP@Email.com',         'group' => 'Forward',   'division' => 'NY', 'region' => 'Corporate', 'userType' => 'Standard',  'status' => 'Pending',  'submittedDate' => '2025-05-15', 'enabledDate' => '2025-05-15'],
            ['id' => '6512', 'firstName' => 'Kim',    'lastName' => 'Jeun',    'email' => 'KimJ99@Email.com',       'group' => 'Recruiter', 'division' => 'NY', 'region' => 'Corporate', 'userType' => 'Standard',  'status' => 'Active',   'submittedDate' => '2025-05-15', 'enabledDate' => '2025-05-16'],
            ['id' => '1874', 'firstName' => 'Harry',  'lastName' => 'Styles',  'email' => 'HarrySS@Email.com',      'group' => 'Forward',   'division' => 'NY', 'region' => 'Corporate', 'userType' => 'Manager',   'status' => 'Active',   'submittedDate' => '2025-06-01', 'enabledDate' => '2025-06-01'],
            ['id' => '6301', 'firstName' => 'Fulgur', 'lastName' => 'Metane',  'email' => 'FulgurMet@Email.com',    'group' => 'Forward',   'division' => 'NY', 'region' => 'Corporate', 'userType' => 'Standard',  'status' => 'Disabled', 'submittedDate' => '2025-06-02', 'enabledDate' => '2025-06-02'],
            ['id' => '4328', 'firstName' => 'Sarah',  'lastName' => 'Chen',    'email' => 'SarahC@Email.com',       'group' => 'Admin',     'division' => 'CA', 'region' => 'West',      'userType' => 'Executive', 'status' => 'Active',   'submittedDate' => '2025-06-10', 'enabledDate' => '2025-06-10'],
            ['id' => '9987', 'firstName' => 'David',  'lastName' => 'Park',    'email' => 'DavidP@Email.com',       'group' => 'Licensed',  'division' => 'CA', 'region' => 'West',      'userType' => 'Manager',   'status' => 'Active',   'submittedDate' => '2025-06-12', 'enabledDate' => '2025-06-12'],
            ['id' => '7764', 'firstName' => 'Maria',  'lastName' => 'Santos',  'email' => 'MariaS@Email.com',       'group' => 'Recruiter', 'division' => 'TX', 'region' => 'South',     'userType' => 'Standard',  'status' => 'Pending',  'submittedDate' => '2025-06-15', 'enabledDate' => '2025-06-15'],
            ['id' => '3345', 'firstName' => 'Alex',   'lastName' => 'Nguyen',  'email' => 'AlexN@Email.com',        'group' => 'Admin',     'division' => 'IL', 'region' => 'North',     'userType' => 'Standard',  'status' => 'Active',   'submittedDate' => '2025-06-18', 'enabledDate' => '2025-06-18'],
            ['id' => '5521', 'firstName' => 'Priya',  'lastName' => 'Patel',   'email' => 'PriyaP@Email.com',       'group' => 'Licensed',  'division' => 'TX', 'region' => 'South',     'userType' => 'Manager',   'status' => 'Disabled', 'submittedDate' => '2025-06-20', 'enabledDate' => '2025-06-20'],
        ];
    }
}
