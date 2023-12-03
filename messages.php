<div class="fullscreen-alert" id="fullscreenAlert">
    <div class="alert-content ">
        <div class="row">
            <div class="col-10 offset-1">
                <h2 class="text-center text-dark mb-4">Messages</h2>

            </div>
            <div class="col-1">

                <button class="btn btn-outline-danger btn-sm" id="closeAlert"><i class="fas fa-times"></i></button>
            </div>
        </div>


        <?php
        $r_id = null;
        $r_type = null;

        if ($_SESSION['type'] == 'receptionist' && isset($_SESSION['receptionist_id'])) {
            $r_id = $_SESSION['receptionist_id'];
            $r_type = 'receptionist';
        } elseif ($_SESSION['type'] == 'staff' && isset($_SESSION['staff_id'])) {
            $r_id = $_SESSION['staff_id'];
            $r_type = 'staff';
        } elseif ($_SESSION['type'] == 'doctor' && isset($_SESSION['doctor_id'])) {
            $r_id = $_SESSION['doctor_id'];
            $r_type = 'doctor';
        } elseif ($_SESSION['type'] == 'lab' && isset($_SESSION['staff_id'])) {
            $r_id = $_SESSION['staff_id'];
            $r_type = 'lab';
        } elseif ($_SESSION['type'] == 'medical' && isset($_SESSION['staff_id'])) {
            $r_id = $_SESSION['staff_id'];
            $r_type = 'medical';
        }
        $msg_sql = " select * from messages where r_id = '$r_id' and r_type = '$r_type' order by id desc";
        $msg_res = $conn->query($msg_sql);
        $newMsg = 0;
        if ($msg_res->num_rows < 1) {
            echo "No Message Available";
        } else {
            while ($row = $msg_res->fetch_assoc()) {
                echo <<<msg
                <div class="card">

                <div class="card-body">
                    <div class="row">
                        <div class="col-9 text-left text-primary">
                            <h5 style="text-align: left;">{$row['sender_name']}</h5>
                        </div>
                        <div class="col-3">
                            {$row['time']}
                        </div>
                        <div class="col-10 text-left">
                            <h6 class="card-title " style="text-align: left;">{$row['msg_body']}</h6>
                        </div>
                        <div class="col-2">
msg;
                if ($row['is_read'] == 0) {
                    $newMsg = 1;
                    echo <<<msg
    <button class="btn btn-outline-success btn-sm" msg-id="{$row['id']}" onclick="markAsRead(this)"><i class="fas fa-check-double"></i></button>
msg;

                }
                echo <<<msg
                            <button class="btn btn-outline-danger btn-sm" msg-id="{$row['id']}" onclick="deleteMsg(this)"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>

                </div>
            </div>
msg;
            }
        }

        ?>
        <script> const newMsg = <?php echo $newMsg; ?>;
            const fullscreenAlert = document.getElementById('fullscreenAlert');
            const closeAlertButton = document.getElementById('closeAlert');
            if (newMsg == 1) {
                fullscreenAlert.style.display = 'flex';
            }
            closeAlertButton.addEventListener('click', () => {
                fullscreenAlert.style.display = 'none';
            });
            function showMsgOnBtn() {

                fullscreenAlert.style.display = 'flex';
            }

            function markAsRead(btn) {
                const msgId = btn.getAttribute("msg-id");

                const data = new URLSearchParams();
                data.append('msgId', msgId);

                fetch('../markAsRead.php', {
                    method: 'POST',
                    body: data
                })
                    .then(response => response.text())
                    .then(result => {
                        console.log(result);
                        if (result.trim() === "success") {

                            btn.style.display = "none";
                        } else {
                            alert("An error occurred");
                        }

                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }

            function deleteMsg(btn) {
                const msgId = btn.getAttribute("msg-id");

                const data = new URLSearchParams();
                data.append('msgId', msgId);

                fetch('../deleteMsg.php', {
                    method: 'POST',
                    body: data
                })
                    .then(response => response.text())
                    .then(result => {
                        console.log(result);
                        if (result.trim() === "success") {

                            btn.parentElement.parentElement.parentElement.parentElement.style.display = "none";
                        } else {
                            alert("An error occurred");
                        }

                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });

            }
        </script>
    </div>
</div>