<?php 

    include "src/ConnectDb.php";
    include "src/FuncUsers.php";

    $database = new ConnectDb();
    $conn = $database->getConnection();
    
    $FuncUsers = new FuncUsers($conn);
    $results = $FuncUsers->getAllUser();

 ?>
<button class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5" onclick="modalManageUser(this, 'add')"><i class="ti-plus"></i> ເພີ່ມຜູ້ໃຊ້ງານ</button>
<div class="table-responsive m-t-20">
    <table id="example23" class="display nowrap table table-hover table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Tel</th>
                <th>Address</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php 
                $n = 1;
                $type_name = "";
                while ($rows = $results->fetch_assoc()) {
                    if ($rows["type"] == 1) {
                        $type_name = "SUPER ADMIN";
                    } else {
                        $type_name = "ADMIN";
                    }
                    
                ?>
                    <tr>
                        <td><?php echo $n++; ?><input type="hidden" class="userId" value="<?php echo $rows['user_id'] ?>"></td>
                        <td class="userName"><?php echo $rows['user_name'] ?></td>
                        <td class="userEmail"><?php echo $rows['user_email'] ?></td>
                        <td class="userTel"><?php echo $rows['user_phone'] ?></td>
                        <td class="userAddress"><?php echo $rows['user_address'] ?></td>
                        <td class="userAddress"><?php echo $type_name ?></td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-warning" onclick="modalManageUser(this, 'edit')">
                                    ແກ້ໄຂ
                                </button>
                                <button type="button" class="btn btn-danger" onclick="confirm(this, 'delete')">
                                    ລົບ
                                </button>
                                <button type="button" class="btn btn-success" onclick="confirm(this, 'resetPassword')">
                                    ຣີເຊັດລະຫັດຜ່ານ
                                </button>
                            </div>
                        </td>
                    </tr>                
                <?php
                }
             ?>
        </tbody>
    </table>
</div>
<script src="js/lib/datatables/datatables-init.js"></script>
<script src="js_dev/manageUser.js"></script>
<!-- <script src="js/lib/form-validation/jquery.validate-init.js"></script> -->