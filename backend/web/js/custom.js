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


    // $("").click(function(event) {
    //     event.preventDefault(); // stopping submitting
    //
    //     console.log(event)
    //     // var data = $(this).serializeArray();
    //     // var url = $(this).attr('action');
    //     // $.ajax({
    //     //     url: url,
    //     //     type: 'post',
    //     //     dataType: 'json',
    //     //     data: data
    //     // })
    //     //     .done(function(response) {
    //     //         if (response.data.success == true) {
    //     //             alert("Wow you commented");
    //     //         }
    //     //     })
    //     //     .fail(function() {
    //     //         console.log("error");
    //     //     });
    //
    // });
    const rejectPaymentAll = document.querySelectorAll('#rejectPayment');
    rejectPaymentAll.forEach(el =>{
        el.addEventListener('click', e => {
            e.preventDefault();

            const dataset = e.target.dataset;
            const {action,id} = dataset;

            if(confirm(`"${action}"ni amalga oshirish`)) {
                let url = `/admin/users/payment?action=reject&id=${id}&days=0`;
                $.ajax({
                    type: "GET",
                    url: url,
                    dataType: "json",
                })
                .done(function(response) {
                    if (response.data.success) {
                        alert(response.data.message);
                        setTimeout(() => {
                            location.reload();
                        }, 2000);
                    }
                })
                .fail(function() {
                    alert(response.data.message);
                });
            }
        })
    });

    const acceptPaymentAll = document.querySelectorAll('#acceptModelId');
    acceptPaymentAll.forEach(el =>{
        el.addEventListener('click', e => {
            e.preventDefault();
            const id = e.target.dataset.id;
            $('#sumbitDays').click(ev => {
                ev.preventDefault();
                // console.log()
                const days = ev.target.form[0].value;

                let url = `/admin/users/payment?action=accept&id=${id}&days=${days}`;
                $.ajax({
                    type: "GET",
                    url: url,
                    dataType: "json",
                })
                .done(function(response) {

                    $('#acceptModel').modal('hide');

                    if (response.data.success) {
                        alert(response.data.message);

                        setTimeout(() => {
                            location.reload();
                        }, 2000);
                    }
                })
                .fail(function() {
                    alert(response.data.message);
                });

            })
        });
    });
});




