</div>
</div>
</div>
</div>
</div>
<!-- /.container-fluid -->
</div>

<!-- Footer -->
     <footer class="sticky-footer bg-white">
      <div class="container my-auto">
        <div class="copyright text-center my-auto">
          <span>Copyright &copy; SIBK 2020</span>
        </div>
      </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
            
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/assets/plugins/jquery/jquery.min.js"></script>
    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/assets/plugins/jquery/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/assets/js/sb-admin-2.min.js"></script>


    <!-- Page level plugins -->
    <script src="/assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
    {{-- <script src="/assets/plugins/datatables/js/fixedColumns.jqueryui.min.js"></script> --}}
    <script src="/assets/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
    {{-- <script src="/assets/plugins/datatables/js/fixedColumns.bootstrap4.min.js"></script> --}}
    <!-- Page level custom scripts -->
    <script src="/assets/js/demo/datatables-demo.js"></script>

    <!-- Custom JS -->
    {{-- <script>
      $('#dataTable').DataTable({
        fixedColumn: true,
        fixedColumn: {
          righColumns: 1
        }
      });
    </script> --}}
    </body>

    </html>