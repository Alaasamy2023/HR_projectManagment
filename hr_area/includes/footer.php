  </div>
  
  <!-- Script -->
        <script>
        $(document).ready(function(){
            var empDataTable = $('#empTable').DataTable({
                dom: 'Blfrtip',
                buttons: [
                    {
                        extend: 'copy',
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: [0,1] // Column index which needs to export
                        }
                    },
                    {
                        extend: 'csv',
                    },
                    {
                        extend: 'excel',
                    }         
                ]  
            
            });

        });
        </script>
        

	<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
 	<script src="../assets/js/popper.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
 	<script src="../assets/js/script.js"></script>









	 



















</body>

</html>