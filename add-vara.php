<?php 

    include "src/ConnectDb.php";
    include "src/FuncTopic.php";
    include "src/FuncVara.php";

    $database = new ConnectDb();
    $conn = $database->getConnection();

    $funcTopic = new FuncTopic($conn);
    $resTopic = $funcTopic->getTopic();

 ?>
<button class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5" onclick="modalManageVara(this, 'add')"><i class="ti-plus"></i> ເພີ່ມວາລະ</button>
<div class="table-responsive m-t-20">
    <table id="example23" class="display nowrap table table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ຫົວຂໍ້</th>
                <th>ເອກະສານ</th>
                <th>ວາລະ</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>

            <?php 
                while ($rowTopic = $resTopic->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $rowTopic['topic_name'] ?></td>
                        <td><?php echo $rowTopic['topic_name'] ?></td>
                        <td style="padding: 0px">
                            <table class="table">
                                <?php 
                                    $funcVara = new FuncVara($conn);
                                    $funcVara->topic_id = $rowTopic['topic_id'];
                                    $resVaraTime = $funcVara->getVaraTime();
                                    while ($rowVaraTime = $resVaraTime->fetch_assoc()) {
                                    ?>
                                        <tr style=" background-color: #2e9596">
                                            <td align="center" style="color: #fff;font-weight: bold;"><?php echo $rowVaraTime['vara_time'] ?>&nbsp;&nbsp;&nbsp;<?php echo $rowVaraTime['comment'] == 0 ? "ພັກຜ່ອນ" : ""; ?> </td>
                                        </tr>
                                        <?php 
                                            if ($rowVaraTime['comment'] == 1) {
                                                $funcVara->vara_time_id = $rowVaraTime['vara_time_id'];
                                                $resVara = $funcVara->getVara();

                                                while ($rowVara = $resVara->fetch_assoc()) {
                                                ?>   
                                                    <tr>
                                                        <td><?php echo  substr($rowVara['vara_detail'], 0, 100)."......";  ?></td>
                                                    </tr>
                                                <?php
                                                }                                                
                                            }

                                         ?> 
                                    <?php
                                    }
                                 ?>                            
                            </table>
                        </td>                        
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-warning" onclick="modalManageVara(this, 'edit')">
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
<!-- <script src="js/lib/html5-editor/wysihtml5-init.js"></script> -->
<script src="js_dev/manageVara.js"></script>