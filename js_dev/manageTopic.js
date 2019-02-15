function refreshdiv(page){
    loadPage(page);
}
function resetManageFormTopic(){
    $("#formAddEditTopic")[0].reset();
}

function modalManageTopic(value, type){

    // resetManageFormTopic();
    $("#modalAddEditTopic").modal("show");

    if(type == "add"){

        $("h3.addEditTopic").empty().text("ເພີ່ມຫົວຂໍ້ປະຊຸມ");
        $("#manageTopicAction").val("add");

    }else{

        $("h3.addEditTopic").empty().text("ແກ້ໄຂຫົວຂໍ້ປະຊຸມ");

        var id = $(value).closest("tr").find("td input.userId").val();
        var name = $(value).closest("tr").find("td.userName").text();
        var email = $(value).closest("tr").find("td.userEmail").text();
        var tel = $(value).closest("tr").find("td.userTel").text();
        var address = $(value).closest("tr").find("td.userAddress").text(); 

        $("#manageTopicAction").val("edit");

        $("input#userId").val(id);
        $("input#val-username").val(name);
        $("input#val-email").val(email);
        $("input#val-phone").val(tel);
        $("input#val-address").val(address);

    }
}


function modalTopicShowDetail(topic_id){

    // resetManageFormTopic();
    $("#modalTopicShowVara").modal("show");
    $.ajax({
        url: 'src/CtrlVara.php',
        type: 'POST',
        dataType:'json',
        data: {
            'topic_id': topic_id,
            'action': "viewVara"
        },
    })
    .done(function(data) {
        console.log(data)
        // if (data == "true") {
        //     swal("ສຳເລັດ !!", "ເພີ່ມຂໍ້ມູນຜູ້ໃຊ້ສຳເລັດແລ້ວ !!", "success");
        // }else{
        //     swal("ເກີດຂໍ້ຜິດພາດ !!", "ບໍ່ສາມາດເພີ່ມໄດ້, ກະລຸນາລອງໃໝ່ !!", "error");
        // }
        // loadPage("manage-user");
        // $("#modalAddEditUser").modal("hide");
    })
    .fail(function() {
        // swal("ເກີດຂໍ້ຜິດພາດ !!", "ບໍ່ສາມາດເພີ່ມໄດ້, ກະລຸນາລອງໃໝ່ !!", "error");
        // $("#modalAddEditUser").modal("hide");
    })
}



$(function(){

    jQuery("#formAddEditTopic").validate({
        ignore: [],
        errorClass: "invalid-feedback animated fadeInDown",
        errorElement: "div",
        errorPlacement: function(e, a) {
            jQuery(a).parents(".form-group > div").append(e)
        },
        highlight: function(e) {
            jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
        },
        success: function(e) {
            jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove();
        },
        submitHandler: function(form) {

            var action = $("#manageTopicAction").val();

            var user_id = $("#formAddEditTopic input[name='userId']").val();
            var topic_id = $("#topicId").val();
            var topic_name = $("#topic-name").val();
            var topic_date = $("#topic-date").val();

            $.ajax({
                url: 'src/CtrlTopic.php',
                type: 'POST',
                data: {
                    'user_id': user_id,
                    'topic_id': topic_id,
                    'topic_name': topic_name,
                    'topic_date': topic_date,
                    'action': action
                },
            })
            .done(function(data) {
                console.log(data)
                if (data == "true") {
                    swal("ສຳເລັດ !!", "ເພີ່ມຂໍ້ມູນຜູ້ໃຊ້ສຳເລັດແລ້ວ !!", "success");
                }else{
                    swal("ເກີດຂໍ້ຜິດພາດ !!", "ບໍ່ສາມາດເພີ່ມໄດ້, ກະລຸນາລອງໃໝ່ !!", "error");
                }
                // loadPage("manage-user");
                // $("#modalAddEditUser").modal("hide");
            })
            .fail(function() {
                swal("ເກີດຂໍ້ຜິດພາດ !!", "ບໍ່ສາມາດເພີ່ມໄດ້, ກະລຸນາລອງໃໝ່ !!", "error");
                // $("#modalAddEditUser").modal("hide");
            })
        },                            
        rules: {
            "topic-name": {
                required: !0,
            },
            "topic-date": {
                required: !0,
            }
        },
        messages: {
            "topic-name": {
                required: "ກະລຸນອນປ້ອນຫົວຂໍ້"
            },
            "topic-date": {
                required: "ກະລຸນອນເລືອກວັນທີ"
            }
        }
    })


});



function confirm(value, type){

    var user_id = $(value).closest("tr").find("td input.userId").val();
    var user_name = $(value).closest("tr").find("td.userName").text();
    var titleName = "";
    var action = "";
    if (type == "delete") {
        titleName = "ຕ້ອງການລົບຜູ້ໃຊ້ນີ້ແທ້ບໍ ?";
        action = "delete";
    }else{
        titleName = "ຕ້ອງການຣີເຊັດລະຫັດຜ່ານຜູ້ໃຊ້ນີ້ແທ້ບໍ ?";
        action = "resetPwd";
    }

    swal({
            title: titleName,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "ຕົກລົງ",
            cancelButtonText: "ຍົກເລີກ",            
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
        },
        function(){

            $.ajax({
                url: 'src/CtrlUsers.php',
                type: 'POST',
                data: {
                    'user_id': user_id,
                    'action': action
                },
            })
            .done(function(data) {
                if (data == "true") {
                    swal("Reset password USER: "+user_name+" ສຳເລັດແລ້ວ !!", "Default Password is : 123456", "success");
                }else{
                    swal("ເກີດຂໍ້ຜິດພາດ !!", "ບໍ່ສາມາດ Reset password USER:"+user_name+" !!", "error");
                }
                loadPage("manage-user");
            })
            .fail(function() {
                swal("ເກີດຂໍ້ຜິດພາດ !!", "ບໍ່ສາມາດ Reset password USER:"+user_name+" !!", "error");
            })            

        });
}