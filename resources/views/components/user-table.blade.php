@props(['users' => []])

<div class="table-card">
    <table class="table user-table mb-0">
        <thead>
            <tr>
                <th data-key="id">ID <i class="bi bi-arrow-down-up"></i></th>
                <th data-key="firstName">First Name <i class="bi bi-arrow-down-up"></i></th>
                <th data-key="lastName">Last Name <i class="bi bi-arrow-down-up"></i></th>
                <th data-key="email">Username/Email <i class="bi bi-arrow-down-up"></i></th>
                <th data-key="group">Group <i class="bi bi-arrow-down-up"></i></th>
                <th data-key="division">Division <i class="bi bi-arrow-down-up"></i></th>
                <th data-key="region">Region <i class="bi bi-arrow-down-up"></i></th>
                <th data-key="userType">User Type <i class="bi bi-arrow-down-up"></i></th>
                <th data-key="submittedDate">Submitted Date <i class="bi bi-arrow-down-up"></i></th>
                <th data-key="enabledDate">Enabled Date <i class="bi bi-arrow-down-up"></i></th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            {{-- Server-rendered on first page load; re-rendered client-side by
                 public/js/app.js for search, filter, sort, pagination, and CRUD. --}}
            @foreach (array_slice($users, 0, 10) as $user)
                <tr>
                    <td class="fw-semibold">{{ $user['id'] }}</td>
                    <td>{{ $user['firstName'] }}</td>
                    <td>{{ $user['lastName'] }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td><span class="badge-group badge-{{ $user['group'] }}">{{ $user['group'] }}</span></td>
                    <td>{{ $user['division'] }}</td>
                    <td>{{ $user['region'] }}</td>
                    <td>{{ $user['userType'] }}</td>
                    <td>{{ \Illuminate\Support\Carbon::parse($user['submittedDate'])->format('m/d/Y') }}</td>
                    <td>{{ \Illuminate\Support\Carbon::parse($user['enabledDate'])->format('m/d/Y') }}</td>
                    <td>
                        <button class="action-btn" title="Edit" data-action="edit" data-id="{{ $user['id'] }}"><i class="bi bi-pencil-square"></i></button>
                        <button class="action-btn danger" title="Remove" data-action="delete" data-id="{{ $user['id'] }}"><i class="bi bi-x-circle"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="empty-state d-none" id="emptyState">
        <i class="bi bi-inbox fs-1 d-block mb-2"></i>
        No users match your search or filters.
    </div>
</div>
