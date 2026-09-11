<div class="modal fade" id="userModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalTitle">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="userForm">
                    <input type="hidden" id="f_recordId">
                    <div class="row g-3">
                        <div class="col-6">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" id="f_firstName" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="f_lastName" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Username/Email</label>
                            <input type="email" class="form-control" id="f_email" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Group</label>
                            <select class="form-select" id="f_group">
                                <option>Admin</option>
                                <option>Licensed</option>
                                <option>Forward</option>
                                <option>Recruiter</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label">User Type</label>
                            <select class="form-select" id="f_userType">
                                <option>Standard</option>
                                <option>Manager</option>
                                <option>Executive</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Division</label>
                            <select class="form-select" id="f_division">
                                <option>NY</option>
                                <option>CA</option>
                                <option>TX</option>
                                <option>IL</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Region</label>
                            <select class="form-select" id="f_region">
                                <option>Corporate</option>
                                <option>West</option>
                                <option>South</option>
                                <option>North</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Status</label>
                            <select class="form-select" id="f_status">
                                <option>Active</option>
                                <option>Pending</option>
                                <option>Disabled</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Submitted Date</label>
                            <input type="date" class="form-control" id="f_submittedDate">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-add-user" id="saveUserBtn">Save User</button>
            </div>
        </div>
    </div>
</div>
