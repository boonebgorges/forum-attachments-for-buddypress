<?php
	if ( !isset( $_GET['filenum'] ) || !$filenum = $_GET['filenum'] )
		return;

	if ( !require_once( dirname(__FILE__) . '/../../../wp-load.php' ) )
		return;

	$file = $wpdb->get_results("SELECT * FROM ".$bb_attachments['db']." WHERE id = $filenum AND status = 0 LIMIT 1");

	if ( !isset( $file[0] ) || !$file[0]->id )
		return;

	$file 		= $file[0];
	$file->filename = stripslashes( $file->filename );
	$path 		= $bb_attachments['path'] . floor( $file->id/1000 ) . "/";
	$fullpath 	= $path . $file->id . "." . $file->filename;

	if ( !file_exists( $fullpath ) )
		return;

	@$wpdb->query("UPDATE ".$bb_attachments['db']." SET downloads=downloads+1 WHERE id = $file->id LIMIT 1");

	if ( isset( $file->type ) ) {
		$type = $file->type;
		$mime = image_type_to_mime_type( $type ); 	// lookup number to full string
		$mime = trim( substr( $mime, 0, strpos( $mime . ";", ";" ) ) );	// trim full string if necessary
	} else {
		$mime = $file->mime;
	}

	if ($bb_attachments['aws']['enable']) {
		$aws=$bb_attachments['aws']['url'].$file->id.'.'.$file->filename;
		header('Location: '.$aws);
	}

	//$headers = apache_request_headers();
	$ctype = bb_attachments_content_type( $file->ext );

	if (ini_get('zlib.output_compression')) {ini_set('zlib.output_compression', 'Off');}	// fix for IE

	header ("Cache-Control: public, must-revalidate, post-check=0, pre-check=0");
	header("Pragma: hack");

	header("Content-Type: $ctype; name='" . $file->filename . "'");
	header("Content-Length: $file->size");

	header('Content-Disposition: attachment; filename="' . $file->filename . '"');
	header("Content-Transfer-Encoding: binary");
	ob_clean();
	flush();
        $fp = @fopen($fullpath,"rb");
        set_time_limit(0);
	fpassthru($fp);	// avoids file touch bug with readfile
	fclose($fp);



?>