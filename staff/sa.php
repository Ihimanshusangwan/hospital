<div class="row mt-4">
            <div class="col-8 offset-1">


                <div class="row">
                    <div class="col"><strong>Glass details:</strong></div>
                    <div class="col"><strong>RE:</strong></div>
                    <div class="col"><strong>LE:</strong></div>
                </div>

                <table class="table table-bordered border-dark mt-4">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th class="w-2">SPH</th>
                            <th scope="col">CYL</th>
                            <th scope="col">AXIS</th>
                            <th scope="col">Vision</th>
                            <th scope="col">SPH</th>
                            <th scope="col">CYL</th>
                            <th scope="col">AXIS</th>
                            <th scope="col">Vision</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="col">DIST</th>
                            <th><input type="text" name="dist1_input_1" value="<?php echo $result5['dist1_input_1']; ?>"
                                    class="live-fetch" data-column="dist1_input_1" data-table="cc_glass1_rx">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist1_input_2" value="<?php echo $result5['dist1_input_2']; ?>"
                                    class="live-fetch" data-column="dist1_input_2" data-table="cc_glass1_rx">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist1_input_3" value="<?php echo $result5['dist1_input_3']; ?>"
                                    class="live-fetch" data-column="dist1_input_3" data-table="cc_glass1_rx">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist1_input_4" value="<?php echo $result5['dist1_input_4']; ?>"
                                    class="live-fetch" data-column="dist1_input_4" data-table="cc_glass1_rx">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist1_input_5" value="<?php echo $result5['dist1_input_5']; ?>"
                                    class="live-fetch" data-column="dist1_input_5" data-table="cc_glass1_rx">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist1_input_6" value="<?php echo $result5['dist1_input_6']; ?>"
                                    class="live-fetch" data-column="dist1_input_6" data-table="cc_glass1_rx">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist1_input_7" value="<?php echo $result5['dist1_input_7']; ?>"
                                    class="live-fetch" data-column="dist1_input_7" data-table="cc_glass1_rx">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist1_input_8" value="<?php echo $result5['dist1_input_8']; ?>"
                                    class="live-fetch" data-column="dist1_input_8" data-table="cc_glass1_rx">
                                <div class="dropdown-container"></div>
                            </th>
                        </tr>
                        <tr>
                            <th scope="col">NEAR</th>
                            <td><input type="text" name="near1_input_1" value="<?php echo $result5['near1_input_1']; ?>"
                                    class="live-fetch" data-column="near1_input_1" data-table="cc_glass1_rx">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near1_input_2" value="<?php echo $result5['near1_input_2']; ?>"
                                    class="live-fetch" data-column="near1_input_2" data-table="cc_glass1_rx">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near1_input_3" value="<?php echo $result5['near1_input_3']; ?>"
                                    class="live-fetch" data-column="near1_input_3" data-table="cc_glass1_rx">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near1_input_4" value="<?php echo $result5['near1_input_4']; ?>"
                                    class="live-fetch" data-column="near1_input_4" data-table="cc_glass1_rx">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near1_input_5" value="<?php echo $result5['near1_input_5']; ?>"
                                    class="live-fetch" data-column="near1_input_5" data-table="cc_glass1_rx">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near1_input_6" value="<?php echo $result5['near1_input_6']; ?>"
                                    class="live-fetch" data-column="near1_input_6" data-table="cc_glass1_rx">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near1_input_7" value="<?php echo $result5['near1_input_7']; ?>"
                                    class="live-fetch" data-column="near1_input_7" data-table="cc_glass1_rx">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near1_input_8" value="<?php echo $result5['near1_input_8']; ?>"
                                    class="live-fetch" data-column="near1_input_8" data-table="cc_glass1_rx">
                                <div class="dropdown-container"></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-2 mt-5">
                <div class="col my-2">
                    <label class="form-label" for="time_ad">BE ADD:</label>
                    <input type="text" class="form-control-sm inline live-fetch" name="be_add1" data-column="be_add"
                        data-table="cc_glass1_rx">
                    <div class="dropdown-container" style="left:5rem;"></div>
                </div>
                <div class="col my-2">
                    <label class="form-label" for="time_ad">RE:</label>
                    <input type="text" class="form-control-sm inline mx-4 live-fetch" name="re"
                        value="<?php echo $result5['re1']; ?>" class="live-fetch" data-column="re"
                        data-table="cc_glass1_rx">
                    <div class="dropdown-container" style="left:4.8rem;"></div>
                </div>
                <div class="col my-2">
                    <label class="form-label" for="time_ad">LE ADD:</label>
                    <input type="text" class="form-control-sm inline live-fetch" name="le1_add"
                        value="<?php echo $result5['le1_add']; ?>" data-column="le1w_add" data-table="cc_glass1_rx">
                    <div class="dropdown-container" style="left:5rem;"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 offset-1">
                <label class="form-label" for="time_ad">Glass Type:</label>
                <input type="text" class="form-control-sm inline live-fetch" name="glass1_type"
                    value="<?php echo $result5['glass1_type']; ?>" data-column="glass1_type" data-table="cc_glass1_rx">
                <div class="dropdown-container" style="left:6rem;"></div>
            </div>
            <div class="col-md-2">
                <label class="form-label" for="time_ad">Glass Color:</label>
                <input type="text" class="form-control-sm inline live-fetch" name="glass1_colour"
                    value="<?php echo $result5['glass1_colour']; ?>" data-column="glass1_colour" data-table="cc_glass1_rx">
                <div class="dropdown-container" style="left:6.25rem;"></div>
            </div>
            <div class="col-md-2">
                <label class="form-label" for="time_ad">Glass Use:</label>
                <input type="text" class="form-control-sm inline live-fetch" name="glass1_use"
                    value="<?php echo $result5['glass1_use']; ?>" data-column="glass1_use" data-table="cc_glass1_rx">
                <div class="dropdown-container" style="left:5.6rem;"></div>
            </div>
            <div class="col-md-2">
                <label class="form-label" for="time_ad">PD:</label>
                <input type="text" class="form-control-sm inline live-fetch" name="pd"
                    value="<?php echo $result5['pd']; ?>" data-column="pd" data-table="cc_glass1_rx">
                <div class="dropdown-container" style="left:2.5rem;"></div>
            </div>
        </div>


