<div class="chat-icon" id="chatIcon">
        <i class="fas fa-comment px-2"></i>
    </div>
    <div class="chat-container" id="chatContainer">
        <div class="chat-header">
            <h5>Message</h5>
        </div>
        <div class="row">
            <div class="col-11 m-2">
                <?php 
                $r_sql = "select id,name from receptionists;";
                $receptionists = $conn->query($r_sql);
                while($row = $receptionists->fetch_assoc()){
                    echo<<<switches
                    <div class="form-check form-switch">
                    <input class="form-check-input rec-check" type="checkbox" rec_id=" {$row['id']}" id="rec_{$row['id']}">
                    <label for=""> {$row['name']}</label>
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
    <script>
       const dr_id = <?php echo $_SESSION['doctor_id']; ?>;
    </script>