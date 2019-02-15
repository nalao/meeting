
var form_validation = function() {
    var e = function() {
            jQuery(".form-valide").validate({
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
                    console.log("asd")
                    jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
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
        }
    return {
        init: function() {
            e(), jQuery(".js-select2").on("change", function() {
                jQuery(this).valid()
            })
        }
    }
}();
jQuery(function() {
    form_validation.init()
});