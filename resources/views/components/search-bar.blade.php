<div class="d-flex flex-wrap align-items-center gap-2 mb-2">
    <div class="d-flex" style="max-width:420px;flex:1 1 320px;">
        <div class="input-group">
            <span class="input-group-text bg-white search-input border-end-0"><i class="bi bi-search text-muted"></i></span>
            <input type="text" id="searchInput" class="form-control border-start-0" placeholder="Search" style="border-left:none;">
        </div>
        <select id="searchField" class="form-select field-select" style="max-width:170px;">
            <option value="all">Search by field...</option>
            <option value="firstName">First Name</option>
            <option value="lastName">Last Name</option>
            <option value="email">Username/Email</option>
            <option value="id">ID</option>
        </select>
    </div>
    <div class="ms-lg-auto">
        <button class="btn btn-add-user" id="addUserBtn"><i class="bi bi-plus-lg me-1"></i>Add User</button>
    </div>
</div>
