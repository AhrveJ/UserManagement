@props(['active' => 'edit-users'])

<aside class="sidebar" id="sidebar" style="width:250px;">
    <div class="side-group">
        <div class="side-link active-parent" data-bs-toggle="collapse" data-bs-target="#userMgmtSub" aria-expanded="true">
            <i class="bi bi-people-fill side-icon"></i>
            <span>User management</span>
            <i class="bi bi-chevron-down chevron"></i>
        </div>
        <div class="collapse show" id="userMgmtSub">
            <ul class="side-sub">
                <li><a href="{{ route('users.index') }}" class="{{ $active === 'edit-users' ? 'active' : '' }}"><i class="bi bi-person-lines-fill me-2"></i>Edit Users</a></li>
                <li><a href="#"><i class="bi bi-people me-2"></i>Edit Workgroups</a></li>
            </ul>
        </div>
    </div>

    <div class="side-single">
        <a href="#" class="side-link"><i class="bi bi-file-earmark-text side-icon"></i><span>File management</span></a>
    </div>
    <div class="side-single">
        <a href="#" class="side-link"><i class="bi bi-diagram-3 side-icon"></i><span>Site management</span></a>
    </div>
    <div class="side-single">
        <a href="#" class="side-link"><i class="bi bi-megaphone side-icon"></i><span>Marketing management</span></a>
    </div>
    <div class="side-single">
        <a href="#" class="side-link"><i class="bi bi-person-badge side-icon"></i><span>CRM management</span></a>
    </div>
    <div class="side-single">
        <a href="#" class="side-link"><i class="bi bi-bar-chart-line side-icon"></i><span>Critical Metrics</span></a>
    </div>
</aside>
