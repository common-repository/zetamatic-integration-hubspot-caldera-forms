<div class="caldera-config-group">
    <label><?php esc_html_e( 'HubSpot API key', 'integration-hubspot-calderaforms' ); ?> </label>
    <div class="caldera-config-field">
        <input type="text" class="block-input field-config required" id="ihcf_hubspot_org_id" name="{{_name}}[ihcf_hubspot_org_id]" value="{{ihcf_hubspot_org_id}}" required="required">
        <div class="description"></div>
    </div>
</div>

<div class="caldera-config-group">
	<label><?php esc_html_e( 'HubSpot Object', 'integration-hubspot-calderaforms' ); ?> </label>
	<div class="caldera-config-field">
		<select class="block-input field-config" name="{{_name}}[ihcf_hubspot_obj]" id="ihcf_hubspot_obj">
			<option value="Contact" {{#is context value="Contact"}}selected="selected"{{/is}}><?php esc_html_e( 'Contact', 'integration-hubspot-calderaforms' ); ?></option>
		</select>
	</div>
</div>

<div class="caldera-config-group">
    <label><?php esc_html_e( 'First Name', 'integration-hubspot-calderaforms' ); ?> </label>
    <div class="caldera-config-field">
        <input type="text" class="block-input field-config magic-tag-enabled caldera-field-bind required" id="ihcf_hubspot_first_name" name="{{_name}}[ihcf_hubspot_first_name]" value="{{ihcf_hubspot_first_name}}" required="required">
    </div>
</div>

<div class="caldera-config-group">
    <label><?php esc_html_e( 'Last Name', 'integration-hubspot-calderaforms' ); ?> </label>
    <div class="caldera-config-field">
        <input type="text" class="block-input field-config magic-tag-enabled caldera-field-bind" id="ihcf_hubspot_last_name" name="{{_name}}[ihcf_hubspot_last_name]" value="{{ihcf_hubspot_last_name}}">
    </div>
</div>

<div class="caldera-config-group">
    <label><?php esc_html_e( 'Your Email', 'integration-hubspot-calderaforms' ); ?> </label>
    <div class="caldera-config-field">
        <input type="email" class="block-input field-config magic-tag-enabled caldera-field-bind required" id="ihcf_hubspot_email" name="{{_name}}[ihcf_hubspot_email]" value="{{ihcf_hubspot_email}}" required="required">
    </div>
</div>

<div class="caldera-config-group">
    <div>To use dynampic field mapping for Caldera HubSpot Integration visit <a href="https://zetamatic.com/downloads/caldera-forms-hubspot-integration-pro/" target="_blank">here</a></div>
</div>
