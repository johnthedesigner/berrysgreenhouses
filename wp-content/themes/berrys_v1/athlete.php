<?php
// QUERY ATHLETE INFO

if ( have_posts() ) : while ( have_posts() ) : the_post();

// COLLECT ATHLETE INFO

// NAME
$firstName			= get_post_meta($post->ID, '_personal_information_first', true);
$lastName			= get_post_meta($post->ID, '_personal_information_last', true);

// HEADSHOT
$headshotID			= get_post_meta($post->ID, '_personal_information_headshot', true);
$headshot			= wp_get_attachment_image_src( $headshotID, 'headshot', true );

// GALLERY
$galleryImages		= get_post_meta($post->ID, '_photo_gallery_images_img', true);
$galleryTitles		= get_post_meta($post->ID, '_photo_gallery_images_title', true);
$galleryCaptions	= get_post_meta($post->ID, '_photo_gallery_images_caption', true);
$galleryPlacement	= get_post_meta($post->ID, '_photo_gallery_images_captionplacement', true);
$galleryOrder		= get_post_meta($post->ID, '_photo_gallery_images_order', true);

// BIO
$residence			= get_post_meta($post->ID, '_personal_information_residence', true);
$nationality		= get_post_meta($post->ID, '_personal_information_nationality', true);
$almamater			= get_post_meta($post->ID, '_personal_information_almamater', true);
$bio				= get_post_meta($post->ID, '_bio_bio', true);
$dob				= get_post_meta($post->ID, '_personal_information_dob', true);
$dob				= explode("/", $dob);
$age				= (date("md", date("U", mktime(0, 0, 0, $dob[0], $dob[1], $dob[2]))) > date("md") ? ((date("Y")-$dob[2])-1):(date("Y")-$dob[2]));
         
// PERSONAL RECORDS
$prEvents			= get_post_meta($post->ID, '_personal_records_records_event', true);
$prRecords			= get_post_meta($post->ID, '_personal_records_records_record', true);

// AWARDS
$awards				= get_post_meta($post->ID, '_awards___achievments_awards_award', true);

// QUOTE
$quote				= get_post_meta($post->ID, '_favorite_quote_quote', true);

// SOCIAL
$twitter			= get_post_meta($post->ID, '_social_media_twitter', true);
$facebook			= get_post_meta($post->ID, '_social_media_facebook', true);
$insta				= get_post_meta($post->ID, '_social_media_instagram', true);
$youtube			= get_post_meta($post->ID, '_social_media_youtube', true);
$website			= get_post_meta($post->ID, '_social_media_website', true);

// LINKS
$linkTitles			= get_post_meta($post->ID, '_misc__links_links_title', true);
$linkURLs			= get_post_meta($post->ID, '_misc__links_links_url', true);
?>

<!-- START #featureSection -->
<?php 
for ($i=0; $i<count($galleryPlacement); $i++){
	if ($galleryPlacement[$i] != "right") {$galleryPlacement[$i]="left";};
};

if ( $galleryImages[0] ) {
	
	array_multisort($galleryOrder, $galleryImages, $galleryTitles, $galleryCaptions, $galleryPlacement);

	echo "<script type='text/javascript'>";
	echo $dob;
	echo "</script>";
	
}; ?>

<section id="featureSection" class="container_12">
    <div class="grid_12" id="profileHead">
    	<img id="profileHeadshot" src="<?php echo $headshot[0]; ?>" width="160" height="160" alt="<?php echo $firstName; echo ' '; echo $lastName; ?>">
    	<div id="athleteName"><?php echo $firstName; echo "<br />"; echo $lastName; ?></div>
    	<div id="vitals">
    		<ul>
    			<?php if ($residence) { ?><li><span class="vitalTitle">Residence:</span> <?php echo $residence; ?></li><?php }; ?>
    			<?php if ($nationality) { ?><li><span class="vitalTitle">Nationality:</span> <?php echo $nationality; ?></li><?php }; ?>
    			<?php if ($almamater) { ?><li><span class="vitalTitle">Alma Mater:</span> <?php echo $almamater; ?></li><?php }; ?>
				<?php if (get_the_terms($post->ID, 'event')) {
				  $events = get_the_terms($post->ID, 'event');
				  $output = '<li><span class="vitalTitle">Event:</span> ';
				  foreach ($events as $event) {
				    $output .= '<span class="event">'. $event->name .'</span>';
				  }
				  $output .= '</li>';
				
				  echo $output;
				}; ?>
    			<?php if ($age && $age != 0) { ?><li><span class="vitalTitle">Age:</span> <?php echo $age; ?></li><?php }; ?>
    		</ul>
    	</div>
    	<div id="social">
    		<ul>
    			<?php if ($twitter) { ?><li><span class="socialTitle"><img class="icon_link" src="<?php bloginfo('template_directory'); ?>/img/icon_twit.png" title="Twitter Profile" /></span> <a href="http://www.twitter.com/<?php echo $twitter; ?>" target="_blank">@<?php echo $twitter; ?></a></li><?php }; ?>
    			
    			<?php if ($facebook) { ?><li><span class="socialTitle"><img class="icon_link" src="<?php bloginfo('template_directory'); ?>/img/icon_fb.png" title="Twitter Profile" /></span> <a href="<?php echo $facebook; ?>" target="_blank">Facebook Page</a></li><?php }; ?>
    			
    			<?php if ($insta) { ?><li><span class="socialTitle"><img class="icon_link" src="<?php bloginfo('template_directory'); ?>/img/icon_insta.png" title="Instagram Profile" /></span> <a href="http://www.instagr.am/<?php echo $insta; ?>" target="_blank">Instagram</a></li><?php }; ?>
    			
    			<?php if ($youtube) { ?><li><span class="socialTitle"><img class="icon_link" src="<?php bloginfo('template_directory'); ?>/img/icon_yt.png" title="Youtube Channel" /></span> <a href="<?php echo $youtube; ?>" target="_blank">Youtube Channel</a></li><?php }; ?>
    			
    			<?php if ($website) { ?><li><span class="socialTitle"><img class="icon_link" src="<?php bloginfo('template_directory'); ?>/img/icon_globe.png" title="Twitter Profile" /></span> <a href="<?php echo $website; ?>" target="_blank">Personal Site</a></li><?php }; ?>
    			
    		</ul>
    	</div>
    </div>

	<?php if ( $galleryImages[0]) { //Feature gallery conditional ?>
	<div id="homeFeature" class="flexslider grid_12">
		<ul class="slides">

     	<?php for ( $i=0; $i<count($galleryImages); $i++ ) { ?>
			<li style="height:550px;">
			<?php $featureImg = wp_get_attachment_image_src( $galleryImages[$i], 'feature', true ); ?>
			<img src="<?php echo $featureImg[0];?>" alt="<?php echo $galleryTitles[$i]; ?>" width="1060" height="550" />
			
			<?php if ( $galleryCaptions[$i] || $galleryTitles[$i] ) { ?>
				<span class="featureContent<?php if ( $galleryPlacement[$i] == "right" ) { echo " featureContentRight"; }; ?>">
					<h3 class="featureTitle"><?php echo $galleryTitles[$i]; ?></h3>
					<p class="featureCap"><?php echo $galleryCaptions[$i]; ?></p>
				</span>
			<?php }; ?>
		</li>
		<?php }; ?>
			        	
		</ul>
	</div>
	<div>
	<?php }; //Feature gallery conditional ?>
	
</section>

<section id="athleteInfo" class="container_12">

	<div class="grid_8 push_2">

		<?php if ( $quote ) { ?>
			<p class="quote"><span class="quoteWrap"><?php echo $quote; ?></span></p>
		<?php }; ?>

	</div>
	
	<div class="grid_6 alpha">
		<?php if ( $bio ) { ?>
			<div class="sectionHeader">
				<h3>Bio</h3>
			</div>
			<p class="athleteBio"><?php echo $bio ?></p>
		<?php }; ?>

	</div>

	<div id="sidebar" class="grid_6 omega">
		<?php if ( $prEvents[0] ) { ?>
			<div class="sectionHeader">
				<h3>Personal Records</h3>
			</div>
			<ul class="personalRecords">
				<?php for ( $i=0; $i<count( $prEvents ); $i++ ) { ?>
					<li>
						<h4><?php echo $prEvents[$i]; ?></h4>
						<p><?php echo $prRecords[$i]; ?></p>
					</li>
				<?php }; ?>
			</ul>
		<?php }; ?>

		<?php if ( $awards[0] ) { ?>
			<div class="sectionHeader">
				<h3>Awards &amp; Achievements</h3>
			</div>
			<ul class="awardsAchievements">
				<?php for ( $i=0; $i<count( $awards ); $i++ ) { ?>
					<li>
						<p><?php echo $awards[$i]; ?></p>
					</li>
				<?php }; ?>
			</ul>
		<?php }; ?>

		<?php if ( $linkURLs[0] ) { ?>
			<div class="sectionHeader">
				<h3>Links</h3>
			</div>
			<ul class="links">
				<?php for ( $i=0; $i<count( $linkURLs ); $i++ ) { ?>
					<li>
						<p><a href="<?php echo $linkURLs[$i]; ?>" title="<?php echo $linkTitles[$i]; ?>" target="_blank"><?php echo $linkTitles[$i]; ?></a></p>
					</li>
				<?php }; ?>
			</ul>
		<?php }; ?>

	</div>

	<div class="clearfix"></div>

</section>

<?php endwhile; ?>
<?php endif; ?>
