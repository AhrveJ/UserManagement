/**
 * User Management - Edit Users
 *
 * Data is seeded server-side by the Laravel controller
 * (App\Http\Controllers\UserManagementController) via window.INITIAL_USERS,
 * then all interactivity (search, filter, sort, pagination, add/edit/delete)
 * runs client-side since no database is required for this build.
 */
(function () {
  let users = Array.isArray(window.INITIAL_USERS) ? window.INITIAL_USERS.slice() : [];

  let state = {
    search: '',
    searchField: 'all',
    status: 'All',
    region: 'All',
    division: 'All',
    sortKey: null,
    sortDir: 1,
    page: 1,
    pageSize: 10,
  };

  const tableBody = document.getElementById('tableBody');
  const emptyState = document.getElementById('emptyState');
  const pagerInfo = document.getElementById('pagerInfo');
  const paginationEl = document.getElementById('paginationEl');
  const filterRow = document.getElementById('filterRow');
  const filtersBtn = document.getElementById('filtersToggleBtn');

  /* ============ Filter dropdown helpers ============ */
  function populateSelectOptions(selectEl, values) {
    const current = selectEl.value;
    const firstOption = selectEl.querySelector('option');
    selectEl.innerHTML = '';
    if (firstOption) selectEl.appendChild(firstOption);
    [...new Set(values)].sort().forEach((v) => {
      const opt = document.createElement('option');
      opt.value = v;
      opt.textContent = v;
      selectEl.appendChild(opt);
    });
    if ([...selectEl.options].some((o) => o.value === current)) selectEl.value = current;
  }

  function refreshFilterOptions() {
    populateSelectOptions(document.getElementById('regionFilter'), users.map((u) => u.region));
    populateSelectOptions(document.getElementById('divisionFilter'), users.map((u) => u.division));
  }

  /* ============ Filtering / Sorting / Pagination ============ */
  function getFilteredUsers() {
    let list = users.slice();

    if (state.search.trim()) {
      const q = state.search.trim().toLowerCase();
      list = list.filter((u) => {
        if (state.searchField === 'all') {
          return Object.values(u).join(' ').toLowerCase().includes(q);
        }
        return String(u[state.searchField] ?? '').toLowerCase().includes(q);
      });
    }
    if (state.status !== 'All') list = list.filter((u) => u.status === state.status);
    if (state.region !== 'All') list = list.filter((u) => u.region === state.region);
    if (state.division !== 'All') list = list.filter((u) => u.division === state.division);

    if (state.sortKey) {
      list.sort((a, b) => {
        const av = String(a[state.sortKey]).toLowerCase();
        const bv = String(b[state.sortKey]).toLowerCase();
        if (av < bv) return -1 * state.sortDir;
        if (av > bv) return 1 * state.sortDir;
        return 0;
      });
    }
    return list;
  }

  function formatDate(iso) {
    if (!iso) return '';
    const [y, m, d] = iso.split('-');
    return `${m}/${d}/${y}`;
  }

  function render() {
    const filtered = getFilteredUsers();
    const total = filtered.length;
    const totalPages = Math.max(1, Math.ceil(total / state.pageSize));
    if (state.page > totalPages) state.page = totalPages;

    const startIdx = (state.page - 1) * state.pageSize;
    const pageItems = filtered.slice(startIdx, startIdx + state.pageSize);

    tableBody.innerHTML = '';
    emptyState.classList.toggle('d-none', pageItems.length !== 0);

    pageItems.forEach((u) => {
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td class="fw-semibold">${u.id}</td>
        <td>${u.firstName}</td>
        <td>${u.lastName}</td>
        <td>${u.email}</td>
        <td><span class="badge-group badge-${u.group}">${u.group}</span></td>
        <td>${u.division}</td>
        <td>${u.region}</td>
        <td>${u.userType}</td>
        <td>${formatDate(u.submittedDate)}</td>
        <td>${formatDate(u.enabledDate)}</td>
        <td>
          <button class="action-btn" title="Edit" data-action="edit" data-id="${u.id}"><i class="bi bi-pencil-square"></i></button>
          <button class="action-btn danger" title="Remove" data-action="delete" data-id="${u.id}"><i class="bi bi-x-circle"></i></button>
        </td>
      `;
      tableBody.appendChild(tr);
    });

    if (total === 0) {
      pagerInfo.textContent = 'Showing 0 entries';
    } else {
      pagerInfo.textContent = `Showing ${startIdx + 1} to ${Math.min(startIdx + state.pageSize, total)} of ${total} entries`;
    }

    renderPagination(totalPages);
  }

  function renderPagination(totalPages) {
    paginationEl.innerHTML = '';

    const makeItem = (label, page, disabled, active) => {
      const li = document.createElement('li');
      li.className = `page-item ${disabled ? 'disabled' : ''} ${active ? 'active' : ''}`;
      const a = document.createElement('a');
      a.className = 'page-link';
      a.href = '#';
      a.textContent = label;
      a.addEventListener('click', (e) => {
        e.preventDefault();
        if (disabled) return;
        state.page = page;
        render();
      });
      li.appendChild(a);
      return li;
    };

    paginationEl.appendChild(makeItem('Previous', state.page - 1, state.page === 1, false));
    for (let p = 1; p <= totalPages; p++) {
      paginationEl.appendChild(makeItem(String(p), p, false, p === state.page));
    }
    paginationEl.appendChild(makeItem('Next', state.page + 1, state.page === totalPages, false));
  }

  /* ============ Sorting header click ============ */
  document.querySelectorAll('th[data-key]').forEach((th) => {
    th.addEventListener('click', () => {
      const key = th.dataset.key;
      if (state.sortKey === key) {
        state.sortDir *= -1;
      } else {
        state.sortKey = key;
        state.sortDir = 1;
      }
      render();
    });
  });

  /* ============ Search ============ */
  document.getElementById('searchInput').addEventListener('input', (e) => {
    state.search = e.target.value;
    state.page = 1;
    render();
  });
  document.getElementById('searchField').addEventListener('change', (e) => {
    state.searchField = e.target.value;
    state.page = 1;
    render();
  });

  /* ============ Filters toggle ============ */
  filtersBtn.addEventListener('click', () => {
    filterRow.classList.toggle('d-none');
    filtersBtn.classList.toggle('active-state');
  });

  ['statusFilter', 'regionFilter', 'divisionFilter'].forEach((id) => {
    document.getElementById(id).addEventListener('change', (e) => {
      const key = id.replace('Filter', '');
      state[key] = e.target.value;
      state.page = 1;
      render();
    });
  });

  document.getElementById('clearFiltersLink').addEventListener('click', (e) => {
    e.preventDefault();
    state.status = 'All';
    state.region = 'All';
    state.division = 'All';
    state.search = '';
    state.searchField = 'all';
    document.getElementById('statusFilter').value = 'All';
    document.getElementById('regionFilter').value = 'All';
    document.getElementById('divisionFilter').value = 'All';
    document.getElementById('searchInput').value = '';
    document.getElementById('searchField').value = 'all';
    state.page = 1;
    render();
  });

  /* ============ Add / Edit modal ============ */
  const userModal = new bootstrap.Modal(document.getElementById('userModal'));
  const userModalTitle = document.getElementById('userModalTitle');
  const userForm = document.getElementById('userForm');

  document.getElementById('addUserBtn').addEventListener('click', () => {
    userForm.reset();
    document.getElementById('f_recordId').value = '';
    userModalTitle.textContent = 'Add User';
    document.getElementById('f_submittedDate').value = new Date().toISOString().slice(0, 10);
    userModal.show();
  });

  tableBody.addEventListener('click', (e) => {
    const btn = e.target.closest('button[data-action]');
    if (!btn) return;
    const id = btn.dataset.id;
    const user = users.find((u) => u.id === id);
    if (btn.dataset.action === 'edit') {
      openEditModal(user);
    } else if (btn.dataset.action === 'delete') {
      openDeleteModal(user);
    }
  });

  function openEditModal(u) {
    document.getElementById('f_recordId').value = u.id;
    document.getElementById('f_firstName').value = u.firstName;
    document.getElementById('f_lastName').value = u.lastName;
    document.getElementById('f_email').value = u.email;
    document.getElementById('f_group').value = u.group;
    document.getElementById('f_userType').value = u.userType;
    document.getElementById('f_division').value = u.division;
    document.getElementById('f_region').value = u.region;
    document.getElementById('f_status').value = u.status;
    document.getElementById('f_submittedDate').value = u.submittedDate;
    userModalTitle.textContent = `Edit User — ${u.firstName} ${u.lastName}`;
    userModal.show();
  }

  document.getElementById('saveUserBtn').addEventListener('click', () => {
    if (!userForm.reportValidity()) return;

    const recordId = document.getElementById('f_recordId').value;
    const data = {
      firstName: document.getElementById('f_firstName').value.trim(),
      lastName: document.getElementById('f_lastName').value.trim(),
      email: document.getElementById('f_email').value.trim(),
      group: document.getElementById('f_group').value,
      userType: document.getElementById('f_userType').value,
      division: document.getElementById('f_division').value,
      region: document.getElementById('f_region').value,
      status: document.getElementById('f_status').value,
      submittedDate: document.getElementById('f_submittedDate').value,
    };

    if (recordId) {
      const u = users.find((x) => x.id === recordId);
      Object.assign(u, data);
      showToast(`Saved changes for ${data.firstName} ${data.lastName}`);
    } else {
      const newId = String(Math.floor(1000 + Math.random() * 8999));
      users.unshift({ id: newId, enabledDate: data.submittedDate, ...data });
      showToast(`${data.firstName} ${data.lastName} added`);
    }

    userModal.hide();
    refreshFilterOptions();
    state.page = 1;
    render();
  });

  /* ============ Delete modal ============ */
  const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
  let pendingDeleteId = null;

  function openDeleteModal(u) {
    pendingDeleteId = u.id;
    document.getElementById('deleteUserName').textContent = `${u.firstName} ${u.lastName}`;
    deleteModal.show();
  }

  document.getElementById('confirmDeleteBtn').addEventListener('click', () => {
    const u = users.find((x) => x.id === pendingDeleteId);
    users = users.filter((x) => x.id !== pendingDeleteId);
    deleteModal.hide();
    showToast(`${u.firstName} ${u.lastName} removed`);
    refreshFilterOptions();
    render();
  });

  /* ============ Toast ============ */
  const appToast = new bootstrap.Toast(document.getElementById('appToast'), { delay: 2200 });
  function showToast(msg) {
    document.getElementById('toastMsg').textContent = msg;
    appToast.show();
  }

  /* ============ Mobile sidebar ============ */
  const sidebar = document.getElementById('sidebar');
  const backdrop = document.getElementById('sidebarBackdrop');
  document.getElementById('sidebarToggle').addEventListener('click', () => {
    sidebar.classList.toggle('show');
    backdrop.classList.toggle('show');
  });
  backdrop.addEventListener('click', () => {
    sidebar.classList.remove('show');
    backdrop.classList.remove('show');
  });

  /* ============ Init ============ */
  refreshFilterOptions();
  render();
})();
