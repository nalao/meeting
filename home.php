<div class="table-responsive">
    <table id="example23" class="display nowrap table table-hover table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1<input type="hidden" class="id" value="1"></td>
                <td>Robert</td>
                <td>robert@gmail.com</td>
                <td>456745464</td>
                <td>Vientaine, laos</td>
                <td>
                    <button class="btn btn-info btn-flat m-b-10 m-l-5" onclick="detail(this)">
                        Detail
                    </button>
                </td>
            </tr>
            <tr>
                <td>2<input type="hidden" class="id" value="2"></td>
                <td>Jonhny</td>
                <td>jonhny@gmail.com</td>
                <td>16549854132</td>
                <td>savannakhet, laos</td>
                <td>
                    <button class="btn btn-info btn-flat m-b-10 m-l-5" onclick="detail(this)">
                        Detail
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<script src="js/lib/datatables/datatables-init.js"></script>