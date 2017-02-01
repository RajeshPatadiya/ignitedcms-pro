<div class="form-group">
    <!-- <div class="errors pull-left">*</div> -->
    <label>{{val}}</label> {{required}}
    <div class="igs-small">{{helper}}</div>
    <input name="{{val}}" type="text" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" value="<?php echo $key->{{val}}; ?><?php echo set_value('{{val}}'); ?>">
    <div class='errors'>
        <?php echo form_error('{{val}}'); ?>
    </div>
</div>