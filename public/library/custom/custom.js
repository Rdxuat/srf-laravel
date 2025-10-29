$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
        }
    });
    // Media Release
    $('#media_releases').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/aos/media_releases',
            type: 'GET'
        },
        order: [[0, 'desc']],
        columns: [
                { data: "id", name: "id", visible: false },  
                { data: "date_range", name: "date_range" },
                { data: "date", name: "date" },
                { data: "heading", name: "heading" },
                { data: "pdf_file_name", name: "pdf_file_name" },
                {
                    data: "action",
                    name: "action",
                    orderable: false,
                    searchable: false,
                },
        ]
    });
    $('#media_releases').on('click', '.deleteBtn', function (e) {
        e.preventDefault();

        const url = $(this).data('url');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                const CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

                $.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        "X-CSRF-TOKEN": CSRF_TOKEN
                    },
                    data: {
                        _method: 'DELETE',
                        _token: CSRF_TOKEN
                    },
                    dataType: "JSON",
                    success: function (response) {
                        Swal.fire('Deleted!', response.message || 'Media Release has been deleted.', 'success');
                        $('#media_releases').DataTable().ajax.reload(null, false);
                    },
                    error: function () {
                        Swal.fire('Error!', 'Something went wrong.', 'error');
                    }
                });
            }
        });
    }); 

    // Milestone
    $('#milestone').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/aos/milestone',
            type: 'GET'
        },
        order: [[0, 'desc']],
        columns: [
                { data: "id", name: "id", visible: false }, 
                { data: "year", name: "year" },
                { data: "text", name: "text" },
                { data: "image", name: "image" },
                {
                    data: "action",
                    name: "action",
                    orderable: false,
                    searchable: false,
                },
        ]
    });
    $('#milestone').on('click', '.deleteBtn', function (e) {
        e.preventDefault();

        const url = $(this).data('url');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                const CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

                $.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        "X-CSRF-TOKEN": CSRF_TOKEN
                    },
                    data: {
                        _method: 'DELETE',
                        _token: CSRF_TOKEN
                    },
                    dataType: "JSON",
                    success: function (response) {
                        Swal.fire('Deleted!', response.message || 'Media Release has been deleted.', 'success');
                        $('#milestone').DataTable().ajax.reload(null, false);
                    },
                    error: function () {
                        Swal.fire('Error!', 'Something went wrong.', 'error');
                    }
                });
            }
        });
    });   

    // Leadership
    $('#leadership').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/aos/leadership',
            type: 'GET'
        },
        order: [[0, 'desc']],
        columns: [
                { data: "id", name: "id", visible: false }, 
                { data: "name", name: "name" },
                { data: "des", name: "des" },
                { data: "img", name: "img" },
                { data: "sort_no", name: "sort_no" },
                { data: "txt", name: "txt" },
                {
                    data: "action",
                    name: "action",
                    orderable: false,
                    searchable: false,
                },
        ]
    });
    $('#leadership').on('click', '.deleteBtn', function (e) {
        e.preventDefault();

        const url = $(this).data('url');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                const CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

                $.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        "X-CSRF-TOKEN": CSRF_TOKEN
                    },
                    data: {
                        _method: 'DELETE',
                        _token: CSRF_TOKEN
                    },
                    dataType: "JSON",
                    success: function (response) {
                        Swal.fire('Deleted!', response.message || 'Leader has been deleted.', 'success');
                        $('#leadership').DataTable().ajax.reload(null, false);
                    },
                    error: function () {
                        Swal.fire('Error!', 'Something went wrong.', 'error');
                    }
                });
            }
        });
    });
    
     // Resource Centre
    $('#resource_centre').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/aos/resource_centre',
            type: 'GET'
        },
        order: [[0, 'desc']],
        columns: [
                { data: "id", name: "id", visible: false }, 
                { data: "title", name: "title" },
                { data: "type", name: "type" },
                { data: "business", name: "business" },
                { data: "file", name: "file" },
                {
                    data: "action",
                    name: "action",
                    orderable: false,
                    searchable: false,
                },
        ]
    });
    $('#resource_centre').on('click', '.deleteBtn', function (e) {
        e.preventDefault();

        const url = $(this).data('url');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                const CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

                $.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        "X-CSRF-TOKEN": CSRF_TOKEN
                    },
                    data: {
                        _method: 'DELETE',
                        _token: CSRF_TOKEN
                    },
                    dataType: "JSON",
                    success: function (response) {
                        Swal.fire('Deleted!', response.message || 'Resource Centre has been deleted.', 'success');
                        $('#resource_centre').DataTable().ajax.reload(null, false);
                    },
                    error: function () {
                        Swal.fire('Error!', 'Something went wrong.', 'error');
                    }
                });
            }
        });
    });

    // Map Detials
    $('#map_details').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/aos/map_details',
            type: 'GET'
        },
        order: [[0, 'desc']],
        columns: [
                { data: "id", name: "id", visible: false },  
                { data: "business", name: "business" },
                { data: "location_name", name: "location_name" },
                { data: "location_details", name: "location_details" },
                { data: "map_link", name: "map_link" },
                {
                    data: "action",
                    name: "action",
                    orderable: false,
                    searchable: false,
                },
        ]
    });
    $('#map_details').on('click', '.deleteBtn', function (e) {
        e.preventDefault();

        const url = $(this).data('url');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                const CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

                $.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        "X-CSRF-TOKEN": CSRF_TOKEN
                    },
                    data: {
                        _method: 'DELETE',
                        _token: CSRF_TOKEN
                    },
                    dataType: "JSON",
                    success: function (response) {
                        Swal.fire('Deleted!', response.message || 'Map detail has been deleted.', 'success');
                        $('#map_details').DataTable().ajax.reload(null, false);
                    },
                    error: function () {
                        Swal.fire('Error!', 'Something went wrong.', 'error');
                    }
                });
            }
        });
    }); 

    // Annual Report
    $('#annual_report').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/aos/annual_report',
            type: 'GET'
        },
        order: [[0, 'desc']],
        columns: [
                { data: "id", name: "id", visible: false },  
                { data: "year", name: "year" },
                { data: "txt", name: "title" },
                { data: "img", name: "image" },
                { data: "pdf", name: "pdf" },
                { data: "web_link", name: "web link" },
                {
                    data: "action",
                    name: "action",
                    orderable: false,
                    searchable: false,
                },
        ]
    });
    $('#annual_report').on('click', '.deleteBtn', function (e) {
        e.preventDefault();

        const url = $(this).data('url');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                const CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

                $.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        "X-CSRF-TOKEN": CSRF_TOKEN
                    },
                    data: {
                        _method: 'DELETE',
                        _token: CSRF_TOKEN
                    },
                    dataType: "JSON",
                    success: function (response) {
                        Swal.fire('Deleted!', response.message || 'Annual report has been deleted.', 'success');
                        $('#annual_report').DataTable().ajax.reload(null, false);
                    },
                    error: function () {
                        Swal.fire('Error!', 'Something went wrong.', 'error');
                    }
                });
            }
        });
    }); 

    // Annual Report Sub
    $('#annual_report_sub').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/aos/annual_report_sub',
            type: 'GET'
        },
        order: [[0, 'desc']],
        columns: [
                { data: "id", name: "id", visible: false },  
                { data: "year", name: "year" },
                { data: "title", name: "title" },
                { data: "link", name: "Link" },
                {
                    data: "action",
                    name: "action",
                    orderable: false,
                    searchable: false,
                },
        ]
    });
    $('#annual_report_sub').on('click', '.deleteBtn', function (e) {
        e.preventDefault();

        const url = $(this).data('url');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                const CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

                $.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        "X-CSRF-TOKEN": CSRF_TOKEN
                    },
                    data: {
                        _method: 'DELETE',
                        _token: CSRF_TOKEN
                    },
                    dataType: "JSON",
                    success: function (response) {
                        Swal.fire('Deleted!', response.message || 'Annual report subsidiary has been deleted.', 'success');
                        $('#annual_report_sub').DataTable().ajax.reload(null, false);
                    },
                    error: function () {
                        Swal.fire('Error!', 'Something went wrong.', 'error');
                    }
                });
            }
        });
    }); 

    // Financial Result
    $('#financial_result').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/aos/financial_result',
            type: 'GET'
        },
        order: [[0, 'desc']],
        columns: [
                { data: "id", name: "id", visible: false },  
                { data: "quarter", name: "quarter" },
                { data: "year", name: "year" },
                { data: "title", name: "title" },
                { data: "link", name: "Link" },
                {
                    data: "action",
                    name: "action",
                    orderable: false,
                    searchable: false,
                },
        ]
    });
    $('#financial_result').on('click', '.deleteBtn', function (e) {
        e.preventDefault();

        const url = $(this).data('url');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                const CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

                $.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        "X-CSRF-TOKEN": CSRF_TOKEN
                    },
                    data: {
                        _method: 'DELETE',
                        _token: CSRF_TOKEN
                    },
                    dataType: "JSON",
                    success: function (response) {
                        Swal.fire('Deleted!', response.message || 'Financial result has been deleted.', 'success');
                        $('#financial_result').DataTable().ajax.reload(null, false);
                    },
                    error: function () {
                        Swal.fire('Error!', 'Something went wrong.', 'error');
                    }
                });
            }
        });
    }); 

    // Investor presentation
    $('#investor_presentation').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/aos/investor_presentation',
            type: 'GET'
        },
        order: [[0, 'desc']],
        columns: [
                { data: "id", name: "id", visible: false },  
                { data: "quarter", name: "quarter" },
                { data: "year", name: "year" },
                { data: "title", name: "title" },
                { data: "link", name: "Link" },
                {
                    data: "action",
                    name: "action",
                    orderable: false,
                    searchable: false,
                },
        ]
    });
    $('#investor_presentation').on('click', '.deleteBtn', function (e) {
        e.preventDefault();

        const url = $(this).data('url');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                const CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

                $.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        "X-CSRF-TOKEN": CSRF_TOKEN
                    },
                    data: {
                        _method: 'DELETE',
                        _token: CSRF_TOKEN
                    },
                    dataType: "JSON",
                    success: function (response) {
                        Swal.fire('Deleted!', response.message || 'Investor Presentation has been deleted.', 'success');
                        $('#investor_presentation').DataTable().ajax.reload(null, false);
                    },
                    error: function () {
                        Swal.fire('Error!', 'Something went wrong.', 'error');
                    }
                });
            }
        });
    }); 

    // Policy
    $('#policy').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/aos/policy',
            type: 'GET'
        },
        order: [[0, 'desc']],
        columns: [
                { data: "id", name: "id", visible: false },  
                { data: "title", name: "title" },
                { data: "link", name: "Link" },
                {
                    data: "action",
                    name: "action",
                    orderable: false,
                    searchable: false,
                },
        ]
    });
    $('#policy').on('click', '.deleteBtn', function (e) {
        e.preventDefault();

        const url = $(this).data('url');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                const CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

                $.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        "X-CSRF-TOKEN": CSRF_TOKEN
                    },
                    data: {
                        _method: 'DELETE',
                        _token: CSRF_TOKEN
                    },
                    dataType: "JSON",
                    success: function (response) {
                        Swal.fire('Deleted!', response.message || 'Policy has been deleted.', 'success');
                        $('#policy').DataTable().ajax.reload(null, false);
                    },
                    error: function () {
                        Swal.fire('Error!', 'Something went wrong.', 'error');
                    }
                });
            }
        });
    }); 

    // Corporate Goverancne Report
    $('#corporate_governance_report').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/aos/corporate_governance_report',
            type: 'GET'
        },
        order: [[0, 'desc']],
        columns: [
                { data: "id", name: "id", visible: false },  
                {data: 'quarter', name: 'quarter'},
                {data: 'year', name: 'year'},
                {data: 'title', name: 'title'},
                {data: 'link', name: 'Link'},
                {
                    data: 'action',
                    name: 'action', 
                    orderable: false,
                    searchable: false
                },
        ]
    });
    $('#corporate_governance_report').on('click', '.deleteBtn', function (e) {
        e.preventDefault();

        const url = $(this).data('url');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                const CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

                $.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        "X-CSRF-TOKEN": CSRF_TOKEN
                    },
                    data: {
                        _method: 'DELETE',
                        _token: CSRF_TOKEN
                    },
                    dataType: "JSON",
                    success: function (response) {
                        Swal.fire('Deleted!', response.message || 'Corporate Governance Report has been deleted.', 'success');
                        $('#corporate_governance_report').DataTable().ajax.reload(null, false);
                    },
                    error: function () {
                        Swal.fire('Error!', 'Something went wrong.', 'error');
                    }
                });
            }
        });
    }); 

    // Annual Return
    $('#annual_return').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/aos/annual_return',
            type: 'GET'
        },
        order: [[0, 'desc']],
        columns: [
                { data: "id", name: "id", visible: false },  
                {data: 'year', name: 'year'},
                {data: 'title', name: 'title'},
                {data: 'file', name: 'file'},
                {
                    data: 'action',
                    name: 'action', 
                    orderable: false,
                    searchable: false
                },
        ]
    });
    $('#annual_return').on('click', '.deleteBtn', function (e) {
        e.preventDefault();

        const url = $(this).data('url');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                const CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

                $.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        "X-CSRF-TOKEN": CSRF_TOKEN
                    },
                    data: {
                        _method: 'DELETE',
                        _token: CSRF_TOKEN
                    },
                    dataType: "JSON",
                    success: function (response) {
                        Swal.fire('Deleted!', response.message || 'Annual Return has been deleted.', 'success');
                        $('#annual_return').DataTable().ajax.reload(null, false);
                    },
                    error: function () {
                        Swal.fire('Error!', 'Something went wrong.', 'error');
                    }
                });
            }
        });
    }); 

    // Buy Back
    $('#buy_back').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/aos/buy_back',
            type: 'GET'
        },
        order: [[0, 'desc']],
        columns: [
                { data: "id", name: "id", visible: false },  
                {data: 'year', name: 'year'},
                {data: 'title', name: 'title'},
                {data: 'link', name: 'link'},
                {
                    data: 'action',
                    name: 'action', 
                    orderable: false,
                    searchable: false
                },
        ]
    });
    $('#buy_back').on('click', '.deleteBtn', function (e) {
        e.preventDefault();

        const url = $(this).data('url');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                const CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

                $.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        "X-CSRF-TOKEN": CSRF_TOKEN
                    },
                    data: {
                        _method: 'DELETE',
                        _token: CSRF_TOKEN
                    },
                    dataType: "JSON",
                    success: function (response) {
                        Swal.fire('Deleted!', response.message || 'Buy Back has been deleted.', 'success');
                        $('#buy_back').DataTable().ajax.reload(null, false);
                    },
                    error: function () {
                        Swal.fire('Error!', 'Something went wrong.', 'error');
                    }
                });
            }
        });
    }); 

    // Credit Rating
    $('#credit_rating').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/aos/credit_rating',
            type: 'GET'
        },
        order: [[0, 'desc']],
        columns: [
                { data: "id", name: "id", visible: false },  
                {data: 'title', name: 'title'},
                {data: 'file', name: 'file'},
                {
                    data: 'action',
                    name: 'action', 
                    orderable: false,
                    searchable: false
                },
        ]
    });
    $('#credit_rating').on('click', '.deleteBtn', function (e) {
        e.preventDefault();

        const url = $(this).data('url');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                const CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

                $.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        "X-CSRF-TOKEN": CSRF_TOKEN
                    },
                    data: {
                        _method: 'DELETE',
                        _token: CSRF_TOKEN
                    },
                    dataType: "JSON",
                    success: function (response) {
                        Swal.fire('Deleted!', response.message || 'Credit Rating has been deleted.', 'success');
                        $('#credit_rating').DataTable().ajax.reload(null, false);
                    },
                    error: function () {
                        Swal.fire('Error!', 'Something went wrong.', 'error');
                    }
                });
            }
        });
    }); 

    // kyc Form
    $('#kyc_form').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/aos/kyc_form',
            type: 'GET'
        },
        order: [[0, 'desc']],
        columns: [
                { data: "id", name: "id", visible: false },  
                {data: 'title', name: 'title'},
                {data: 'file', name: 'file'},
                {
                    data: 'action',
                    name: 'action', 
                    orderable: false,
                    searchable: false
                },
        ]
    });
    $('#kyc_form').on('click', '.deleteBtn', function (e) {
        e.preventDefault();

        const url = $(this).data('url');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                const CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

                $.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        "X-CSRF-TOKEN": CSRF_TOKEN
                    },
                    data: {
                        _method: 'DELETE',
                        _token: CSRF_TOKEN
                    },
                    dataType: "JSON",
                    success: function (response) {
                        Swal.fire('Deleted!', response.message || 'Kyc Form has been deleted.', 'success');
                        $('#kyc_form').DataTable().ajax.reload(null, false);
                    },
                    error: function () {
                        Swal.fire('Error!', 'Something went wrong.', 'error');
                    }
                });
            }
        });
    }); 

    // Notice
    $('#notice').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/aos/notice',
            type: 'GET'
        },
        order: [[0, 'desc']],
        columns: [
                { data: "id", name: "id", visible: false },  
                {data: 'year', name: 'year'},
                {data: 'title', name: 'title'},
                {data: 'link', name: 'link'},
                {
                    data: 'action',
                    name: 'action', 
                    orderable: false,
                    searchable: false
                },
        ]
    });
    $('#notice').on('click', '.deleteBtn', function (e) {
        e.preventDefault();

        const url = $(this).data('url');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                const CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

                $.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        "X-CSRF-TOKEN": CSRF_TOKEN
                    },
                    data: {
                        _method: 'DELETE',
                        _token: CSRF_TOKEN
                    },
                    dataType: "JSON",
                    success: function (response) {
                        Swal.fire('Deleted!', response.message || 'Notice has been deleted.', 'success');
                        $('#notice').DataTable().ajax.reload(null, false);
                    },
                    error: function () {
                        Swal.fire('Error!', 'Something went wrong.', 'error');
                    }
                });
            }
        });
    }); 

    // Online Dispute Resoulution
    $('#online_dispute_resolution').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/aos/online_dispute_resolution',
            type: 'GET'
        },
        order: [[0, 'desc']],
        columns: [
                { data: "id", name: "id", visible: false },
                {data: 'title', name: 'title'},
                {data: 'link', name: 'link'},
                {
                    data: 'action',
                    name: 'action', 
                    orderable: false,
                    searchable: false
                },
        ]
    });
    $('#online_dispute_resolution').on('click', '.deleteBtn', function (e) {
        e.preventDefault();

        const url = $(this).data('url');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                const CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

                $.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        "X-CSRF-TOKEN": CSRF_TOKEN
                    },
                    data: {
                        _method: 'DELETE',
                        _token: CSRF_TOKEN
                    },
                    dataType: "JSON",
                    success: function (response) {
                        Swal.fire('Deleted!', response.message || 'Online Dispute Resolution has been deleted.', 'success');
                        $('#online_dispute_resolution').DataTable().ajax.reload(null, false);
                    },
                    error: function () {
                        Swal.fire('Error!', 'Something went wrong.', 'error');
                    }
                });
            }
        });
    }); 

    // Scheme of arrangement
    $('#scheme_of_arrangement').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/aos/scheme_of_arrangement',
            type: 'GET'
        },
        order: [[0, 'desc']],
        columns: [
                { data: "id", name: "id", visible: false },
                {data: 'year', name: 'year'},
                {data: 'title', name: 'title'},
                {data: 'link', name: 'link'},
                {
                    data: 'action',
                    name: 'action', 
                    orderable: false,
                    searchable: false
                },
        ]
    });
    $('#scheme_of_arrangement').on('click', '.deleteBtn', function (e) {
        e.preventDefault();

        const url = $(this).data('url');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                const CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

                $.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        "X-CSRF-TOKEN": CSRF_TOKEN
                    },
                    data: {
                        _method: 'DELETE',
                        _token: CSRF_TOKEN
                    },
                    dataType: "JSON",
                    success: function (response) {
                        Swal.fire('Deleted!', response.message || 'Scheme of arrangement has been deleted.', 'success');
                        $('#scheme_of_arrangement').DataTable().ajax.reload(null, false);
                    },
                    error: function () {
                        Swal.fire('Error!', 'Something went wrong.', 'error');
                    }
                });
            }
        });
    }); 

    // Secretaril compliance report
    $('#secretarial_compliance_report').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/aos/secretarial_compliance_report',
            type: 'GET'
        },
        order: [[0, 'desc']],
        columns: [
                { data: "id", name: "id", visible: false },
                {data: 'title', name: 'title'},
                {data: 'file', name: 'file'},
                {
                    data: 'action',
                    name: 'action', 
                    orderable: false,
                    searchable: false
                },
        ]
    });
    $('#secretarial_compliance_report').on('click', '.deleteBtn', function (e) {
        e.preventDefault();

        const url = $(this).data('url');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                const CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

                $.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        "X-CSRF-TOKEN": CSRF_TOKEN
                    },
                    data: {
                        _method: 'DELETE',
                        _token: CSRF_TOKEN
                    },
                    dataType: "JSON",
                    success: function (response) {
                        Swal.fire('Deleted!', response.message || 'Secretarial Compliance Report has been deleted.', 'success');
                        $('#secretarial_compliance_report').DataTable().ajax.reload(null, false);
                    },
                    error: function () {
                        Swal.fire('Error!', 'Something went wrong.', 'error');
                    }
                });
            }
        });
    });

    // Shareholding pattern
    $('#shareholding_pattern').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/aos/shareholding_pattern',
            type: 'GET'
        },
        order: [[0, 'desc']],
        columns: [
                { data: "id", name: "id", visible: false },
                {data: 'year', name: 'year'},
                {data: 'quarter', name: 'quarter'},
                {data: 'title', name: 'title'},
                {data: 'link', name: 'link'},
                {
                    data: 'action',
                    name: 'action', 
                    orderable: false,
                    searchable: false
                },
        ]
    });
    $('#shareholding_pattern').on('click', '.deleteBtn', function (e) {
        e.preventDefault();

        const url = $(this).data('url');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                const CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

                $.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        "X-CSRF-TOKEN": CSRF_TOKEN
                    },
                    data: {
                        _method: 'DELETE',
                        _token: CSRF_TOKEN
                    },
                    dataType: "JSON",
                    success: function (response) {
                        Swal.fire('Deleted!', response.message || 'Shareholding Pattern has been deleted.', 'success');
                        $('#shareholding_pattern').DataTable().ajax.reload(null, false);
                    },
                    error: function () {
                        Swal.fire('Error!', 'Something went wrong.', 'error');
                    }
                });
            }
        });
    });

    // Stock exchange filings
    $('#stock_exchange_filings').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/aos/stock_exchange_filings',
            type: 'GET'
        },
        order: [[0, 'desc']],
        columns: [
                { data: "id", name: "id", visible: false },
                {data: 'year', name: 'year'},
                {data: 'title', name: 'title'},
                {data: 'link', name: 'link'},
                {
                    data: 'action',
                    name: 'action', 
                    orderable: false,
                    searchable: false
                },
        ]
    });
    $('#stock_exchange_filings').on('click', '.deleteBtn', function (e) {
        e.preventDefault();

        const url = $(this).data('url');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                const CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

                $.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        "X-CSRF-TOKEN": CSRF_TOKEN
                    },
                    data: {
                        _method: 'DELETE',
                        _token: CSRF_TOKEN
                    },
                    dataType: "JSON",
                    success: function (response) {
                        Swal.fire('Deleted!', response.message || 'Stock exchange filings has been deleted.', 'success');
                        $('#stock_exchange_filings').DataTable().ajax.reload(null, false);
                    },
                    error: function () {
                        Swal.fire('Error!', 'Something went wrong.', 'error');
                    }
                });
            }
        });
    });

    // Tds instruction
    $('#tds_instructions').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/aos/tds_instructions',
            type: 'GET'
        },
        order: [[0, 'desc']],
        columns: [
                { data: "id", name: "id", visible: false },
                {data: 'title', name: 'title'},
                {data: 'link', name: 'link'},
                {
                    data: 'action',
                    name: 'action', 
                    orderable: false,
                    searchable: false
                },
        ]
    });
    $('#tds_instructions').on('click', '.deleteBtn', function (e) {
        e.preventDefault();

        const url = $(this).data('url');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                const CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

                $.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        "X-CSRF-TOKEN": CSRF_TOKEN
                    },
                    data: {
                        _method: 'DELETE',
                        _token: CSRF_TOKEN
                    },
                    dataType: "JSON",
                    success: function (response) {
                        Swal.fire('Deleted!', response.message || 'Tds instruction has been deleted.', 'success');
                        $('#tds_instructions').DataTable().ajax.reload(null, false);
                    },
                    error: function () {
                        Swal.fire('Error!', 'Something went wrong.', 'error');
                    }
                });
            }
        });
    });

    // Triveni Family
    $('#triveni_family').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/aos/triveni_family',
            type: 'GET'
        },
        order: [[0, 'desc']],
        columns: [
                { data: "id", name: "id", visible: false },
                {data: 'name', name: 'name'},
                {data: 'designation', name: 'designation'},
                {data: 'department', name: 'department'},
                {data: 'img', name: 'img'},
                {
                    data: 'action',
                    name: 'action', 
                    orderable: false,
                    searchable: false
                },
        ]
    });
    $('#triveni_family').on('click', '.deleteBtn', function (e) {
        e.preventDefault();

        const url = $(this).data('url');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                const CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

                $.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        "X-CSRF-TOKEN": CSRF_TOKEN
                    },
                    data: {
                        _method: 'DELETE',
                        _token: CSRF_TOKEN
                    },
                    dataType: "JSON",
                    success: function (response) {
                        Swal.fire('Deleted!', response.message || 'Triveni Family has been deleted.', 'success');
                        $('#triveni_family').DataTable().ajax.reload(null, false);
                    },
                    error: function () {
                        Swal.fire('Error!', 'Something went wrong.', 'error');
                    }
                });
            }
        });
    });

    $('#files').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: '/aos/upload-files',
        type: 'GET'
    },
    order: [[0, 'desc']],
    columns: [
        { data: "id", name: "id", visible: false },
        { data: "name", name: "name" },
        { data: "link", name: "link", orderable: false, searchable: false },
        { data: "copy_link", name: "copy_link", orderable: false, searchable: false },
    ]
    });

    $("#files").on("click", ".copy-btn", function () {
        const link = $(this).data("link");
        navigator.clipboard
            .writeText(link)
            .then(() => {
                alert("Link copied to clipboard!");
            })
            .catch((err) => {
                alert("Failed to copy link: " + err);
            });
    });

    // Missing files check

    $('#annualReportMissingFiles').on('click', function () {
        $.ajax({
            url: '/aos/check-missing-files',
            type: 'GET',
            data: {
                model: 'AnnualReport',
                fileColumn: 'pdf',
                titleColumn: 'txt'
            },
            cache: false,
            beforeSend: function () {
                $('#invalidFilesList').html('<li class="list-group-item">Checking files...</li>');
                $('#invalidFilesModal').modal('show');
            },
            success: function (response) {
                const list = $('#invalidFilesList');
                list.empty();

                if (response.data.length === 0) {
                    list.append('<li class="list-group-item text-success">All files are valid (200 OK).</li>');
                } else {
                    response.data.forEach(file => {
                        list.append(`
                            <li class="list-group-item text-danger">
                                <strong>${file.title}</strong>
                                ${file.year ? ` <span class="badge badge-info ml-2">${file.year}</span>` : ''}
                                <br>
                                <a href="/storage/files/${file.file}" target="_blank">${file.file}</a> → ${file.status}
                                <br>
                                Pdf status -> ${file.pdf_status} 
                            </li>
                        `);
                    });
                }
            },
            error: function () {
                $('#invalidFilesList').html('<li class="list-group-item text-danger">Error checking files.</li>');
            }
        });
    });

    $('#annualReportSubMissingFiles').on('click', function () {
        $.ajax({
            url: '/aos/check-missing-files',
            type: 'GET',
            data: {
                model: 'AnnualReportSub',
                fileColumn: 'link',
                titleColumn: 'title'
            },
            cache: false,
            beforeSend: function () {
                $('#invalidFilesList').html('<li class="list-group-item">Checking files...</li>');
                $('#invalidFilesModal').modal('show');
            },
            success: function (response) {
                const list = $('#invalidFilesList');
                list.empty();

                if (response.data.length === 0) {
                    list.append('<li class="list-group-item text-success">All files are valid (200 OK).</li>');
                } else {
                    response.data.forEach(file => {
                        list.append(`
                            <li class="list-group-item text-danger">
                                <strong>${file.title}</strong>
                                ${file.year ? ` <span class="badge badge-info ml-2">${file.year}</span>` : ''}
                                <br>
                                <a href="/storage/files/${file.file}" target="_blank">${file.file}</a> → ${file.status}
                                <br>
                                Pdf status -> ${file.pdf_status} 
                            </li>
                        `);
                    });
                }
            },
            error: function () {
                $('#invalidFilesList').html('<li class="list-group-item text-danger">Error checking files.</li>');
            }
        });
    });

    $('#financialResultMissingFiles').on('click', function () {
        $.ajax({
            url: '/aos/check-missing-files',
            type: 'GET',
            data: {
                model: 'FinResult',
                fileColumn: 'link',
                titleColumn: 'title'
            },
            cache: false,
            beforeSend: function () {
                $('#invalidFilesList').html('<li class="list-group-item">Checking files...</li>');
                $('#invalidFilesModal').modal('show');
            },
            success: function (response) {
                const list = $('#invalidFilesList');
                list.empty();

                if (response.data.length === 0) {
                    list.append('<li class="list-group-item text-success">All files are valid (200 OK).</li>');
                } else {
                    response.data.forEach(file => {
                        list.append(`
                            <li class="list-group-item text-danger">
                                <strong>${file.title}</strong>
                                ${file.year ? ` <span class="badge badge-info ml-2">${file.year}</span>` : ''}
                                <br>
                                <a href="/storage/files/${file.file}" target="_blank">${file.file}</a> → ${file.status}
                                <br>
                                Pdf status -> ${file.pdf_status} 
                            </li>
                        `);
                    });
                }
            },
            error: function () {
                $('#invalidFilesList').html('<li class="list-group-item text-danger">Error checking files.</li>');
            }
        });
    });

    $('#investorPresentationMissingFiles').on('click', function () {
        $.ajax({
            url: '/aos/check-missing-files',
            type: 'GET',
            data: {
                model: 'InvestorPress',
                fileColumn: 'link',
                titleColumn: 'title'
            },
            cache: false,
            beforeSend: function () {
                $('#invalidFilesList').html('<li class="list-group-item">Checking files...</li>');
                $('#invalidFilesModal').modal('show');
            },
            success: function (response) {
                const list = $('#invalidFilesList');
                list.empty();

                if (response.data.length === 0) {
                    list.append('<li class="list-group-item text-success">All files are valid (200 OK).</li>');
                } else {
                    response.data.forEach(file => {
                        list.append(`
                            <li class="list-group-item text-danger">
                                <strong>${file.title}</strong>
                                ${file.year ? ` <span class="badge badge-info ml-2">${file.year}</span>` : ''}
                                <br>
                                <a href="/storage/files/${file.file}" target="_blank">${file.file}</a> → ${file.status}
                                <br>
                                Pdf status -> ${file.pdf_status} 
                            </li>
                        `);
                    });
                }
            },
            error: function () {
                $('#invalidFilesList').html('<li class="list-group-item text-danger">Error checking files.</li>');
            }
        });
    });

    $('#policyMissingFiles').on('click', function () {
        $.ajax({
            url: '/aos/check-missing-files',
            type: 'GET',
            data: {
                model: 'Policy',
                fileColumn: 'link',
                titleColumn: 'title'
            },
            cache: false,
            beforeSend: function () {
                $('#invalidFilesList').html('<li class="list-group-item">Checking files...</li>');
                $('#invalidFilesModal').modal('show');
            },
            success: function (response) {
                const list = $('#invalidFilesList');
                list.empty();

                if (response.data.length === 0) {
                    list.append('<li class="list-group-item text-success">All files are valid (200 OK).</li>');
                } else {
                    response.data.forEach(file => {
                        list.append(`
                            <li class="list-group-item text-danger">
                                <strong>${file.title}</strong>
                                ${file.year ? ` <span class="badge badge-info ml-2">${file.year}</span>` : ''}
                                <br>
                                <a href="/storage/files/${file.file}" target="_blank">${file.file}</a> → ${file.status}
                                <br>
                                Pdf status -> ${file.pdf_status} 
                            </li>
                        `);
                    });
                }
            },
            error: function () {
                $('#invalidFilesList').html('<li class="list-group-item text-danger">Error checking files.</li>');
            }
        });
    });

    $('#cgReportMissingFiles').on('click', function () {
        $.ajax({
            url: '/aos/check-missing-files',
            type: 'GET',
            data: {
                model: 'CopGovReport',
                fileColumn: 'link',
                titleColumn: 'title'
            },
            cache: false,
            beforeSend: function () {
                $('#invalidFilesList').html('<li class="list-group-item">Checking files...</li>');
                $('#invalidFilesModal').modal('show');
            },
            success: function (response) {
                const list = $('#invalidFilesList');
                list.empty();

                if (response.data.length === 0) {
                    list.append('<li class="list-group-item text-success">All files are valid (200 OK).</li>');
                } else {
                    response.data.forEach(file => {
                        list.append(`
                            <li class="list-group-item text-danger">
                                <strong>${file.title}</strong>
                                ${file.year ? ` <span class="badge badge-info ml-2">${file.year}</span>` : ''}
                                <br>
                                <a href="/storage/files/${file.file}" target="_blank">${file.file}</a> → ${file.status}
                                <br>
                                Pdf status -> ${file.pdf_status} 
                            </li>
                        `);
                    });
                }
            },
            error: function () {
                $('#invalidFilesList').html('<li class="list-group-item text-danger">Error checking files.</li>');
            }
        });
    });

    $('#annualReturnMissingFiles').on('click', function () {
        $.ajax({
            url: '/aos/check-missing-files',
            type: 'GET',
            data: {
                model: 'AnnualReturn',
                fileColumn: 'file',
                titleColumn: 'title'
            },
            cache: false,
            beforeSend: function () {
                $('#invalidFilesList').html('<li class="list-group-item">Checking files...</li>');
                $('#invalidFilesModal').modal('show');
            },
            success: function (response) {
                const list = $('#invalidFilesList');
                list.empty();

                if (response.data.length === 0) {
                    list.append('<li class="list-group-item text-success">All files are valid (200 OK).</li>');
                } else {
                    response.data.forEach(file => {
                        list.append(`
                            <li class="list-group-item text-danger">
                                <strong>${file.title}</strong>
                                ${file.year ? ` <span class="badge badge-info ml-2">${file.year}</span>` : ''}
                                <br>
                                <a href="/storage/files/${file.file}" target="_blank">${file.file}</a> → ${file.status}
                                <br>
                                Pdf status -> ${file.pdf_status} 
                            </li>
                        `);
                    });
                }
            },
            error: function () {
                $('#invalidFilesList').html('<li class="list-group-item text-danger">Error checking files.</li>');
            }
        });
    });

    $('#buyBackMissingFiles').on('click', function () {
        $.ajax({
            url: '/aos/check-missing-files',
            type: 'GET',
            data: {
                model: 'BuyBack',
                fileColumn: 'link',
                titleColumn: 'title'
            },
            cache: false,
            beforeSend: function () {
                $('#invalidFilesList').html('<li class="list-group-item">Checking files...</li>');
                $('#invalidFilesModal').modal('show');
            },
            success: function (response) {
                const list = $('#invalidFilesList');
                list.empty();

                if (response.data.length === 0) {
                    list.append('<li class="list-group-item text-success">All files are valid (200 OK).</li>');
                } else {
                    response.data.forEach(file => {
                        list.append(`
                            <li class="list-group-item text-danger">
                                <strong>${file.title}</strong>
                                ${file.year ? ` <span class="badge badge-info ml-2">${file.year}</span>` : ''}
                                <br>
                                <a href="/storage/files/${file.file}" target="_blank">${file.file}</a> → ${file.status}
                                <br>
                                Pdf status -> ${file.pdf_status} 
                            </li>
                        `);
                    });
                }
            },
            error: function () {
                $('#invalidFilesList').html('<li class="list-group-item text-danger">Error checking files.</li>');
            }
        });
    });

    $('#creditRatingMissingFiles').on('click', function () {
        $.ajax({
            url: '/aos/check-missing-files',
            type: 'GET',
            data: {
                model: 'CreditRating',
                fileColumn: 'file',
                titleColumn: 'title'
            },
            cache: false,
            beforeSend: function () {
                $('#invalidFilesList').html('<li class="list-group-item">Checking files...</li>');
                $('#invalidFilesModal').modal('show');
            },
            success: function (response) {
                const list = $('#invalidFilesList');
                list.empty();

                if (response.data.length === 0) {
                    list.append('<li class="list-group-item text-success">All files are valid (200 OK).</li>');
                } else {
                    response.data.forEach(file => {
                        list.append(`
                            <li class="list-group-item text-danger">
                                <strong>${file.title}</strong>
                                ${file.year ? ` <span class="badge badge-info ml-2">${file.year}</span>` : ''}
                                <br>
                                <a href="/storage/files/${file.file}" target="_blank">${file.file}</a> → ${file.status}
                                <br>
                                Pdf status -> ${file.pdf_status} 
                            </li>
                        `);
                    });
                }
            },
            error: function () {
                $('#invalidFilesList').html('<li class="list-group-item text-danger">Error checking files.</li>');
            }
        });
    });

    $('#kycFormMissingFiles').on('click', function () {
        $.ajax({
            url: '/aos/check-missing-files',
            type: 'GET',
            data: {
                model: 'KycForm',
                fileColumn: 'file',
                titleColumn: 'title'
            },
            cache: false,
            beforeSend: function () {
                $('#invalidFilesList').html('<li class="list-group-item">Checking files...</li>');
                $('#invalidFilesModal').modal('show');
            },
            success: function (response) {
                const list = $('#invalidFilesList');
                list.empty();

                if (response.data.length === 0) {
                    list.append('<li class="list-group-item text-success">All files are valid (200 OK).</li>');
                } else {
                    response.data.forEach(file => {
                        list.append(`
                            <li class="list-group-item text-danger">
                                <strong>${file.title}</strong>
                                ${file.year ? ` <span class="badge badge-info ml-2">${file.year}</span>` : ''}
                                <br>
                                <a href="/storage/files/${file.file}" target="_blank">${file.file}</a> → ${file.status}
                                <br>
                                Pdf status -> ${file.pdf_status} 
                            </li>
                        `);
                    });
                }
            },
            error: function () {
                $('#invalidFilesList').html('<li class="list-group-item text-danger">Error checking files.</li>');
            }
        });
    });

    $('#noticeMissingFiles').on('click', function () {
        $.ajax({
            url: '/aos/check-missing-files',
            type: 'GET',
            data: {
                model: 'ShareNotice',
                fileColumn: 'link',
                titleColumn: 'title'
            },
            cache: false,
            beforeSend: function () {
                $('#invalidFilesList').html('<li class="list-group-item">Checking files...</li>');
                $('#invalidFilesModal').modal('show');
            },
            success: function (response) {
                const list = $('#invalidFilesList');
                list.empty();

                if (response.data.length === 0) {
                    list.append('<li class="list-group-item text-success">All files are valid (200 OK).</li>');
                } else {
                    response.data.forEach(file => {
                        list.append(`
                            <li class="list-group-item text-danger">
                                <strong>${file.title}</strong>
                                ${file.year ? ` <span class="badge badge-info ml-2">${file.year}</span>` : ''}
                                <br>
                                <a href="/storage/files/${file.file}" target="_blank">${file.file}</a> → ${file.status}
                                <br>
                                Pdf status -> ${file.pdf_status} 
                            </li>
                        `);
                    });
                }
            },
            error: function () {
                $('#invalidFilesList').html('<li class="list-group-item text-danger">Error checking files.</li>');
            }
        });
    });

    $('#onlineDisputeResolutionMissingFiles').on('click', function () {
        $.ajax({
            url: '/aos/check-missing-files',
            type: 'GET',
            data: {
                model: 'OnlineDisputeRes',
                fileColumn: 'link',
                titleColumn: 'title'
            },
            cache: false,
            beforeSend: function () {
                $('#invalidFilesList').html('<li class="list-group-item">Checking files...</li>');
                $('#invalidFilesModal').modal('show');
            },
            success: function (response) {
                const list = $('#invalidFilesList');
                list.empty();

                if (response.data.length === 0) {
                    list.append('<li class="list-group-item text-success">All files are valid (200 OK).</li>');
                } else {
                    response.data.forEach(file => {
                        list.append(`
                            <li class="list-group-item text-danger">
                                <strong>${file.title}</strong>
                                ${file.year ? ` <span class="badge badge-info ml-2">${file.year}</span>` : ''}
                                <br>
                                <a href="/storage/files/${file.file}" target="_blank">${file.file}</a> → ${file.status}
                                <br>
                                Pdf status -> ${file.pdf_status} 
                            </li>
                        `);
                    });
                }
            },
            error: function () {
                $('#invalidFilesList').html('<li class="list-group-item text-danger">Error checking files.</li>');
            }
        });
    });

    $('#schemeOfArrangementMissingFiles').on('click', function () {
        $.ajax({
            url: '/aos/check-missing-files',
            type: 'GET',
            data: {
                model: 'SchemeAgreement',
                fileColumn: 'link',
                titleColumn: 'title'
            },
            cache: false,
            beforeSend: function () {
                $('#invalidFilesList').html('<li class="list-group-item">Checking files...</li>');
                $('#invalidFilesModal').modal('show');
            },
            success: function (response) {
                const list = $('#invalidFilesList');
                list.empty();

                if (response.data.length === 0) {
                    list.append('<li class="list-group-item text-success">All files are valid (200 OK).</li>');
                } else {
                    response.data.forEach(file => {
                        list.append(`
                            <li class="list-group-item text-danger">
                                <strong>${file.title}</strong>
                                ${file.year ? ` <span class="badge badge-info ml-2">${file.year}</span>` : ''}
                                <br>
                                <a href="/storage/files/${file.file}" target="_blank">${file.file}</a> → ${file.status}
                                <br>
                                Pdf status -> ${file.pdf_status} 
                            </li>
                        `);
                    });
                }
            },
            error: function () {
                $('#invalidFilesList').html('<li class="list-group-item text-danger">Error checking files.</li>');
            }
        });
    });

    $('#secretarialComplainceMissingFiles').on('click', function () {
        $.ajax({
            url: '/aos/check-missing-files',
            type: 'GET',
            data: {
                model: 'SecretarialComplianceReport',
                fileColumn: 'file',
                titleColumn: 'title'
            },
            cache: false,
            beforeSend: function () {
                $('#invalidFilesList').html('<li class="list-group-item">Checking files...</li>');
                $('#invalidFilesModal').modal('show');
            },
            success: function (response) {
                const list = $('#invalidFilesList');
                list.empty();

                if (response.data.length === 0) {
                    list.append('<li class="list-group-item text-success">All files are valid (200 OK).</li>');
                } else {
                    response.data.forEach(file => {
                        list.append(`
                            <li class="list-group-item text-danger">
                                <strong>${file.title}</strong>
                                ${file.year ? ` <span class="badge badge-info ml-2">${file.year}</span>` : ''}
                                <br>
                                <a href="/storage/files/${file.file}" target="_blank">${file.file}</a> → ${file.status}
                                <br>
                                Pdf status -> ${file.pdf_status} 
                            </li>
                        `);
                    });
                }
            },
            error: function () {
                $('#invalidFilesList').html('<li class="list-group-item text-danger">Error checking files.</li>');
            }
        });
    });

    $('#shareholdingPatternMissingFiles').on('click', function () {
        $.ajax({
            url: '/aos/check-missing-files',
            type: 'GET',
            data: {
                model: 'ShareHoldingPtrn',
                fileColumn: 'link',
                titleColumn: 'title'
            },
            cache: false,
            beforeSend: function () {
                $('#invalidFilesList').html('<li class="list-group-item">Checking files...</li>');
                $('#invalidFilesModal').modal('show');
            },
            success: function (response) {
                const list = $('#invalidFilesList');
                list.empty();

                if (response.data.length === 0) {
                    list.append('<li class="list-group-item text-success">All files are valid (200 OK).</li>');
                } else {
                    response.data.forEach(file => {
                        list.append(`
                            <li class="list-group-item text-danger">
                                <strong>${file.title}</strong>
                                ${file.year ? ` <span class="badge badge-info ml-2">${file.year}</span>` : ''}
                                <br>
                                <a href="/storage/files/${file.file}" target="_blank">${file.file}</a> → ${file.status}
                                <br>
                                Pdf status -> ${file.pdf_status} 
                            </li>
                        `);
                    });
                }
            },
            error: function () {
                $('#invalidFilesList').html('<li class="list-group-item text-danger">Error checking files.</li>');
            }
        });
    });

    $('#tdsInstructionsMissingFiles').on('click', function () {
        $.ajax({
            url: '/aos/check-missing-files',
            type: 'GET',
            data: {
                model: 'TdsInstruction',
                fileColumn: 'link',
                titleColumn: 'title'
            },
            cache: false,
            beforeSend: function () {
                $('#invalidFilesList').html('<li class="list-group-item">Checking files...</li>');
                $('#invalidFilesModal').modal('show');
            },
            success: function (response) {
                const list = $('#invalidFilesList');
                list.empty();

                if (response.data.length === 0) {
                    list.append('<li class="list-group-item text-success">All files are valid (200 OK).</li>');
                } else {
                    response.data.forEach(file => {
                        list.append(`
                            <li class="list-group-item text-danger">
                                <strong>${file.title}</strong>
                                ${file.year ? ` <span class="badge badge-info ml-2">${file.year}</span>` : ''}
                                <br>
                                <a href="/storage/files/${file.file}" target="_blank">${file.file}</a> → ${file.status}
                                <br>
                                Pdf status -> ${file.pdf_status} 
                            </li>
                        `);
                    });
                }
            },
            error: function () {
                $('#invalidFilesList').html('<li class="list-group-item text-danger">Error checking files.</li>');
            }
        });
    });

    $('#stockexchangeMissingFiles').on('click', function () {
        $.ajax({
            url: '/aos/check-missing-files',
            type: 'GET',
            data: {
                model: 'StockExchangeFiling',
                fileColumn: 'link',
                titleColumn: 'title'
            },
            cache: false,
            beforeSend: function () {
                $('#invalidFilesList').html('<li class="list-group-item">Checking files...</li>');
                $('#invalidFilesModal').modal('show');
            },
            success: function (response) {
                const list = $('#invalidFilesList');
                list.empty();

                if (response.data.length === 0) {
                    list.append('<li class="list-group-item text-success">All files are valid (200 OK).</li>');
                } else {
                    response.data.forEach(file => {
                        list.append(`
                            <li class="list-group-item text-danger">
                                <strong>${file.title}</strong>
                                ${file.year ? ` <span class="badge badge-info ml-2">${file.year}</span>` : ''}
                                <br>
                                <a href="/storage/files/${file.file}" target="_blank">${file.file}</a> → ${file.status}
                                <br>
                                Pdf status -> ${file.pdf_status} 
                            </li>
                        `);
                    });
                }
            },
            error: function () {
                $('#invalidFilesList').html('<li class="list-group-item text-danger">Error checking files.</li>');
            }
        });
    });

    // Login History
    $('#login_history').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/aos/loginHistory',
            type: 'GET'
        },
        order: [[0, 'desc']],
        columns: [
            { data: "id", name: "id", visible: false },
            {data: 'email', name: 'email'},
            {data: 'ip_address', name: 'ip_address'},
            {data: 'device', name: 'device'},
            {
                data: 'status',
                name: 'status',
                render: function(data, type, row) {
                    if (data == 1) {
                        return '<span style="color: green; font-weight: bold;">Login Successful</span>';
                    } else {
                        return '<span style="color: red; font-weight: bold;">Login Failed</span>';
                    }
                }
            }
        ]
    });






});