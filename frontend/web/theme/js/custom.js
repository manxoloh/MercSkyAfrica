$(document).ready(function() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            dom: "Bfrtpli",
            buttons: [
                {
                    extend:    'copyHtml5',
                    text:      '<i class="fa fa-files-o text-success"></i>',
                    titleAttr: 'Copy'
                },
                {
                    extend:    'excelHtml5',
                    text:      '<i class="fa fa-file-excel-o text-info"></i>',
                    titleAttr: 'Excel'
                },
                {
                    extend:    'csvHtml5',
                    text:      '<i class="fa fa-file-text-o text-warning"></i>',
                    titleAttr: 'CSV'
                },
                {
                    extend:    'pdfHtml5',
                    text:      '<i class="fa fa-file-pdf-o text-danger"></i>',
                    titleAttr: 'PDF'
                }
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }

        });
        $('#recipients').mousedown(function(e) {
            e.preventDefault();
            $(this).prop('selected', !$(this).prop('selected'));
            return false;
        });
        

        $(document).on('click','a.popup',function(e){
            e.preventDefault();
            $('#Modal').modal('show')
                .find('.modal-body')
                .load($(this).attr('href'));

            $('#Modal').on('hidden.bs.modal', function() {
                $(this).removeData();
            });
        });

        $(document).on('click','a.details',function(e){
            e.preventDefault();
            $('#Modal').modal('show')
                .find('.modal-body')
                .load($(this).attr('href'));

            $('#Modal').on('hidden.bs.modal', function() {
                $(this).removeData();
            });
        });
    });