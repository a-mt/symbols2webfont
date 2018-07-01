<?php
session_start();

// Donwload result
if(isset($_GET['file']) && isset($_SESSION['file'])) {
    $txt = $_SESSION['file'];

    header("Content-type: image/svg+xml"); 
    header("Content-Disposition: attachment; filename=SVGFont.svg");
    header("Content-length: " . strlen($txt));
    header("Pragma: no-cache"); 
    header("Expires: 0"); 
    echo $txt;
    exit;
}

// Upload SVG
if(isset($_FILES['file'])) {
    $err = "";

    // Check upload
    switch($_FILES['file']['error']) {
        case UPLOAD_ERR_OK: break;
        case UPLOAD_ERR_INI_SIZE: $err = 'Filesize is bigger than ' . ini_get('upload_max_filesize'); break;
        case UPLOAD_ERR_FORM_SIZE: $err = 'Filesize is bigger than the maximum authorized'; break;
        case UPLOAD_ERR_PARTIAL: $err = 'The file could not be downloaded'; break;
        case UPLOAD_ERR_NO_FILE: $err = 'No file uploaded'; break;
        default: $err = 'The server has encountered an internal error'; break;
    }
    if($err) {
        redirect($err);
    }

    // Check file
    $mime = mime_content_type($_FILES['file']['tmp_name']);
    if($mime != 'image/svg') {
        redirect("You should upload a .svg file");
    }

    $txt = file_get_contents($_FILES['file']['tmp_name']);
    if($txt) {

        // Convert to webfont 
        list($err, $output) = convert($txt);

        if($output) {
            $_SESSION["file"]     = $output;
            $_SESSION["download"] = 1;
            redirect(null, $err);
        } else {
            redirect($err);
        }
    }
}

function redirect($err = null, $warning = null) {
    $_SESSION["error"]   = $err;
    $_SESSION["warning"] = $warning;
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Convert SVG symbols to SVG Webfont
function convert($txt) {
    libxml_use_internal_errors(true);

    require __DIR__ . '/SVG-Icon-Font-Generator/Document.php';
    require __DIR__ . '/SVG-Icon-Font-Generator/Font.php';
    require __DIR__ . '/SVG-Icon-Font-Generator/IconFontGenerator.php';

    // Parse XML of SVG file
    try {
        $svg = new SimpleXMLElement($txt);
    } catch(Exception $e) {
        return [$e->getMessage(), null];
    }
    $n = 0;

    // Create Webfont
    $err  = "";
    $font = new Font();
    $fontOptions = $font->getOptions();

    // Loop symbols
    if(isset($svg->symbol)) {
        foreach($svg->children() as $child) {
            if($child->getName() != "symbol") {
                continue;
            }

            // Get XML of symbol
            $xml = $child->asXML();
            $xml = str_replace(array('<symbol ', '</symbol>'), array('<svg ', '</svg>'), $xml);

            $id = (isset($child['id']) ? trim($child['id']) : microtime(true)*10000);

            // Add glyph to Webfont
            $iconDoc = new Document($xml);
            $viewBox = $iconDoc->getViewBox();
            $code    = hexdec('e001') + $n;

            try {
            	$font->addGlyph(
				    $code,
				    $iconDoc->getPath($fontOptions['units-per-em']/$viewBox['height'], 5, 'vertical', true, 0, $fontOptions['descent']),
				    $id,
				    round($viewBox['width']*$fontOptions['units-per-em']/$viewBox['height'])
			    );		    
                $n++;

			} catch(Exception $e){
			    $err .= "Icon $id: " . $e->getMessage() . "\n";
			}
        }
    }

    // Return created Webfont
    if($n) {
        return [$err, $font->getXML()];
    } else {
        return ["Empty file", null];
    }
}

$file    = isset($_SESSION["download"]);
$error   = @$_SESSION["error"];
$warning = @$_SESSION["warning"];

unset($_SESSION["download"]);
unset($_SESSION["error"]);
unset($_SESSION["warning"]);

require __DIR__ . '/inc.tpl.php';

