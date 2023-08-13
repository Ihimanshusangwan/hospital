<div>
    <div style="border-bottom: 3px solid black; margin-bottom : 10px;"></div>
    <div class="row">
        <div class="col-6"><strong>UHID No:</strong><?php echo $res2['uhid'];?>
    </div>
        <div class="col-6"><strong>IPD No:</strong>
            <?php echo $res2['ipd']; ?>
        </div>
        <div class="col-3"><strong>Ward/ICU:</strong>
            <?php echo $res2['ward/icu']; ?>
        </div>
        <div class="col-3"><strong>Bed / Room No:</strong>
            <?php echo $res2['bed/room']; ?>
        </div><br>
        <div class="col-6"><strong>Name:</strong>
            <?php echo strtoupper($res['name']); ?>
        </div>
        <div class="col-3"><strong>Age:</strong>
            <?php echo strtoupper($res['age']); ?>
        </div>
        <div class="col-3"><strong>Sex:</strong>
            <?php echo $res['sex']; ?>
        </div><br>
        <div class="col-6"><strong>Date of Admission:</strong>
            <?php echo $res2['date']; ?>
        </div>
        <div class="col-6"><strong>Time:</strong>
            <?php echo $res2['time']; ?>
        </div><br>
        <div class="col-6"><strong>Consultant:</strong>
            <?php echo $res['consultant']; ?>
        </div>
        <div class="col-6"><strong>Diagnosis:</strong>
            <?php echo $res1['diagnosis']; ?>
        </div><br>
        <div class="col mx-3" style = "display: flex; justify-content: flex-end;" >
            <script src="../barcode.js"></script>
            <canvas id="barcode"></canvas>
            <script>
                const canvas = document.getElementById('barcode');
                const opts = {
                    bcid: 'code39',  // Barcode type set to Code 39
                    text: '<?php echo $id; ?>',  // Numeric value with variable length
                    scale: 2,  // Scale factor for the barcode size
                    height: 10,  // Height of the barcode in mm
                    includetext: false,  // Include the barcode text
                };

                bwipjs.toCanvas(canvas, opts, function (err) {
                    if (err) {
                        console.error('Error generating barcode:', err);
                    } else {
                        console.log('Barcode generated successfully');
                    }
                });



            </script>
        </div><br>

    </div>
    <div style="border-bottom: 3px solid black; margin-bottom : 10px;  margin-top: 10px;"></div>