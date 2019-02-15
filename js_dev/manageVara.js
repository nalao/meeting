function refreshdiv(page){
    loadPage(page);
}

function resetManageFormVara(){
    $("#formAddEditVara")[0].reset();
}

function reInitEditor(value){
    $(value).find("textarea.textarea_editor").wysihtml5({
        "image": false,
        "link": false
    });
}

function addRowVara(event){
    event.preventDefault();
    var newRow ="<tr>"+
                    "<td>"+
                        "<input type='file' class='inputFile'>"+
                    "</td>"+
                    "<td>"+
                        "<textarea class='textarea_editor form-control vara_detail' rows='15' placeholder='Enter text ...' style='height:350px'></textarea>"+
                    "</td>"+
                "</tr>";

    $("#tbVara").append(newRow);
    // reInitEditor("#tbVara tr:last");
}

function modalManageVara(value, type){

    resetManageFormVara();
    $("#modalAddEditVara").modal("show");

    if(type == "add"){

        $("h3.addEditVara").empty().text("ເພີ່ມວາລະ");

        $("#manageVaraAction").val("add");

    }else{

        $("h3.addEditVara").empty().text("ແກ້ໄຂວາລະ");
        $("div.pwdHide").hide();
        $("div.pwdHide").find("input.inputPassword").removeAttr("id");
        $("div.pwdHide").find("input.inputPassword").removeAttr("name");
        $("div.pwdHide").find("input.inputConfirmPassword").removeAttr("id");
        $("div.pwdHide").find("input.inputConfirmPassword").removeAttr("name");

        var id = $(value).closest("tr").find("td input.userId").val();
        var name = $(value).closest("tr").find("td.userName").text();
        var email = $(value).closest("tr").find("td.userEmail").text();
        var tel = $(value).closest("tr").find("td.userTel").text();
        var address = $(value).closest("tr").find("td.userAddress").text(); 

        $("#manageVaraAction").val("edit");

        $("input#userId").val(id);
        $("input#val-username").val(name);
        $("input#val-email").val(email);
        $("input#val-phone").val(tel);
        $("input#val-address").val(address);

    }
}


$(function(){


    jQuery("#formAddEditVara").validate({
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
            var action = $("#manageVaraAction").val();
            console.log("submited"+action)

            var user_id = $("#userId").val();
            var topic_id = $("#topicId").val();
            var vara_time = $("#vara-time").val();
            var vara_detail = $("#vara_detail").val();

            $.ajax({
                url: 'src/CtrlTopic.php',
                type: 'POST',
                data: {
                    'user_id': user_id,
                    'topic_id': topic_id,
                    'vara_time': vara_time,
                    'vara_detail': vara_detail,
                    'action': action
                },
            })
            .done(function(data) {
                if (data == "true") {
                    swal("ສຳເລັດ !!", "ເພີ່ມຂໍ້ມູນຜູ້ໃຊ້ສຳເລັດແລ້ວ !!", "success");
                }else{
                    swal("ເກີດຂໍ້ຜິດພາດ !!", "ບໍ່ສາມາດເພີ່ມໄດ້, ກະລຸນາລອງໃໝ່ !!", "error");
                }
                loadPage("manage-user");
                $("#modalAddEditUser").modal("hide");
            })
            .fail(function() {
                swal("ເກີດຂໍ້ຜິດພາດ !!", "ບໍ່ສາມາດເພີ່ມໄດ້, ກະລຸນາລອງໃໝ່ !!", "error");
                $("#modalAddEditUser").modal("hide");
            })
        },                
        rules: {
            "vara-time": {
                required: !0,
            }
        },
        messages: {
            "vara-time": {
                required: "ກະລຸນາເລືອກເວລາ"
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