<?php
$tabs['administration']['name'] = l('Administration');
$tabs['advertising_marketing']['name'] = l('Advertising and Marketing');
$tabs['analytics_stats']['name'] = l('Analytics and Stats');
$tabs['billing_invoicing']['name'] = l('Billing and Invoicing');
$tabs['checkout']['name'] = l('Checkout');
$tabs['content_management']['name'] = l('Content Management');
$tabs['export']['name'] = l('Export');
$tabs['emailing']['name'] = l('Emailing');
$tabs['front_office_features']['name'] = l('Front Office Features');
$tabs['i18n_localization']['name'] = l('Internationalization and Localization');
$tabs['merchandizing']['name'] = l('Merchandizing');
$tabs['migration_tools']['name'] = l('Migration Tools');
$tabs['payments_gateways']['name'] = l('Payments and Gateways');
$tabs['payment_security']['name'] = l('Payment Security');
$tabs['pricing_promotion']['name'] = l('Pricing and Promotion');
$tabs['quick_bulk_update']['name'] = l('Quick / Bulk update');
$tabs['search_filter']['name'] = l('Search and Filter');
$tabs['seo']['name'] = l('SEO');
$tabs['shipping_logistics']['name'] = l('Shipping and Logistics');
$tabs['slideshows']['name'] = l('Slideshows');
$tabs['smart_shopping']['name'] = l('Smart Shopping');
$tabs['market_place']['name'] = l('Marketplace');
$tabs['social_networks']['name'] = l('Social Networks');
$tabs['others']['name'] = l('Other Modules');
$tabs['mobile']['name'] = l('Mobile');

$versions = array();
$versions[] = '1.5.6.0';
?>

<div id="step-1">  
	
	<h4><i class="icon-double-angle-right"></i> <?php echo l('Informations sur le module') ?>;</h4>
	
	<form id="formStep1">

	<p>
		<label for="psVersion">
			<small><?php echo l('psVersion'); ?></small>
			<span class="alignright"><?php echo l('labelRequired'); ?></span>
		</label>
		<br />			
		<select name="psVersion" id="psVersion">
			<?php
				foreach($versions as $version)
					echo '<option value="'.$version.'">'.$version.'</option>';
			?>
		</select>
	</p>

	<p>
		<label for="moduleTab">
			<small><?php echo l('moduleTab'); ?></small>
			<span class="alignright"><?php echo l('labelRequired'); ?></span>
		</label>
		<br />			
		<select name="moduleTab" id="moduleTab">
			<?php
				foreach($tabs as $t => $tab)
					echo '<option value="'.$t.'">'.l($t).'</option>';
			?>
		</select>
	</p>

	<p>
		<label for="moduleName">
			<small><?php echo l('moduleName'); ?></small>
			<span class="alignright"><?php echo l('labelRequired'); ?></span>
		</label>
		<br />			
		<input type="text" value="" name="moduleName" id="moduleName" placeholder="<?php echo l('moduleName'); ?>" />
	</p>

	<p>
		<label for="moduleDisplayName">
			<small><?php echo l('moduleDisplayName'); ?></small>
			<span class="alignright"><?php echo l('labelRequired'); ?></span>
		</label>
		<br />			
		<input type="text" value="" name="moduleDisplayName" id="moduleDisplayName" placeholder="<?php echo l('moduleDisplayName'); ?>" />
	</p>
	
	<p>
		<label for="moduleDescription">
			<small><?php echo l('moduleDescription'); ?></small>
			<span class="alignright"><?php echo l('labelRequired'); ?></span>
		</label>
		<br />			
		<input type="text" name="moduleDescription" id="moduleDescription" value="" placeholder="<?php echo l('moduleDescription'); ?>" />
	</p>

	<p>
		<label for="moduleAuthor">
			<small><?php echo l('moduleAuthor'); ?></small>
			<span class="alignright"><?php echo l('labelRequired'); ?></span>
		</label>
		<br />			
		<input type="text" name="moduleAuthor" id="moduleAuthor" value="" placeholder="<?php echo l('moduleAuthor'); ?>" />
	</p>
	
	<p>
		<label for="moduleVersion">
			<small><?php echo l('moduleVersion'); ?></small>
			<span class="alignright"><?php echo l('labelRequired'); ?></span>
		</label>
		<br />			
		<input type="text" name="moduleVersion" id="moduleVersion" value="" placeholder="<?php echo l('moduleVersion'); ?>" />
	</p>	
	</form>
		
</div>