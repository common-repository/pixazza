<div class="wrap">
<h2>Pixazza v. <?php global $pixazzaversion; echo $pixazzaversion; ?></h2>
<form method="post" action="options.php">
<div id="poststuff">
<div id="post-body">
<div class="postbox" id="1"> 
<h3 class='hndle'><span>Pixazza settings</span></h3>
<div class="inside"> 

<?php wp_nonce_field('update-options'); ?>
<?php settings_fields('pixazza'); ?>

<table class="form-table" style="margin-top: 0; clear:none;">
<tr valign="top">
<th scope="row"><b>Introduce your site Pixazza ID:</b></th>
<td>
  <p>Introduce your site Pixazza ID: the number you can find in the javascript code<br />http://www.luminate.com/widget/XXXXXXXXX/<br />
  <input type="text" name="pixazzaid" value="<?php echo get_option('pixazzaid') ?>" />
</td></tr>

</table>
</div>
</div>

<input type="hidden" name="action" value="update" />

<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>

</div>
</div>
</form>
</div>
