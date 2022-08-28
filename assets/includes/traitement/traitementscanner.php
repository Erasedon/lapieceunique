<?php

include '../../db/connectdb.php'; 
    $cbpfo = $_POST['cb'];

      var_dump($cbpfo);
      die();
       $sql = "SELECT * FROM articles WHERE cbp_articles = :cbp_articles";
       $prepare = $db->prepare($sql);   
       $prepare ->execute(array(':cbp_articles' => $cbpfo));    
       $count = $prepare->rowCount();
   
       if ( $count == 1) {
         while($result = $prepare->fetch()) {
           if($cbpfo == $result['cbp_articles']){
             header("Location:../poster.php?id_article= ".$result['id_articles']."");
           }
         }
       }

// // require __DIR__ . '../../../../vendor/autoload.php';
// require_once(__DIR__ . '../../../../vendor/autoload.php');
// use Aspose\BarCode\Configuration;
// use Aspose\BarCode\BarcodeApi;
// use Aspose\BarCode\Model\EncodeBarcodeType;
// use Aspose\BarCode\Requests\GetBarcodeGenerateRequest;

// $config = new Configuration();
// $config->setClientId('1cdf5fc7-2935-42b3-a06f-a6311d877a83');
// $config->setClientSecret('05dfe1ce313834d02d6bc4a517fe2625');

// $request = new GetBarcodeGenerateRequest(EncodeBarcodeType::QR, 'PHP SDK Test');
// $request->format = 'png';

// $api = new BarcodeApi(null, $config);
// $response = $api->GetBarCodeGenerate($request);

// $type = 'image/png';
// $size = $response->getSize();
// header("Content-Type: $type");
// header("Content-Length: $size");
// echo $response->fread($size);



// // Configure OAuth2 access token for authorization: JWT
// $config = Aspose\BarCode\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

// $apiInstance = new Aspose\BarCode\Api\BarcodeApi(
//     // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
//     // This is optional, `GuzzleHttp\Client` will be used as default.
//     new GuzzleHttp\Client(),
//     $config
// );
// $type = "type_example"; // string | The type of barcode to read.
// $checksum_validation = "checksum_validation_example"; // string | Enable checksum validation during recognition for 1D barcodes. Default is treated as Yes for symbologies which must contain checksum, as No where checksum only possible. Checksum never used: Codabar Checksum is possible: Code39 Standard/Extended, Standard2of5, Interleaved2of5, Matrix2of5, ItalianPost25, DeutschePostIdentcode, DeutschePostLeitcode, VIN Checksum always used: Rest symbologies
// $detect_encoding = true; // bool | A flag which force engine to detect codetext encoding for Unicode.
// $preset = "preset_example"; // string | Preset allows to configure recognition quality and speed manually. You can quickly set up Preset by embedded presets: HighPerformance, NormalQuality, HighQuality, MaxBarCodes or you can manually configure separate options. Default value of Preset is NormalQuality.
// $rect_x = 56; // int | Set X for area for recognition.
// $rect_y = 56; // int | Set Y for area for recognition.
// $rect_width = 56; // int | Set Width of area for recognition.
// $rect_height = 56; // int | Set Height of area for recognition.
// $strip_fnc = true; // bool | Value indicating whether FNC symbol strip must be done.
// $timeout = 56; // int | Timeout of recognition process.
// $median_smoothing_window_size = 56; // int | Window size for median smoothing. Typical values are 3 or 4. Default value is 3. AllowMedianSmoothing must be set.
// $allow_median_smoothing = true; // bool | Allows engine to enable median smoothing as additional scan. Mode helps to recognize noised barcodes.
// $allow_complex_background = true; // bool | Allows engine to recognize color barcodes on color background as additional scan. Extremely slow mode.
// $allow_datamatrix_industrial_barcodes = true; // bool | Allows engine for Datamatrix to recognize dashed industrial Datamatrix barcodes. Slow mode which helps only for dashed barcodes which consist from spots.
// $allow_decreased_image = true; // bool | Allows engine to recognize decreased image as additional scan. Size for decreasing is selected by internal engine algorithms. Mode helps to recognize barcodes which are noised and blurred but captured with high resolution.
// $allow_detect_scan_gap = true; // bool | Allows engine to use gap between scans to increase recognition speed. Mode can make recognition problems with low height barcodes.
// $allow_incorrect_barcodes = true; // bool | Allows engine to recognize barcodes which has incorrect checksum or incorrect values. Mode can be used to recognize damaged barcodes with incorrect text.
// $allow_invert_image = true; // bool | Allows engine to recognize inverse color image as additional scan. Mode can be used when barcode is white on black background.
// $allow_micro_white_spots_removing = true; // bool | Allows engine for Postal barcodes to recognize slightly noised images. Mode helps to recognize slightly damaged Postal barcodes.
// $allow_one_d_fast_barcodes_detector = true; // bool | Allows engine for 1D barcodes to quickly recognize high quality barcodes which fill almost whole image. Mode helps to quickly recognize generated barcodes from Internet.
// $allow_one_d_wiped_bars_restoration = true; // bool | Allows engine for 1D barcodes to recognize barcodes with single wiped/glued bars in pattern.
// $allow_qr_micro_qr_restoration = true; // bool | Allows engine for QR/MicroQR to recognize damaged MicroQR barcodes.
// $allow_regular_image = true; // bool | Allows engine to recognize regular image without any restorations as main scan. Mode to recognize image as is.
// $allow_salt_and_pepper_filtering = true; // bool | Allows engine to recognize barcodes with salt and pepper noise type. Mode can remove small noise with white and black dots.
// $allow_white_spots_removing = true; // bool | Allows engine to recognize image without small white spots as additional scan. Mode helps to recognize noised image as well as median smoothing filtering.
// $check_more1_d_variants = true; // bool | Allows engine to recognize 1D barcodes with checksum by checking more recognition variants. Default value: False.
// $fast_scan_only = true; // bool | Allows engine for 1D barcodes to quickly recognize middle slice of an image and return result without using any time-consuming algorithms. Default value: False.
// $region_likelihood_threshold_percent = 1.2; // double | Sets threshold for detected regions that may contain barcodes. Value 0.7 means that bottom 70% of possible regions are filtered out and not processed further. Region likelihood threshold must be between [0.05, 0.9] Use high values for clear images with few barcodes. Use low values for images with many barcodes or for noisy images. Low value may lead to a bigger recognition time.
// $scan_window_sizes = array(56); // int[] | Scan window sizes in pixels. Allowed sizes are 10, 15, 20, 25, 30. Scanning with small window size takes more time and provides more accuracy but may fail in detecting very big barcodes. Combining of several window sizes can improve detection quality.
// $similarity = 1.2; // double | Similarity coefficient depends on how homogeneous barcodes are. Use high value for for clear barcodes. Use low values to detect barcodes that ara partly damaged or not lighten evenly. Similarity coefficient must be between [0.5, 0.9]
// $skip_diagonal_search = true; // bool | Allows detector to skip search for diagonal barcodes. Setting it to false will increase detection time but allow to find diagonal barcodes that can be missed otherwise. Enabling of diagonal search leads to a bigger detection time.
// $read_tiny_barcodes = true; // bool | Allows engine to recognize tiny barcodes on large images. Ignored if AllowIncorrectBarcodes is set to True. Default value: False.
// $australian_post_encoding_table = "australian_post_encoding_table_example"; // string | Interpreting Type for the Customer Information of AustralianPost BarCode.Default is CustomerInformationInterpretingType.Other.
// $ignore_ending_filling_patterns_for_c_table = true; // bool | The flag which force AustraliaPost decoder to ignore last filling patterns in Customer Information Field during decoding as CTable method. CTable encoding method does not have any gaps in encoding table and sequnce \"333\" of filling paterns is decoded as letter \"z\".
// $rectangle_region = "rectangle_region_example"; // string | 
// $url = "url_example"; // string | The image file url.
// $image = "/path/to/file.txt"; // \SplFileObject | Image data

// try {
//     $result = $apiInstance->postBarcodeRecognizeFromUrlOrContent($type, $checksum_validation, $detect_encoding, $preset, $rect_x, $rect_y, $rect_width, $rect_height, $strip_fnc, $timeout, $median_smoothing_window_size, $allow_median_smoothing, $allow_complex_background, $allow_datamatrix_industrial_barcodes, $allow_decreased_image, $allow_detect_scan_gap, $allow_incorrect_barcodes, $allow_invert_image, $allow_micro_white_spots_removing, $allow_one_d_fast_barcodes_detector, $allow_one_d_wiped_bars_restoration, $allow_qr_micro_qr_restoration, $allow_regular_image, $allow_salt_and_pepper_filtering, $allow_white_spots_removing, $check_more1_d_variants, $fast_scan_only, $region_likelihood_threshold_percent, $scan_window_sizes, $similarity, $skip_diagonal_search, $read_tiny_barcodes, $australian_post_encoding_table, $ignore_ending_filling_patterns_for_c_table, $rectangle_region, $url, $image);
//     print_r($result);
// } catch (Exception $e) {
//     echo 'Exception when calling BarcodeApi->postBarcodeRecognizeFromUrlOrContent: ', $e->getMessage(), PHP_EOL;
// }
?>