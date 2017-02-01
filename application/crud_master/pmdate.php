<div class='form-group'>
	<label>{{val}}</label>{{required}}
	<div class="igs-small">{{helper}}</div>
    <input class="input-sm input-s datepicker-input form-control" size="16" type="text" 
    value="" data-toggle="tooltip" data-placement="right" title="" data-date-format="dd-mm-yyyy" name="{{val}}" data-original-title="" readonly>
     <div class='errors'>
        <?php echo form_error('{{val}}'); ?>
    </div>
</div>
