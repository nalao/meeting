<!-- Add Topic -->
<div class="modal fade" id="modalAddEditTopic" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title addEditTopic"></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
                <form class="form-valide" id="formAddEditTopic" autocomplete="off">
                    
                    <input type="hidden" name="userId">
                    <input type="hidden" id="topicId">
                    <input type="hidden" id="manageTopicAction">

                    <div class="form-group">
                        <label class="col-form-label" for="topic-name">ຊື່ <span class="text-danger">*</span></label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="topic-name" name="topic-name" placeholder="ຊື່ຫົວຂໍ້..">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="topic-date">ວັນທີ <span class="text-danger">*</span></label>
                        <div class="form-group">
                            <input type="date" class="form-control" id="topic-date" name="topic-date" placeholder="ວັນທີ..">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-flat m-t-20">ບັນທຶກ</button>
                    <button type="button" class="btn btn-secondary btn-flatt m-t-20" data-dismiss="modal">ຍົກເລີກ</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- End Add Topic -->


<!-- Add Topic show vara -->
<div class="modal fade" id="modalTopicShowVara" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">ລາຍລະອຽດວາລະ</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
                ASKDJA;KSD

            </div>
        </div>
    </div>
</div>
<!-- End Add Topic show vara -->


<!-- Add Vara -->
<div class="modal fade" id="modalAddEditVara" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title addEditVara"></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
                <form class="form-valide" id="formAddEditVara" autocomplete="off">

                    <input type="hidden" name="userId">
                    <input type="hidden" id="">
                    <input type="hidden" id="manageVaraAction">

                    <div class="form-group">
                        <label class="col-form-label" for="vara-time">ເວລາ <span class="text-danger">*</span></label>
                        <div class="form-group row col-md-3">
                            <input type="time" class="form-control" id="vara-time" name="vara-time" placeholder="ເວລາ..">
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-info" onclick="addRowVara(event)">ເພີ່ມແຖວ</button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th width="100px">ເອກະສານ</th>
                                    <th>ເນື້ອໃນ</th>
                                </tr>
                            </thead>
                            <tbody id="tbVara">
                                <tr>
                                    <td>
                                        <input type="file" class="inputFile">
                                    </td>
                                    <td>
                                        <textarea class="textarea_editor form-control vara_detail" rows="15" placeholder="Enter text ..." style="height:350px"></textarea>
                                    </td>
                                </tr>
                            </tbody>                       
                        </table>
                    </div>

                    <button type="submit" class="btn btn-primary btn-flat m-t-20">ບັນທຶກ</button>
                    <button type="button" class="btn btn-secondary btn-flatt m-t-20" data-dismiss="modal">ຍົກເລີກ</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- End Add vara -->


<!-- Home file -->
<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modalTitle">ວາລະກອງປະຊຸມ</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
                <div class="table-responsive">
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Kolor Tea Shirt For Man</td>
                                <td><span class="badge badge-primary">Sale</span></td>
                                <td>January 22</td>
                                <td class="color-primary">$21.56</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Kolor Tea Shirt For Women</td>
                                <td><span class="badge badge-success">Tax</span></td>
                                <td>January 30</td>
                                <td class="color-success">$55.32</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Blue Backpack For Baby</td>
                                <td><span class="badge badge-danger">Extended</span></td>
                                <td>January 25</td>
                                <td class="color-danger">$14.85</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
         
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- End Home file -->    


<!-- manage-user file -->
<div class="modal fade" id="modalAddEditUser" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title addEditUserTitle"></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
                <form class="form-valide" id="formAddEditUser" autocomplete="off">

                    <input type="hidden" id="userId">
                    <input type="hidden" id="manageUserAction">

                    <div class="form-group">
                        <label class="col-form-label" for="val-username">ຊື່ <span class="text-danger">*</span></label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="val-username" name="val-username" placeholder="ຊື່..">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="val-email">ອີເມວ <span class="text-danger">*</span></label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="val-email" name="val-email" placeholder="ອີເມວ..">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="val-phone">ເບີໂທ <span class="text-danger">*</span></label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="val-phone" name="val-phone" placeholder="ເບີໂທ..">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="val-address">ທີ່ຢູ່ <span class="text-danger">*</span></label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="val-address" name="val-address" placeholder="ທີ່ຢູ່..">
                        </div>
                    </div>
                    <div class="pwdHide">
                        <div class="form-group">
                            <label class="col-form-label" for="val-password">ລະຫັດຜ່ານ <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="password" class="form-control inputPassword" id="val-password" name="val-password" placeholder="ລະຫັດຜ່ານ..">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="val-confirm-password">ຢືນຢັນລະຫັດຜ່ານ <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="password" class="form-control inputConfirmPassword" id="val-confirm-password" name="val-confirm-password" placeholder="ຢືນຢັນລະຫັດຜ່ານ!">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-flat m-t-20">ບັນທຶກ</button>
                    <button type="button" class="btn btn-secondary btn-flatt m-t-20" data-dismiss="modal">ຍົກເລີກ</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- End manage-user file -->


<!-- Change Password file -->
<div class="modal fade" id="modalChangePwd" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">ປ່ຽນລະຫັດຜ່ານ</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
                <form class="form-valide" id="formChangePwd" autocomplete="off">
                    <input type="hidden" id="userIdChangePwd" value="<?php echo $_SESSION['user_id'] ?>">
                    <div class="form-group">
                        <label class="col-form-label" for="val-password-old">ລະຫັດຜ່ານເກົ່າ <span class="text-danger">*</span></label>
                        <div class="form-group">
                            <input type="password" class="form-control" id="val-password-old" name="val-password-old" placeholder="ລະຫັດຜ່ານເກົ່າ..">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="val-password-new">ລະຫັດຜ່ານໃໝ່ <span class="text-danger">*</span></label>
                        <div class="form-group">
                            <input type="password" class="form-control" id="val-password-new" name="val-password-new" placeholder="ລະຫັດຜ່ານໃໝ່..">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="val-confirm-password-new">ຢືນຢັນລະຫັດຜ່ານໃໝ່ <span class="text-danger">*</span></label>
                        <div class="form-group">
                            <input type="password" class="form-control" id="val-confirm-password-new" name="val-confirm-password-new" placeholder="ຢືນຢັນລະຫັດຜ່ານໃໝ່!">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-flat m-t-20">ບັນທຶກ</button>
                    <button type="button" class="btn btn-secondary btn-flatt m-t-20" data-dismiss="modal">ຍົກເລີກ</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- Change Password file