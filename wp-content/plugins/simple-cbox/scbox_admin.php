 	<?php
		if($_POST['scbox_hidden'] == 'Y') {
			//Form data sent
			$sc_style = $_POST['scbox_style'];
			update_option('scbox_style', $sc_style);
			$sc_width = $_POST['scbox_width'];
			update_option('scbox_width', $sc_width);
			$sc_height = $_POST['scbox_height'];
			update_option('scbox_height', $sc_height);
			$sc_trans = $_POST['scbox_trans'];
			update_option('scbox_trans', $sc_trans);
			$sc_gvari = stripslashes($_POST['scbox_gvari']);
			update_option('scbox_gvari', $sc_gvari);
			$sc_cusvari = stripslashes($_POST['scbox_cusvari']);
			update_option('scbox_cusvari', $sc_cusvari);
			$sc_globalsc = $_POST['scbox_globalsc'];
			update_option('scbox_globalsc', $sc_globalsc);
			$sc_addhead = stripslashes($_POST['scbox_addhead']);
			update_option('scbox_addhead', $sc_addhead);
			?>
			<div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
			<?php
		} else {
			//Normal page display
			$sc_style = get_option('scbox_style');
			$sc_width = get_option('scbox_width');
			$sc_height = get_option('scbox_height');
			$sc_trans = get_option('scbox_trans');
			$sc_gvari = get_option('scbox_gvari');
			$sc_cusvari = get_option('scbox_cusvari');
			$sc_globalsc = get_option('scbox_globalsc');
			$sc_addhead = get_option('scbox_addhead');
		}
	?>
	
 
 
 <div class="wrap">  
    <?php    echo "<h2>" . __( 'Simple Colorbox Plugin Options', 'scbox_trdom' ) . "</h2>"; ?> 
    
    <?php    echo "<h3>" . __( 'About', 'scbox_trdom' ) . "</h3>"; ?> 
    <p>This is a plugin for the Lightbox clone <a href="http://colorpowered.com/colorbox/" target="_blank"><strong>Colorbox</strong></a>. Visit the Colorbox website to learn how to customize it. Included in this plugin, there are the 5 premade styles that come prepackaged with the Colorbox script as well as a "no overlay"/"Default" background.</p>
    <p>If you want all the images on your site to be grouped and colorboxed by Post ID -- Enable "Automatic Image Grouping and Colorboxing", </p>
    <p>If you notice any problems or glitches email us at dcoi9@aol.com.  Also, if you find this plugin to be useful shoot us a buck:
    
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="ZSZN4VB5CHPEU">
<input type="hidden" name="page_style" value="PayPal1" />
<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" onclick="this.form.target='_blank';return true;">
</form>
</p>
   
    <form name="scbox_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">  
     <input type="hidden" name="scbox_hidden" value="Y">  
     
     <?php    echo "<h3>" . __( 'Style', 'scbox_trdom' ) . "</h3>"; ?>
     </p>
      
     
        <select name="scbox_style" value="<?php echo $sc_style; ?>">
        
        

        <option <?php if($sc_style == 'colorbox.css') { echo 'selected="selected"';} ?> value="colorbox.css">Default</option>
        <option <?php if($sc_style == 'colorbox1.css') { echo 'selected="selected"';} ?> value="colorbox1.css">Style 1</option>
        <option <?php if($sc_style == 'colorbox2.css') { echo 'selected="selected"';} ?> value="colorbox2.css">Style 2</option>
        <option <?php if($sc_style == 'colorbox3.css') { echo 'selected="selected"';} ?> value="colorbox3.css">Style 3</option>
        <option <?php if($sc_style == 'colorbox4.css') { echo 'selected="selected"';} ?> value="colorbox4.css">Style 4</option>
        <option <?php if($sc_style == 'colorbox5.css') { echo 'selected="selected"';} ?> value="colorbox5.css">Style 5</option>
        </select><br/>
        
        <a href="http://colorpowered.com/colorbox/core/example1/index.html" target="_blank">Style 1 Preview</a>
        <a href="http://colorpowered.com/colorbox/core/example2/index.html" target="_blank">Style 2 Preview</a>
        <a href="http://colorpowered.com/colorbox/core/example3/index.html" target="_blank">Style 3 Preview</a>
        <a href="http://colorpowered.com/colorbox/core/example4/index.html" target="_blank">Style 4 Preview</a>
        <a href="http://colorpowered.com/colorbox/core/example5/index.html" target="_blank">Style 5 Preview</a>
        </p> 
     
     <?php    echo "<h3>" . __( 'Global Colorbox Effect', 'scbox_trdom' ) . "</h3>"; ?>
     These options control the appearance of the Global Post Image Grouping with Lightbox effect.

      <p><?php _e("<strong>Atomatic Image Grouping and Colorboxing:</strong> " ); ?>
      <select name="scbox_globalsc">
      
      <option <?php if($sc_globalsc == 'select') { echo 'selected="selected"';} ?> value="select">Select</option>
       <option <?php if($sc_globalsc == 'Enabled') { echo 'selected="selected"';} ?> value="Enabled">Enabled</option>
       <option <?php if($sc_globalsc == 'Disabled') { echo 'selected="selected"';} ?> value="Disabled">Disabled</option>
      </select>
       
       What this does is it allows for image link rel tag insertion based on post, and colorbox variable creation also based on post. Thus enabling automatic image grouping with Lightbox type effect.
      
      
       <p><?php _e("Width: " ); ?><input type="text" name="scbox_width" value="<?php echo $sc_width; ?>" size="20"></p>
       <p><?php _e("Height: " ); ?><input type="text" name="scbox_height" value="<?php echo $sc_height; ?>" size="20"></p>
       <p><?php _e("Transition: " ); ?><input type="text" name="scbox_trans" value="<?php echo $sc_trans; ?>" size="20"></p>
       <p><strong>NOTE:</strong> To exclude an image from the global colorbox effect simple add your own rel tag to the url, example: <strong>rel="<em>whatever</em>"</strong>  Doing this will tell a filter function (located in /simple_cbox/index.php) to remove both rel tags, creating an XHTML compliant url and disabling this plugin for the specified image.</p>
       <p><?php _e('Add A Global Colorbox <a href="#key_reference">Variable Key</a>: ' ); ?><br/><textarea name="scbox_gvari" cols="40" rows="8"><?php echo $sc_gvari; ?></textarea></p>
       
        <?php    echo "<h3>" . __( 'Custom Variables', 'scbox_trdom' ) . "</h3>"; ?>
        Add Your Own Custom Colorbox Variable Instance(s)
       
      <p><textarea name="scbox_cusvari" cols="80" rows="10"><?php echo $sc_cusvari; ?></textarea></p>
      
      <?php    echo "<h3>" . __( 'Add To HEAD', 'scbox_trdom' ) . "</h3>"; ?>
      Add some Code Your HEAD tag.
       
      <p><textarea name="scbox_addhead" cols="80" rows="10"><?php echo $sc_addhead; ?></textarea></p>

        
       <p class="submit">  
         <input type="submit" name="Submit" onclick="location=document.options.value;" value="<?php _e('Update Options', 'scbox_trdom' ) ?>" />  
         </p>  
     </form>  
  
<?php    echo '<h3 id="key_reference">' . __( 'Colorbox Variable Key Reference', 'scbox_trdom' ) . "</h3>"; ?>
     
     <table>
				<tr>
					<th id="key">Key</th><th id="default">Default</th><th id="description">Description</th>
				</tr>

				<tr>
					<td style="border: 1px solid #666666; padding:1px;">transition</td><td style="border: 1px solid #666666; padding:1px;">"elastic"</td><td style="border: 1px solid #666666; padding:1px;">The transition type. Can be set to "elastic", "fade", or "none".</td>
				</tr>
				<tr>
					<td style="border: 1px solid #666666; padding:1px;">speed</td><td style="border: 1px solid #666666; padding:1px;">350</td><td style="border: 1px solid #666666; padding:1px;">Sets the speed of the fade and elastic transitions, in milliseconds.</td>
				</tr>

				<tr>
					<td style="border: 1px solid #666666; padding:1px;">href</td><td style="border: 1px solid #666666; padding:1px;">false</td><td style="border: 1px solid #666666; padding:1px;">This can be used as an alternative anchor URL or to associate a URL for non-anchor elements such as images or form buttons. Example:<br /><span class="code">$('h1').colorbox({href:"welcome.html"})</span></td>
				</tr>
				<tr>
					<td style="border: 1px solid #666666; padding:1px;">title</td><td style="border: 1px solid #666666; padding:1px;">false</td><td style="border: 1px solid #666666; padding:1px;">This can be used as an anchor title alternative for ColorBox.</td>

				</tr>
				<tr>
					<td style="border: 1px solid #666666; padding:1px;">rel</td><td style="border: 1px solid #666666; padding:1px;">false</td><td style="border: 1px solid #666666; padding:1px;">This can be used as an anchor rel alternative for ColorBox.  This allows the user to group any combination of elements together for a gallery, or to override an existing rel so elements are not grouped together.  Example:<br /><span class="code">$('#example a').colorbox({rel:'group1'})</span>
					<br/>Note: The value can also be set to 'nofollow' to disable grouping.</td>
				</tr> 
				<tr>
					<td style="border: 1px solid #666666; padding:1px;">width</td><td style="border: 1px solid #666666; padding:1px;">false</td><td style="border: 1px solid #666666; padding:1px;">Set a fixed total width. This includes borders and buttons. Example: "100%", "500px", or 500</td>

				</tr>
				<tr>
					<td style="border: 1px solid #666666; padding:1px;">height</td><td style="border: 1px solid #666666; padding:1px;">false</td><td style="border: 1px solid #666666; padding:1px;">Set a fixed total height. This includes borders and buttons. Example: "100%", "500px", or 500</td>
				</tr>
				<tr>
					<td style="border: 1px solid #666666; padding:1px;">innerWidth</td><td style="border: 1px solid #666666; padding:1px;">false</td><td style="border: 1px solid #666666; padding:1px;">This is an alternative to 'width' used to set a fixed inner width. This excludes borders and buttons. Example: "50%", "500px", or 500</td>

				</tr>
				<tr>
					<td style="border: 1px solid #666666; padding:1px;">innerHeight</td><td style="border: 1px solid #666666; padding:1px;">false</td><td style="border: 1px solid #666666; padding:1px;">This is an alternative to 'height' used to set a fixed inner height. This excludes borders and buttons. Example: "50%", "500px", or 500</td>
				</tr>
				<tr>
					<td style="border: 1px solid #666666; padding:1px;">initialWidth</td><td style="border: 1px solid #666666; padding:1px;">300</td><td style="border: 1px solid #666666; padding:1px;">Set the initial width, prior to any content being loaded.</td>

				</tr>
				<tr>
					<td style="border: 1px solid #666666; padding:1px;">initialHeight</td><td style="border: 1px solid #666666; padding:1px;">100</td><td style="border: 1px solid #666666; padding:1px;">Set the initial height, prior to any content being loaded.</td>
				</tr>
				<tr>
					<td style="border: 1px solid #666666; padding:1px;">maxWidth</td><td style="border: 1px solid #666666; padding:1px;">false</td><td style="border: 1px solid #666666; padding:1px;">Set a maximum width for loaded content. Example: "100%", 500, "500px"</td>

				</tr>
				<tr>
					<td style="border: 1px solid #666666; padding:1px;">maxHeight</td><td style="border: 1px solid #666666; padding:1px;">false</td><td style="border: 1px solid #666666; padding:1px;">Set a maximum height for loaded content. Example: "100%", 500, "500px"</td>
				</tr>
				<tr>
					<td style="border: 1px solid #666666; padding:1px;">scalePhotos</td><td style="border: 1px solid #666666; padding:1px;">true</td><td style="border: 1px solid #666666; padding:1px;">If 'true' and if maxWidth, maxHeight, innerWidth, innerHeight, width, or height have been defined, ColorBox will scale photos to fit within the those values.</td>

				</tr>
				<tr>
					<td style="border: 1px solid #666666; padding:1px;">scrolling</td><td style="border: 1px solid #666666; padding:1px;">true</td><td style="border: 1px solid #666666; padding:1px;">If 'false' ColorBox will hide scrollbars for overflowing content.  This could be used on conjunction with the resize method (see below) for a smoother transition if you are appending content to an already open instance of ColorBox.</td>
				</tr>
				<tr>
					<td style="border: 1px solid #666666; padding:1px;">iframe</td><td style="border: 1px solid #666666; padding:1px;">false</td><td style="border: 1px solid #666666; padding:1px;">If 'true' specifies that content should be displayed in an iFrame.</td>

				</tr>
				<tr>
					<td style="border: 1px solid #666666; padding:1px;">inline</td><td style="border: 1px solid #666666; padding:1px;">false</td><td style="border: 1px solid #666666; padding:1px;">If 'true' a jQuery selector can be used to display content from the current page. Example: <br /><span class='code'>$("#inline").colorbox({inline:true, href:"#myForm"});</span></td>
				</tr>
				<tr>
					<td style="border: 1px solid #666666; padding:1px;">html</td><td style="border: 1px solid #666666; padding:1px;">false</td><td style="border: 1px solid #666666; padding:1px;">This allows an HTML string to be used directly instead of pulling content from another source (ajax, inline, or iframe). Example: <br /><span class='code'>$.fn.colorbox({html:'&lt;p&gt;Hello&lt;/p&gt;'});</span></td>

				</tr>
				<tr>
					<td style="border: 1px solid #666666; padding:1px;">photo</td><td style="border: 1px solid #666666; padding:1px;">false</td><td style="border: 1px solid #666666; padding:1px;">If true, this setting forces ColorBox to display a link as a photo.  Use this when automatic photo detection
  fails (such as using a url like 'photo.php' instead of 'photo.jpg', 'photo.jpg#1', or 'photo.jpg?pic=1')</td>
				</tr>
				<tr>
					<td style="border: 1px solid #666666; padding:1px;">opacity</td><td style="border: 1px solid #666666; padding:1px;">0.85</td><td style="border: 1px solid #666666; padding:1px;">The overlay opacity level. Range: 0 to 1.</td>

				</tr>
				<tr >
					<td style="border: 1px solid #666666; padding:1px;">open</td><td style="border: 1px solid #666666; padding:1px;">false</td><td style="border: 1px solid #666666; padding:1px;">If true, the lightbox will automatically open with no input from the visitor.</td>
				</tr>
				<tr>
					<td style="border: 1px solid #666666; padding:1px;">preloading</td><td style="border: 1px solid #666666; padding:1px;">true</td><td style="border: 1px solid #666666; padding:1px;">Allows for preloading of 'Next' and 'Previous' content in a shared relation group (same values for the 'rel' attribute), after the current content has finished loading.  Set to 'false' to disable.</td>

				</tr>
				<tr>
					<td style="border: 1px solid #666666; padding:1px;">overlayClose</td><td style="border: 1px solid #666666; padding:1px;">true</td><td style="border: 1px solid #666666; padding:1px;">If true, enables closing ColorBox by clicking on the background overlay.</td>
				</tr>	
				<tr>
					<td style="border: 1px solid #666666; padding:1px;">slideshow</td><td style="border: 1px solid #666666; padding:1px;">false</td><td style="border: 1px solid #666666; padding:1px;">If true, adds an automatic slideshow to a content group / gallery.</td>

				</tr>
				<tr>
					<td style="border: 1px solid #666666; padding:1px;">slideshowSpeed</td><td style="border: 1px solid #666666; padding:1px;">2500</td><td style="border: 1px solid #666666; padding:1px;">Sets the speed of the slideshow, in milliseconds.</td>
				</tr>
				<tr>
					<td style="border: 1px solid #666666; padding:1px;">slideshowAuto</td><td style="border: 1px solid #666666; padding:1px;">true</td><td style="border: 1px solid #666666; padding:1px;">If true, the slideshow will automatically start to play.</td>

				</tr>
				<tr>
					<td style="border: 1px solid #666666; padding:1px;">slideshowStart</td><td style="border: 1px solid #666666; padding:1px;">"start slideshow"</td><td style="border: 1px solid #666666; padding:1px;">Text for the slideshow start button.</td>
				</tr>
				<tr>
					<td style="border: 1px solid #666666; padding:1px;">slideshowStop</td><td style="border: 1px solid #666666; padding:1px;">"stop slideshow"</td><td style="border: 1px solid #666666; padding:1px;">Text for the slideshow stop button</td>

				</tr>
				<tr>
					<td style="border: 1px solid #666666; padding:1px;">current</td><td style="border: 1px solid #666666; padding:1px;">"{current} of {total}"</td><td style="border: 1px solid #666666; padding:1px;">Text format for the content group / gallery count.  {current} and {total} are detected and replaced with actual numbers while ColorBox runs.</td>
				</tr>
				<tr>
					<td style="border: 1px solid #666666; padding:1px;">previous</td><td style="border: 1px solid #666666; padding:1px;">"previous"</td><td style="border: 1px solid #666666; padding:1px;">Text for the previous button in a shared relation group (same values for 'rel' attribute).</td>

				</tr>
				<tr>
					<td style="border: 1px solid #666666; padding:1px;">next</td><td style="border: 1px solid #666666; padding:1px;">"next"</td><td style="border: 1px solid #666666; padding:1px;">Text for the next button in a shared relation group (same values for 'rel' attribute).</td>
				</tr>
				<tr>
					<td style="border: 1px solid #666666; padding:1px;">close</td><td style="border: 1px solid #666666; padding:1px;">"close"</td><td style="border: 1px solid #666666; padding:1px;">Text for the close button.  The 'Esc' key will also close ColorBox.</td>

				</tr>
			
				<tr>
					<td style="border: 1px solid #666666; padding:1px;">onOpen</td><td style="border: 1px solid #666666; padding:1px;">false</td><td style="border: 1px solid #666666; padding:1px;">Callback that fires right before ColorBox begins to open.</td>
				</tr>
				<tr>
					<td style="border: 1px solid #666666; padding:1px;">onLoad</td><td style="border: 1px solid #666666; padding:1px;">false</td><td style="border: 1px solid #666666; padding:1px;">Callback that fires right before attempting to load the target content.</td>

				</tr>
				<tr>
					<td style="border: 1px solid #666666; padding:1px;">onComplete</td><td style="border: 1px solid #666666; padding:1px;">false</td><td style="border: 1px solid #666666; padding:1px;">Callback that fires right after loaded content is displayed.</td>
				</tr>
				<tr>
					<td style="border: 1px solid #666666; padding:1px;">onCleanup</td><td style="border: 1px solid #666666; padding:1px;">false</td><td style="border: 1px solid #666666; padding:1px;">Callback that fires at the start of the close process.</td>

				</tr>
				<tr>
					<td style="border: 1px solid #666666; padding:1px;">onClosed</td><td style="border: 1px solid #666666; padding:1px;">false</td><td style="border: 1px solid #666666; padding:1px;">Callback that fires once ColorBox is closed.</td>
				</tr>
				</table>

 </div>  