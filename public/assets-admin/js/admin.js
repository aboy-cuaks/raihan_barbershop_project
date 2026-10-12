(function () {
  const html = document.documentElement;
  const sidebar = document.getElementById('sidebar');
  const overlay = document.getElementById('sidebarOverlay');
  const toggle = document.getElementById('sidebarToggle');
  const close = document.getElementById('sidebarClose');
  const themeToggle = document.getElementById('themeToggle');
  const userButton = document.getElementById('userMenuButton');
  const userMenu = document.getElementById('userMenu');
  const profileButton = document.getElementById('profileButton');
  const profileMenu = document.getElementById('profileMenu');
  const search = document.getElementById('globalSearch');

  function openSidebar() { sidebar?.classList.add('open'); overlay?.classList.add('visible'); }
  function closeSidebar() { sidebar?.classList.remove('open'); overlay?.classList.remove('visible'); }
  toggle?.addEventListener('click', () => {
    if (window.innerWidth <= 760) sidebar?.classList.contains('open') ? closeSidebar() : openSidebar();
  });
  close?.addEventListener('click', closeSidebar);
  overlay?.addEventListener('click', closeSidebar);

  try {
    if (localStorage.getItem('fm-admin-theme') === 'dark') html.dataset.theme = 'dark';
  } catch (error) { /* Local storage may be unavailable; the default theme still works. */ }
  themeToggle?.addEventListener('click', () => {
    const next = html.dataset.theme === 'dark' ? 'light' : 'dark';
    html.dataset.theme = next;
    try { localStorage.setItem('fm-admin-theme', next); } catch (error) { /* Optional preference only. */ }
  });

  userButton?.addEventListener('click', () => { if (userMenu) userMenu.hidden = !userMenu.hidden; });
  profileButton?.addEventListener('click', () => { if (profileMenu) profileMenu.hidden = !profileMenu.hidden; });
  document.addEventListener('click', (event) => {
    const target = event.target;
    if (userMenu && !userMenu.hidden && !userMenu.contains(target) && !userButton?.contains(target)) userMenu.hidden = true;
    if (profileMenu && !profileMenu.hidden && !profileMenu.contains(target) && !profileButton?.contains(target)) profileMenu.hidden = true;
  });

  if (search) {
    search.addEventListener('input', () => {
      const term = search.value.toLowerCase().trim();
      document.querySelectorAll('.searchable').forEach((element) => {
        const content = (element.dataset.search || element.textContent || '').toLowerCase();
        element.style.display = !term || content.includes(term) ? '' : 'none';
      });
    });
  }
})();
