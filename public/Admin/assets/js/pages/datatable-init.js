$('.datatable').DataTable({
  responsive: true,                // 👈 makes it mobile-friendly
  pageLength: 10,
  lengthMenu: [10, 25, 50, 100],
  ordering: true,
  searching: true,
  paging: true,
  info: true
});
