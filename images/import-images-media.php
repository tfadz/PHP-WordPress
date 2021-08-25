<?php 

****
http://www.example.com/?import_non_existing_media_library_entries=1
****

// ^-- use this for url 

/*
 * This function scans through all files in the wp-content/uploads
 * folders and imports them into the media library. This should be
 * included in your theme's functions.php file. Simply visit your 
 * website, including the URL param:
 * http://www.example.org/?import_non_existing_media_library_entries=1
 * 
 * Plan on it timing out a few times. Just keep refreshing. It won't 
 * duplicate files being imported.
 */
if(isset($_GET['import_non_existing_media_library_entries'])) {
    import_non_existing_media_library_entries();
}

function import_non_existing_media_library_entries() {

    global $wpdb;

    // Get the wordpress upload paths (physical and URL)
    $upload_dir = wp_upload_dir();

    //Get all the year folders within the upload directory
    $year_folders = glob($upload_dir['basedir'] . '/20*');

    foreach($year_folders as $yf) {

        $month_folders = glob($yf . '/{0,1}*', GLOB_BRACE);

        foreach($month_folders as $mf) {

            // Get all the valid media items within the month folder that we want to import
            $media_items = glob($mf . '/*.{jpeg,gif,png,pdf,jpg,doc,docx,xls,xlsx,csv}', GLOB_BRACE);

            foreach($media_items as $mi) {

                // Get the year, month and name of the file
                $media_guid_short = preg_match('/\/([0-9]+)\/([0-9]+)\/([a-z0-9\-_\.]+)$/i', $mi, $matches);

                if($media_guid_short) {

                    $is_thumb  = preg_match('/-[0-9]{2,4}x[0-9]{2,4}\.[jpg|png|gif|jpeg]+$/i', $matches[3]);

                    // We don't want to duplicate the imported media items
                    if(!$is_thumb) {

                        // See if a media library entry already exists for this media item
                        $query = "SELECT * FROM ".$wpdb->prefix."posts WHERE post_type = \"attachment\" AND guid LIKE \"%" . $matches[0] . "\"";

                        $media_exists = $wpdb->get_row($query);

                        // If the media file isn't in the database, let's import it!
                        if(!$media_exists) {

                            $media_srv_path = $upload_dir['basedir'] . $matches[0];
                            $file_type = wp_check_filetype(basename($media_srv_path), null);

                            // Prepare an array of post data for the attachment.
                            $attachment = array(
                                'guid' => $upload_dir['baseurl'] . $matches[0],
                                'post_mime_type' => $file_type['type'],
                                'post_title' => preg_replace('/\.[^.]+$/', '', basename($media_srv_path)),
                                'post_content' => '',
                                'post_status' => 'inherit'
                            );

                            // Insert the attachment into the database/media library
                            $attach_id = wp_insert_attachment($attachment, $media_srv_path, 0);

                            // Make sure that this file is included, as wp_generate_attachment_metadata() depends on it
                            require_once(ABSPATH . 'wp-admin/includes/image.php');

                            // Generate the metadata for the attachment, and update the database record
                            $attach_data = wp_generate_attachment_metadata($attach_id, $media_srv_path);
                            wp_update_attachment_metadata($attach_id, $attach_data);

                            // echo "media file added: " . $matches[3] . '<br>';

                        } else {

                            // echo "media file exists already: " . $matches[3] . '<br>';

                        }

                    } else {

                        // echo "skipped due to thumb: " . $matches[3] . '<br>';

                    }

                }

            }

        }

    }

}

 ?>