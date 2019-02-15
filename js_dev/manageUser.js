function refreshdiv(page){
    loadPage(page);
}

function resetManageFormUser(){
    $("#formAddEditUser")[0].reset();
}

function modalManageUser(value, type){

    resetManageFormUser();
    $("#modalAddEditUser").modal("show");

    if(type == "add"){

        $("h3.addEditUserTitle").empty().text("ເພີ່ມຜູ້ໃຊ້ງານ");
        $("div.pwdHide").show();
        $("div.pwdHide").find("input.inputPassword").attr({
            "id": "val-password",
            "name": "val-password"
        });

        $("div.pwdHide").find("input.inputConfirmPassword").attr({
            "id": "val-confirm-password",
            "name": "val-confirm-password"
        });

        $("#manageUserAction").val("add");

    }else{

        $("h3.addEditUserTitle").empty().text("ແກ້ໄຂຜູ້ໃຊ້ງານ");
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

        $("#manageUserAction").val("edit");

        $("input#userId").val(id);
        $("input#val-username").val(name);
        $("input#val-email").val(email);
        $("input#val-phone").val(tel);
        $("input#val-address").val(address);

    }
}


$(function(){


    jQuery("#formAddEditUser").validate({
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
            var action = $("#manageUserAction").val();

            var user_id = $("#userId").val();
            var user_name = $("#val-username").val();
            var user_email = $("#val-email").val();
            var user_phone = $("#val-phone").val();
            var user_address = $("#val-address").val();
            var user_pwd = "";

            if (action == "add") {
                user_pwd = $("#val-password").val();
            }

            $.ajax({
                url: 'src/CtrlUsers.php',
                type: 'POST',
                data: {
                    'user_id': user_id,
                    'user_name': user_name,
                    'user_email': user_email,
                    'user_phone': user_phone,
                    'user_address': user_address,
                    'user_pwd': user_pwd,
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
            "val-username": {
                required: !0,
            },
            "val-email": {
                required: !0,
                email: !0
            },
            "val-password": {
                required: !0,
                minlength: 5
            },
            "val-confirm-password": {
                required: !0,
                equalTo: "#val-password"
            },
            "val-phone": {
                required: !0,
                number: !0
            },
            "val-address": {
                required: !0
            }
        },
        messages: {
            "val-username": {
                required: "ກະລຸນອນປ້ອນຊື່"
            },
            "val-email": "ກະລຸນອນປ້ອນອີເມວ",
            "val-password": {
                required: "ກະລຸນອນປ້ອນລະຫັດຜ່ານ",
                minlength: "ລະຫັດຜ່ານຢ່າງໜ໋ອຍຕ້ອງມີ 5 ໂຕຂຶ້ນໄປ"
            },
            "val-confirm-password": {
                required: "ກະລຸນອນປ້ອນລະຫັດຜ່ານ",
                minlength: "ລະຫັດຜ່ານຢ່າງໜ໋ອຍຕ້ອງມີ 5 ໂຕຂຶ້ນໄປ",
                equalTo: "ກະລຸນອນປ້ອນລະຫັດຜ່ານໃຫ້ກົງກັນ"
            },
            "val-phone": {
                required: "ກະລຸນອນປ້ອນເບີໂທ",
                number: "ກະລຸນອນປ້ອນໂຕເລກ"
            },
            "val-address": {
                required: "ກະລຸນອນປ້ອນທີ່ຢູ່"
            }
        }
    })


    // Change Password
    jQuery("#formChangePwd").validate({
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

            var user_id = $("#userIdChangePwd").val();
            var user_pwd_old = $("#val-password-old").val();
            var user_pwd_new = $("#val-password-new").val();

            $.ajax({
                url: 'src/CtrlUsers.php',
                type: 'POST',
                data: {
                    'user_id': user_id,
                    'user_pwd_old': user_pwd_old,
                    'user_pwd_new': user_pwd_new,
                    'action': "changePwd"
                },
            })
            .done(function(data) {

                if (data == "ok") {
                    $("#modalChangePwd").modal("hide");
                    swal({
                            title: "ສຳເລັດ",
                            text: "ປ່ຽນລະຫັດຜ່ານສຳເລັດແລ້ວ !!",
                            type: "success",
                            showCancelButton: false,
                            confirmButtonColor: "#1976d2",
                            confirmButtonText: "ຕົກລົງ !!",
                            closeOnConfirm: false,
                            closeOnCancel: false
                        },
                        function(isConfirm){
                            if (isConfirm) {
                                window.location.href = "index.php";
                            }
                        });
                } else if(data == "no") {
                    swal("ເກີດຂໍ້ຜິດພາດ !!", "ກະລຸນາລອງໃໝ່ !!", "error");
                }else{
                    swal("ເກີດຂໍ້ຜິດພາດ !!", "ລະຫັດເກົ່າບໍ່ຖືກຕ້ອງ, ກະລຸນາລອງໃໝ່ !!", "warning");
                }
            })
            .fail(function() {
                swal("ເກີດຂໍ້ຜິດພາດ !!", "ກະລຸນາລອງໃໝ່ !!", "error");
            })
        },                
        rules: {
            "val-password-old": {
                required: !0,
            },
            "val-password-new": {
                required: !0,
                minlength: 5
            },
            "val-confirm-password-new": {
                required: !0,
                equalTo: "#val-password-new"
            }
        },
        messages: {
            "val-password-old": {
                required: "ກະລຸນອນປ້ອນລະຫັດຜ່ານເກົ່າ"
            },
            "val-password-new": {
                required: "ກະລຸນອນປ້ອນລະຫັດຜ່ານ",
                minlength: "ລະຫັດຜ່ານຢ່າງໜ໋ອຍຕ້ອງມີ 5 ໂຕຂຶ້ນໄປ"
            },
            "val-confirm-password-new": {
                required: "ກະລຸນອນປ້ອນລະຫັດຜ່ານ",
                minlength: "ລະຫັດຜ່ານຢ່າງໜ໋ອຍຕ້ອງມີ 5 ໂຕຂຶ້ນໄປ",
                equalTo: "ກະລຸນອນປ້ອນລະຫັດຜ່ານໃຫ້ກົງກັນ"
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