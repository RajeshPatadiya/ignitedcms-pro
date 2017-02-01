<div class="form-group">
    <label>{{val}}</label>{{required}}
    <div class="igs-small">{{helper}}</div>
    <textarea name="{{val}}"  id="inp-box" class="form-control" rows="5"  placeholder="Type here" data-toggle="tooltip" data-placement="top"><?php echo set_value('{{val}}'); ?></textarea>
    <div class='errors'>
        <?php echo form_error('{{val}}'); ?>
    </div>
</div>
