<?php 

    include "src/ConnectDb.php";
    include "src/FuncTopic.php";
    include "src/FuncUsers.php";

    $database = new ConnectDb();
    $conn = $database->getConnection();
    
    $funcUser = new FuncUsers($conn);

    $funcTopic = new FuncTopic($conn);
    $results = $funcTopic->getTopic();

 ?>
<button class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5" onclick="modalManageTopic(this, 'add')"><i class="ti-plus"></i> ເພີ່ມຫົວຂໍ້</button>
<div class="table-responsive m-t-20">
    <table id="example23" class="display nowrap table table-hover table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>ຫົວຂໍ້</th>
                <th>ວັນທີ</th>
                <th>ຜູ້ສ້າງ</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>

            <?php 
                $n = 1;
                while ($rows = $results->fetch_assoc()) {

                    $funcUser->user_id = $rows['user_id'];
                    $resultUser = $funcUser->getUserById();
                    $resultUser->data_seek(0);
                    $user_name = $resultUser->fetch_assoc()['user_name'];
                ?>
                    <tr>
                        <td><?php echo $n++; ?></td>
                        <td><?php echo $rows['topic_name'] ?></td>
                        <td><?php echo $rows['topic_date'] ?></td>
                        <td><?php echo $user_name; ?></td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-success" onclick="modalTopicShowDetail(<?php echo $rows['topic_id'] ?>)">
                                    ລາຍລະອຽດວາລະ
                                </button>
                                <button type="button" class="btn btn-warning" onclick="modalManageUser(this, 'edit')">
                                    ແກ້ໄຂ
                                </button>
                                <button type="button" class="btn btn-danger" onclick="confirm(this, 'delete')">
                                    ລົບ
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
<script src="js_dev/manageTopic.js"></script>