"use strict";
// Class definition

var KTDatatableRemoteAjaxProductDemo = function() {
    var demo = function() {
        var datatable = $('.kt-datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: base_url+'/admin/user/datatable',
                        // sample custom headers
                        headers: {'x-my-custokt-header': 'some value', 'x-test-header': 'the value'},
                        map: function(raw) {
                            // sample data mapping
                            var dataSet = raw;
                            if (typeof raw.data !== 'undefined') {
                                dataSet = raw.data;
                            }
                            return dataSet;
                        },
                    },
                },
               
                pageSizeSelect: [10, 20, 30, 50, 100],
                pageSize: 10,
                serverPaging: true,
                serverFiltering: true,
                serverSorting: true,
            },

            // layout definition
            layout: {
                scroll: false,
                footer: false,
                spinner: {
                    type: 'loader',
                    opacity: 0,
                    overlayColor: '#000000',
                    state: 'brand',
                    message: 'Please Wait...'
                }
            },

            // column sorting
            sortable: false,
            pagination: true,

            search: {
                input: $('#generalSearch')
                //delay: 400
            },

            // columns definition
            columns: [
                {
                    field: 'id',
                    title: '#',
                    sortable: 'asc',
                    width: 30,
                    type: 'number',
                    selector: false,
                    textAlign: 'center',
                },
                {
                    field: 'username',
                    title: 'Username',
                    width: 100,
                },
               
                {
                    field: 'email',
                    title: 'Email',
                    width: 150,
                },
                {
                    field: 'status',
                    title: 'Status',
                    width: 80,
                },
                {
                    field: 'action',
                    title: 'Action',
                    width: 200,
                },
            ],
        });

     $('#kt_form_status').on('change', function(){  
        datatable.search($(this).val().toLowerCase(), 'status'); });
        $('#kt_form_status,#kt_form_type').selectpicker();
    };

    return {
        // public functions
        init: function() {
            demo();
        },
    };
}();

jQuery(document).ready(function() {
    KTDatatableRemoteAjaxProductDemo.init();
});