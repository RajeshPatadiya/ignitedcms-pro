<div class="col-sm-4">
    <header class="panel-heading ">
        <div class="inline font-bold"> New Field </div>
    </header>
    <section class="panel">
        <div class="panel-body">
            <div class="form-group">
                <label>Name</label>
                <div class="errors pull-left">*</div>
                <div class="igs-small">What this field will be called in the control panel. (This <strong>MUST</strong> be unique and must not contain numbers or spaces)</div>
                <input name="name|<?php echo $uid; ?>" type="text" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" value="<?php echo set_value('handle'); ?>"> </div>
            <div class="errors">
                
            </div>
            <div class="form-group">
                <label>Instructions</label>
                <div class="igs-small">Helper text to guide the author</div>
                <input name="instructions|<?php echo $uid; ?>" type="text" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="" value="<?php echo set_value('instructions'); ?>"> </div>
            <div class="form-group">
                <label>Field Type</label>
                <div class="errors pull-left">*</div>
                <div class="igs-small">Specify the field type</div>
                <select name="type|<?php echo $uid; ?>" class="form-control m-b" id="type">
                    <option value="plain-text">Plain Text</option>
                    <option value="multi-line">Multi-line Box</option>
                    <option value="rich-text">Rich Text Box</option>
                    <option value="drop-down">Drop Down</option>
                    <option value="check-box">Check Boxes</option>
                    <option value="color">Color</option>
                    <option value="file-upload">File Upload</option>
                    <option value="number">Number</option>
                    <option value="date">Date</option>
                    <option value="switch">Switch</option>
                </select>
                <div class="errors">
                   
                </div>
            </div>
            <div class="pm-check-box" style="display:none;">
                <!-- dynamic dropdown and checkboxes -->
                <div class="btn btn-purplet btn-s-xs" id="add-block2"><strong>Add Another</strong> </div>
                <div class="small-gap"></div>
                <div class="form-group">
                    <label>Check Box values</label>
                    <input name="opts-name|<?php echo $uid; ?>" type="text" data-maxlength="200" class="form-control" placeholder="Type option here" data-toggle="tooltip" data-placement="top" title="" value=""> </div>
                <div id="my-content2"> </div>
            </div>
            <div class="pm-drop-down" style="display:none;">
                <!-- dynamic dropdown and checkboxes -->
                <div class="btn btn-purplet btn-s-xs" id="add-block"><strong>Add Another</strong> </div>
                <div class="small-gap"></div>
                <div class="form-group">
                    <label>Drop Down values</label>
                    <input name="opts-name|<?php echo $uid; ?>" type="text" data-maxlength="200" class="form-control" placeholder="Type option here" data-toggle="tooltip" data-placement="top" title="" value=""> </div>
                <div id="my-content"> </div>
            </div>
            <div class="pm-plain-text" style="display:none;">
                <div class="form-group">
                    <label>Max Length </label>
                    <div class="igs-small">The maximum length of characters the field is allowed to have.</div>
                    <input name="maxchars|<?php echo $uid; ?>" id="maxchars" type="text" data-maxlength="20" class="form-control" placeholder="" data-toggle="tooltip" data-placement="top" title="" value="<?php echo set_value('maxchars'); ?>">
                    <div class="errors">
                        
                    </div>
                </div>
            </div>
            <div class="pm-file-upload" style="display:none;">
                <div class="form-group">
                    <label>Select Allowed File types </label>
                    <div class="igs-small">Choose the file types which are allowed.</div>
                    <input name="filetypes|<?php echo $uid; ?>" id="filetypes" type="text" data-maxlength="20" class="form-control" placeholder="gif|jpg|png" data-toggle="tooltip" data-placement="top" title="" value="<?php echo set_value('filetypes'); ?>">
                    <div class="errors">
                        
                    </div>
                </div>
                <div class="form-group">
                    <label>Limit</label>
                    <div class="igs-small">Limit the number of uploads </div>
                    <input name="limit|<?php echo $uid; ?>" type="text" data-maxlength="200" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="" value="<?php echo set_value('limit'); ?>">
                    <div class="errors">
                        
                    </div>
                </div>
            </div>
            <div class="pm-number" style="display:none;">
                <div class="form-group">
                    <label>Min Value </label>
                    <div class="igs-small">Minimum</div>
                    <input name="min|<?php echo $uid; ?>" id="min" type="text" data-maxlength="20" class="form-control" placeholder="" data-toggle="tooltip" data-placement="top" title="" value="<?php echo set_value('min'); ?>">
                    <div class="errors">
                        
                    </div>
                </div>
                <div class="form-group">
                    <label>Max Value</label>
                    <div class="igs-small">Maximum </div>
                    <input name="max|<?php echo $uid; ?>" type="text" data-maxlength="200" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="" value="<?php echo set_value('max'); ?>">
                    <div class="errors">
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>