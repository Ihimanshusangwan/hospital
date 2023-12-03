<script>
  <?php if ($_SESSION['type'] == 'receptionist' && isset($_SESSION['receptionist_id'])): ?>
    const senderId = <?php echo $_SESSION['receptionist_id']; ?>;
    const senderName = `<?php echo $_SESSION['name']; ?>`;
  <?php elseif ($_SESSION['type'] == 'staff' && isset($_SESSION['staff_id'])): ?>
    const senderId = <?php echo $_SESSION['staff_id']; ?>;
    const senderName = `<?php echo $_SESSION['staff_name']; ?>`;
  <?php elseif ($_SESSION['type'] == 'doctor' && isset($_SESSION['doctor_id'])): ?>
    const senderId = <?php echo $_SESSION['doctor_id']; ?>;
    const senderName = `<?php echo $_SESSION['doctor_name']; ?>`;
    <?php elseif ($_SESSION['type'] == 'lab' && isset($_SESSION['staff_id'])): ?>
    const senderId = <?php echo $_SESSION['staff_id']; ?>;
    const senderName = `<?php echo $_SESSION['staff_name']; ?>`;
    <?php elseif ($_SESSION['type'] == 'medical' && isset($_SESSION['staff_id'])): ?>
    const senderId = <?php echo $_SESSION['staff_id']; ?>;
    const senderName = `<?php echo $_SESSION['staff_name']; ?>`;
  <?php else: ?>
  <?php endif; ?>
  const senderType = `<?php echo $_SESSION['type']; ?>`;

</script>
<div class="chat-icon" id="chatIcon">
  <i class="fas fa-comment px-2"></i>
</div>
<div class="chat-container" id="chatContainer">
  <div class="chat-header">
    <h5>Message</h5>
  </div>
  <div class="row">
    <div class="col-5 m-2">
      <h6> Receptionist</h6>
      <?php
      function displayCheckboxes($conn, $table, $type, $sessionUserId)
      {
        $sql = "SELECT id, name FROM $table;";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
          if ($type == $_SESSION['type'] && $sessionUserId == $row['id']) {
            continue;
          }
          echo <<<switches
                <div class="form-check form-switch">
                    <input class="form-check-input rec-check" type="checkbox" rec_type="$type" rec_id="{$row['id']}" id="rec_{$row['id']}" >
                    <label for="rec_{$row['id']}"> {$row['name']}</label>
                </div>
switches;

        }
      }

      // Display receptionists
      $receptionistTable = "receptionists";
      $receptionistId = isset($_SESSION['receptionist_id']) ? $_SESSION['receptionist_id'] : null;
      displayCheckboxes($conn, $receptionistTable, "receptionist", $receptionistId);
      ?>
    </div>

    <div class="col-5">
      
    <h6> Staff</h6>
      <?php
      // Display staff
      $staffTable = "staff";
      $staffId = isset($_SESSION['staff_id']) ? $_SESSION['staff_id'] : null;
      displayCheckboxes($conn, $staffTable, "staff", $staffId);
      ?>
    </div>

    <div class="col-5 m-2">
      
    <h6> Doctors</h6>
      <?php
      // Display doctors
      $doctorsTable = "doctors";
      $doctorId = isset($_SESSION['doctor_id']) ? $_SESSION['doctor_id'] : null;
      displayCheckboxes($conn, $doctorsTable, "doctor", $doctorId);
      ?>
    </div>
    <div class="col-5 m-2">
      
    <h6> Medical and Lab</h6>
      <?php
      // Display medical and lab
      if($_SESSION['type'] != "lab"){
        echo <<<switches
                <div class="form-check form-switch">
                    <input class="form-check-input rec-check" type="checkbox" rec_type="lab" rec_id="1" id="rec_1">
                    <label for="rec_1">Lab</label>
                </div>
switches;
      }
      if($_SESSION['type'] != "medical"){
        echo <<<switches
                <div class="form-check form-switch">
                    <input class="form-check-input rec-check" type="checkbox" rec_type="medical" rec_id="1" id="rec_1" >
                    <label for="rec_1">Medical</label>
                </div>
switches;
      }
      
      
      ?>
    </div>

    <div class="col-10">
      <div class="textarea-wrapper">
        <textarea name="message" id="msgBody" class="form-control m-2"></textarea>
        <button class="btn btn-outline-primary btn-sm send-button" id="msgSendBtn">
          <i class="fas fa-paper-plane"></i>
        </button>
      </div>
    </div>
    <div class="col-11 m-1">
      <button class="btn btn-outline-secondary btn-sm m-1" onclick="insertText(this)">Reach me ASAP</button>
      <button class="btn btn-outline-secondary btn-sm m-1" onclick="insertText(this)">I am on Break</button>
      <button class="btn btn-outline-secondary btn-sm m-1" onclick="insertText(this)">next patient</button>
      <button class="btn btn-outline-secondary btn-sm m-1" onclick="insertText(this)">Bring his relative</button>
    </div>
  </div>
</div>

