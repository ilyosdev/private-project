$(document).ready(function () {


    //$('#tree1').treed();

    $('#tree ul').treed({openedClass: 'fa-folder-open', closedClass: 'fa-folder'});

    $('#tree3').treed({openedClass: 'glyphicon-chevron-right', closedClass: 'glyphicon-chevron-down'});


    $(".showTreeForSelect").on('click', function (e) {
        e.preventDefault();
        $('#main-modal').modal('show');
        $.ajax(
            {
                type: "GET",
                url: "/admin/ajax/tree-list",
                success: function (data) {
                    $('#main-modal-content').html(data);
                }
            }
        );
    });


});